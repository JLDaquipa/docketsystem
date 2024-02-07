<?php date_default_timezone_set("Asia/Manila"); 
session_start();

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
    
 
}

?>
<!DOCTYPE html>
<html>
<title>INQUEST</title>

    
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
    width: 95%; 
    table-layout: auto;
    margin-top: 10px;
    margin-bottom: 10px;
}
    
td{
    border: none;
    font-size: 15px;
    padding: 5px;
    
}
    
    input[type=text],[type=date],select{
        width: 60%;
        padding: 5px;
        height: 100%;
        border: 1px solid #607d8b;
    }
    a{text-decoration:none;}
    
    
</style>
<body>

<nav class="w3-sidenav w3-light-grey side" style="width:16%;">
  
      <header class="w3-container w3-blue-grey headings">
          <a href="home.php" ><h4>DOCKET SYSTEM</h4></a>
        </header>
  
    <div class="menu">	
        <a href="inquest.php" style="border-bottom: 0.1px solid #607d8b;;font-weight:bold;color:#607d8b;background-color:#e6faff;box-shadow:2px 2px 8px -4px  black"><img src="Images/inquest_investigation_icon_t.png">INQUEST</a> 
        <a href="investigation.php" ><img src="Images/inquest_investigation_icon_t.png">INVESTIGATION</a>
        <a href="prosecutor.php" ><img src="Images/prosecutors_icon.png">PROSECUTOR</a>
        <a href="encoder.php" ><img src="Images/prosecutors_icon.png">ENCODER</a>
        <a href="inventory.php" ><img src="Images/statistic_icon.png">INVENTORY</a> 
        <a href="mailing.php" ><img src="Images/mail.png">MAILING</a> 
        
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

