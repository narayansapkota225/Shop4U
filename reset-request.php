<?php
if (isset($_POST["email"])) {

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "https://shop4uapps.com/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 900;

    require './db/config.php';

    $userEmail = $_POST["email"];

    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo 'There was an error!';
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to_email = $userEmail;

    $subject = 'Reset your Shop4U password!';
    $message = '<p>Dear User,</p>';
    $message .= '<p><b>We have received a password reset request for your account.</b><p>You can click on the link below or copy and paste it in your browser.</p>';
    $message .= '<p>Here is your password reset link: <br>';
    $message .= '<a href="'. $url . '">' . $url . '</a></p>';
    $message .= '<p>If you did not make this request, please ignore this message.</p>';
    $message .= '<p>Best regards,</p><p>Shop4U Admin Team</p>';

    $headers = "From: Shop4U Admin <aqcdpr455@gmail.com>\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

    mail($to_email, $subject, $message, $headers);

    header("Location: forgot-password.php?reset=success");

} else {
    header("Location: index.php");
}
?>
