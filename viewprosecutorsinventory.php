<?php date_default_timezone_set("Asia/Manila"); 
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
    
   
}

?>
<?php
    /*Just for your server-side code*/
    header('Content-Type: text/html; charset=ISO-8859-1');
?>
<!DOCTYPE html>
<html>
<title>PROSECUTOR</title>
<head>
<meta charset="utf-8">  
    </head>
        
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="style.css">
<script type="text/javascript" src="time.js"></script>    
<style>
/* Set the sidenav to full-width when the screen is less than 600 pixels wide */
@media (max-width: 500px) {
  .w3-sidenav {
      width: 100% !important;
  }   
}
    table {
        text-align: center;
    }
    a{text-decoration:none;}
</style>
<body>

<nav class="w3-sidenav w3-light-grey side" style="width:16%;">
  
      <header class="w3-container w3-blue-grey headings">
          <a href="home.php" ><h4>DOCKET SYSTEM</h4></a>
        </header>
  
    <div class="menu">	
        <a href="inquest.php" ><img src="Images/inquest_investigation_icon_t.png">INQUEST</a> 
        <a href="investigation.php" ><img src="Images/inquest_investigation_icon_t.png">INVESTIGATION</a>
        <a href="prosecutor.php" style="border-top: 0.1px solid #607d8b;border-bottom: 0.1px solid #607d8b;;font-weight:bold;color:#607d8b;background-color:#e6faff;box-shadow:2px 2px 8px -4px  black"><img src="Images/prosecutors_icon.png">PROSECUTOR</a>
        <a href="encoder.php" ><img src="Images/prosecutors_icon.png">ENCODER</a>
        <a href="inventory.php" ><img src="Images/statistic_icon.png">INVENTORY</a>        
        <a href="mailing.php" ><img src="Images/mailing.png">MAILING</a>        
    </div>
<div class="menu" align="center" style="margin-top:300px;margin-left:10%;margin-right:10%;font-size:20px;">
<label>TIME:&nbsp;</label>     
<span id="date_time"></span>       
    <script type="text/javascript">window.onload = date_time('date_time');</script>
</div>
</nav>

    <!-- Start main -->
<div id="main" style="margin-left:13%;">  
        <header class="w3-container w3-blue-grey headings">
            <p style="float: right">Welcome:&nbsp <?php echo $_SESSION['username']; ?> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
            <?php echo "Date: " . date("Y/m/d")." " . date("l");?> &nbsp <a href="logout.php">[LOG-OUT]</a></p>
        </header>
        <br>

        <div class="w3-padding" align="center" style="width:50%;margin-left:20%;">
        <input id="myInput" onkeyup="searchTable()" class="w3-input w3-border w3-round" style="width:100%;" type="text" placeholder="Filter......">
        </div>
    
<div class="w3-container w3-white w3-card" style="margin: 0px 10px 0px 50px;">
    
<?php
    
require_once 'config.php';
if(isset($_GET['id'])){
		$id = $_GET['id'];	
}
 $sql = "SELECT * FROM inquest_table Where resolvedby='$id'";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){


echo "<table id='myTable1' class='w3-half'>";
echo "<thread>";
echo "<tr id='tableHeader' class='w3-blue-grey'>";
echo "<th>INQUEST</th>";
    echo "<tr class='w3-blue-grey'>";
        echo "<th>VIOLATION</th>";
        echo "<th>STATUS</th>";
    echo "</tr>";
echo "</tr>";
echo "</thread>";
echo "<tbody>";
while($row = mysqli_fetch_array($result)){
echo "<tr>";
        echo "<td>"  .$row['violation'] . "</td>";
        echo "<td>"  .$row['status'] . "</td>";
       
        echo "</tr>";
}
echo"    </tbody>";
echo"</table>";
echo"    </tbody>";
echo"</table>";
    
 mysqli_free_result($result);
}
}
    else {
    echo "Error $sql. " .mysqli_error($con);
}

$sql = "SELECT * FROM investigation_table Where resolvedby='$id'";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){


echo "<table id='myTable' class='w3-half'>";
echo "<thread>";
echo "<tr id='tableHeader' class='w3-blue-grey'>";
echo "<th>INVESTIGATION</th>";
    echo "<tr class='w3-blue-grey'>";
        echo "<th>VIOLATION</th>";
        echo "<th>STATUS</th>";
    echo "</tr>";
echo "</tr>";
echo "</thread>";
echo "<tbody>";
while($row = mysqli_fetch_array($result)){
echo "<tr>";
        
        echo "<td>" .$row['violation'] . "</td>";
        echo "<td>" .$row['status'] . "</td>";
        echo "</tr>";
}
echo"    </tbody>";
echo"</table>";
echo"    </tbody>";
echo"</table>";
 mysqli_free_result($result);
} 
}else {
    echo "Error $sql. " .mysqli_error($con);
}


mysqli_close($con);
?>    
 </div>
    
<br>

</div> <!-- End main -->

</body>

</html>   
    


