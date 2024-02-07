<?php date_default_timezone_set("Asia/Manila"); 
require_once('pagination.php');
session_start();

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
    
   
}?>
<?php
    /*Just for your server-side code*/
    header('Content-Type: text/html; charset=ISO-8859-1');
?>
<!DOCTYPE html>
<html>
<title>INVESTIGATION</title>
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
/* For this page only */

.wrap { text-align:center; line-height:21px; padding:20px; }

/* For pagination function. */
ul.pagination {
    text-align:center;
    color:#829994;
}
ul.pagination li {
    display:inline;
    padding:0 3px;
}
ul.pagination a {
    color:#0d7963;
    display:inline-block;
    padding:5px 10px;
    border:1px solid #cde0dc;
    text-decoration:none;
}
ul.pagination a:hover,
ul.pagination a.current {
    background:#0d7963;
    color:#fff;
}
    
table{
    width: 100%; 
    table-layout: auto;
    margin-top: 10px;
    border: 1px solid lightgrey;
}
    
td{
    border: none;
    padding: 10px;
    font-size: 15px;
}
    tr{
        border:none;
    }
    a{text-decoration:none;}
    
</style>
<body>

<nav class="w3-sidenav w3-light-grey side" style="width:16%;">
  
<?php
    
    if ($_SESSION['privilege']=="admin"||$_SESSION['privilege']=="StaffEncoder"||$_SESSION['privilege']=="systemadmin"){
    
        echo '<header class="w3-container w3-blue-grey headings">';
         echo '<a href="home.php" ><h4>DOCKET SYSTEM</h4></a>';
        echo '</header>';
  
    echo '<div class="menu">';	
        echo '<a href="inquest.php"><img src="Images/inquest_investigation_icon_t.png">INQUEST</a>';
        echo '<a href="investigation.php" ><img src="Images/inquest_investigation_icon_t.png">INVESTIGATION</a>';
        echo '<a href="prosecutor.php" ><img src="Images/prosecutors_icon.png">PROSECUTOR</a>';
        echo '<a href="encoder.php" style="border-top: 0.1px solid #607d8b;border-bottom: 0.1px solid #607d8b;;font-weight:bold;color:#607d8b;background-color:#e6faff;box-shadow:2px 2px 8px -4px  black"><img src="Images/prosecutors_icon.png">ENCODER</a>';
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
    
        echo '<header class="w3-container w3-blue-grey headings">';
         echo '<a href="home.php" class="not-active"><h4>DOCKET SYSTEM</h4></a>';
        echo '</header>';
  
    echo '<div class="menu">';	
        echo '<a href="inquest.php" ><img src="Images/inquest_investigation_icon_t.png">INQUEST</a>';
        echo '<a href="investigation.php" ><img src="Images/inquest_investigation_icon_t.png">INVESTIGATION</a>';
        echo '<a href="prosecutor.php" class="not-active"><img src="Images/prosecutors_icon.png">PROSECUTOR</a>';
        echo '<a href="encoder.php" class="not-active" style="border-top: 0.1px solid #607d8b;border-bottom: 0.1px solid #607d8b;;font-weight:bold;color:#607d8b;background-color:#e6faff;box-shadow:2px 2px 8px -4px  black"><img src="Images/prosecutors_icon.png">ENCODER</a>';
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
        <header class="w3-container w3-blue-grey headings">
            <p style="float: right">Welcome:&nbsp <?php echo $_SESSION['username']; ?> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
            <?php echo "Date: " . date("Y/m/d")." " . date("l");?> &nbsp <a href="logout.php">[LOG-OUT]</a></p>
        </header>
        <br>

<div class="w3-container w3-white w3-card w3-padding" style="margin: 0px 10px 0px 50px; height:100%;">
    

<?php
require_once 'config.php';
    if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = "SELECT * from investigation_table where id='$id'";
		$row = mysqli_query($con,$sql);
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_array($result);
}
}
}  
?>
    
    <div class="w3-container nopadding center" style="width:100%;">
        
   <div class="w3-container w3-blue-grey">
               <center><h5>DETAILS</h5></center>
    </div>
        
    <div class="w3-half ">
    <table class="center w3-striped">
    <tbody>
    <tr>
        <td>Date Filed: </td>
        <td><?php echo $row["datefile"]?></td>
    </tr>
    <tr>
        <td>Docket Number: </td>
        <td><?php echo $row["npsdocketnumber"]?></td>
    </tr>
    <tr>
        <td>Police Station: </td>
        <td><?php echo $row["policestation"]?></td>
    </tr>
    <tr>
        <td>Complainant: </td>
        <td><?php echo $row["complainant"]?></td>
    </tr>
    <tr>
        <td>Respondent: </td>
        <td><?php echo $row["respondent"]?></td>
    </tr>
    <tr>
        <td>Violation: </td>
        <td><?php echo $row["violation"]?></td>
    </tr>
    
    <tr>
        <td>Resolved By: </td>
        <td><?php echo $row["resolvedby"]?></td>
    </tr>
    <tr>
        <td>Date Assigned: </td>
        <td><?php echo $row["dateassigned"]?></td>
    </tr>
     <tr>
        <td>Date Resolved: </td>
        <td><?php echo $row["dateresolved"]?></td>
    </tr>
    <tr>
        <td>Age: </td>
        <td><?php echo $row["age"]?></td>
    </tr>
    <tr>
        <td>Subpoena: </td>
        <td><?php echo $row["subpoena"]?></td>
    </tr>
    <tr>
        <td>Date Final Reso: </td>
        <td><?php echo $row["datefinalreso"]?></td>
    </tr>
    <tr>
        <td>Final Reso Remarks: </td>
        <td><?php echo $row["finalresoremarks"]?></td>
    </tr>
    <tr>
        <td>Final Reso Mailing date: </td>
        <td><?php echo $row["finalresomailingdate"]?></td>
    </tr>
    
    
    
    
    </tbody>
    </table>
    </div>
    
    <div class="w3-half">
    <table class="center w3-striped">
    <tbody>
    <tr>
        <td>Substance.QTY/VOL: </td>
        <td><?php echo $row["substance"]?></td>
    </tr>
    <tr>
        <td>Status: </td>
        <td><?php echo $row["status"]?></td>
    </tr>
    <tr>
        <td>Date Dismissed: </td>
        <td><?php echo $row["datedismissed"]?></td>
    </tr>
    <tr>
        <td>Drop: </td>
        <td><?php echo $row["drp"]?></td>
    </tr>
    <tr>
        <td>Date File In Court: </td>
        <td><?php echo $row["datefileincourt"]?></td>
    </tr>
    <tr>
        <td>Court Branch: </td>
        <td><?php echo $row["courtbranch"]?></td>
    </tr>
    <tr>
        <td>No. Of Counts: </td>
        <td><?php echo $row["no_counts"]?></td>
    </tr>
    <tr>
        <td>Criminal Case #: </td>
        <td><?php echo $row["criminalcaseno"]?></td>
    </tr>
    <tr>
        <td>Case Title: </td>
        <td><?php echo $row["casetitle"]?></td>
    </tr>
    <tr>
        <td>Final Violation: </td>
        <td><?php echo $row["fviolation"]?></td>
    </tr>
    <tr>
        <td>Handling Prosecutor: </td>
        <td><?php echo $row["handlingprosecutors"]?></td>
    </tr>
    <tr>
        <td>Penalty: </td>
        <td><?php echo $row["penalty"]?></td>
    </tr>
    <tr>
        <td>Date Comission: </td>
        <td><?php echo $row["datecomission"]?></td>
    </tr>
    <tr>
        <td>Encoder:</td>
        <td><?php echo $row["encoder"]?></td>
    </tr>
    
    </tbody>
    </table>
    </div>
    </div>
    <br>
    
    <div class="w3-container nopadding center" style="width:100%;">
        
    <div class="w3-container w3-grey">
              <h5>MOTION FOR RECONSIDERATION</h5>
    </div>
        
    <div class="w3-half ">
    <table class="center w3-striped">
    <tbody>
    <tr>
        <td>Date Filed: </td>
        <td><?php echo $row["datefiled"]?></td>
    </tr>
    <tr>
        <td>Filed By: </td>
        <td><?php echo $row["filedby"]?></td>
    </tr>
    <tr>
        <td>Date Received: </td>
        <td><?php echo $row["daterecieved"]?></td>
    </tr>
    <tr>
        <td>Denied Granted: </td>
        <td><?php echo $row["denied_granted"]?></td>
    </tr>
    
    </tbody>
    </table>
    </div>
    
    <div class="w3-half">
    <table class="center w3-striped">
    <tbody>
    <tr>
        <td>Date Resolved: </td>
        <td><?php echo $row["mrdateresolved"]?></td>
    </tr>
    <tr>
        <td>Status: </td>
        <td><?php echo $row["mrstatus"]?></td>
    </tr>
    <tr>
        <td>Assigned: </td>
        <td><?php echo $row["assigned"]?></td>
    </tr>
    <tr>
        <td>Filing: </td>
        <td><?php echo $row["filing"]?></td>
    </tr>
    
    </tbody>
    </table>
    </div>
    </div>
    <br>
    </div>

    </div>
    
    </body>
</html>