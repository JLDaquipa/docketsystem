<?php date_default_timezone_set("Asia/Manila"); 
session_start();

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
    
   
}

?>
<?php date_default_timezone_set("Asia/Manila"); ?>
<!DOCTYPE html>
<html>
<title>violationinventory</title>

    
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
    
</style>
<body>

<nav class="w3-sidenav w3-light-grey side" style="width:16%;">
  
      <header class="w3-container w3-blue-grey headings">
          <a href="home.php" ><h4>DOCKET SYSTEM</h4></a>
        </header>
  
    <div class="menu">	
        <a href="inquest.php" ><img src="Images/inquest_investigation_icon_t.png">INQUEST</a> 
        <a href="investigation.php" ><img src="Images/inquest_investigation_icon_t.png">INVESTIGATION</a>
        <a href="prosecutor.php" ><img src="Images/prosecutors_icon.png">PROSECUTOR</a>
        <a href="encoder.php" ><img src="Images/prosecutors_icon.png">ENCODER</a>
        <a href="inventory.php" style="border-top: 0.1px solid #607d8b;border-bottom: 0.1px solid #607d8b;;font-weight:bold;color:#607d8b;background-color:#e6faff;box-shadow:2px 2px 8px -4px  black"><img src="Images/statistic_icon.png">INVENTORY</a>   <a href="mailing.php" ><img src="Images/mail.png">MAILING</a>     
    </div>
<div class="menu" align="center" style="margin-top:300px;margin-left:10%;margin-right:10%;font-size:20px;">
<label>TIME:&nbsp;</label>     
<span id="date_time"></span>       
    <script type="text/javascript">window.onload = date_time('date_time');</script>
</div>
</nav>

    <!-- Start main -->
<div id="main" style="margin-left:13%;">  
        <header class="w3-container w3-blue-grey headings" style="position:fixed;right:0;width:100%;">
            <p style="float: right">Welcome:&nbsp <?php echo $_SESSION['username']; ?>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
            <?php echo "Date: " . date("Y/m/d")." " . date("l");?> &nbsp <a href="logout.php">[LOG-OUT]</a></p>
        </header>
        <br>


    
<div class="w3-container w3-white w3-card" style="margin: 50px 10px 0px 50px;">
      
        <div  align="center" style="height:100%;padding:30px;padding-left:5px;padding-right:5px;">

               
