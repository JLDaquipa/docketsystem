<!DOCTYPE html>
<html>
<title>INVENTORY</title>

    
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
table, td, th {
    border-collapse: collapse;
    border: 1px solid #bdc3c7;
    padding: 5px; 
    text-align: center;
    font-family: Times New Roman;
    font-size:16px;
	
}
th{
    background-color:darkcyan;
    color: white;
    font-size:16px;
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
  
      <header class="w3-container w3-blue-grey headings">
          <a href="home.php" ><h4>DOCKET SYSTEM</h4></a>
        </header>
  
    <div class="menu">	
        <a href="inquest.php"><img src="Images/inquest_investigation_icon_t.png">INQUEST</a> 
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
<div id="main" style="margin-left:13%"> 
        <header class="w3-container w3-blue-grey">
            <p style="float: right">Welcome:&nbsp Admin &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
            Date: 2018/07/06 Friday &nbsp <a href="logout.php">[LOG-OUT]</a></p>
        </header>
        <br><br><br>

    
<div class="w3-container w3-white w3-card" style="margin: 5px 5px 10px 5px;">      
            <div class="w3-row-padding" align="center" style="height:100%;padding:2%; padding-left: 1px;padding-right:1px;overflow-x:auto;" >            
<center><h2>2018&nbspINVENTORY</h2><a href='print.php?year=2018&radio=all' style='float:right;'><img src='Images/print.png'></a><form action='inventory.php' method='post'><select name='searchyears' style='width:30%'><br />
<font size='1'><table class='xdebug-error xe-notice' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
<tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Notice: Undefined variable: years in C:\wamp64\www\DocketSystem\inventory.php on line <i>132</i></th></tr>
<tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
<tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
<tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0009</td><td bgcolor='#eeeeec' align='right'>290736</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\wamp64\www\DocketSystem\inventory.php' bgcolor='#eeeeec'>...\inventory.php<b>:</b>0</td></tr>
</table></font>
<option value='<?php echo ; ?>'><option value='2015'>2015</option><option value='2016'>2016</option><option value='2017'>2017</option><option value='2018'>2018</option><option value='2019'>2019</option><option value='2020'>2020</option><option value='2021'>2021</option><option value='2022'>2022</option><option value='2023'>2023</option><option value='2024'>2024</option><option value='2025'>2025</option><option value='2026'>2026</option><option value='2027'>2027</option><option value='2028'>2028</option><option value='2029'>2029</option><option value='2030'>2030</option><option value='2031'>2031</option><option value='2032'>2032</option><option value='2033'>2033</option><option value='2034'>2034</option><option value='2035'>2035</option><option value='2036'>2036</option><option value='2037'>2037</option><option value='2038'>2038</option><option value='2039'>2039</option><option value='2040'>2040</option></select><div align="center"><h3>VIEW All<input type="radio" name="radio" value="all"><br>INQUEST<input type="radio" name="radio" value="inquest">||INVESTIGATION<input type="radio" name="radio" value="investigation"><br><br></div><input type='submit' name='searchbtn' value='Search'></form><br><table id='myTable'><thread><tr id='tableHeader' class='w3-blue-grey'><th>Particulars</th><th>January</th><th>February</th><th>March</th><th>April</th><th>May</th><th>June</th><th>July</th><th>August</th><th>September</th><th>October</th><th>November</th><th>December</th><th>TOTAL</th></tr></thread><tbody><tr><td>Bouncing Check</td><td><a href='violationinventory.php?year=2018&month=01&Particulars=Bouncing+Check'>0</a></td><td><a href='violationinventory.php?year=2018&month=02&Particulars=Bouncing+Check'>0</a></td><td><a href='violationinventory.php?year=2018&month=03&Particulars=Bouncing+Check'>0</a></td><td><a href='violationinventory.php?year=2018&month=04&Particulars=Bouncing+Check'>0</a></td><td><a href='violationinventory.php?year=2018&month=05&Particulars=Bouncing+Check'>0</a></td><td><a href='violationinventory.php?year=2018&month=06&Particulars=Bouncing+Check'>0</a></td><td><a href='violationinventory.php?year=2018&month=07&Particulars=Bouncing+Check'>0</a></td><td><a href='violationinventory.php?year=2018&month=08&Particulars=Bouncing+Check'>0</a></td><td><a href='violationinventory.php?year=2018&month=09&Particulars=Bouncing+Check'>0</a></td><td><a href='violationinventory.php?year=2018&month=10&Particulars=Bouncing+Check'>0</a></td><td><a href='violationinventory.php?year=2018&month=11&Particulars=Bouncing+Check'>0</a></td><td><a href='violationinventory.php?year=2018&month=12&Particulars=Bouncing+Check'>0</a></td><td>0</td></tr><tr><td>Carnapping</td><td><a href='violationinventory.php?year=2018&month=01&Particulars=Carnapping'>0</a></td><td><a href='violationinventory.php?year=2018&month=02&Particulars=Carnapping'>0</a></td><td><a href='violationinventory.php?year=2018&month=03&Particulars=Carnapping'>0</a></td><td><a href='violationinventory.php?year=2018&month=04&Particulars=Carnapping'>0</a></td><td><a href='violationinventory.php?year=2018&month=05&Particulars=Carnapping'>0</a></td><td><a href='violationinventory.php?year=2018&month=06&Particulars=Carnapping'>0</a></td><td><a href='violationinventory.php?year=2018&month=07&Particulars=Carnapping'>0</a></td><td><a href='violationinventory.php?year=2018&month=08&Particulars=Carnapping'>0</a></td><td><a href='violationinventory.php?year=2018&month=09&Particulars=Carnapping'>0</a></td><td><a href='violationinventory.php?year=2018&month=10&Particulars=Carnapping'>0</a></td><td><a href='violationinventory.php?year=2018&month=11&Particulars=Carnapping'>0</a></td><td><a href='violationinventory.php?year=2018&month=12&Particulars=Carnapping'>0</a></td><td>0</td></tr><tr><td>Cybercrime</td><td><a href='violationinventory.php?year=2018&month=01&Particulars=Cybercrime'>0</a></td><td><a href='violationinventory.php?year=2018&month=02&Particulars=Cybercrime'>0</a></td><td><a href='violationinventory.php?year=2018&month=03&Particulars=Cybercrime'>0</a></td><td><a href='violationinventory.php?year=2018&month=04&Particulars=Cybercrime'>0</a></td><td><a href='violationinventory.php?year=2018&month=05&Particulars=Cybercrime'>0</a></td><td><a href='violationinventory.php?year=2018&month=06&Particulars=Cybercrime'>1</a></td><td><a href='violationinventory.php?year=2018&month=07&Particulars=Cybercrime'>0</a></td><td><a href='violationinventory.php?year=2018&month=08&Particulars=Cybercrime'>0</a></td><td><a href='violationinventory.php?year=2018&month=09&Particulars=Cybercrime'>0</a></td><td><a href='violationinventory.php?year=2018&month=10&Particulars=Cybercrime'>0</a></td><td><a href='violationinventory.php?year=2018&month=11&Particulars=Cybercrime'>0</a></td><td><a href='violationinventory.php?year=2018&month=12&Particulars=Cybercrime'>0</a></td><td>1</td></tr><tr><td>Dangerous Drugs</td><td><a href='violationinventory.php?year=2018&month=01&Particulars=Dangerous+Drugs'>0</a></td><td><a href='violationinventory.php?year=2018&month=02&Particulars=Dangerous+Drugs'>0</a></td><td><a href='violationinventory.php?year=2018&month=03&Particulars=Dangerous+Drugs'>0</a></td><td><a href='violationinventory.php?year=2018&month=04&Particulars=Dangerous+Drugs'>0</a></td><td><a href='violationinventory.php?year=2018&month=05&Particulars=Dangerous+Drugs'>0</a></td><td><a href='violationinventory.php?year=2018&month=06&Particulars=Dangerous+Drugs'>0</a></td><td><a href='violationinventory.php?year=2018&month=07&Particulars=Dangerous+Drugs'>1</a></td><td><a href='violationinventory.php?year=2018&month=08&Particulars=Dangerous+Drugs'>0</a></td><td><a href='violationinventory.php?year=2018&month=09&Particulars=Dangerous+Drugs'>0</a></td><td><a href='violationinventory.php?year=2018&month=10&Particulars=Dangerous+Drugs'>0</a></td><td><a href='violationinventory.php?year=2018&month=11&Particulars=Dangerous+Drugs'>0</a></td><td><a href='violationinventory.php?year=2018&month=12&Particulars=Dangerous+Drugs'>0</a></td><td>1</td></tr><tr><td>Estafa</td><td><a href='violationinventory.php?year=2018&month=01&Particulars=Estafa'>0</a></td><td><a href='violationinventory.php?year=2018&month=02&Particulars=Estafa'>0</a></td><td><a href='violationinventory.php?year=2018&month=03&Particulars=Estafa'>0</a></td><td><a href='violationinventory.php?year=2018&month=04&Particulars=Estafa'>0</a></td><td><a href='violationinventory.php?year=2018&month=05&Particulars=Estafa'>0</a></td><td><a href='violationinventory.php?year=2018&month=06&Particulars=Estafa'>0</a></td><td><a href='violationinventory.php?year=2018&month=07&Particulars=Estafa'>0</a></td><td><a href='violationinventory.php?year=2018&month=08&Particulars=Estafa'>0</a></td><td><a href='violationinventory.php?year=2018&month=09&Particulars=Estafa'>0</a></td><td><a href='violationinventory.php?year=2018&month=10&Particulars=Estafa'>0</a></td><td><a href='violationinventory.php?year=2018&month=11&Particulars=Estafa'>0</a></td><td><a href='violationinventory.php?year=2018&month=12&Particulars=Estafa'>0</a></td><td>0</td></tr><tr><td>Firearms/Ammunation/Explosives</td><td><a href='violationinventory.php?year=2018&month=01&Particulars=Firearms%2FAmmunation%2FExplosives'>0</a></td><td><a href='violationinventory.php?year=2018&month=02&Particulars=Firearms%2FAmmunation%2FExplosives'>0</a></td><td><a href='violationinventory.php?year=2018&month=03&Particulars=Firearms%2FAmmunation%2FExplosives'>0</a></td><td><a href='violationinventory.php?year=2018&month=04&Particulars=Firearms%2FAmmunation%2FExplosives'>0</a></td><td><a href='violationinventory.php?year=2018&month=05&Particulars=Firearms%2FAmmunation%2FExplosives'>0</a></td><td><a href='violationinventory.php?year=2018&month=06&Particulars=Firearms%2FAmmunation%2FExplosives'>0</a></td><td><a href='violationinventory.php?year=2018&month=07&Particulars=Firearms%2FAmmunation%2FExplosives'>0</a></td><td><a href='violationinventory.php?year=2018&month=08&Particulars=Firearms%2FAmmunation%2FExplosives'>0</a></td><td><a href='violationinventory.php?year=2018&month=09&Particulars=Firearms%2FAmmunation%2FExplosives'>0</a></td><td><a href='violationinventory.php?year=2018&month=10&Particulars=Firearms%2FAmmunation%2FExplosives'>0</a></td><td><a href='violationinventory.php?year=2018&month=11&Particulars=Firearms%2FAmmunation%2FExplosives'>0</a></td><td><a href='violationinventory.php?year=2018&month=12&Particulars=Firearms%2FAmmunation%2FExplosives'>0</a></td><td>0</td></tr><tr><td>Graft and Corruption</td><td><a href='violationinventory.php?year=2018&month=01&Particulars=Graft+and+Corruption'>0</a></td><td><a href='violationinventory.php?year=2018&month=02&Particulars=Graft+and+Corruption'>0</a></td><td><a href='violationinventory.php?year=2018&month=03&Particulars=Graft+and+Corruption'>0</a></td><td><a href='violationinventory.php?year=2018&month=04&Particulars=Graft+and+Corruption'>0</a></td><td><a href='violationinventory.php?year=2018&month=05&Particulars=Graft+and+Corruption'>0</a></td><td><a href='violationinventory.php?year=2018&month=06&Particulars=Graft+and+Corruption'>0</a></td><td><a href='violationinventory.php?year=2018&month=07&Particulars=Graft+and+Corruption'>0</a></td><td><a href='violationinventory.php?year=2018&month=08&Particulars=Graft+and+Corruption'>0</a></td><td><a href='violationinventory.php?year=2018&month=09&Particulars=Graft+and+Corruption'>0</a></td><td><a href='violationinventory.php?year=2018&month=10&Particulars=Graft+and+Corruption'>0</a></td><td><a href='violationinventory.php?year=2018&month=11&Particulars=Graft+and+Corruption'>0</a></td><td><a href='violationinventory.php?year=2018&month=12&Particulars=Graft+and+Corruption'>0</a></td><td>0</td></tr><tr><td>Homicide</td><td><a href='violationinventory.php?year=2018&month=01&Particulars=Homicide'>0</a></td><td><a href='violationinventory.php?year=2018&month=02&Particulars=Homicide'>0</a></td><td><a href='violationinventory.php?year=2018&month=03&Particulars=Homicide'>0</a></td><td><a href='violationinventory.php?year=2018&month=04&Particulars=Homicide'>0</a></td><td><a href='violationinventory.php?year=2018&month=05&Particulars=Homicide'>0</a></td><td><a href='violationinventory.php?year=2018&month=06&Particulars=Homicide'>0</a></td><td><a href='violationinventory.php?year=2018&month=07&Particulars=Homicide'>0</a></td><td><a href='violationinventory.php?year=2018&month=08&Particulars=Homicide'>0</a></td><td><a href='violationinventory.php?year=2018&month=09&Particulars=Homicide'>0</a></td><td><a href='violationinventory.php?year=2018&month=10&Particulars=Homicide'>0</a></td><td><a href='violationinventory.php?year=2018&month=11&Particulars=Homicide'>0</a></td><td><a href='violationinventory.php?year=2018&month=12&Particulars=Homicide'>0</a></td><td>0</td></tr><tr><td>Illegal Gambling</td><td><a href='violationinventory.php?year=2018&month=01&Particulars=Illegal+Gambling'>0</a></td><td><a href='violationinventory.php?year=2018&month=02&Particulars=Illegal+Gambling'>0</a></td><td><a href='violationinventory.php?year=2018&month=03&Particulars=Illegal+Gambling'>0</a></td><td><a href='violationinventory.php?year=2018&month=04&Particulars=Illegal+Gambling'>0</a></td><td><a href='violationinventory.php?year=2018&month=05&Particulars=Illegal+Gambling'>0</a></td><td><a href='violationinventory.php?year=2018&month=06&Particulars=Illegal+Gambling'>0</a></td><td><a href='violationinventory.php?year=2018&month=07&Particulars=Illegal+Gambling'>0</a></td><td><a href='violationinventory.php?year=2018&month=08&Particulars=Illegal+Gambling'>0</a></td><td><a href='violationinventory.php?year=2018&month=09&Particulars=Illegal+Gambling'>0</a></td><td><a href='violationinventory.php?year=2018&month=10&Particulars=Illegal+Gambling'>0</a></td><td><a href='violationinventory.php?year=2018&month=11&Particulars=Illegal+Gambling'>0</a></td><td><a href='violationinventory.php?year=2018&month=12&Particulars=Illegal+Gambling'>0</a></td><td>0</td></tr><tr><td>Illegal Logging</td><td><a href='violationinventory.php?year=2018&month=01&Particulars=Illegal+Logging'>0</a></td><td><a href='violationinventory.php?year=2018&month=02&Particulars=Illegal+Logging'>0</a></td><td><a href='violationinventory.php?year=2018&month=03&Particulars=Illegal+Logging'>0</a></td><td><a href='violationinventory.php?year=2018&month=04&Particulars=Illegal+Logging'>0</a></td><td><a href='violationinventory.php?year=2018&month=05&Particulars=Illegal+Logging'>0</a></td><td><a href='violationinventory.php?year=2018&month=06&Particulars=Illegal+Logging'>0</a></td><td><a href='violationinventory.php?year=2018&month=07&Particulars=Illegal+Logging'>0</a></td><td><a href='violationinventory.php?year=2018&month=08&Particulars=Illegal+Logging'>0</a></td><td><a href='violationinventory.php?year=2018&month=09&Particulars=Illegal+Logging'>0</a></td><td><a href='violationinventory.php?year=2018&month=10&Particulars=Illegal+Logging'>0</a></td><td><a href='violationinventory.php?year=2018&month=11&Particulars=Illegal+Logging'>0</a></td><td><a href='violationinventory.php?year=2018&month=12&Particulars=Illegal+Logging'>0</a></td><td>0</td></tr><tr><td>Illegal Mining</td><td><a href='violationinventory.php?year=2018&month=01&Particulars=Illegal+Mining'>0</a></td><td><a href='violationinventory.php?year=2018&month=02&Particulars=Illegal+Mining'>0</a></td><td><a href='violationinventory.php?year=2018&month=03&Particulars=Illegal+Mining'>0</a></td><td><a href='violationinventory.php?year=2018&month=04&Particulars=Illegal+Mining'>0</a></td><td><a href='violationinventory.php?year=2018&month=05&Particulars=Illegal+Mining'>0</a></td><td><a href='violationinventory.php?year=2018&month=06&Particulars=Illegal+Mining'>0</a></td><td><a href='violationinventory.php?year=2018&month=07&Particulars=Illegal+Mining'>0</a></td><td><a href='violationinventory.php?year=2018&month=08&Particulars=Illegal+Mining'>0</a></td><td><a href='violationinventory.php?year=2018&month=09&Particulars=Illegal+Mining'>0</a></td><td><a href='violationinventory.php?year=2018&month=10&Particulars=Illegal+Mining'>0</a></td><td><a href='violationinventory.php?year=2018&month=11&Particulars=Illegal+Mining'>0</a></td><td><a href='violationinventory.php?year=2018&month=12&Particulars=Illegal+Mining'>0</a></td><td>0</td></tr><tr><td>Illegal Recruitment</td><td><a href='violationinventory.php?year=2018&month=01&Particulars=Illegal+Recruitment'>0</a></td><td><a href='violationinventory.php?year=2018&month=02&Particulars=Illegal+Recruitment'>0</a></td><td><a href='violationinventory.php?year=2018&month=03&Particulars=Illegal+Recruitment'>0</a></td><td><a href='violationinventory.php?year=2018&month=04&Particulars=Illegal+Recruitment'>0</a></td><td><a href='violationinventory.php?year=2018&month=05&Particulars=Illegal+Recruitment'>0</a></td><td><a href='violationinventory.php?year=2018&month=06&Particulars=Illegal+Recruitment'>1</a></td><td><a href='violationinventory.php?year=2018&month=07&Particulars=Illegal+Recruitment'>0</a></td><td><a href='violationinventory.php?year=2018&month=08&Particulars=Illegal+Recruitment'>0</a></td><td><a href='violationinventory.php?year=2018&month=09&Particulars=Illegal+Recruitment'>0</a></td><td><a href='violationinventory.php?year=2018&month=10&Particulars=Illegal+Recruitment'>0</a></td><td><a href='violationinventory.php?year=2018&month=11&Particulars=Illegal+Recruitment'>0</a></td><td><a href='violationinventory.php?year=2018&month=12&Particulars=Illegal+Recruitment'>0</a></td><td>1</td></tr><tr><td>Intellectual Property Rights Violation</td><td><a href='violationinventory.php?year=2018&month=01&Particulars=Intellectual+Property+Rights+Violation'>0</a></td><td><a href='violationinventory.php?year=2018&month=02&Particulars=Intellectual+Property+Rights+Violation'>0</a></td><td><a href='violationinventory.php?year=2018&month=03&Particulars=Intellectual+Property+Rights+Violation'>0</a></td><td><a href='violationinventory.php?year=2018&month=04&Particulars=Intellectual+Property+Rights+Violation'>0</a></td><td><a href='violationinventory.php?year=2018&month=05&Particulars=Intellectual+Property+Rights+Violation'>0</a></td><td><a href='violationinventory.php?year=2018&month=06&Particulars=Intellectual+Property+Rights+Violation'>0</a></td><td><a href='violationinventory.php?year=2018&month=07&Particulars=Intellectual+Property+Rights+Violation'>0</a></td><td><a href='violationinventory.php?year=2018&month=08&Particulars=Intellectual+Property+Rights+Violation'>0</a></td><td><a href='violationinventory.php?year=2018&month=09&Particulars=Intellectual+Property+Rights+Violation'>0</a></td><td><a href='violationinventory.php?year=2018&month=10&Particulars=Intellectual+Property+Rights+Violation'>0</a></td><td><a href='violationinventory.php?year=2018&month=11&Particulars=Intellectual+Property+Rights+Violation'>0</a></td><td><a href='violationinventory.php?year=2018&month=12&Particulars=Intellectual+Property+Rights+Violation'>0</a></td><td>0</td></tr><tr><td>Internal Revenue Code Violation</td><td><a href='violationinventory.php?year=2018&month=01&Particulars=Internal+Revenue+Code+Violation'>0</a></td><td><a href='violationinventory.php?year=2018&month=02&Particulars=Internal+Revenue+Code+Violation'>0</a></td><td><a href='violationinventory.php?year=2018&month=03&Particulars=Internal+Revenue+Code+Violation'>0</a></td><td><a href='violationinventory.php?year=2018&month=04&Particulars=Internal+Revenue+Code+Violation'>0</a></td><td><a href='violationinventory.php?year=2018&month=05&Particulars=Internal+Revenue+Code+Violation'>0</a></td><td><a href='violationinventory.php?year=2018&month=06&Particulars=Internal+Revenue+Code+Violation'>0</a></td><td><a href='violationinventory.php?year=2018&month=07&Particulars=Internal+Revenue+Code+Violation'>0</a></td><td><a href='violationinventory.php?year=2018&month=08&Particulars=Internal+Revenue+Code+Violation'>0</a></td><td><a href='violationinventory.php?year=2018&month=09&Particulars=Internal+Revenue+Code+Violation'>0</a></td><td><a href='violationinventory.php?year=2018&month=10&Particulars=Internal+Revenue+Code+Violation'>0</a></td><td><a href='violationinventory.php?year=2018&month=11&Particulars=Internal+Revenue+Code+Violation'>0</a></td><td><a href='violationinventory.php?year=2018&month=12&Particulars=Internal+Revenue+Code+Violation'>0</a></td><td>0</td></tr><tr><td>Kidnapping</td><td><a href='violationinventory.php?year=2018&month=01&Particulars=Kidnapping'>0</a></td><td><a href='violationinventory.php?year=2018&month=02&Particulars=Kidnapping'>0</a></td><td><a href='violationinventory.php?year=2018&month=03&Particulars=Kidnapping'>0</a></td><td><a href='violationinventory.php?year=2018&month=04&Particulars=Kidnapping'>0</a></td><td><a href='violationinventory.php?year=2018&month=05&Particulars=Kidnapping'>0</a></td><td><a href='violationinventory.php?year=2018&month=06&Particulars=Kidnapping'>0</a></td><td><a href='violationinventory.php?year=2018&month=07&Particulars=Kidnapping'>0</a></td><td><a href='violationinventory.php?year=2018&month=08&Particulars=Kidnapping'>0</a></td><td><a href='violationinventory.php?year=2018&month=09&Particulars=Kidnapping'>0</a></td><td><a href='violationinventory.php?year=2018&month=10&Particulars=Kidnapping'>0</a></td><td><a href='violationinventory.php?year=2018&month=11&Particulars=Kidnapping'>0</a></td><td><a href='violationinventory.php?year=2018&month=12&Particulars=Kidnapping'>0</a></td><td>0</td></tr><tr><td>Murder</td><td><a href='violationinventory.php?year=2018&month=01&Particulars=Murder'>0</a></td><td><a href='violationinventory.php?year=2018&month=02&Particulars=Murder'>0</a></td><td><a href='violationinventory.php?year=2018&month=03&Particulars=Murder'>0</a></td><td><a href='violationinventory.php?year=2018&month=04&Particulars=Murder'>0</a></td><td><a href='violationinventory.php?year=2018&month=05&Particulars=Murder'>0</a></td><td><a href='violationinventory.php?year=2018&month=06&Particulars=Murder'>0</a></td><td><a href='violationinventory.php?year=2018&month=07&Particulars=Murder'>0</a></td><td><a href='violationinventory.php?year=2018&month=08&Particulars=Murder'>0</a></td><td><a href='violationinventory.php?year=2018&month=09&Particulars=Murder'>0</a></td><td><a href='violationinventory.php?year=2018&month=10&Particulars=Murder'>0</a></td><td><a href='violationinventory.php?year=2018&month=11&Particulars=Murder'>0</a></td><td><a href='violationinventory.php?year=2018&month=12&Particulars=Murder'>0</a></td><td>0</td></tr><tr><td>Rape</td><td><a href='violationinventory.php?year=2018&month=01&Particulars=Rape'>0</a></td><td><a href='violationinventory.php?year=2018&month=02&Particulars=Rape'>0</a></td><td><a href='violationinventory.php?year=2018&month=03&Particulars=Rape'>0</a></td><td><a href='violationinventory.php?year=2018&month=04&Particulars=Rape'>0</a></td><td><a href='violationinventory.php?year=2018&month=05&Particulars=Rape'>0</a></td><td><a href='violationinventory.php?year=2018&month=06&Particulars=Rape'>1</a></td><td><a href='violationinventory.php?year=2018&month=07&Particulars=Rape'>1</a></td><td><a href='violationinventory.php?year=2018&month=08&Particulars=Rape'>0</a></td><td><a href='violationinventory.php?year=2018&month=09&Particulars=Rape'>0</a></td><td><a href='violationinventory.php?year=2018&month=10&Particulars=Rape'>0</a></td><td><a href='violationinventory.php?year=2018&month=11&Particulars=Rape'>0</a></td><td><a href='violationinventory.php?year=2018&month=12&Particulars=Rape'>0</a></td><td>2</td></tr><tr><td>Rebellion</td><td><a href='violationinventory.php?year=2018&month=01&Particulars=Rebellion'>0</a></td><td><a href='violationinventory.php?year=2018&month=02&Particulars=Rebellion'>0</a></td><td><a href='violationinventory.php?year=2018&month=03&Particulars=Rebellion'>0</a></td><td><a href='violationinventory.php?year=2018&month=04&Particulars=Rebellion'>0</a></td><td><a href='violationinventory.php?year=2018&month=05&Particulars=Rebellion'>0</a></td><td><a href='violationinventory.php?year=2018&month=06&Particulars=Rebellion'>0</a></td><td><a href='violationinventory.php?year=2018&month=07&Particulars=Rebellion'>0</a></td><td><a href='violationinventory.php?year=2018&month=08&Particulars=Rebellion'>0</a></td><td><a href='violationinventory.php?year=2018&month=09&Particulars=Rebellion'>0</a></td><td><a href='violationinventory.php?year=2018&month=10&Particulars=Rebellion'>0</a></td><td><a href='violationinventory.php?year=2018&month=11&Particulars=Rebellion'>0</a></td><td><a href='violationinventory.php?year=2018&month=12&Particulars=Rebellion'>0</a></td><td>0</td></tr><tr><td>Roberry</td><td><a href='violationinventory.php?year=2018&month=01&Particulars=Roberry'>0</a></td><td><a href='violationinventory.php?year=2018&month=02&Particulars=Roberry'>0</a></td><td><a href='violationinventory.php?year=2018&month=03&Particulars=Roberry'>0</a></td><td><a href='violationinventory.php?year=2018&month=04&Particulars=Roberry'>0</a></td><td><a href='violationinventory.php?year=2018&month=05&Particulars=Roberry'>0</a></td><td><a href='violationinventory.php?year=2018&month=06&Particulars=Roberry'>0</a></td><td><a href='violationinventory.php?year=2018&month=07&Particulars=Roberry'>0</a></td><td><a href='violationinventory.php?year=2018&month=08&Particulars=Roberry'>0</a></td><td><a href='violationinventory.php?year=2018&month=09&Particulars=Roberry'>0</a></td><td><a href='violationinventory.php?year=2018&month=10&Particulars=Roberry'>0</a></td><td><a href='violationinventory.php?year=2018&month=11&Particulars=Roberry'>0</a></td><td><a href='violationinventory.php?year=2018&month=12&Particulars=Roberry'>0</a></td><td>0</td></tr><tr><td>Smuggling</td><td><a href='violationinventory.php?year=2018&month=01&Particulars=Smuggling'>0</a></td><td><a href='violationinventory.php?year=2018&month=02&Particulars=Smuggling'>0</a></td><td><a href='violationinventory.php?year=2018&month=03&Particulars=Smuggling'>0</a></td><td><a href='violationinventory.php?year=2018&month=04&Particulars=Smuggling'>0</a></td><td><a href='violationinventory.php?year=2018&month=05&Particulars=Smuggling'>0</a></td><td><a href='violationinventory.php?year=2018&month=06&Particulars=Smuggling'>0</a></td><td><a href='violationinventory.php?year=2018&month=07&Particulars=Smuggling'>0</a></td><td><a href='violationinventory.php?year=2018&month=08&Particulars=Smuggling'>0</a></td><td><a href='violationinventory.php?year=2018&month=09&Particulars=Smuggling'>0</a></td><td><a href='violationinventory.php?year=2018&month=10&Particulars=Smuggling'>0</a></td><td><a href='violationinventory.php?year=2018&month=11&Particulars=Smuggling'>0</a></td><td><a href='violationinventory.php?year=2018&month=12&Particulars=Smuggling'>0</a></td><td>0</td></tr><tr><td>Terrorism</td><td><a href='violationinventory.php?year=2018&month=01&Particulars=Terrorism'>0</a></td><td><a href='violationinventory.php?year=2018&month=02&Particulars=Terrorism'>0</a></td><td><a href='violationinventory.php?year=2018&month=03&Particulars=Terrorism'>0</a></td><td><a href='violationinventory.php?year=2018&month=04&Particulars=Terrorism'>0</a></td><td><a href='violationinventory.php?year=2018&month=05&Particulars=Terrorism'>0</a></td><td><a href='violationinventory.php?year=2018&month=06&Particulars=Terrorism'>0</a></td><td><a href='violationinventory.php?year=2018&month=07&Particulars=Terrorism'>1</a></td><td><a href='violationinventory.php?year=2018&month=08&Particulars=Terrorism'>0</a></td><td><a href='violationinventory.php?year=2018&month=09&Particulars=Terrorism'>0</a></td><td><a href='violationinventory.php?year=2018&month=10&Particulars=Terrorism'>0</a></td><td><a href='violationinventory.php?year=2018&month=11&Particulars=Terrorism'>0</a></td><td><a href='violationinventory.php?year=2018&month=12&Particulars=Terrorism'>0</a></td><td>1</td></tr><tr><td>Theft</td><td><a href='violationinventory.php?year=2018&month=01&Particulars=Theft'>0</a></td><td><a href='violationinventory.php?year=2018&month=02&Particulars=Theft'>0</a></td><td><a href='violationinventory.php?year=2018&month=03&Particulars=Theft'>0</a></td><td><a href='violationinventory.php?year=2018&month=04&Particulars=Theft'>0</a></td><td><a href='violationinventory.php?year=2018&month=05&Particulars=Theft'>0</a></td><td><a href='violationinventory.php?year=2018&month=06&Particulars=Theft'>2</a></td><td><a href='violationinventory.php?year=2018&month=07&Particulars=Theft'>0</a></td><td><a href='violationinventory.php?year=2018&month=08&Particulars=Theft'>0</a></td><td><a href='violationinventory.php?year=2018&month=09&Particulars=Theft'>0</a></td><td><a href='violationinventory.php?year=2018&month=10&Particulars=Theft'>0</a></td><td><a href='violationinventory.php?year=2018&month=11&Particulars=Theft'>0</a></td><td><a href='violationinventory.php?year=2018&month=12&Particulars=Theft'>0</a></td><td>2</td></tr><tr><td>Trafficking in Persons</td><td><a href='violationinventory.php?year=2018&month=01&Particulars=Trafficking+in+Persons'>0</a></td><td><a href='violationinventory.php?year=2018&month=02&Particulars=Trafficking+in+Persons'>0</a></td><td><a href='violationinventory.php?year=2018&month=03&Particulars=Trafficking+in+Persons'>0</a></td><td><a href='violationinventory.php?year=2018&month=04&Particulars=Trafficking+in+Persons'>0</a></td><td><a href='violationinventory.php?year=2018&month=05&Particulars=Trafficking+in+Persons'>0</a></td><td><a href='violationinventory.php?year=2018&month=06&Particulars=Trafficking+in+Persons'>0</a></td><td><a href='violationinventory.php?year=2018&month=07&Particulars=Trafficking+in+Persons'>1</a></td><td><a href='violationinventory.php?year=2018&month=08&Particulars=Trafficking+in+Persons'>0</a></td><td><a href='violationinventory.php?year=2018&month=09&Particulars=Trafficking+in+Persons'>0</a></td><td><a href='violationinventory.php?year=2018&month=10&Particulars=Trafficking+in+Persons'>0</a></td><td><a href='violationinventory.php?year=2018&month=11&Particulars=Trafficking+in+Persons'>0</a></td><td><a href='violationinventory.php?year=2018&month=12&Particulars=Trafficking+in+Persons'>0</a></td><td>1</td></tr><tr><td>Violation Against Women</td><td><a href='violationinventory.php?year=2018&month=01&Particulars=Violation+Against+Women'>0</a></td><td><a href='violationinventory.php?year=2018&month=02&Particulars=Violation+Against+Women'>0</a></td><td><a href='violationinventory.php?year=2018&month=03&Particulars=Violation+Against+Women'>0</a></td><td><a href='violationinventory.php?year=2018&month=04&Particulars=Violation+Against+Women'>0</a></td><td><a href='violationinventory.php?year=2018&month=05&Particulars=Violation+Against+Women'>0</a></td><td><a href='violationinventory.php?year=2018&month=06&Particulars=Violation+Against+Women'>0</a></td><td><a href='violationinventory.php?year=2018&month=07&Particulars=Violation+Against+Women'>1</a></td><td><a href='violationinventory.php?year=2018&month=08&Particulars=Violation+Against+Women'>0</a></td><td><a href='violationinventory.php?year=2018&month=09&Particulars=Violation+Against+Women'>0</a></td><td><a href='violationinventory.php?year=2018&month=10&Particulars=Violation+Against+Women'>0</a></td><td><a href='violationinventory.php?year=2018&month=11&Particulars=Violation+Against+Women'>0</a></td><td><a href='violationinventory.php?year=2018&month=12&Particulars=Violation+Against+Women'>0</a></td><td>1</td></tr><tr><td>Violation of Child Protection Laws</td><td><a href='violationinventory.php?year=2018&month=01&Particulars=Violation+of+Child+Protection+Laws'>0</a></td><td><a href='violationinventory.php?year=2018&month=02&Particulars=Violation+of+Child+Protection+Laws'>0</a></td><td><a href='violationinventory.php?year=2018&month=03&Particulars=Violation+of+Child+Protection+Laws'>0</a></td><td><a href='violationinventory.php?year=2018&month=04&Particulars=Violation+of+Child+Protection+Laws'>0</a></td><td><a href='violationinventory.php?year=2018&month=05&Particulars=Violation+of+Child+Protection+Laws'>0</a></td><td><a href='violationinventory.php?year=2018&month=06&Particulars=Violation+of+Child+Protection+Laws'>1</a></td><td><a href='violationinventory.php?year=2018&month=07&Particulars=Violation+of+Child+Protection+Laws'>0</a></td><td><a href='violationinventory.php?year=2018&month=08&Particulars=Violation+of+Child+Protection+Laws'>0</a></td><td><a href='violationinventory.php?year=2018&month=09&Particulars=Violation+of+Child+Protection+Laws'>0</a></td><td><a href='violationinventory.php?year=2018&month=10&Particulars=Violation+of+Child+Protection+Laws'>0</a></td><td><a href='violationinventory.php?year=2018&month=11&Particulars=Violation+of+Child+Protection+Laws'>0</a></td><td><a href='violationinventory.php?year=2018&month=12&Particulars=Violation+of+Child+Protection+Laws'>0</a></td><td>1</td></tr></tbody></table> 
    

</div>
    

</div> <!-- End main -->
     
</body>

</html>