<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
       <link rel="stylesheet" href="assets/css/style.css?v=<?= filemtime('assets/css/style.css'); ?>">
</head>
<body>

<div class="page">
    <section  class="brand">
        <div class="brand-card">
            <div class="brand-mark">
                <div class="logo-badge">+</div>
                <div class="brand-name">NOVA<span>CARE<span></div>
</div>

<h1>ACCESS YOUR HEALTHCARE DASHBOARD</h1>
<p class="lead">manage your upcoming appointments,track patient queues, and access medical consultations securely.</p>

<div class ="verify-box">
    <div class="check-dot">&#10003;</div>
<div>
    <strong>Instant queue verification</strong>
    <span>Direct hospital token access</span>
</div>
</div>

<ul class="feature-list">

<li>
    <svg class="feature-icon" viewBox="0 0 24 24" fill="none" stroke="current color" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="m12 7v5l-3 3"/></svg>
Instant appointment rescheduling
</li>
<li>
    <svg class="feature-icon" viewbox="0 0 24 24" fill="none" stroke="current color" stroke-width ="2" stroke-linecape="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="m8 2v4m16 2v4m3 10h18"/></svg>
    24/7 verified specialist network
</li>
</ul>
</div>
</section>

<!--Right side of the page-->
<section class="form-side">
    <div class="form-card">
        <span class="signin-tag">secure sign in</span>
        <h2>Welcome</h2>
        <p>Enter your regestered email or Doctor id.</p>

        <form id="loginform"autocomplete="off">
            <div class="field">
                <label for ="identifier"Email or Doctor ID</label>
                <input type="text" id="identifier" name="identifier" placeholder="eg.abc@gmail.com or DR1254"required>
</div>

<div class="field">
    <label for="password">password</label>
    <div class="password-wrap">
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
        <button type="button" class="toggle-eye" id="toggle-eye" aria-label="show password">
            <svg  width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d=m1 12s4-7 11-7 11 7 11 7-4 7-11 1-11-7-11-7z"/><circle cx="12" cy="12" r="13"/></svg>
</button>
</div>
</div>

<button type="submit" class ="signin-btn">sign in </button>
</form>

<p class="form-foot">New to NovaCare? <a href ="#">Create an accoount</a></p>
<a href="#" class="back-home">&larr; Back to homepage</a>
</div>
</section>

</div>
<script>
    const toggle = document.getElementById ('toggleEye');
    const pwd = document.getElementById('password');
    toggle.addEventListner ('click',() => {
        const isPassword = pwd.type === 'password';
        pwd.type = isPassword ? 'text' : 'password';
        toggle.setAttribute('aria-label', isPassword ? 'Hide password' : 'show password');

    });

    document.getElementById('loginForm').addEventListener('submit', (e) => {
        e.preventDefault();
    });
</script>
</body>
</html>