<?php

   include('config.php');
		
    if(isset($_GET['record'])){
            $record = $_GET['record'];
			$year=$_GET['year'];
			$month=$_GET['month'];
			$Particulars=$_GET['Particulars'];
        
    if($record == 'INQUEST'){
        $table = "inquest_table";
        $link = "inventoryviewinquest";
    }
    if($record == 'INVESTIGATION'){
        $table = "investigation_table";
        $link = "inventoryviewinvestigation";
    }
        
        if($Particulars == "Violation of Child Protection Laws"){
            
        $sql = "SELECT a.* FROM $table a WHERE (violation LIKE '%Violation of Child Protection Laws%' AND MONTH(a.datefile) = '$month' AND YEAR(a.datefile) = '$year') OR (violation LIKE '%R.A. 7610%' AND MONTH(a.datefile) = '$month' AND YEAR(a.datefile) = '$year');";
            
        }else if($Particulars == "Violation Against Women"){
            
        $sql = "SELECT a.* FROM $table a WHERE (violation LIKE '%Violation Against Women%' AND MONTH(a.datefile) = '$month' AND YEAR(a.datefile) = '$year') OR (violation LIKE '%R.A. 9262%' AND MONTH(a.datefile) = '$month' AND YEAR(a.datefile) = '$year')";
            
        }else if($Particulars == "Rape"){
            
        $sql = "SELECT a.* FROM $table a  WHERE (violation LIKE '%Rape%' AND MONTH(a.datefile) = '$month' AND YEAR(a.datefile) = '$year') OR (violation LIKE '%R.A. 8353%' AND MONTH(a.datefile) = '$month' AND YEAR(a.datefile) = '$year')";
            
        }else if($Particulars == "Cybercrime"){
            
        $sql = "SELECT a.* FROM $table a WHERE (violation LIKE '%Cybercrime%' AND MONTH(a.datefile) = '$month' AND YEAR(a.datefile) = '$year') OR (violation LIKE '%Libel%' AND MONTH(a.datefile) = '$month' AND YEAR(a.datefile) = '$year') OR (violation LIKE '%R.A. 10175%' AND MONTH(a.datefile) = '$month' AND YEAR(a.datefile) = '$year')";
            
        }else if($Particulars == "Dangerous Drugs"){
            
        $sql = "SELECT a.* FROM $table a WHERE (violation LIKE '%Dangerous Drugs%' AND MONTH(a.datefile) = '$month' AND YEAR(a.datefile) = '$year') OR (violation LIKE '%R.A. 9165%' AND MONTH(a.datefile) = '$month' AND YEAR(a.datefile) = '$year')";
            
        }else if($Particulars == "Estafa"){
            
        $sql = "SELECT a.* FROM $table a  WHERE (violation LIKE '%Estafa%' AND MONTH(a.datefile) = '$month' AND YEAR(a.datefile) = '$year') OR (violation LIKE '%R.A. 315%' AND MONTH(a.datefile) = '$month' AND YEAR(a.datefile) = '$year') OR (violation LIKE '%swindling%' AND MONTH(a.datefile) = '$month' AND YEAR(a.datefile) = '$year')";
            
        }else if($Particulars == "Internal Revenue Code Violation"){
            
        $sql = "SELECT a.* FROM $table a  WHERE (violation LIKE '%Internal Revenue Code Violation%' AND MONTH(a.datefile) = '$month' AND YEAR(a.datefile) = '$year') OR (violation LIKE '%1997 BIR LAW%' AND MONTH(a.datefile) = '$month' AND YEAR(a.datefile) = '$year') OR (violation LIKE '%TAX COPE%' AND MONTH(a.datefile) = '$month' AND YEAR(a.datefile) = '$year')";
            
        }else if($Particulars == "Carnapping"){
            
        $sql = "SELECT a.* FROM $table a  WHERE (violation LIKE '%Carnapping%' AND MONTH(a.datefile) = '$month' AND YEAR(a.datefile) = '$year') OR (violation LIKE '%R.A. 6539%' AND MONTH(a.datefile) = '$month' AND YEAR(a.datefile) = '$year') OR (violation LIKE '%R.A. 10883%' AND MONTH(a.datefile) = '$month' AND YEAR(a.datefile) = '$year')";
            
        }else if($Particulars == "Illegal Gambling"){
            
        $sql = "SELECT a.* FROM $table a WHERE (violation LIKE '%Illegal Gambling%' AND MONTH(a.datefile) = '$month' AND YEAR(a.datefile) = '$year') OR (violation LIKE '%R.A. 9287%' AND MONTH(a.datefile) = '$month' AND YEAR(a.datefile) = '$year') OR (violation LIKE '%P.D. 1602%' AND MONTH(a.datefile) = '$month' AND YEAR(a.datefile) = '$year')";
            
        }else if($Particulars == "Illegal Logging"){
            
        $sql = "SELECT a.* FROM $table a WHERE (violation LIKE '%Illegal Logging%' AND MONTH(a.datefile) = '$month' AND YEAR(a.datefile) = '$year') OR (violation LIKE '%P.D. 705%' AND MONTH(a.datefile) = '$month' AND YEAR(a.datefile) = '$year')";
            
        }else{
            
            $sql = "SELECT * FROM $table WHERE YEAR(datefile)=$year AND MONTH(datefile)=$month AND violation LIKE '%".$Particulars."%'";
        }
        
   
	  
 
	if($result = mysqli_query($con, $sql)){
        $numresult = mysqli_num_rows($result);
                if($numresult > 0){

                echo "<table id='myTable1' class='w3-border'>";
                echo "<thread>";
                echo "<tr id='tableHeader' class='w3-blue-grey'>";
                echo "<th class='w3-padding' colspan='2'><h6>FOUND $numresult $record RECORDS</h6></th>";
				
						echo "<table id='myTable' class=' w3-striped w3-border w3-hoverable mytable'>";
						echo "<thread>";
						echo "<tr id='tableHeader' class='w3-blue-grey'>";
						echo "<th>Date File</th>";
						echo "<th>NPS Docket Number</th>";
						echo "<th>Complainant</th>";
						echo "<th>Respondent</th>";
						echo "<th>Violation</th>";
						echo "<th>Status</th>";
           
				echo "</tr>";
                echo "</thread>";
                echo "<tbody>";
                while($row = mysqli_fetch_array($result)){
						echo "<tr onclick=\"window.location='"."$link.php?id={$row['id']}"."'\">";
						echo "<td style='width:9%;'>" . $row['datefile'] . "</td>";
						echo "<td style='width:15%;'>" . $row['npsdocketnumber'] . "</td>";
						echo "<td style='width:22%;'>" . $row['complainant'] ."</td>";
						echo "<td style='width:22%;'>"  .$row['respondent'] . "</td>";
						echo "<td style='width:22%;'>"  .$row['violation'] . "</td>";
						echo "<td style='width:10%;'>"  .$row['status'] . "</td>";
						echo "</tr>";
						}
            echo"    </tbody>";
            echo"</table>";
            echo"    </tbody>";
            echo"</table>";
            
            mysqli_free_result($result);
            }else{
                    $result = "false";
                }
	}				
				
        
        if($result == "false"){
            echo"<div class='w3-container w3-border w3-border-grey'><h6>No Record Found</h6></div>";
        }
}mysqli_close($con);        
?>

</div>           
</div>
    
<br>

</div> <!-- End main -->
     
</body>

</html>