<?php session_start();?>
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
        <a href="prosecutor.php" <?php if($_GET['page'] == "prosecutor"){echo "class='navactive'";}?>><img src="Images/prosecutors_icon.png" >PROSECUTOR</a>
        <a href="encoder.php" <?php if($_GET['page'] == "encoder"){echo "class='navactive'";}?> ><img src="Images/prosecutors_icon.png">ENCODER</a>
        <a href="inventory.php"><img src="Images/statistic_icon.png">INVENTORY</a>        
        <a href="mailing.php"><img src="Images/mail.png">INVENTORY</a>        
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


    
<div class="w3-container w3-white w3-card" style="margin: 0px 10px 0px 50px;">
      
        <div  align="center" style="height:100%;padding:30px;padding-left:5px;padding-right:5px;">

               
<?php

   include('config.php');
		
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $page = $_GET['page'];

        
    if($page == "prosecutor"){
        $sql = "SELECT * FROM investigation_table WHERE resolvedby='$id'";
        
        
        echo "<h3>$id</h3><br>";
        
        if($result = mysqli_query($con, $sql)){
                if(mysqli_num_rows($result) > 0){

                echo "<table id='myTable1' class='w3-border'>";
                echo "<thread>";
                echo "<tr id='tableHeader' class='w3-blue-grey'>";
                echo "<th colspan='2' style='text-align:center;'>INVESTIGATION</th>";
				
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
						echo "<tr onclick=\"window.location='"."viewprosinvestigation.php?id={$row['id']}"."'\">";
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
        
    }
        
        
        
        
        
	  
    if($page == "encoder"){
         $sql = "SELECT * FROM investigation_table WHERE encoder='$id'";
        
        echo "<h3>$id</h3><br>";
        
        if($result = mysqli_query($con, $sql)){
                if(mysqli_num_rows($result) > 0){

                echo "<table id='myTable1' class='w3-border'>";
                echo "<thread>";
                echo "<tr id='tableHeader' class='w3-blue-grey'>";
                echo "<th colspan='2' style='text-align:center;'>INVESTIGATION</th>";
				
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
						echo "<tr onclick=\"window.location='"."viewencoderinvestigation.php?id={$row['id']}"."'\">";
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
        
    }

        
 
	
}mysqli_close($con);        
?>

</div>           
</div>
    
<br>

</div> <!-- End main -->
     
</body>

</html>