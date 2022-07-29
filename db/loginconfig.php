<?php 
session_start(); 

require_once "config.php";

if (isset($_POST['uname']) && isset($_POST['passwd'])) {
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['passwd']);

    if (empty($uname)) {
        header("Location: ../login.php?error=Email is required");
        exit();

    }else if(empty($pass)){
        header("Location: ../login.php?error=Password is required");
        exit();

    }else{
        $sql = "SELECT * FROM user WHERE email='$uname'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($pass, $row['password'])) {
                echo "Logged in!";

                $_SESSION['email'] = $row['email'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['suspended'] = $row['suspended'];

                if ($_SESSION['suspended'] == 1){
                header("Location: ../login.php? error=Account is Restricted Please Contact Administrator");
                }else if ($_SESSION['role'] == 1 ) {
                header("Location: ../shopper/");
                }
                else if ($_SESSION['role'] == 2) {
                    header("Location: ../picker/");
                }
                exit();

            }else{
                header("Location: ../login.php? error=Incorect Email or password");
                exit();
            }

        }else{
            header("Location: ../login.php? error=Incorect Email or password");
            exit();
        }
    }

}else{

    header("Location: ../login.php");
    exit();
}
?>