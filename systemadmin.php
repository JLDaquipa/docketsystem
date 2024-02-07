<?php
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
    
   
}?>
<!DOCTYPE html>
<html>
<title>INQUEST</title>

    
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="style.css">
<script type="text/javascript" src="time.js"></script>    
    
<body>
    
<?php
    
    include ('config.php');
    
    // Adding Accounts
    
    if(isset($_POST['addaccount'])){
        
        //check first for username duplications
        
        $sql = "SELECT username FROM users";
        
        $result = mysqli_query($con,$sql);
        
        while($row = mysqli_fetch_array($result)){
            if($row['username'] == $_POST['username']){
                echo '<script language="javascript">';
                echo 'alert("Account Already Exist")';
                echo '</script>';
                $username = "Error";
                break;
            }else{
                // if no duplications
                $username = $_POST['username'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $position = $_POST['position'];
                
            }
        }
        
        if($username != "Error"){
            
            $sql = "INSERT INTO users (username,password,privilege) VALUES ('$username','$password','$position')";
                
                if(mysqli_query($con, $sql)){
                
                     echo '<script language="javascript">';
                                    echo 'alert("Account Successfully Added")';
                                     echo '</script>';
                
                  }
                else
                    {
                        echo '<script language="javascript">';
                        echo 'alert("Adding Account Unsuccessful")';
                        echo '</script>';   
                        mysqli_error($con);
                    }
        }
        
    }
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $sql = "DELETE FROM users WHERE id = $id";
        
        if(mysqli_query($con,$sql)){
            echo '<script>';
            echo 'alert("Delete Successful")';
            echo '</script>';
        }else{
            echo '<script>';
            echo 'alert("Something Went Wrong. Please Try Again Later")';
            echo '</script>';
        }
    }
    
   mysqli_close($con) 
?>    
    
    

    <!-- Start main -->
<div id="main">  
        <header class="w3-container w3-blue-grey adminheading">
            <a href="home.php" class="w3-half" ><h4>DOCKET SYSTEM</h4></a>
            <p class="w3-half" align="right">Welcome:&nbsp System Admin &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
            <?php echo "Date: " . date("Y/m/d")." " . date("l");?> &nbsp <a href="logout.php">[LOG-OUT]</a></p>
        </header>
        <br>

        <div class="w3-container w3-white w3-card" style="margin:auto;padding:0px; height:100%;width:80%;">

            <ul class="w3-navbar w3-blue-grey">
                 <?php    
                if ($_SESSION['privilege']!="systemadmin"){
                    header("location: login.php");
                    
                }
                ?>
              <li><a href="#" class="w3-white">Accounts</a></li>
              <li><a href="systemadminprosecutor.php">Prosecutors</a></li>
              <li><a href="systemadminencoder.php">Encoders</a></li>
            </ul>

            <div id="accounts" class="w3-container w3-animate-opacity w3-padding tab">

              <div class="w3-half w3-padding" style="width:30%;" align="center">

                <div class="w3-padding w3-border w3-light-grey">
                    
                    <form action="systemadmin.php" method="post">

                        <input type="text" name="username" class="w3-input w3-border" placeholder="Username" required>
                        <br>
                        <input type="text" name="password" class="w3-input w3-border" placeholder="Password" required>
                        <br>
                        <select type="text" name="position" class="w3-input w3-border">
                            <?php

                                 include ('config.php');

                                   $sql = "SELECT pos_id,position FROM position_table";

                                  if($selectresult = mysqli_query($con, $sql)){

                                    while($row = mysqli_fetch_array($selectresult)){
                                        echo "<option value = '" .$row['position']."'>" .$row['position']."</option>";
                                    }

                                    } else
                                        {
                                            echo "Error ." .$sql . "<br>" . 
                                            mysqli_error($con);
                                        }

                            ?>
                        </select>
                        <br>
                        
                        <div id='confirmmodal' class="w3-modal">
                            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="width:400px;">
                                
                                <div class="w3-container w3-padding">
                                <p>Confirm Adding Account To The List?</p>
                                </div>
                                <div class="w3-container w3-padding">
                                <input class="w3-btn w3-green w3-border w3-border-green" type="submit" name="addaccount" onclick="document.getElementById('confirmmodal').style.display='none'" value="Confirm" class="w3-btn-block w3-white w3-hover-light-blue w3-border w3-round">
                                <button class="w3-btn w3-white w3-border" onclick="document.getElementById('confirmmodal').style.display='none'" 
                                class="w3-closebtn">Cancel</button>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                    
                    <button onclick="document.getElementById('confirmmodal').style.display='block'" class="w3-btn-block w3-white w3-hover-light-blue w3-border w3-round">Add Account</button>
                    
                </div>

              </div>

              <div class="w3-half" style="width:70%;height:100%;">

                  <div class="w3-container w3-cyan w3-text-white">
                    <p>ACCOUNTS</p>
                  </div>    

                  <div class="w3-container w3-responsive nopadding w3-border" style="height:400px;" >
                  <?php
                    include ('config.php');

                    $sql = "SELECT * FROM users";

                    $res = mysqli_query($con, $sql);


                    echo "<table id='myTable' align='center'>";
                        echo "<tbody>";

                       if(mysqli_num_rows($res) != 0){
                            while($row=mysqli_fetch_array($res))
                        {
                                echo "<tr>";
                                echo "<td style='width:60%;'>" . $row['username'] . "</td>";
                                echo "<td style='width:40%;'>" . $row['privilege'] . "</td>";
                                echo "<td><a href='delete.php?id={$row['id']}&loc=account' class='w3-btn w3-tiny w3-white w3-hover-red'>x</a></td>";
                                echo "</tr>";
                        }
                        echo"    </tbody>";
                        echo"</table>";
                        echo"    </tbody>";
                        echo"</table>";

                    } else {
                        echo "No records are found.";
                    }
                     ?>
                  </div>

              </div>

            </div>

        </div>    
</div>

     
</body>

</html>