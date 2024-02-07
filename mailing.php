<?php date_default_timezone_set("Asia/Manila"); 
require_once('pagination.php');
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
        echo '<a href="inquest.php"style="border-top: 0.1px solid #607d8b;border-bottom: 0.1px solid #607d8b;;font-weight:bold;color:#607d8b;background-color:#e6faff;box-shadow:2px 2px 8px -4px  black"><img src="Images/inquest_investigation_icon_t.png">INQUEST</a>';
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
    if ($_SESSION['privilege']=="systemadmin"){
    
        echo '<header class="w3-container w3-blue-grey headings nopadding" align="center">';
         echo '<a href="systemadmin.php" ><h4 style="font-size:1.5vw;">DOCKET SYSTEM</h4></a>';
        echo '</header>';
  
    echo '<div class="menu">';	
        echo '<a href="inquest.php" style="border-top: 0.1px solid #607d8b;border-bottom: 0.1px solid #607d8b;;font-weight:bold;color:#607d8b;background-color:#e6faff;box-shadow:2px 2px 8px -4px  black"><img src="Images/inquest_investigation_icon_t.png">INQUEST</a>';
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
 if ($_SESSION['privilege']=="Encoder"){
    
        echo '<header class="w3-container w3-blue-grey headings nopadding" align="center">';
         echo '<a href="home.php" class="not-active"><h4 style="font-size:1.5vw;">DOCKET SYSTEM</h4></a>';
        echo '</header>';
  
    echo '<div class="menu">';	
        echo '<a href="inquest.php" style="border-top: 0.1px solid #607d8b;border-bottom: 0.1px solid #607d8b;;font-weight:bold;color:#607d8b;background-color:#e6faff;box-shadow:2px 2px 8px -4px  black"><img src="Images/inquest_investigation_icon_t.png">INQUEST</a>';
        echo '<a href="investigation.php"><img src="Images/inquest_investigation_icon_t.png">INVESTIGATION</a>';
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

<div class="w3-container w3-animate-opacity w3-white w3-card" style="margin: 50px 10px 0px 50px;padding:0px; height:100%;">
    
                 <!-- PHP para sa table for the inquest pagination-->
        <?php
    
        $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
        if ($page <= 0) $page = 1;

        $per_page = 30; // Set how many records do you want to display per page.

        $startpoint = ($page * $per_page) - $per_page;

        
    
    if(isset($_POST["searchbtn"])){
        $sort = "ASC";
        $strKeyword = $_POST["myInput"];
        
         $statement = "inquest_table WHERE npsdocketnumber LIKE '%".$strKeyword."%' or complainant LIKE '%".$strKeyword."%' or respondent LIKE '%".$strKeyword."%' or violation LIKE '%".$strKeyword."%' or status LIKE '%".$strKeyword."%' or criminalcaseno LIKE '%".$strKeyword."%' ORDER BY `id` DESC";
        
    }else{
        $sort = "ASC";
        $statement = "`inquest_table` ORDER BY `id` DESC"; // Change `records` according to your table name.
    }
    
    if(isset($_GET["sort"])){
        
        $sort = $_GET["sort"];
        
        $statement = "`inquest_table` ORDER BY `id` $sort";
        
        if($sort == "ASC"){
            $sort = "DESC";
        }else{
            $sort = "ASC";
        }
        
    }
    
    
    ?>
    
    <div class="w3-container nopadding" style="width:100%;">
        
            <div>
             <div align="center" class="w3-half w3-padding" style="padding-right:10px;width:18%;border-right:0.5px solid lightgrey;">
                <a href="addinquest.php" class="w3-input w3-text-blue-grey  w3-round w3-hover-light-blue " style="width:100%;text-decoration:none;border:1px solid #607d8b;box-shadow:1px 1px 8px -2px black;"><center> ADD INQUEST</center></a>
            </div>
                
                
            <form action="inquest.php" method="post">    
            <div class="w3-half w3-padding" align="center" style="width:70%;">
                
                <div>
                    <input name="myInput" class="w3-input  w3-round" style="width:100%;border:1px solid #607d8b;" type="text" placeholder="Search">
                </div>
            </div>
                
                <div class="w3-half w3-padding" style="width:12%;">
                        <input class="w3-input w3-white w3-hover-light-blue w3-round" style="border:1px solid #607d8b;" type="submit" name="searchbtn" value="Search">
                    </form>
                </div>
            
            </div>    

<?php
        $results = mysqli_query($conDB,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");
        
            echo "<table id='myTable' class=' w3-striped w3-border w3-hoverable mytable'>";
            echo "<thread>";
            echo "<tr id='tableHeader' class='w3-blue-grey'>";
            echo "<th><a href = 'inquest.php?sort=$sort'>Date File</a></th>";
            echo "<th>NPS Docket Number</th>";
            echo "<th>Complainant</th>";
            echo "<th>Respondent</th>";
            echo "<th>Violation</th>";
            echo "<th>Status</th>";
            echo "</tr>";
            echo "</thread>";
            echo "<tbody>";
        if (mysqli_num_rows($results) != 0) {
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
            // displaying records.
            while ($row = mysqli_fetch_array($results)) {
                    echo "<tr onclick=\"window.location='"."viewinquest.php?id={$row['id']}"."'\">";
                    echo "<td style='width:9%;'>" . $row['datefile'] . "</td>";
                    echo "<td style='width:15%;'>" . $row['npsdocketnumber'] . "</td>";
                    echo "<td style='width:22%;'>" . $row['complainant'] ."</td>";
                    echo "<td style='width:22%;'>"  .$row['respondent'] . "</td>";
                    echo "<td style='width:22%;'>"  .$row['violation'] . "</td>";
                    echo "<td style='width:10%;'>"  .$row['status'] . "</td>";
					// CALCULATE AGE inquest_table.		
			$dateassigned = $row['dateassigned'];
			$dateresolved = $row['dateresolved'];
			$today = date('y-m-d');
			if($dateresolved!=''&&$dateassigned!=''){
				
				if(isDate($dateassigned)==true && isDate($dateresolved)==false){
				$age='0'.' year, '.'0'.' month and '.'0'.' day/s';
				$sql1 = "UPDATE inquest_table SET age='".$age."'WHERE id='".$row['id']."'";	
				if (mysqli_query($conDB, $sql1)) {
					
				} else {
					 mysqli_error($conDB);
				}
				}else if(isDate($dateassigned)==false && isDate($dateresolved)==true){
				$age='0'.' year, '.'0'.' month and '.'0'.' day/s';
				$sql1 = "UPDATE inquest_table SET age='".$age."'WHERE id='".$row['id']."'";	
				if (mysqli_query($conDB, $sql1)) {
					
				} else {
					 mysqli_error($conDB);
				}
				}else if(isDate($dateassigned)==false && isDate($dateresolved)==false){
				$age='0'.' year, '.'0'.' month and '.'0'.' day/s';
				$sql1 = "UPDATE inquest_table SET age='".$age."'WHERE id='".$row['id']."'";	
				if (mysqli_query($conDB, $sql1)) {
					
				} else {
					 mysqli_error($conDB);
				}
				}else{
				$diff = date_diff(date_create($dateassigned),date_create($dateresolved));
				$age=$diff->format('%y'.' year, '.'%m'.' month and '.'%d'.' day/s');
				$sql1 = "UPDATE inquest_table SET age='".$age."'WHERE id='".$row['id']."'";
				if (mysqli_query($conDB, $sql1)) {
					
				} else {
					 mysqli_error($conDB);
				}
				}
				
		}else if($dateresolved==''&&$dateassigned!=''){
			if(isDate($dateassigned)==true){
				$diff = date_diff(date_create($dateassigned), date_create($today));
				$age=$diff->format('%y'.' year, '.'%m'.' month and '.'%d'.' day/s');
				$sql1 = "UPDATE inquest_table SET age='".$age."'WHERE id='".$row['id']."'";
				if (mysqli_query($conDB, $sql1)) {
					
				} else {
					 mysqli_error($conDB);
				}
				}else{
				$age='0'.' year, '.'0'.' month and '.'0'.' day/s';
				$sql1 = "UPDATE inquest_table SET age='".$age."'WHERE id='".$row['id']."'";
				if (mysqli_query($conDB, $sql1)) {
					
				} else {
					 mysqli_error($conDB);
				}
			}			
		}else{
				$age='0'.' year, '.'0'.' month and '.'0'.' day/s';
				$sql1 = "UPDATE inquest_table SET age='".$age."'WHERE id='".$row['id']."'";
				if (mysqli_query($conDB, $sql1)) {
					
				} else {
					 mysqli_error($conDB);
				}
			}
			//END OF AGE INQUEST
                    echo "</tr>";
            }
            

        } else {
             echo "<tr><td>No records found.</td><td>No records found.</td><td>No records found.</td><td>No records found.</td><td>No records found.</td><td>No records found.</td><tr>";
        }
        
        echo"    </tbody>";
            echo"</table>";
            echo"    </tbody>";
            echo"</table>";

         // displaying paginaiton.
        echo pagination($statement,$per_page,$page,$url='?');
        
        mysqli_free_result($results);
        ?>
        
    </div>
    
      <?php
                $results = mysqli_query($conDB,"SELECT * FROM inquest_table WHERE status = 'pending'");
        
        $pendingnum=mysqli_num_rows($results);
            
        if ($pendingnum != 0) {

            echo "<a href='pending.php?record=INQUEST'><div class='pendingbtn'><p class='w3-btn w3-xlarge w3-red'>$pendingnum &nbsp&nbsp&nbspPending</p></div></a>";

        } 
        
    
            ?>
        
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