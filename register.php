<?php
// Include config file
require_once 'config.php';

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_u = $password_u = $confirm_password_u = "";
$privilege = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_u = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_u = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

    }

    // Validate password
    if(empty(trim($_POST['password']))){
        $password_u = "Please enter a password.";
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_u = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_u = 'Please confirm password.';
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_u = 'Password did not match.';
        }
    }

    // Check input errors before inserting in database
    if(empty($username_u) && empty($password_u) && empty($confirm_password_u)){
        $privilege = $_POST['privilege'];
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password,privilege) VALUES (?, ?, ?)";

        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_privilege);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_privilege = $privilege;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
       // mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../CSS/mycss.css">
    <style type="text/css">
       div{
		background-color: #ffffff;
	   }
	   input[type=submit],[type=reset]
	   {
    width: 30%;
    background-color: #00a3cc;
    color: white;
    padding: 10px;
    margin: 8px ;
    border: none;
    border-radius: 4px;

}
	body{
		margin-top: -25px;
		margin-bottom: 50px;
	}
		
    </style>
</head>
<body>
    <div class="dis">
		<center>
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div <?php echo (!empty($username_u)) ? 'has-error' : ''; ?>>
                <label>Username:<sup>*</sup></label><br>
                <input type="text" name="username" value="<?php echo $username; ?>">
                <span style="color: red"><?php echo $username_u; ?></span>
            </div>

            <div <?php echo (!empty($username_u)) ? 'has-error' : ''; ?>>
                <label>Position:<sup>*</sup></label><br>
                <select name="privilege">
                    <?php
                    include ('config.php');

                    $sql = "SELECT position,privilege FROM position_table";

                    if($result = mysqli_query($con, $sql)){
                        
                        while($row = mysqli_fetch_array($result)){
                            echo "<option value = '" .$row['privilege']."'>" .$row['position']."</option>";
                        }

                        } else
                            {
                                echo "Error ." .$sql . "<br>" . 
                                mysqli_error($con);
                            }
                    ?>
                </select>
            </div>

            <div <?php echo (!empty($password_u)) ? 'has-error' : ''; ?>>
                <label>Password:<sup>*</sup></label><br>
                <input type="password" name="password" value="<?php echo $password; ?>">
                <span style="color: red"><?php echo $password_u; ?></span>
            </div>

            <div <?php echo (!empty($confirm_password_u)) ? 'has-error' : ''; ?>>
                <label>Confirm Password:<sup>*</sup></label><br>
                <input type="password" name="confirm_password"  value="<?php echo $confirm_password; ?>">
                <span style="color: red"><?php echo $confirm_password_u; ?></span>
            </div>

            <div>
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
			<br>
            <p>Already have an account? <a href="../users/login.php">Login here</a>.</p>
			</center>
        </form>
    </div>
</body>
</html>
