<?php date_default_timezone_set("Asia/Manila"); 
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
<title>HOME</title>
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
    a{text-decoration:none;}
    

</style>
<body>

<nav class="w3-sidenav w3-light-grey side" style="width:16%;">

    <?php
    
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
    
 if ($_SESSION['privilege']=="Verify"||$_SESSION['privilege']=="Encoder"){
    
        echo '<header class="w3-container w3-blue-grey headings">';
         echo '<a href="home.php" ><h4>DOCKET SYSTEM</h4></a>';
        echo '</header>';
  
    echo '<div class="menu">';	
        echo '<a href="inquest.php"><img src="Images/inquest_investigation_icon_t.png">INQUEST</a>';
        echo '<a href="investigation.php"><img src="Images/inquest_investigation_icon_t.png">INVESTIGATION</a>';
        echo '<a href="prosecutor.php" class="not-active"><img src="Images/prosecutors_icon.png">PROSECUTOR</a>';
        echo '<a href="encoder.php" class="not-active"><img src="Images/prosecutors_icon.png">ENCODER</a>';
        echo '<a href="inventory.php" class="not-active"><img src="Images/statistic_icon.png">INVENTORY</a> ';
        echo '<a href="mailing.php" class="not-active"><img src="Images/mail.png">MAILING</a> '; 
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
    
?>  
    
<div class="w3-container w3-white w3-card w3-padding home" style="margin: 0px 10px 0px 50px; height:500px;">
      
        <div class="w3-padding " align="center" style="height:100%;">
            
            <div align="center" class="w3-container tbox" >
                
            <form  name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
                <div class="w3-half " style="width:79%;margin-right:1%;">
                    <input class="w3-input  w3-round" style="width:100%;border:1px solid #607d8b;box-shadow:1px 1px 8px -2px black;"  placeholder="Search......"name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $strKeyword;?>">
                    
                    <table>
                        <tbody>
                            <tr>
                                <td style="border:none"><input type="radio" name="category" value="npsdocketnumber" required> Docket Number</td>
                                <td style="border:none"><input type="radio" name="category" value="complainant" required>  Complainant </td>
                            </tr>
                            <tr>
                                <td style="border:none"><input type="radio" name="category" value="respondent" required> Respondent </td> 
                                <td style="border:none"><input type="radio" name="category" value="criminalcaseno" required> Criminal Case No. </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                    
                
                <div class="w3-half " style="width:20%;">
                    <input class="w3-input w3-text-blue-grey  w3-round w3-hover-light-blue " style="width:100%;text-decoration:none;border:1px solid #607d8b;box-shadow:1px 1px 8px -2px black;"  type="submit" value="Search">
                </div>
            </form>    
            </div>
                    
        </div>
        

</div>
    
<br>

</div> <!-- End main -->
     
</body>

</html>