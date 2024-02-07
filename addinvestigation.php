<?php date_default_timezone_set("Asia/Manila"); 
require_once('pagination.php');
session_start();

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
    
   
}
?>
<!DOCTYPE html>
<html>
<title>INVESTIGATION</title>

    
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

table{
    width: 85%; 
    table-layout: auto;
    margin-top: 10px;
    margin-bottom: 10px;
}
    
td{
    border: none;
    font-size: 15px;
    padding: 3px;
    
}
    
    input[type=text],[type=date],select{
        width: 80%;
        padding: 5px;
        height: 100%; 
        border: 1px solid #607d8b;
    }
    a{text-decoration:none;}
      
    
</style>
<body>

<nav class="w3-sidenav w3-light-grey side" style="width:16%;">
 <?php
    if ($_SESSION['privilege']=="Verify"){
        header("location: home.php");
    }
    if ($_SESSION['privilege']=="admin"||$_SESSION['privilege']=="StaffEncoder"){
    
        echo '<header class="w3-container w3-blue-grey headings">';
         echo '<a href="home.php" ><h4>DOCKET SYSTEM</h4></a>';
        echo '</header>';
  
    echo '<div class="menu">';	
        echo '<a href="inquest.php"><img src="Images/inquest_investigation_icon_t.png">INQUEST</a>';
        echo '<a href="investigation.php" style="border-top: 0.1px solid #607d8b;border-bottom: 0.1px solid #607d8b;;font-weight:bold;color:#607d8b;background-color:#e6faff;box-shadow:2px 2px 8px -4px  black"><img src="Images/inquest_investigation_icon_t.png">INVESTIGATION</a>';
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
    
        echo '<header class="w3-container w3-blue-grey headings">';
         echo '<a href="systemadmin.php" ><h4>DOCKET SYSTEM</h4></a>';
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
 if ($_SESSION['privilege']=="Encoder"){
    
        echo '<header class="w3-container w3-blue-grey headings">';
         echo '<a href="home.php" ><h4>DOCKET SYSTEM</h4></a>';
        echo '</header>';
  
    echo '<div class="menu">';	
        echo '<a href="inquest.php"><img src="Images/inquest_investigation_icon_t.png">INQUEST</a>';
        echo '<a href="investigation.php" style="border-top: 0.1px solid #607d8b;border-bottom: 0.1px solid #607d8b;;font-weight:bold;color:#607d8b;background-color:#e6faff;box-shadow:2px 2px 8px -4px  black"><img src="Images/inquest_investigation_icon_t.png">INVESTIGATION</a>';
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
        <header class="w3-container w3-blue-grey headings">
            <p style="float: right">Welcome:&nbsp <?php echo $_SESSION['username']; ?> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
            <?php echo "Date: " . date("Y/m/d")." " . date("l");?> &nbsp <a href="logout.php">[LOG-OUT]</a></p>
        </header>
        <br>

<div class="w3-container w3-white w3-card" style="margin: 0px 10px 0px 50px;padding:0px; height:100%;">
    
    <div class="w3-container w3-blue-grey w3-text-white" align="center" style="border-bottom:1px solid lightgrey">
        <a href="investigation.php" class="w3-btn w3-white w3-border w3-border-cyan w3-hover-light-grey" style="float:left;margin-top:6px;">BACK</a>
        <h4 style="font-weight:bold;">ADD INVESTIGATION</h4>
    </div>
      
   <br>
     <!-- PHP para sa table for the inquest adding-->

<?php 
require_once ('config.php');


if(isset($_POST['addinvestigation'])){

               $datefile = $_POST['datefile'];
        
        // check docketnumber duplications
        if(empty($_POST['npsdocketnumber'])){
            $npsdocketnumber = "";
        }else{

        $sql = "SELECT npsdocketnumber FROM investigation_table";

        $result = mysqli_query($con,$sql);

        while($row = mysqli_fetch_array($result)){
            if($row['npsdocketnumber'] == $_POST['npsdocketnumber']){
                    echo '<script language="javascript">';
                    echo 'alert("Docket Number Already Exist")';
                    echo '</script>';
                    $npsdocketnumber = "Error";
                    break;
                }else{
                    $npsdocketnumber = $_POST['npsdocketnumber'];
                }
             }
        }
    
         if(empty($_POST['policestation'])){
            $policestation = "";
        }else{
             $policestation = $_POST['policestation'];
        }
        if(empty($_POST['complainant'])){
            $complainant = "";
        }else{
              $complainant = $_POST['complainant'];
        }
        
         if(empty($_POST['respondent'])){
            $respondent = "";
        }else{
              $respondent = $_POST['respondent'];
        }
         if(empty($_POST['violation'])){
            $violation = "";
        }else{
             $violation = $_POST['violation'];
        }
        if(empty($_POST['resolvedby'])){
            $resolvedby = "";
        }else{
             $resolvedby = $_POST['resolvedby'];
        }
        if(empty($_POST['dateassigned'])){
            $dateassigned = "";
        }else{
             $dateassigned = $_POST['dateassigned'];
        }
        if(empty($_POST['dateresolved'])){
            $dateresolved = "";
        }else{
             $dateresolved = $_POST['dateresolved'];
        }
        if(empty($_POST['age'])){
            $age = "";
        }else{
             $age = $_POST['age'];
        }
        if(empty($_POST['substance'])){
            $substance = "";
        }else{
             $substance = $_POST['substance'];
        }
        if(empty($_POST['status'])){
            $status = "";
        }else{
             $status = $_POST['status'];
        }
        if(empty($_POST['subpoena'])){
            $subpoena = "";
        }else{
             $subpoena = $_POST['subpoena'];
        }
        if(empty($_POST['datedismissed'])){
            $datedismissed = "";
        }else{
             $datedismissed = $_POST['datedismissed'];
        }
        if(empty($_POST['drp'])){
            $drp = "";
        }else{
             $drp = $_POST['drp'];
        }
        if(empty($_POST['datefileincourt'])){
            $datefileincourt = "";
        }else{
             $datefileincourt = $_POST['datefileincourt'];
        }
        if(empty($_POST['courtbranch'])){
            $courtbranch = "";
        }else{
             $courtbranch = $_POST['courtbranch'];
        }
        if(empty($_POST['no_counts'])){
            $no_counts = "";
        }else{
             $no_counts = $_POST['no_counts'];
        }
        if(empty($_POST['criminalcaseno'])){
            $criminalcaseno = "";
        }else{
             $criminalcaseno = $_POST['criminalcaseno'];
        }
        if(empty($_POST['casetitle'])){
            $casetitle = "";
        }else{
             $casetitle = $_POST['casetitle'];
        }
        if(empty($_POST['fviolation'])){
            $fviolation = "";
        }else{
             $fviolation = $_POST['fviolation'];
        }
        if(empty($_POST['datefinalreso'])){
            $datefinalreso = "";
        }else{
             $datefinalreso = $_POST['datefinalreso'];
        }
        if(empty($_POST['finalresoremarks'])){
            $finalresoremarks = "";
        }else{
             $finalresoremarks = $_POST['finalresoremarks'];
        }
        if(empty($_POST['finalresomailingdate'])){
            $finalresomailingdate = "";
        }else{
             $finalresomailingdate = $_POST['finalresomailingdate'];
        }
        if(empty($_POST['handlingprosecutors'])){
            $handlingprosecutors = "";
        }else{
             $handlingprosecutors = $_POST['handlingprosecutors'];
        }
        if(empty($_POST['penalty'])){
            $penalty = "";
        }else{
             $penalty = $_POST['penalty'];
        }
        if(empty($_POST['datecomission'])){
            $datecomission = "";
        }else{
             $datecomission = $_POST['datecomission'];
        }
        if(empty($_POST['encoder'])){
            $encoder = "";
        }else{
             $encoder = $_POST['encoder'];
        }
             if(empty($_POST['datefiled'])){
            $datefiled = "";
        }else{
             $datefiled = $_POST['datefiled'];
        }
        if(empty($_POST['filedby'])){
            $filedby = "";
        }else{
             $filedby = $_POST['filedby'];
        }
        if(empty($_POST['daterecieved'])){
            $daterecieved = "";
        }else{
             $daterecieved = $_POST['daterecieved'];
        }
        if(empty($_POST['denied_granted'])){
            $denied_granted = "";
        }else{
             $denied_granted = $_POST['denied_granted'];
        }
        if(empty($_POST['mrdateresolved'])){
            $mrdateresolved = "";
        }else{
             $mrdateresolved = $_POST['mrdateresolved'];
        }
        if(empty($_POST['mrstatus'])){
            $mrstatus = "";
        }else{
             $mrstatus = $_POST['mrstatus'];
        }
        if(empty($_POST['assigned'])){
            $assigned = "";
        }else{
             $assigned = $_POST['assigned'];
        }
        if(empty($_POST['filing'])){
            $filing = "";
        }else{
             $filing = $_POST['filing'];
        }
        
         
    
        if($npsdocketnumber != "Error"){
        $sql = "INSERT INTO investigation_table (datefile, npsdocketnumber, policestation, complainant, respondent, violation, resolvedby, dateassigned, dateresolved, age, substance, status, subpoena, datedismissed, drp, datefileincourt, courtbranch, no_counts, criminalcaseno, casetitle, fviolation, datefinalreso, finalresoremarks, finalresomailingdate, handlingprosecutors, penalty, datecomission, encoder, datefiled, filedby, daterecieved, denied_granted, mrdateresolved, mrstatus, assigned, filing)
        
        VALUES ('$datefile', '$npsdocketnumber', '', '$complainant', '$respondent', '$violation', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')";
            
              if(mysqli_query($con, $sql)){
                
                     echo '<script language="javascript">';
                                    echo 'alert("Record For Investigation Successfully Added")';
                                     echo '</script>';
                
              } else
              {
                  echo '<script language="javascript">';
                    echo 'alert("Adding Record Unsuccessful")';
                    echo '</script>';   
                  echo "Error ." .$sql . "<br>" . 
                      mysqli_error($con);
              }
           
    
        }
        }
    
    mysqli_close($con);
?>




    <div >   
                
                <form action="addinvestigation.php" method="POST">
                <table align="center">  
                <tr>                                                                
                    <td><label>Date File</label></td>
                    <td><input type="date" name="datefile" class="form-control" value=""></td>
                    <td><label>NPS Docket Number</label></td>
                    <td><input type="text" name="npsdocketnumber" class="form-control" value=""></td>
                </tr>
                <tr>           
                    <td><label>Complainant</label></td>
                    <td><input type="text" name="complainant" class="form-control" value=""></td>
                    <td><label>Respondent</label></td>
                    <td><input type="text" name="respondent" class="form-control" value=""></td>
				</tr>
                <tr>
                        <td><label>Violation</label></td>
                        <td><input type="text" name="violation" class="form-control" value=""></td>
			            <td>Police Station: </td>
                        <td><select type="text" name="policestation" class="form-control">
				        <option value=""></option>
				        
                            
			            <?php

                       include ('config.php');

                       $sql = "SELECT ps_name FROM police_station";

                      if($selectresult = mysqli_query($con, $sql)){
                        
                        while($row = mysqli_fetch_array($selectresult)){
                            echo "<option value = '" .$row['ps_name']."'>" .$row['ps_name']."</option>";
                        }

                        } else
                            {
                                echo "Error ." .$sql . "<br>" . 
                                mysqli_error($con);
                            }
                        
                    ?>
			</select>
			</td>
                     <tr>
                    <td><label>Resolved By:</label></td>
                    <td><input type="text" name="resolvedby" class="form-control" value=""></td>
                    <td><label>Date Assigned:</label></td>
                    <td><input type="text" name="dateassigned" class="form-control" value=""></td>
                    </tr>
                
                </table>
                    <br>
                <div class=btn>
                   
                        <div class="w3-padding" align="right">
                        <input class="w3-btn w3-light-blue w3-border w3-border-blue w3-hover-cyan" align="left" type="submit" name="addinvestigation" value="ADD INVESTIGATION" onclick="message">
                        </div>
                    
                </div>
                </form>
       
                </div>
	
    </body>
    </html> 

