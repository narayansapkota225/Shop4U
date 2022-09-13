<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Include file which makes the
    // Database Connection.
    include "config.php";

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $phno = $_POST["phno"];
    $email = $_POST["email"];
    $adds = $_POST["adds"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $pocode = $_POST["pocode"];
    $trans = $_POST["trans"];
    $lic = $_POST["lic"];
    $role = $_POST["role"];
    $pswd = $_POST["pswd"];
    $cpswd = $_POST["cpswd"];
    $suspended = 0;
    $erase = 0;
    if (($role == "Shopper")) {
        $enumRole = 1;
    } elseif (($role == "Picker")) {
        $enumRole = 2;
    }

    $sql = "SELECT * FROM user WHERE email=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) {
            $num = mysqli_num_rows($result);

            // This sql query is use to check if
            // the username is already present
            // or not in our Database
            if ($num == 0) {
                if (($pswd == $cpswd)) {

                    // Password Hashing is used here.
                    $hash = password_hash($pswd,
                        PASSWORD_DEFAULT);

                    if ($enumRole == 1) {
                        $trans = '';
                        $lic = '';
                        $sql = "INSERT INTO `user` ( `role`,`rolename`,`suspended`,`email`,
				`password`, `firstname`,`lastname`,`phone`,`address`,`city`,`state`,`postCode`,`transportation`,`license`,`erase`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                        $stmt = mysqli_stmt_init($conn);
                        echo "Post successful!";
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            header("Location: ../admin/adminuser.php?adduser=prepare");
                            exit();
                        } else {
                            mysqli_stmt_bind_param($stmt, "sssssssssssssss", $enumRole, $role, $suspended, $email, $hash, $fname, $lname, $phno, $adds, $city, $state, $pocode, $trans, $lic, $erase);
                            mysqli_stmt_execute($stmt);
                            header("Location: ../admin/adminuser.php?adduser=useradded");
                        }
                    } else if ($enumRole == 2) {
                        $sql = "INSERT INTO `user` ( `role`,`rolename`,`suspended`,`email`,
            `password`, `firstname`,`lastname`,`phone`,`address`,`city`,`state`,`postCode`,`transportation`,`license`,`erase`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            header("Location: ../admin/adminuser.php?adduser=prepare");
                            exit();
                        } else {
                            mysqli_stmt_bind_param($stmt, "sssssssssssssss", $enumRole, $role, $suspended, $email, $hash, $fname, $lname, $phno, $adds, $city, $state, $pocode, $trans, $lic, $erase);
                            mysqli_stmt_execute($stmt);
                            header("Location: ../admin/adminuser.php?adduser=useradded");
                        }
                    }
                } else {
                    header("Location: ../admin/adduser.php?adduser=pwdnotmatch");
                }

            } // end if

            if ($num > 0) {
                header("Location: ../admin/adduser.php?adduser=existingemail");
            }
        } else {
            header("Location: ../admin/adduser.php?adduser=existingemail");
        }
    }

} //end if
