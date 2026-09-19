<?php
// Load Composer's autoloader if available
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require_once __DIR__ . '/../vendor/autoload.php';
}

function send_email(string $to, string $subject, string $body): bool
{
    if (class_exists('PHPMailer\PHPMailer\PHPMailer')) {
        try {
            $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            
            $mail->Username   = getenv('SMTP_USER') ?: 'dikshantlama77@gmail.com'; 
            $mail->Password   = getenv('SMTP_PASS') ?: 'dikshant@123'; 
            
            $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('dikshantlama77@gmail.com', 'HAMS Admin');
            $mail->addAddress($to);

            $mail->isHTML(false);
            $mail->Subject = $subject;
            $mail->Body    = $body;

            return $mail->send();
        } catch (\Exception $e) {
            error_log("Mailer Exception: " . $e->getMessage());
            return false;
        }
    }

    // Fallback if PHPMailer is unavailable
    $headers = "From: HAMS Admin <dikshantlama77@gmail.com>\r\n"
             . "Reply-To: dikshantlama77@gmail.com\r\n"
             . "X-Mailer: PHP/" . phpversion();
    return @mail($to, $subject, $body, $headers);
}

function send_doctor_verified_email(string $to, string $doctorName, string $loginId, string $tempPassword): bool
{
    $subject = 'Your account has been verified';
    $body = "Hello Dr. $doctorName,\n\n"
          . "Your account has been verified by our admin team. You can now log in:\n\n"
          . "Login ID: $loginId\n"
          . "Temporary Password: $tempPassword\n\n"
          . "Please log in and change your password immediately.\n";
    return send_email($to, $subject, $body);
}

function send_doctor_rejected_email(string $to, string $doctorName, string $reason): bool
{
    $subject = 'Update on your registration';
    $body = "Hello Dr. $doctorName,\n\n"
          . "We were unable to verify your registration at this time.\n"
          . "Reason: $reason\n\n"
          . "Please contact the hospital admin office for more information.\n";
    return send_email($to, $subject, $body);
}

function send_appointment_request_to_hospital(string $hospitalEmail, array $data): bool
{
    $subject = "New Patient Appointment Request - Token #" . ($data['token'] ?? 'NEW');
    $body = "Dear Hospital Administration,\n\n"
          . "A new appointment booking has been requested through the HAMS platform.\n\n"
          . "--- APPOINTMENT DETAILS ---\n"
          . "Token Number: " . ($data['token'] ?? 'N/A') . "\n"
          . "Requested Specialist: " . ($data['doctor_name'] ?? 'N/A') . " (" . ($data['specialization'] ?? '') . ")\n"
          . "Date: " . ($data['appointment_date'] ?? 'N/A') . "\n"
          . "Slot Time: " . ($data['slot_time'] ?? 'N/A') . "\n\n"
          . "--- PATIENT DETAILS ---\n"
          . "Patient Name: " . ($data['patient_name'] ?? 'N/A') . "\n"
          . "Contact Phone: " . ($data['patient_phone'] ?? 'N/A') . "\n"
          . "Gender / DOB: " . ($data['patient_gender'] ?? '') . " / " . ($data['patient_dob'] ?? '') . "\n"
          . "Blood Group: " . ($data['blood_group'] ?? 'N/A') . "\n"
          . "Emergency Contact: " . ($data['emergency_contact'] ?? 'N/A') . "\n"
          . "Reason / Notes: " . ($data['reason'] ?? 'Routine Consultation') . "\n\n"
          . "Please review your hospital schedule and confirm or reject this booking.\n\n"
          . "Regards,\nHAMS Digital Healthcare Network";

    return send_email($hospitalEmail, $subject, $body);
}

function send_appointment_status_to_patient(string $patientEmail, array $data, string $status, string $reason = ''): bool
{
    $subject = "Appointment Status Update: " . ucfirst($status) . " - Token #" . ($data['token'] ?? '');
    $body = "Hello " . ($data['patient_name'] ?? 'Patient') . ",\n\n"
          . "Your appointment request (Token #" . ($data['token'] ?? '') . ") at " . ($data['hospital_name'] ?? 'the hospital') . " with " . ($data['doctor_name'] ?? 'the specialist') . " has been updated to: " . strtoupper($status) . ".\n\n";

    if ($status === 'confirmed') {
        $body .= "Your visit is confirmed for " . ($data['appointment_date'] ?? '') . " at " . ($data['slot_time'] ?? '') . ".\n"
              . "Please arrive 10 minutes before your slot and show your digital token.\n\n";
    } elseif ($status === 'rejected_by_hospital') {
        $body .= "Unfortunately, the hospital could not accommodate this booking.\n"
              . "Reason: " . ($reason ?: 'Slot unavailable / Doctor on emergency duty') . "\n\n"
              . "You can log in to your patient dashboard to choose an alternate time or specialist.\n\n";
    }

    $body .= "Regards,\nHAMS Patient Care Team";

    return send_email($patientEmail, $subject, $body);
}