<div class="w3-container w3-white w3-card" style="margin: 0px 10px 0px 50px;padding:0px; height:100%;">
<?php
         if ($_SESSION['privilege']=="Encoder"){
    echo '<script>'.'alert("Access Denied");'; 
    echo 'window.location="inquest.php"'.'</script>';
 }
    if ($_SESSION['privilege']=="Verify"){
    echo '<script>'.'alert("Access Denied");'; 
    echo 'window.location="home.php"'.'</script>';
 }    
    
	require_once 'config.php';

	if(isset($_POST['cancel'])){
        $id = $_GET['id'];
		header("location: viewinquest.php?id=$id");
	}

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = "SELECT * from inquest_table where id='$id'";
		$row = mysqli_query($con,$sql);

		$result = mysqli_fetch_array($row);		
	}
	if(isset($_POST['updt'])){
		$id = $_POST['id'];
		if(empty($_POST['newdatefile'])){
            $datefile = "";
        }else{
             $datefile = $_POST['newdatefile'];
        }
		if(empty($_POST['newdocketnumber'])){
            $docketnumber = "";
        }else{
             $docketnumber = $_POST['newdocketnumber'];
        }
         if(empty($_POST['newpolicestation'])){
            $policestation = "";
        }else{
             $policestation = $_POST['newpolicestation'];
        }
        if(empty($_POST['newcomplainant'])){
            $complainant = "";
        }else{
              $complainant = $_POST['newcomplainant'];
        }
        
         if(empty($_POST['newrespondent'])){
            $respondent = "";
        }else{
              $respondent = $_POST['newrespondent'];
        }
         if(empty($_POST['newviolation'])){
            $violation = "";
        }else{
             $violation = $_POST['newviolation'];
        }
        if(empty($_POST['newresolvedby'])){
            $resolvedby = "";
        }else{
             $resolvedby = $_POST['newresolvedby'];
        }
        if(empty($_POST['newdateassigned'])){
            $dateassigned = "";
        }else{
             $dateassigned = $_POST['newdateassigned'];
        }
        if(empty($_POST['newdateresolved'])){
            $dateresolved = "";
        }else{
             $dateresolved = $_POST['newdateresolved'];
        }
        if(empty($_POST['newage'])){
            $age = "";
        }else{
             $age = $_POST['newage'];
        }
         if(empty($_POST['newsubstance'])){
            $substance = "";
        }else{
             $substance = $_POST['newsubstance'];
        }
        if(empty($_POST['newstatus'])){
            $status = "";
        }else{
             $status = $_POST['newstatus'];
        }
        if(empty($_POST['newsubpoena'])){
            $subpoena = "";
        }else{
             $subpoena = $_POST['newsubpoena'];
        }
        if(empty($_POST['newdatedismissed'])){
            $datedismissed = "";
        }else{
             $datedismissed = $_POST['newdatedismissed'];
        }
        if(empty($_POST['newdrp'])){
            $drp = "";
        }else{
             $drp = $_POST['newdrp'];
        }
        if(empty($_POST['newdatefileincourt'])){
            $datefileincourt = "";
        }else{
             $datefileincourt = $_POST['newdatefileincourt'];
        }
        if(empty($_POST['newcourtbranch'])){
            $courtbranch = "";
        }else{
             $courtbranch = $_POST['newcourtbranch'];
        }
        if(empty($_POST['newno_counts'])){
            $no_counts = "";
        }else{
             $no_counts = $_POST['newno_counts'];
        }
        if(empty($_POST['newcriminalcaseno'])){
            $criminalcaseno = "";
        }else{
             $criminalcaseno = $_POST['newcriminalcaseno'];
        }
        if(empty($_POST['newcasetitle'])){
            $casetitle = "";
        }else{
             $casetitle = $_POST['newcasetitle'];
        }
        if(empty($_POST['newfviolation'])){
            $fviolation = "";
        }else{
             $fviolation = $_POST['newfviolation'];
        }
        if(empty($_POST['newdatefinalreso'])){
            $datefinalreso = "";
        }else{
             $datefinalreso = $_POST['newdatefinalreso'];
        }
        if(empty($_POST['newfinalresoremarks'])){
            $finalresoremarks = "";
        }else{
             $finalresoremarks = $_POST['newfinalresoremarks'];
        }
        if(empty($_POST['newfinalresomailingdate'])){
            $finalresomailingdate = "";
        }else{
             $finalresomailingdate = $_POST['newfinalresomailingdate'];
        }
        if(empty($_POST['newhandlingprosecutors'])){
            $handlingprosecutors = "";
        }else{
             $handlingprosecutors = $_POST['newhandlingprosecutors'];
        }
        if(empty($_POST['newpenalty'])){
            $penalty = "";
        }else{
             $penalty = $_POST['newpenalty'];
        }
        if(empty($_POST['newdatecomission'])){
            $datecomission = "";
        }else{
             $datecomission = $_POST['newdatecomission'];
        }
        if(empty($_POST['newencoder'])){
            $encoder = "";
        }else{
             $encoder = $_POST['newencoder'];
        }
        if(empty($_POST['newdatefiled'])){
            $newdatefiled = "";
        }else{
             $newdatefiled = $_POST['newdatefiled'];
        }
        if(empty($_POST['newfiledby'])){
            $filedby = "";
        }else{
             $filedby = $_POST['newfiledby'];
        }
        if(empty($_POST['newdaterecieved'])){
            $daterecieved = "";
        }else{
             $daterecieved = $_POST['newdaterecieved'];
        }
        if(empty($_POST['newdenied_granted'])){
            $denied_granted = "";
        }else{
             $denied_granted = $_POST['newdenied_granted'];
        }
        if(empty($_POST['newmrdateresolved'])){
            $mrdateresolved = "";
        }else{
             $mrdateresolved = $_POST['newmrdateresolved'];
        }
        if(empty($_POST['newmrstatus'])){
            $mrstatus = "";
        }else{
             $mrstatus = $_POST['newmrstatus'];
        }
        if(empty($_POST['newassigned'])){
            $assigned = "";
        }else{
             $assigned = $_POST['newassigned'];
        }
        if(empty($_POST['newfiling'])){
            $filing = "";
        }else{
             $filing = $_POST['newfiling'];
        }
    

		$upd = "UPDATE inquest_table set datefile='$datefile',npsdocketnumber='$docketnumber',policestation='$policestation',complainant='$complainant',respondent='$respondent',violation='$violation',resolvedby='$resolvedby',dateassigned='$dateassigned',dateresolved='$dateresolved',age='$age',substance='$substance',status='$status',subpoena='$subpoena',datedismissed='$datedismissed',drp='$drp',datefileincourt='$datefileincourt',courtbranch='$courtbranch',no_counts='$no_counts',criminalcaseno='$criminalcaseno',casetitle='$casetitle',fviolation='$fviolation',datefinalreso='$datefinalreso',finalresoremarks='$finalresoremarks',finalresomailingdate='$finalresomailingdate',handlingprosecutors='$handlingprosecutors',penalty='$penalty',datecomission='$datecomission',encoder='$encoder',datefiled='$datefiled',filedby='$filedby',daterecieved='$daterecieved',denied_granted='$denied_granted',mrdateresolved='$mrdateresolved',mrstatus='$mrstatus',assigned='$assigned',filing='$filing' WHERE id='$id'";
        
		if($rest = mysqli_query($con,$upd)){
			header("location: viewinquest.php?id=$id");
			}else{
                                echo "Error ." .$upd . "<br>" . 
                                mysqli_error($con);
                            }
	   
	}
