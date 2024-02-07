<?php date_default_timezone_set("Asia/Manila");
session_start();
require_once('config.php');

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
<title>RESULT</title>
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
}#myTable a {
display:block;
cursor:pointer;    
}
  a{text-decoration:none;}  
</style>
<body>

<nav class="w3-sidenav w3-light-grey side" style="width:16%;">
<?php
    
    if ($_SESSION['privilege']=="admin"||$_SESSION['privilege']=="StaffEncoder"){
    
        echo '<header class="w3-container w3-blue-grey headings">';
         echo '<a href="home.php" ><h4>DOCKET SYSTEM</h4></a>';
        echo '</header>';
  
    echo '<div class="menu">';	
        echo '<a href="inquest.php"><img src="Images/inquest_investigation_icon_t.png">INQUEST</a>';
        echo '<a href="investigation.php" ><img src="Images/inquest_investigation_icon_t.png">INVESTIGATION</a>';
        echo '<a href="prosecutor.php" ><img src="Images/prosecutors_icon.png">PROSECUTOR</a>';
        echo '<a href="encoder.php" ><img src="Images/prosecutors_icon.png">ENCODER</a>';
        echo '<a href="inventory.php" ><img src="Images/statistic_icon.png">INVENTORY</a> ';
        echo '<a href="mailing.php" ><img src="Images/mail.png">MAILING</a> ';
        
    echo '</div>';
echo '<div class="menu" align="center" style="margin-top:320px;margin-left:10%;margin-right:10%;font-size:20px;">';
echo '<label>TIME:&nbsp;</label>';    
echo '<span id="date_time"></span>'; 
echo '<script type="text/javascript">window.onload = date_time("date_time");</script>';
echo '</div>';
    }
 if ($_SESSION['privilege']=="Verify"){
    
        echo '<header class="w3-container w3-blue-grey headings">';
         echo '<a href="home.php" ><h4>DOCKET SYSTEM</h4></a>';
        echo '</header>';
  
    echo '<div class="menu">';	
        echo '<a href="inquest.php" class="not-active"><img src="Images/inquest_investigation_icon_t.png">INQUEST</a>';
        echo '<a href="investigation.php" class="not-active"><img src="Images/inquest_investigation_icon_t.png">INVESTIGATION</a>';
        echo '<a href="prosecutor.php" class="not-active"><img src="Images/prosecutors_icon.png">PROSECUTOR</a>';
        echo '<a href="encoder.php" class="not-active"><img src="Images/prosecutors_icon.png">ENCODER</a>';
        echo '<a href="inventory.php" class="not-active"><img src="Images/statistic_icon.png">INVENTORY</a> ';
        echo '<a href="mailing.php" ><img src="Images/mail.png">MAILING</a> ';
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
	ini_set('display_errors', 1);
	error_reporting(~0);

	$strKeyword = null;

	if(isset($_POST["txtKeyword"]))
	{
		$strKeyword = $_POST["txtKeyword"];
        $strCategory = $_POST["category"];
        header("location: result.php?strKeyword=$strKeyword&strCategory=$strCategory");
	}
    
    
    if(isset($_GET['strKeyword'])){
		$strKeyword = $_GET['strKeyword'];
        $strCategory = $_GET['strCategory'];
        
	  $sql = "SELECT * FROM inquest_table WHERE $strCategory LIKE '%".$strKeyword."%' ORDER BY `datefile` DESC";
        
      $sql1 = "SELECT * FROM investigation_table WHERE $strCategory LIKE '%".$strKeyword."%' ORDER BY `datefile` DESC";

        
   $query1 = mysqli_query($con,$sql);		
   $query2 = mysqli_query($con,$sql1); 
    
    }
    
    
?>  
        
 
<div class="w3-container w3-white w3-card nopadding" style="margin: 50px 10px 0px 50px;">
    
    <div class="w3-container nopadding" style="width:100%;">
        
            <div>
                
             <div align="center" class="w3-half " style="padding-right:10px;width:18%;border-right:0.5px solid lightgrey;">
                <p>
                 <?php
                 
                 $numresult=mysqli_num_rows($query1);
                 $numresult1=mysqli_num_rows($query2);
                 
                 
                 
                 if($numresult != 0 || $numresult1 !=0){
                     $totalresult=$numresult+$numresult1;
                     
                     echo "Found $totalresult records";
                     
                 }else{
                     echo "No record found";
                 }
                 
                 ?>
                 </p>
            </div>
                
                
            <form  name="frmSearch" method="post" action="home.php">
                
			<div class="w3-half w3-padding" style="width:12%;">
			<input class="w3-input w3-white w3-hover-light-blue w3-round" style="border:1px solid #607d8b;" type="submit" value="Search Again!">
            </div>
			
			</form>
            
            
            </div>
    </div>
    
	<table id='myTable' class='w3-striped w3-border w3-hoverable mytable'>
    <thread>
    <tr id='tableHeader' class='w3-blue-grey'>
    <th>Date File</th>
    <th>NPS Docket Number</th>
    <th>Complainant</th>
    <th>Respondent</th>
    <th>Violation</th>
    <th>Status</th>
    </tr>
    </thread>
    <tbody>      
        
        
<?php

   $serverName = "localhost";
   $userName = "root";
   $userPassword = "";
   $dbName = "docketsystem";

   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		
    if(isset($_GET['strKeyword'])){
		$strKeyword = $_GET['strKeyword'];
        $strCategory = $_GET['strCategory'];
        
	  $sql = "SELECT * FROM inquest_table WHERE $strCategory LIKE '%".$strKeyword."%' ORDER BY `datefile` DESC";
        
      $sql1 = "SELECT * FROM investigation_table WHERE $strCategory LIKE '%".$strKeyword."%' ORDER BY `datefile` DESC";

        
   $query1 = mysqli_query($conn,$sql);		
   $query2 = mysqli_query($conn,$sql1); 
    
       if(mysqli_num_rows($query1) == 0 && mysqli_num_rows($query2) == 0){
        echo"<tr>";
        echo"<td>No Record Found</td>";
        echo"<td>No Record Found</td>";
        echo"<td>No Record Found</td>";
        echo"<td>No Record Found</td>";
        echo"<td>No Record Found</td>";
        echo"<td>No Record Found</td>";   
        echo"</tr>";   
    } 
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
    if(mysqli_num_rows($query1) != 0){
			
	
	while($row=mysqli_fetch_array($query1))
    {
        echo "<tr onclick=\"window.location='"."adminviewinquest.php?id={$row['id']}"."'\">";
        echo "<td>" . $row['datefile'] . "</td>";
        echo "<td>" . $row['npsdocketnumber'] . "</td>";
        echo "<td>" . $row['complainant'] ."</td>";
        echo "<td>"  .$row['respondent'] . "</td>";
        echo "<td>"  .$row['violation'] . "</td>";
        echo "<td>"  .$row['status'] . "</td>";
		// CALCULATE AGE inquest_table.		
			$dateassigned = $row['dateassigned'];
			$dateresolved = $row['dateresolved'];
			$today = date('y-m-d');
			if($dateresolved!=''&&$dateassigned!=''){
				
				if(isDate($dateassigned)==true && isDate($dateresolved)==false){
				$age='0'.' year, '.'0'.' month and '.'0'.' day/s';
				$sql1 = "UPDATE inquest_table SET age='".$age."'WHERE id='".$row['id']."'";	
				if (mysqli_query($conn, $sql1)) {
					
				} else {
					 mysqli_error($conn);
				}
				}else if(isDate($dateassigned)==false && isDate($dateresolved)==true){
				$age='0'.' year, '.'0'.' month and '.'0'.' day/s';
				$sql1 = "UPDATE inquest_table SET age='".$age."'WHERE id='".$row['id']."'";	
				if (mysqli_query($conn, $sql1)) {
					
				} else {
					 mysqli_error($conn);
				}
				}else if(isDate($dateassigned)==false && isDate($dateresolved)==false){
				$age='0'.' year, '.'0'.' month and '.'0'.' day/s';
				$sql1 = "UPDATE inquest_table SET age='".$age."'WHERE id='".$row['id']."'";	
				if (mysqli_query($conn, $sql1)) {
					
				} else {
					 mysqli_error($conn);
				}
				}else{
				$diff = date_diff(date_create($dateassigned),date_create($dateresolved));
				$age=$diff->format('%y'.' year, '.'%m'.' month and '.'%d'.' day/s');
				$sql1 = "UPDATE inquest_table SET age='".$age."'WHERE id='".$row['id']."'";
				if (mysqli_query($conn, $sql1)) {
					
				} else {
					 mysqli_error($conn);
				}
				}
				
		}else if($dateresolved==''&&$dateassigned!=''){
			if(isDate($dateassigned)==true){
				$diff = date_diff(date_create($dateassigned), date_create($today));
				$age=$diff->format('%y'.' year, '.'%m'.' month and '.'%d'.' day/s');
				$sql1 = "UPDATE inquest_table SET age='".$age."'WHERE id='".$row['id']."'";
				if (mysqli_query($conn, $sql1)) {
					
				} else {
					 mysqli_error($conn);
				}
				}else{
				$age='0'.' year, '.'0'.' month and '.'0'.' day/s';
				$sql1 = "UPDATE inquest_table SET age='".$age."'WHERE id='".$row['id']."'";
				if (mysqli_query($conn, $sql1)) {
					
				} else {
					 mysqli_error($conn);
				}
			}			
		}else{
				$age='0'.' year, '.'0'.' month and '.'0'.' day/s';
				$sql1 = "UPDATE inquest_table SET age='".$age."'WHERE id='".$row['id']."'";
				if (mysqli_query($conn, $sql1)) {
					
				} else {
					 mysqli_error($conn);
				}
			}
        echo "</tr>";
    }
    }
        
    if(mysqli_num_rows($query2) != 0){
        while($row=mysqli_fetch_array($query2))
    {
        echo "<tr onclick=\"window.location='"."adminviewinvestigation.php?id={$row['id']}"."'\">";
        echo "<td style='width:9%;'>" . $row['datefile'] . "</td>";
        echo "<td style='width:15%;'>" . $row['npsdocketnumber'] . "</td>";
        echo "<td style='width:22%;'>" . $row['complainant'] ."</td>";
        echo "<td style='width:22%;'>"  .$row['respondent'] . "</td>";
        echo "<td style='width:22%;'>"  .$row['violation'] . "</td>";
        echo "<td style='width:10%;'>"  .$row['status'] . "</td>";
		// CALCULATE AGE investigation_table.
			$dateassigned = $row['dateassigned'];
			$dateresolved = $row['dateresolved'];
			$today = date('y-m-d');
			if($dateresolved!=''&&$dateassigned!=''){
				
				if(isDate($dateassigned)==true && isDate($dateresolved)==false){
				$age='0'.' year, '.'0'.' month and '.'0'.' day/s';
				$sql1 = "UPDATE investigation_table SET age='".$age."'WHERE id='".$row['id']."'";	
				if (mysqli_query($conn, $sql1)) {
					
				} else {
					 mysqli_error($conn);
				}
				}else if(isDate($dateassigned)==false && isDate($dateresolved)==true){
				$age='0'.' year, '.'0'.' month and '.'0'.' day/s';
				$sql1 = "UPDATE investigation_table SET age='".$age."'WHERE id='".$row['id']."'";	
				if (mysqli_query($conn, $sql1)) {
					
				} else {
					 mysqli_error($conn);
				}
				}else if(isDate($dateassigned)==false && isDate($dateresolved)==false){
				$age='0'.' year, '.'0'.' month and '.'0'.' day/s';
				$sql1 = "UPDATE investigation_table SET age='".$age."'WHERE id='".$row['id']."'";	
				if (mysqli_query($conn, $sql1)) {
					
				} else {
					 mysqli_error($conn);
				}
				}else{
				$diff = date_diff(date_create($dateassigned),date_create($dateresolved));
				$age=$diff->format('%y'.' year, '.'%m'.' month and '.'%d'.' day/s');
				$sql1 = "UPDATE investigation_table SET age='".$age."'WHERE id='".$row['id']."'";
				if (mysqli_query($conn, $sql1)) {
					
				} else {
					 mysqli_error($conn);
				}
				}
				
		}else if($dateresolved==''&&$dateassigned!=''){
			if(isDate($dateassigned)==true){
				$diff = date_diff(date_create($dateassigned), date_create($today));
				$age=$diff->format('%y'.' year, '.'%m'.' month and '.'%d'.' day/s');
				$sql1 = "UPDATE inquest_table SET age='".$age."'WHERE id='".$row['id']."'";
				if (mysqli_query($conn, $sql1)) {
					
				} else {
					 mysqli_error($conn);
				}
				}else{
				$age='0'.' year, '.'0'.' month and '.'0'.' day/s';
				$sql1 = "UPDATE investigation_table SET age='".$age."'WHERE id='".$row['id']."'";
				if (mysqli_query($conn, $sql1)) {
					
				} else {
					 mysqli_error($conn);
				}
			}			
		}else{
				$age='0'.' year, '.'0'.' month and '.'0'.' day/s';
				$sql1 = "UPDATE investigation_table SET age='".$age."'WHERE id='".$row['id']."'";
				if (mysqli_query($conn, $sql1)) {
					
				} else {
					 mysqli_error($conn);
				}
			}
        echo "</tr>";
    }
    }
            
}        
?>
</table>
<?php
mysqli_close($conn);
?>
</div>
    
<br>

</div> <!-- End main -->
     
</body>

</html>