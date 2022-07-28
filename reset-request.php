<?php
if (isset($_POST["email"])) {

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "sho4udevtest.australiaeast.cloudapp.azure.com/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 900;

    require 'db/config.php';

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
        echo 'There was an error!';echo 'post successful!';
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to = $userEmail;

    $subject = 'Reset your Shop4U password!';

    $message = '<p>We have received a password reset request. The link to reset your password is. You can click the link or copy and paste it in your browser. If you did not make this request, please ignore this message.';
    $message .= '<p>Here is your password reset link: </br>';
    $message .= '<a href="'. $url . '">' . $url . '</a></p>';

    $headers = "From: Shop4U <narayan225@outlook.com>\r\n";
    $headers .= "Content-Type; text/html\r\n";

    mail($to, $subject, $message, $headers);

    header("Location: forgot-password.php?reset=success");

} else {
    header("Location: index.php");
}
?>
