<!DOCTYPE html>
<html>
<title>Docket System LOG IN</title>

    
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="style.css">
<style>
/* Set the sidenav to full-width when the screen is less than 600 pixels wide */
@media (max-width: 500px) {
  .w3-sidenav {
      width: 100% !important;
  }
}
</style>

    
<?php 
 
require_once 'config.php';
    
    $username = $password = "";
    $username_u = $password_u = "";
    $privilege = "";
    
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty(trim($_POST["username"]))){
            $username_u = 'Please enter username.';
            
        }else{
            $username = trim($_POST["username"]);
            
        }
        if(empty(trim($_POST['password']))){
            $password_u = 'Please Enter Password.';
        }else{
            $password = trim($_POST['password']);
        }
           if(empty($username_u) && empty($password_u)){
            $sql = "SELECT username, password, privilege FROM users WHERE username = ?";
            
            if($stmt = mysqli_prepare($con, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            
               
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        mysqli_stmt_bind_result($stmt, $username, $hashed_password, $privilege);
                        if(mysqli_stmt_fetch($stmt)){
                           if(password_verify($password, $hashed_password)){
                           
                            
                                session_start();
                                
                                $_SESSION['username'] = $username;
                                $_SESSION['privilege'] = $privilege;
                                
                                if($_SESSION['privilege'] == 'Encoder'){
                                    header("location: inquest.php");
                                }
                                if($_SESSION['privilege'] == 'Verify'){
                                    header("location: home.php");
                                }
                                if($_SESSION['privilege'] == 'admin'){
                                    header("location: home.php");
                                }
                                if($_SESSION['privilege'] == 'StaffEncoder'){
                                    header("location: home.php");
                                }
                                if($_SESSION['privilege'] == 'systemadmin'){
                                    header("location: systemadmin.php");
                                }
                            
                                 } else{
                            // Display an error message if password is not valid
                            $password_u = 'The password you entered was not valid.';
                        }
                    
                        
                    }
                         } else{
                 
                    $username_err = 'No account found with that username.';
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
       mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($con);
}
    
?>
    

<body class="loginbody">

    
    
    
    <div class="w3-container login">
        <div class="w3-half ds">
            <center>
            <img src="Images/DocketSystem_Logo.png">
            </center>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div <?php echo (!empty($username_u)) ? 'has-error' : ''; ?>>
                 
        <div class="w3-half loginform">
            
            <input class="w3-input w3-round username" type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
            <?php echo $username_u; ?>
            
            <div <?php echo (!empty($password_u)) ? 'has-error' : ''; ?>>
            <input class="w3-input w3-round password" type="password" name="password" placeholder="Password">
            <?php echo $password_u; ?>
            
            
            <input class="w3-input w3-round submit" type="submit" value="LOG IN"></a>
        </form>
        </div>
    </div>
      
</body>

</html> 
