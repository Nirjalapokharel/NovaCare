<?php
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/../config/db.php';

/*
|--------------------------------------------------------------------------
| Start Session
|--------------------------------------------------------------------------
*/

if (session_status() === PHP_SESSION_NONE) {
    $isSecure = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';

    session_set_cookie_params([
        'httponly' => true,
        'secure'   => $isSecure,
        'samesite' => 'Lax'
    ]);

    session_start();
}

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

/**
 * Require the user to be logged in.
 */
function require_login(array $allowedRoles = []): void
{
    /*
     * Check whether a login session exists.
     */
    if (!is_logged_in()) {
        redirect('/login.php');
    }

    /*
     * Session idle timeout: 30 minutes.
     */
    $maxIdleTime = 1800;

    if (
        isset($_SESSION['last_activity']) &&
        (time() - $_SESSION['last_activity'] > $maxIdleTime)
    ) {
        logout_user();

        /*
         * logout_user() destroys the session.
         * Start a new session so a flash message can be stored.
         */
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        set_flash(
            'error',
            'Your session has expired due to inactivity. Please log in again.'
        );

        redirect('/login.php');
    }

    /*
     * Update activity time.
     */
    $_SESSION['last_activity'] = time();

    /*
     * Verify the logged-in user against the database.
     */
    $stmt = getDB()->prepare(
        'SELECT role, status, force_password_change
         FROM users
         WHERE id = ?'
    );

    $stmt->execute([$_SESSION['user_id']]);

    $user = $stmt->fetch();

    /*
     * Make sure the account still exists, is active,
     * and the session role matches the database role.
     */
    if (
        !$user ||
        $user['status'] !== 'active' ||
        $user['role'] !== $_SESSION['role']
    ) {
        logout_user();
        redirect('/login.php');
    }

    /*
     * Keep the password-change requirement synchronized
     * with the database.
     */
    $_SESSION['force_password_change'] =
        (bool) $user['force_password_change'];

    /*
     * Check role authorization.
     * Only admin users can continue.
     */
    if (
        !empty($allowedRoles) &&
        !in_array($_SESSION['role'], $allowedRoles, true)
    ) {
        http_response_code(403);
        die('You do not have permission to view this page.');
    }

    /*
     * If the user logged in using a temporary password,
     * force them to change it before accessing other pages.
     */
    if (!empty($_SESSION['force_password_change'])) {

        $currentPage = basename($_SERVER['PHP_SELF'] ?? '');

        if ($currentPage !== 'change-password.php') {
            redirect('/change-password.php');
        }
    }
}

/*
|--------------------------------------------------------------------------
| Session Information Helpers
|--------------------------------------------------------------------------
*/

/**
 * Check whether a user is currently logged in.
 */
function is_logged_in(): bool
{
    return !empty($_SESSION['user_id'])
        && !empty($_SESSION['role']);
}

/**
 * Get the currently logged-in user's ID.
 */
function current_user_id(): ?int
{
    return isset($_SESSION['user_id'])
        ? (int) $_SESSION['user_id']
        : null;
}

/**
 * Get the currently logged-in user's role.
 */
function current_role(): ?string
{
    return $_SESSION['role'] ?? null;
}

/**
 * Check whether the logged-in user must change their password.
 */
function must_change_password(): bool
{
    return !empty($_SESSION['force_password_change']);
}

/*
|--------------------------------------------------------------------------
| Login / Logout
|--------------------------------------------------------------------------
*/

/**
 * Create a user login session.
 */
function login_user(
    int $userId,
    string $role,
    bool $forcePasswordChange = false
): void {
    /*
     * Prevent session fixation attacks.
     */
    session_regenerate_id(true);

    $_SESSION['user_id'] = $userId;
    $_SESSION['role'] = $role;
    $_SESSION['force_password_change'] = $forcePasswordChange;
    $_SESSION['last_activity'] = time();
}

/**
 * Destroy the current user session.
 */
function logout_user(): void
{
    /*
     * Clear all session data.
     */
    $_SESSION = [];

    /*
     * Remove the session cookie.
     */
    if (ini_get('session.use_cookies')) {

        $params = session_get_cookie_params();

        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );
    }

    /*
     * Destroy the session.
     */
    session_destroy();
}
