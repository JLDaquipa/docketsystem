<?php date_default_timezone_set("Asia/Manila"); 
require_once('pagination.php');
require_once('config.php');
session_start();

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
<title>DOCKET SYSTEM</title>
<head>
<meta charset="utf-8">  
    </head> 
    
<meta name="viewport" content="width=device-width, initial-scale=1">
 
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="style.css">
<script type="text/javascript" src="time.js"></script>
<script type="text/javascript" src="jquery.min.js"></script>
<style>
/* Set the sidenav to full-width when the screen is less than 600 pixels wide */
@media (max-width: 500px) {
  .w3-sidenav {
      width: 100% !important;
  }
}

/* For this page only */

.wrap { text-align:center; line-height:21px; padding:20px; }

/* For pagination function. */
ul.pagination {
    text-align:center;
    color:#607d8b;
}
ul.pagination li {
    display:inline;
    padding:0 3px;
}
ul.pagination a {
    color:#607d8b;
    display:inline-block;
    padding:3px 8px;
    border:1px solid #607d8b;
    text-decoration:none;
}
ul.pagination a:hover,
ul.pagination a.current {
    background:#87CEEB;
    color:black;
}
    a{text-decoration:none;}
</style>
<body>

<nav class="w3-sidenav w3-light-grey side" style="width:16%;">
<?php

    if ($_SESSION['privilege']=="Verify"){
    echo '<script>'.'alert("Access Denied");'; 
    echo 'window.location="home.php"'.'</script>';
 }        
    if ($_SESSION['privilege']=="admin"||$_SESSION['privilege']=="StaffEncoder"){
    
        echo '<header class="w3-container w3-blue-grey headings nopadding" align="center">';
         echo '<a href="home.php" ><h4 style="font-size:1.5vw;">DOCKET SYSTEM</h4></a>';
        echo '</header>';
  
    echo '<div class="menu">';	
        echo '<a href="inquest.php"><img src="Images/inquest_investigation_icon_t.png">INQUEST</a>';
        echo '<a href="investigation.php" ><img src="Images/inquest_investigation_icon_t.png">INVESTIGATION</a>';
        echo '<a href="prosecutor.php" ><img src="Images/prosecutors_icon.png">PROSECUTOR</a>';
        echo '<a href="encoder.php" ><img src="Images/prosecutors_icon.png">ENCODER</a>';
        echo '<a href="inventory.php" ><img src="Images/statistic_icon.png">INVENTORY</a> ';
        echo '<a href="mailing.php" ><img src="Images/mail.png">MAILING</a>';
    echo '</div>';
echo '<div class="menu" align="center" style="margin-top:320px;margin-left:10%;margin-right:10%;font-size:20px;">';
echo '<label>TIME:&nbsp;</label>';    
echo '<span id="date_time"></span>'; 
echo '<script type="text/javascript">window.onload = date_time("date_time");</script>';
echo '</div>';
    }
    if ($_SESSION['privilege']=="systemadmin"){
    
        echo '<header class="w3-container w3-blue-grey headings nopadding" align="center">';
         echo '<a href="systemadmin.php" ><h4 style="font-size:1.5vw;">DOCKET SYSTEM</h4></a>';
        echo '</header>';
  
    echo '<div class="menu">';	
        echo '<a href="inquest.php" ><img src="Images/inquest_investigation_icon_t.png">INQUEST</a>';
        echo '<a href="investigation.php" ><img src="Images/inquest_investigation_icon_t.png">INVESTIGATION</a>';
        echo '<a href="prosecutor.php" ><img src="Images/prosecutors_icon.png">PROSECUTOR</a>';
        echo '<a href="encoder.php" ><img src="Images/prosecutors_icon.png">ENCODER</a>';
        echo '<a href="inventory.php" ><img src="Images/statistic_icon.png">INVENTORY</a> ';
        echo '<a href="mailing.php" ><img src="Images/mail.png">MAILING</a>';
    echo '</div>';
echo '<div class="menu" align="center" style="margin-top:320px;margin-left:10%;margin-right:10%;font-size:20px;">';
echo '<label>TIME:&nbsp;</label>';    
echo '<span id="date_time"></span>'; 
echo '<script type="text/javascript">window.onload = date_time("date_time");</script>';
echo '</div>';
    }
 if ($_SESSION['privilege']=="Encoder"){
    
        echo '<header class="w3-container w3-blue-grey headings nopadding" align="center">';
         echo '<a href="home.php" class="not-active"><h4 style="font-size:1.5vw;">DOCKET SYSTEM</h4></a>';
        echo '</header>';
  
    echo '<div class="menu">';	
        echo '<a href="inquest.php" ><img src="Images/inquest_investigation_icon_t.png">INQUEST</a>';
        echo '<a href="investigation.php"><img src="Images/inquest_investigation_icon_t.png">INVESTIGATION</a>';
        echo '<a href="prosecutor.php" class="not-active"><img src="Images/prosecutors_icon.png">PROSECUTOR</a>';
        echo '<a href="encoder.php" class="not-active"><img src="Images/prosecutors_icon.png">ENCODER</a>';
        echo '<a href="inventory.php" class="not-active"><img src="Images/statistic_icon.png">INVENTORY</a> ';
        echo '<a href="mailing.php" ><img src="Images/mail.png">MAILING</a>';
    echo '</div>';
echo '<div class="menu" align="center" style="margin-top:320px;margin-left:10%;margin-right:10%;font-size:20px;">';
echo '<label>TIME:&nbsp;</label>';    
echo '<span id="date_time"></span>'; 
echo '<script type="text/javascript">window.onload = date_time("date_time");</script> ';
echo '</div>';
    }    
