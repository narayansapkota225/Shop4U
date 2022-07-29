<?php session_start(); /* Starts the session */
        
        /* Check Login form submitted */        
        if(isset($_POST['Submit'])){
                /* Define username and associated password array */
                $logins = array('21232f297a57a5a743894a0e4a801fc3' => '0192023a7bbd73250516f069df18b500');
                
                /* Check and assign submitted Username and Password to new variable */
                $Username = isset($_POST['Username']) ? md5($_POST['Username']) : '';
                $Password = isset($_POST['Password']) ? md5($_POST['Password']) : '';
                
                /* Check Username and Password existence in defined array */            
                if (isset($logins[$Username]) && $logins[$Username] == $Password){
                        /* Success: Set session variables and redirect to Protected page  */
                        $_SESSION['UserData']['Username']=$logins[$Username];
                        header("location:../admin/");
                        exit;
                } else {
                        /*Unsuccessful attempt: Set error message */
                        header("location:../admin/adminlogin.php?error=Incorect User name or password");
                }
        }
?>
