<?php

if (isset($_POST["reset-password-submit"])) {

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $uPassword = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];

    if (empty($uPassword) || empty($passwordRepeat)) {
        header("Location: create-new-password.php?newpwd=empty&selector=".$selector."&validator=".$validator);
        exit();
    } else if ($uPassword != $passwordRepeat) {
        header("Location: create-new-password.php?newpwd=pwdnotsame&selector=".$selector."&validator=".$validator);
        exit();
    }

    $currentDate = date("U");
    
    require './db/config.php';

    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {    
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) {
            echo "You need to resubmit your reset request.";
            exit();
        } else {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

            if ($tokenCheck === false) {
                echo "You will need to resubmit your reset request.";
                exit();
            } elseif ($tokenCheck === true) {
                $tokenEmail = $row['pwdResetEmail'];

                $sql = "SELECT * FROM user WHERE email=?;";
                $stmt = mysqli_stmt_init($conn);
                
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "There was an error!";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if (!$row = mysqli_fetch_assoc($result)) {
                        echo "There was an error!";
                        exit();
                    } else {
                        $sql = "UPDATE user SET password=? WHERE email=?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "There was an error!";
                            exit();
                        } else {
                            $nHash = password_hash($uPassword,PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, 'ss', $nHash, $tokenEmail);
                            mysqli_stmt_execute($stmt);
                            

                            $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
                            $stmt = mysqli_stmt_init($conn);

                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "There was an error!";
                                exit();
                            } else {
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("Location: login.php?newpwd=passwordupdated");
                            }
                        }
                    }
                }
            }
        }
    }
}