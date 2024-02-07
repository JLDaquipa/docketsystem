<?php date_default_timezone_set("Asia/Manila"); 
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
 
}
?>
<!DOCTYPE html>
<html>
<title>DOCKET SYSTEM</title>

    
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
/* Table CSS */
table {
    border-collapse: collapse;
    width: 100%;
}        
    td{
        border:1px solid lightgrey;
    }
td:hover {background-color: #b3b3b3 ;} 
/* End of Table CSS*/
a{text-decoration:none;}
td a{
	display:block;
	
}
    a{text-decoration:none;}
</style>
<body>

<nav class="w3-sidenav w3-light-grey side" style="width:16%;">
  
      <header class="w3-container w3-blue-grey headings nopadding" align="center">
          <a href="home.php" ><h4 style="font-size:1.5vw;">DOCKET SYSTEM</h4></a>
        </header>
  
    <div class="menu">	
        <a href="inquest.php"><img src="Images/inquest_investigation_icon_t.png">INQUEST</a> 
        <a href="investigation.php" ><img src="Images/inquest_investigation_icon_t.png">INVESTIGATION</a>
        <a href="prosecutor.php" ><img src="Images/prosecutors_icon.png">PROSECUTOR</a>
        <a href="encoder.php" ><img src="Images/prosecutors_icon.png">ENCODER</a>
        <a href="inventory.php" style="border-top: 0.1px solid #607d8b;border-bottom: 0.1px solid #607d8b;;font-weight:bold;color:#607d8b;background-color:#e6faff;box-shadow:2px 2px 8px -4px  black"><img src="Images/statistic_icon.png">INVENTORY</a>        
    	<a href="mailing.php" ><img src="Images/mail.png">MAILING</a>
</div>
<div class="menu" align="center" style="margin-top:300px;margin-left:10%;margin-right:10%;font-size:20px;">
<label>TIME:&nbsp;</label>     
<span id="date_time"></span>       
    <script type="text/javascript">window.onload = date_time('date_time');</script>
</div>
</nav>
    
    <!-- Start main -->
<div id="main" style="margin-left:13%"> 
        <header class="w3-container w3-blue-grey headings" style="position:fixed;right:0;width:100%;">
            <p style="float: right">Welcome:&nbsp <?php echo $_SESSION['username']; ?>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
            <?php echo "Date: " . date("Y/m/d")." " . date("l");?> &nbsp <a href="logout.php">[LOG-OUT]</a></p>
        </header>
        <br>

    
<div class="w3-container w3-white w3-card" style="margin: 50px 10px 0px 50px;padding:0px;">     
            <div class="w3-container nopadding" align="center" style="height:100%;" >            
<?php
    
    require_once 'config.php';
 $date=date("Y");   
echo "<center>";
                
    $month = array("01","02","03","04","05","06","07","08","09","10","11","12");

	if((!isset($_POST['searchbtn']))){
            $record = "INQUEST";
            $selectedRadio = "all";
			echo "<h3>".$date."&nbsp INQUEST &nbspINVENTORY"."</h3>";
			$search=$date;
            $table = "inquest_table";
        
    }
    
    if((isset($_POST['searchbtn']))){
        
        if(isset($_POST['searchyears'])){
            $inquest = 'inquest';
		    $investigation = 'investigation';
	
                    if(!empty($_POST['radio'])){
                        $selectedRadio = $_POST['radio'];
                    }
                    else{
                        $selectedRadio = ""; 
                    }
                if($selectedRadio == 'investigation'){
                            $record = "INVESTIGATION";
                            $search = $_POST['searchyears'];
                            $date = $search;
                            echo "<h3>".$search."&nbsp INVESTIGATION &nbsp INVENTORY"."</h3>";
                            $table = "investigation_table";


                }
                if($selectedRadio == 'inquest'){
                            $record = "INQUEST";
                            $search = $_POST['searchyears'];
                            $date = $search;
                            echo "<h3>".$search."&nbsp INQUEST &nbspINVENTORY"."</h3>";				
                            $table = "inquest_table";
                }                    
				
			} 
	}
                
        
            $sql = "SELECT Particulars FROM criminal_offenses_table";
        
              $particulars = mysqli_query($con,$sql);
        
        for($x=0;$x < count($month);$x++){
            
            $sql = "SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a 
WHERE (violation LIKE '%Violation of Child Protection Laws%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date') 
OR (violation LIKE '%R.A. 7610%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date') 
UNION ALL
SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a  
WHERE (violation LIKE '%Violation Against Women%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date') 
OR (violation LIKE '%R.A. 9262%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date') 
UNION ALL
SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a  
WHERE (violation LIKE '%Rape%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date') 
OR (violation LIKE '%R.A. 8353%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date')
UNION ALL
SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a  
WHERE (violation LIKE '%Trafficking in Persons%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date') 
UNION ALL
SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a  
WHERE (violation LIKE '%Cybercrime%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date') 
OR (violation LIKE '%Libel%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date')
OR (violation LIKE '%R.A. 10175%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date')
UNION ALL
SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a  
WHERE (violation LIKE '%Dangerous Drugs%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date') 
OR (violation LIKE '%R.A. 9165%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date')
UNION ALL
SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a  
WHERE (violation LIKE '%Murder%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date') 
UNION ALL
SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a  
WHERE (violation LIKE '%Homicide%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date') 
UNION ALL
SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a  
WHERE (violation LIKE '%Kidnapping%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date') 
UNION ALL
SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a  
WHERE (violation LIKE '%Illegal Recruitment%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date')
UNION ALL
SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a  
WHERE (violation LIKE '%Estafa%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date') 
OR (violation LIKE '%R.A. 315%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date')
OR (violation LIKE '%swindling%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date')
UNION ALL
SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a  
WHERE (violation LIKE '%Bouncing Check%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date')
UNION ALL
SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a  
WHERE (violation LIKE '%Internal Revenue Code Violation%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date') 
OR (violation LIKE '%1997 BIR LAW%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date')
OR (violation LIKE '%TAX COPE%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date')
UNION ALL
SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a  
WHERE (violation LIKE '%Smuggling%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date') 
UNION ALL
SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a  
WHERE (violation LIKE '%Intellectual Property Rights Violation%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date') 
UNION ALL
SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a  
WHERE (violation LIKE '%Robbery%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date')
UNION ALL
SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a 
WHERE (violation LIKE '%Theft%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date') 
UNION ALL
SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a  
WHERE (violation LIKE '%Carnapping%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date') 
OR (violation LIKE '%R.A. 6539%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date')
OR (violation LIKE '%R.A. 10883%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date')
UNION ALL
SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a  
WHERE (violation LIKE '%Graft and Corruption%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date') 
UNION ALL
SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a  
WHERE (violation LIKE '%Illegal Gambling%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date') 
OR (violation LIKE '%R.A. 9287%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date')
OR (violation LIKE '%P.D. 1602%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date')
UNION ALL
SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a  
WHERE (violation LIKE '%Illegal Logging%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date') 
OR (violation LIKE '%P.D. 705%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date')
UNION ALL
SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a  
WHERE (violation LIKE '%Illegal Mining%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date')
UNION ALL
SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a  
WHERE (violation LIKE '%Firearms/Ammunation/Explosives%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date')
UNION ALL
SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a  
WHERE (violation LIKE '%Terrorism%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date') 
UNION ALL
SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a  
WHERE (violation LIKE '%Rebellion%' AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date')
UNION ALL
SELECT COUNT(a.npsdocketnumber) AS COUNT FROM $table a  
WHERE (violation NOT LIKE '%Rebellion%' 
AND violation NOT LIKE '%Terrorism%'
AND violation NOT LIKE '%Firearms/Ammunation/Explosives%'
AND violation NOT LIKE '%Illegal Mining%'
AND violation NOT LIKE '%P.D. 705%'
AND violation NOT LIKE '%Illegal Logging%'
AND violation NOT LIKE '%P.D. 1602%'
AND violation NOT LIKE '%R.A. 9287%'
AND violation NOT LIKE '%Illegal Gambling%'
AND violation NOT LIKE '%Graft and Corruption%'
AND violation NOT LIKE '%R.A. 10883%'
AND violation NOT LIKE '%R.A. 6539%'
AND violation NOT LIKE '%Carnapping%'
AND violation NOT LIKE '%Theft%'
AND violation NOT LIKE '%Robbery%'
AND violation NOT LIKE '%Intellectual Property Rights Violation%'
AND violation NOT LIKE '%Smuggling%'
AND violation NOT LIKE '%TAX COPE%'
AND violation NOT LIKE '%1997 BIR LAW%'
AND violation NOT LIKE '%Internal Revenue Code Violation%'
AND violation NOT LIKE '%Bouncing Check%'
AND violation NOT LIKE '%swindling%'
AND violation NOT LIKE '%R.A. 315%'
AND violation NOT LIKE '%Estafa%'
AND violation NOT LIKE '%Illegal Recruitment%'
AND violation NOT LIKE '%Kidnapping%'
AND violation NOT LIKE '%Homicide%'
AND violation NOT LIKE '%Murder%'
AND violation NOT LIKE '%R.A. 9165%'
AND violation NOT LIKE '%Dangerous Drugs%'
AND violation NOT LIKE '%R.A. 10175%'
AND violation NOT LIKE '%Libel%'
AND violation NOT LIKE '%Cybercrime%'
AND violation NOT LIKE '%Trafficking in Persons%'
AND violation NOT LIKE '%R.A. 8353%'
AND violation NOT LIKE '%Rape%'
AND violation NOT LIKE '%R.A. 9262%'
AND violation NOT LIKE '%Violation Against Women%'
AND violation NOT LIKE '%R.A. 7610%'
AND violation NOT LIKE '%Violation of Child Protection Laws%'
AND MONTH(a.datefile) = '$month[$x]' AND YEAR(a.datefile) = '$date');";
            
            if($month[$x] == "01"){
                $jan = mysqli_query($con,$sql);
            }
			if($month[$x] == "02"){
                $feb = mysqli_query($con,$sql);
            }
            if($month[$x] == "03"){
                $mar = mysqli_query($con,$sql);
            }
            if($month[$x] == "04"){
                $apr = mysqli_query($con,$sql);
            }
            if($month[$x] == "05"){
                $may = mysqli_query($con,$sql);
            }
            if($month[$x] == "06"){
                $jun = mysqli_query($con,$sql);
            }
            if($month[$x] == "07"){
                $jul = mysqli_query($con,$sql);
            }
            if($month[$x] == "08"){
                $aug = mysqli_query($con,$sql);
            }
            if($month[$x] == "09"){
                $sep = mysqli_query($con,$sql);
            }
            if($month[$x] == "10"){
                $oct = mysqli_query($con,$sql);
            }
            if($month[$x] == "11"){
                $nov = mysqli_query($con,$sql);
            }
            if($month[$x] == "12"){
                $dec = mysqli_query($con,$sql);
            }
		      
        }
        
        
			

   
echo "<div class='w3-container w3-border nopadding'>";
echo "<form action='inventory.php' method='post'>";
echo "<div class='w3-quarter w3-padding' style='width:10%;'>";
echo "<select style='border:1px solid #607d8b;width:100%;height:30px;margin-top:3px;' name='searchyears' >"; 
echo "<option value='$date'>$date</option>";
    echo   "<option value='2014'>"."2014"."</option>";
    echo   "<option value='2015'>"."2015"."</option>";
    echo   "<option value='2016'>"."2016"."</option>";
    echo   "<option value='2017'>"."2017"."</option>";
    echo   "<option value='2018'>"."2018"."</option>";   
    echo   "<option value='2019'>"."2019"."</option>";
    echo   "<option value='2020'>"."2020"."</option>";   
    echo   "<option value='2021'>"."2021"."</option>";   
    echo   "<option value='2022'>"."2022"."</option>";   
    echo   "<option value='2023'>"."2023"."</option>";   
    echo   "<option value='2024'>"."2024"."</option>";   
    echo   "<option value='2025'>"."2025"."</option>";   
    echo   "<option value='2026'>"."2026"."</option>";   
    echo   "<option value='2027'>"."2027"."</option>";   
    echo   "<option value='2028'>"."2028"."</option>";   
    echo   "<option value='2029'>"."2029"."</option>";   
    echo   "<option value='2030'>"."2030"."</option>";   
    echo   "<option value='2031'>"."2031"."</option>";   
    echo   "<option value='2032'>"."2032"."</option>";   
    echo   "<option value='2033'>"."2033"."</option>";   
    echo   "<option value='2034'>"."2034"."</option>";   
    echo   "<option value='2035'>"."2035"."</option>";   
    echo   "<option value='2036'>"."2036"."</option>";   
    echo   "<option value='2037'>"."2037"."</option>";   
    echo   "<option value='2038'>"."2038"."</option>";   
    echo   "<option value='2039'>"."2039"."</option>";   
    echo   "<option value='2040'>"."2040"."</option>";      
    echo "</select></div>";
    echo "<div class='w3-quarter' style='width:22%;padding-top:15px;' >";
    echo'<input type="radio" name="radio" value="inquest" required>&nbsp;INQUEST&nbsp;&nbsp;&nbsp;&nbsp;';
    echo'<input type="radio" name="radio" value="investigation" required>&nbsp;INVESTIGATION';
    echo'</div>';
    echo "<div class='w3-quarter w3-padding' style='width:63%;' align='left'>";
    echo   "<input class='w3-white w3-round w3-hover-light-blue w3-large w3-text-blue-grey' style='border:1px solid #607d8b;margin-top:3px;box-shadow:1px 1px 8px -2px black;' type='submit' name='searchbtn' value='Search'>";     
    echo "</div>";
    echo "</form>";
    echo "<a href='print.php?year=$search&radio=$selectedRadio'><div class='w3-quarter w3-hover-light-grey w3-padding' style='width:5%;border-left:1px solid lightgrey;'>";
    echo "<img src='Images/print.png' ></div>";
    echo "</div></a>";
                
    echo"<table id='myTable'>";
    echo"<thread>";
    echo"<tr id='tableHeader' class='w3-blue-grey'>";
    echo"<th>"."Particulars"."</th>";
    echo"<th>"."Jan"."</th>";
    echo"<th>"."Feb"."</th>";
    echo"<th>"."Mar"."</th>";
    echo"<th>"."Apr"."</th>";
    echo"<th>"."May"."</th>";
    echo"<th>"."Jun"."</th>";
    echo"<th>"."Jul"."</th>";
    echo"<th>"."Aug"."</th>";
    echo"<th>"."Sep"."</th>";
    echo"<th>"."Oct"."</th>";
    echo"<th>"."Nov"."</th>";
    echo"<th>"."Dec"."</th>";
    echo"<th>"."TOTAL"."</th>";
    echo"</tr>";
    echo"</thread>";
    echo"<tbody>";
        while($rowparticulars = mysqli_fetch_assoc($particulars)) :
                
        $row1=mysqli_fetch_assoc($jan);
        $row2=mysqli_fetch_assoc($feb);
        $row3=mysqli_fetch_assoc($mar);
        $row4=mysqli_fetch_assoc($apr);
        $row5=mysqli_fetch_assoc($may);        
        $row6=mysqli_fetch_assoc($jun);        
        $row7=mysqli_fetch_assoc($jul);        
        $row8=mysqli_fetch_assoc($aug);
        $row9=mysqli_fetch_assoc($sep);
        $row10=mysqli_fetch_assoc($oct);        
        $row11=mysqli_fetch_assoc($nov);        
        $row12=mysqli_fetch_assoc($dec);        
                
                
        echo "<tr>";
        echo "<td>".$rowparticulars['Particulars']."</td>";
        echo "<td>"."<a href='violationinventory.php?record=".$record."&year=".$search."&month=01"."&Particulars=".urlencode($rowparticulars['Particulars'])."'>".$row1['COUNT']."</a>"."</td>";
        echo "<td>"."<a href='violationinventory.php?record=".$record."&year=".$search."&month=02"."&Particulars=".urlencode($rowparticulars['Particulars'])."'>".$row2['COUNT']."</a>"."</td>";
        echo "<td>"."<a href='violationinventory.php?record=".$record."&year=".$search."&month=03"."&Particulars=".urlencode($rowparticulars['Particulars'])."'>".$row3['COUNT']."</a>"."</td>";
        echo "<td>"."<a href='violationinventory.php?record=".$record."&year=".$search."&month=04"."&Particulars=".urlencode($rowparticulars['Particulars'])."'>".$row4['COUNT']."</a>"."</td>";
        echo "<td>"."<a href='violationinventory.php?record=".$record."&year=".$search."&month=05"."&Particulars=".urlencode($rowparticulars['Particulars'])."'>".$row5['COUNT']."</a>"."</td>";
        echo "<td>"."<a href='violationinventory.php?record=".$record."&year=".$search."&month=06"."&Particulars=".urlencode($rowparticulars['Particulars'])."'>".$row6['COUNT']."</a>"."</td>";
        echo "<td>"."<a href='violationinventory.php?record=".$record."&year=".$search."&month=07"."&Particulars=".urlencode($rowparticulars['Particulars'])."'>".$row7['COUNT']."</a>"."</td>";
        echo "<td>"."<a href='violationinventory.php?record=".$record."&year=".$search."&month=08"."&Particulars=".urlencode($rowparticulars['Particulars'])."'>".$row8['COUNT']."</a>"."</td>";
        echo "<td>"."<a href='violationinventory.php?record=".$record."&year=".$search."&month=09"."&Particulars=".urlencode($rowparticulars['Particulars'])."'>".$row9['COUNT']."</a>"."</td>";
        echo "<td>"."<a href='violationinventory.php?record=".$record."&year=".$search."&month=10"."&Particulars=".urlencode($rowparticulars['Particulars'])."'>".$row10['COUNT']."</a>"."</td>";
        echo "<td>"."<a href='violationinventory.php?record=".$record."&year=".$search."&month=11"."&Particulars=".urlencode($rowparticulars['Particulars'])."'>".$row11['COUNT']."</a>"."</td>";
        echo "<td>"."<a href='violationinventory.php?record=".$record."&year=".$search."&month=12"."&Particulars=".urlencode($rowparticulars['Particulars'])."'>".$row12['COUNT']."</a>"."</td>";
		/*computing a total of the row*/
        $total=$row1['COUNT']+$row2['COUNT']+$row3['COUNT']+$row4['COUNT']+$row5['COUNT']+$row6['COUNT']+$row7['COUNT']+$row8['COUNT']+$row9['COUNT']+$row10['COUNT']+$row11['COUNT']+$row12['COUNT'];		
        echo "<td style='font-weight:bold;'>".$total."</td>";        
   
        echo "</tr>";
        endwhile;
    echo "</tbody>";
    echo "</table>";

       ?>
 
    
<br>
</div>
    
    
</div> <!-- End main -->
     
</body>

</html>