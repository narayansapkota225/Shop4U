<?php

session_start();
include "config.php";

if (isset($_POST["contactus"])) {
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $usermessage = htmlspecialchars($_POST['message']);
    $phone = $_POST['phno'];

    $to_email = $email;

    $subject = 'Request Received!';
    $message = '<p>Dear '. $firstname . ',</p>';
    $message .= '<p><b>We have received your support request and one of our agent should contact you shortly.</b>';
    $message .= '<div><label><b>Request Message:</b></label><div>' . $usermessage . '</div></div>';
    $message .= '<p>If you did not make this request, please ignore this message.</p>';
    $message .= '<p>Best regards,</p><p>Shop4U Admin Team</p>';

    $headers = "From: Shop4U Admin <aqcdpr455@gmail.com>\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

    mail($to_email, $subject, $message, $headers);

    $admin_email = "narayan225@outlook.com";
    $admin_sub = "Support request | " . $firstname . " ". $lastname;
    $message1 = '<p>Dear Admin,</p>';
    $message1 .= '<p><b>You have received a new message from '. $firstname . ' ' . $lastname . '.</b>';
    $message1 .= '<p><label><b>Name: </b></label>';
    $message1 .= $firstname . " " . $lastname . '</p>';
    $message1 .= '<p><label><b>Email: </b></label>';
    $message1 .= '<a href="mailto:'. $email . '">' . $email . '</a></p>';
    $message1 .= '<p><label><b>Phone: </b></label>';
    $message1 .= '<a href="tel:'. $phone . '">' . $phone . '</a></p>';
    $message1 .= '<div><label><b>Request Message: </b></label><div>' . $usermessage . '</div></div>';
    $message1 .= '<p>Please reply to the user promply. ';
    $message1 .= 'Alternatively, you can reply to this email to contact the user.</p>';
    $message1 .= '<p>Best regards,</p><p>Shop4U Admin Team</p>';

    $headers1 = "From: Shop4U Admin <aqcdpr455@gmail.com>\r\n" . 'Reply-To: '. $email . "\r\n";
    $headers1 .= "Content-type: text/html; charset=iso-8859-1\r\n";
    mail($admin_email, $admin_sub, $message1, $headers1);

    header("Location: ../contact.php?request=success");


}