?>
    
		<form action="editinquest.php?id=<?php echo $id; ?>" method="post">
            
            <div class="w3-container w3-blue-grey w3-text-white" align="center">
            <h4 style="font-weight:bold;">EDIT</h4> 
            </div>
			
			<table align="center">
            <input type="hidden" name="id" value="<?php echo $result[0]; ?>">
                
			<tr>
			<td>Date Filed: </td><td><input type="date" name="newdatefile" value="<?php echo $result[1];?>"></td>
            <td>Substance. QTY/VOL: </td><td><input type="text" name="newsubstance" value="<?php echo $result[11];?>"></td>
            </tr>
            
			<tr>
			<td>NPS Docket Number: </td><td><input type="text" name="newdocketnumber" value="<?php echo $result[2];?>"></td>
            <td>Status: </td><td><input type="text" name="newstatus" value="<?php echo $result[12];?>"></td>
            </tr>
			
            <tr>
			<td>Policestation: </td><td><input type="text" name="newpolicestation" value="<?php echo $result[3];?>"></td>
            <td>Date Dismissed: </td><td><input type="date" name="newdatedismissed" value="<?php echo $result[14];?>"></td>
            </tr>
                
			<tr>
			<td>Complainant: </td><td><input type="text" name="newcomplainant" value="<?php echo $result[4];?>"></td>
            <td>Drop: </td><td><input type="text" name="newdrp" value="<?php echo $result[15];?>"></td>
            </tr>
                
            <tr>
			<td>Respondent: </td><td><input type="text" name="newrespondent" value="<?php echo $result[5];?>"></td>
            <td>Date File in Court: </td><td><input type="date" name="newdatefileincourt" value="<?php echo $result[16];?>"></td>
            </tr>
                
			<tr>
			<td>Violation: </td><td><input type="text" name="newviolation" value="<?php echo $result[6];?>"></td>
            <td>Court Branch: </td><td><input type="text" name="newcourtbranch" value="<?php echo $result[17];?>"></td>
            </tr>
                
			<tr>
			<td>Resolve By: </td>
			<td><select type="text" name="newresolvedby" value="<?php echo $result[7];?>">
                <option value="<?php echo $result[7];?>"><?php echo $result[7];?></option>
				<option value="---">---</option>
				<?php

                    include ('config.php');

                    $sql = "SELECT pros_name FROM prostecutors_table";

                    if($selectresult = mysqli_query($con, $sql)){
                        
                        while($row = mysqli_fetch_array($selectresult)){
                            echo "<option value = '" .$row['pros_name']."'>" .$row['pros_name']."</option>";
                        }

                        } else
                            {
                                echo "Error ." .$sql . "<br>" . 
                                mysqli_error($con);
                            }
                    ?>
			</select></td>
            <td>No. of Counts: </td><td><input type="text" name="newno_counts" value="<?php echo $result[18];?>"></td>
            </tr>    
                
            </tr>
			<td>Date Assigned: </td><td><input type="date" name="newdateassigned" value="<?php echo $result[8];?>"></td>
            <td>Criminal Case No.: </td><td><input type="text" name="newcriminalcaseno" value="<?php echo $result[19];?>"></td>
            </tr>
                
			<tr>
			<td>Date Resolved: </td><td><input type="date" name="newdateresolved" value="<?php echo $result[9];?>"></td>
             <td>Case Title.: </td><td><input type="text" name="newcasetitle" value="<?php echo $result[20];?>"></td>
            </tr>
        
			<tr>
			<td>Age: </td><td><input type="text" name="newage" value="<?php echo $result[10];?>"></td>
            <td>Final Violation.: </td><td><input type="text" name="newfviolation" value="<?php echo $result[21];?>"></td>
            </tr>
    
            <tr>
			<td>Subpoena: </td><td><input type="text" name="newsubpoena" value="<?php echo $result[13];?>"></td>
            <td>Handling Prosecutor.: </td><td><input type="text" name="newhandlingprosecutors" value="<?php echo $result[25];?>"></td>
            </tr>
        
            <tr>
			<td>Date Final Reso: </td><td><input type="date" name="newdatefinalreso" value="<?php echo $result[22];?>"></td>
            <td>Penalty.: </td><td><input type="text" name="newpenalty" value="<?php echo $result[26];?>"></td>
            </tr>
    
            <tr>
            <td>Final Reso Mailing Date: </td><td><input type="date" name="newfinalresomailingdate" value="<?php echo $result[24];?>"></td>
            <td>Date Comission: </td><td><input type="date" name="newdatecomission" value="<?php echo $result[27];?>"></td>
			</tr>
    
            <tr>
            <td>Final Reso remarks: </td><td><input type="date" name="newfinalresoremarks" value="<?php echo $result[23];?>"></td>
            <td>Encoder: </td><td><select type="text" name="newencoder" value="<?php echo $result[28];?>">
            <option value="<?php echo $result[28];?>"><?php echo $result[28];?></option>
                <option value=""></option>
				<?php

                    include ('config.php');

                    $sql = "SELECT encoder_name FROM encoder_table";

                    if($selectresult = mysqli_query($con, $sql)){
                        
                        while($row = mysqli_fetch_array($selectresult)){
                            echo "<option value = '" .$row['encoder_name']."'>" .$row['encoder_name']."</option>";
                        }

                        } else
                            {
                                echo "Error ." .$sql . "<br>" . 
                                mysqli_error($con);
                            }
                    ?>
                </select></td></tr>
    <div class="w3-container nopadding center" style="width:100%;">
    
        
    <div class="w3-half ">
    <table class="center w3-striped">
    <tbody>
        <div class="w3-container w3-grey">
              <h5>MOTION FOR RECONSIDERATION</h5>
    </div>
        
    <tr>
    <td>Date Filed: </td><td><input type="date" name="newdatefiled" value="<?php echo $result[29];?>"></td>
    <td>filedby: </td><td><input type="text" name="newfiledby" value="<?php echo $result[30];?>"></td>
    </tr>
        
    <tr>
    <td>Date Recieved: </td><td><input type="date" name="newdaterecieved" value="<?php echo $result[31];?>"></td>
    <td>Denied/Granted: </td><td><input type="text" name="newdenied_granted" value="<?php echo $result[32];?>"></td>
    </tr>
        
    <tr>
    <td>Date Resolved: </td><td><input type="date" name="newmrdateresolved" value="<?php echo $result[33];?>"></td>
    <td>Status: </td><td><input type="text" name="newmrstatus" value="<?php echo $result[34];?>"></td>
    </tr>
        
    <tr>
    <td>Assigned Prosecutor: </td>
			<td><select type="text" name="newassigned" value="<?php echo $result[35];?>">
                <option value="<?php echo $result[35];?>"><?php echo $result[35];?></option>
				<option value=""></option>
				<?php

                    include ('config.php');

                    $sql = "SELECT pros_name FROM prostecutors_table";

                    if($selectresult = mysqli_query($con, $sql)){
                        
                        while($row = mysqli_fetch_array($selectresult)){
                            echo "<option value = '" .$row['pros_name']."'>" .$row['pros_name']."</option>";
                        }

                        } else
                            {
                                echo "Error ." .$sql . "<br>" . 
                                mysqli_error($con);
                            }
                    ?>
			</select></td>

        <td>Filing: </td><td><input type="text" name="newfiling" value="<?php echo $result[36];?>"></td>
    </tr>
    
    </tbody>
    </table>
    </div>
    </div>

	
            <div class="w3-padding" align="right" >
            <input class="w3-btn w3-white w3-border w3-hover-light-grey" type="submit" value="Cancel" name="cancel">
			<input class="w3-btn w3-light-blue w3-border w3-border-blue w3-hover-cyan" type="submit" value="Update" id="insert" name="updt"> 
            </div>
        </form>
        </div>
        
    
</div>
    
</body>
</html>