?>        
  
</nav>

    <!-- Start main -->
<div id="main" style="margin-left:13%;">  
        <header class="w3-container w3-blue-grey headings" style="position:fixed;right:0;width:100%;">
            <p style="float: right">Welcome:&nbsp <?php echo $_SESSION['username']; ?>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
            <?php echo "Date: " . date("Y/m/d")." " . date("l");?> &nbsp <a href="logout.php">[LOG-OUT]</a></p>
        </header>
        <br>

    <?php
        
    if($_GET['record'] == "INQUEST" || $_GET['record'] == "INVESTIGATION"){
        $table = $_GET['record'];
        
        if($table == "INQUEST"){
            $table = "inquest_table";
        }
        if($table == "INVESTIGATION"){
            $table = "investigation_table";
        }
        
        $sql = "SELECT * FROM $table WHERE status='pending' ORDER BY datefile ASC";
    
        $result = mysqli_query($con,$sql);
        $inqpennum = mysqli_num_rows($result);
    }
    else{
        header("location: home.php");
    }
    
    ?>
    
    <div class="w3-container w3-animate-opacity w3-white w3-card" style="margin: 50px 10px 0px 50px;padding:0px; height:100%;">

        <div class="w3-container nopadding">
            <h3 class="w3-text-red w3-padding">PENDING RECORDS</h3>
        </div>
        
        <div class="w3-container w3-padding">
            
            <div class="w3-container w3-border">
                
                <p class="w3-half" style="width:94%;"><?php echo $_GET['record']; ?> RECORD</p>
                <p class="w3-half w3-red" align="center" style="width:6%;"> <?php echo $inqpennum;?> </p>
                
                
            <?php
                function isDate($value) 
					{
					if (!$value) {
						return false;
						}
				try {
					new \DateTime($value);
					return true;
					} catch (\Exception $e) {
					return false;
					}
					}
                if(mysqli_num_rows($result) != 0){
                    
                    echo "<table class='w3-hoverable w3-border mytable'>";
                            echo "<thread>";
                                echo "<tr class='w3-blue-grey'>";
                                    echo "<th>Docket Number</th>";
                                    echo "<th>Resolved By</th>";
                                    echo "<th>Date Assigned</th>";
                                    echo "<th>Age</th>";
                                    echo "<th>Status</th>";
                                echo "</tr>";
                            echo "</thread>";
                            echo "<tbody>";
                    
                    while($row=mysqli_fetch_array($result)){
                        
                                echo "<tr onclick=\"window.location='"."viewinquest.php?id={$row['id']}"."'\">";
                                    echo "<td style='width:25%;'>".$row['npsdocketnumber']."</td>";
                                    echo "<td style='width:25%;'>".$row['resolvedby']."</td>";
                                    echo "<td style='width:25%;'>".$row['dateassigned']."</td>";
                                    echo "<td style='width:25%;'>".$row['age']."</td>";
                                    echo "<td style='width:25%;'>".$row['status']."</td>";
                        
                      // CALCULATE AGE inquest_table.		
			$dateassigned = $row['dateassigned'];
			$dateresolved = $row['dateresolved'];
			$today = date('y-m-d');
			if($dateresolved!=''&&$dateassigned!=''){
				
				if(isDate($dateassigned)==true && isDate($dateresolved)==false){
				$age='0'.' year, '.'0'.' month and '.'0'.' day/s';
				$sql1 = "UPDATE $table SET age='".$age."'WHERE id='".$row['id']."'";	
				if (mysqli_query($conDB, $sql1)) {
					
				} else {
					 mysqli_error($conDB);
				}
				}else if(isDate($dateassigned)==false && isDate($dateresolved)==true){
				$age='0'.' year, '.'0'.' month and '.'0'.' day/s';
				$sql1 = "UPDATE $table SET age='".$age."'WHERE id='".$row['id']."'";	
				if (mysqli_query($conDB, $sql1)) {
					
				} else {
					 mysqli_error($conDB);
				}
				}else if(isDate($dateassigned)==false && isDate($dateresolved)==false){
				$age='0'.' year, '.'0'.' month and '.'0'.' day/s';
				$sql1 = "UPDATE $table SET age='".$age."'WHERE id='".$row['id']."'";	
				if (mysqli_query($conDB, $sql1)) {
					
				} else {
					 mysqli_error($conDB);
				}
				}else{
				$diff = date_diff(date_create($dateassigned),date_create($dateresolved));
				$age=$diff->format('%y'.' year, '.'%m'.' month and '.'%d'.' day/s');
				$sql1 = "UPDATE $table SET age='".$age."'WHERE id='".$row['id']."'";
				if (mysqli_query($conDB, $sql1)) {
					
				} else {
					 mysqli_error($conDB);
				}
				}
				
		}else if($dateresolved==''&&$dateassigned!=''){
			if(isDate($dateassigned)==true){
				$diff = date_diff(date_create($dateassigned), date_create($today));
				$age=$diff->format('%y'.' year, '.'%m'.' month and '.'%d'.' day/s');
				$sql1 = "UPDATE $table SET age='".$age."'WHERE id='".$row['id']."'";
				if (mysqli_query($conDB, $sql1)) {
					
				} else {
					 mysqli_error($conDB);
				}
				}else{
				$age='0'.' year, '.'0'.' month and '.'0'.' day/s';
				$sql1 = "UPDATE $table SET age='".$age."'WHERE id='".$row['id']."'";
				if (mysqli_query($conDB, $sql1)) {
					
				} else {
					 mysqli_error($conDB);
				}
			}			
		}else{
				$age='0'.' year, '.'0'.' month and '.'0'.' day/s';
				$sql1 = "UPDATE $table SET age='".$age."'WHERE id='".$row['id']."'";
				if (mysqli_query($conDB, $sql1)) {
					
				} else {
					 mysqli_error($conDB);
				}
			}
			//END OF AGE INQUEST
                                echo "</tr>";
                            
                    }   
                    
                            echo "</tbody>";
                    echo "</table>";
                    
                }else{
                    echo"<div class='w3-container w3-border w3-border-grey'><h6>No Pending Inquest Record</h6></div>";
                }
            
            ?>
            <br>
            </div>
            
        </div>
        
    </div>
    
    <br>

</div> <!-- End main -->
     
</body>

</html>
<script>
    $(document).ready(function() {    
    $('.status:contains("Pending")').css('color','#000');
    $('.status:contains("File in Court")').css('color','#00FF00');
    $('.status:contains("Dismissed")').css('color','#ffff00');
    
    });
</script>