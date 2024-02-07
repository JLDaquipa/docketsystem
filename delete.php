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
    
    $location = $_GET['loc'];
    
    // Adding Accounts
    
    if(isset($_POST['confirmdelete'])){
        
            $id = $_POST['id'];
        
            if($location == "account"){
                $sql = "DELETE FROM users WHERE id = $id";
            }
            if($location == "pros"){
                $sql = "DELETE FROM prostecutors_table WHERE pros_id = $id";
            }
            if($location == "encoder"){
                $sql = "DELETE FROM encoder_table WHERE en_id = $id";
            }
            

            if(mysqli_query($con,$sql)){
                echo '<script>';
                echo 'alert("Delete Successful")';
                echo '</script>';
                
                if($location == "account"){
                    header('Location: systemadmin.php');
                }
                if($location == "pros"){
                    header('Location: systemadminprosecutor.php');
                }
                if($location == "encoder"){
                    header('Location: systemadminencoder.php');
                }
                
            }else{
                echo '<script>';
                echo 'alert("Something Went Wrong. Please Try Again Later")';
                echo '</script>';
                
                if($location == "account"){
                    header('Location: systemadmin.php');
                }
                if($location == "pros"){
                    header('Location: systemadminprosecutor.php');
                }
                if($location == "encoder"){
                    header('Location: systemadminencoder.php');
                }
            }
        
    }
    
    if(isset($_POST['canceldelete'])){
        
        if($location == "account"){
            header('Location: systemadmin.php');
        }
        if($location == "pros"){
            header('Location: systemadminprosecutor.php');
        }
        if($location == "encoder"){
            header('Location: systemadminencoder.php');
        }
    }
    
   mysqli_close($con) 
?>    
    

<div class="w3-container">  
    
    <div class="w3-card-4 w3-animate-zoom" align="center" style="width:400px;margin:auto;margin-top:100px;">
        <div class="w3-container w3-padding" style="width:100%;">
        <p>Are you sure you wat to delete on the list?</p>
        </div>
        
        <div class="w3-container w3-padding">
            <form action="delete.php?id=<?php echo $_GET['id'];?>&loc=<?php echo $_GET['loc']?>" method="post">
                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                <input type="submit" class="w3-btn w3-green w3-border w3-border-green" name="confirmdelete" value="Yes">
                <input type="submit" class="w3-btn w3-white w3-border" name="canceldelete" value="No">
            </form>
        </div>
        
    </div>
     
</div>

     
</body>

</html>