
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
tr:hover {background-color: #b3b3b3} 
/* End of Table CSS*/
a{text-decoration:none;}
.left{
    float:left;
    }
.right{
    float:right;
    }   
    .headercontent{
        margin-left: 15%;
        margin-right:15% ;
    }    
</style>
<body>
    <center>

 <div class="header">
     <br><br>
        <div class="headercontent">
        <img src="Images/d.png" height=150 width=150  class="left">  
        <img src="Images/DOJ_Davao.png" height=150 width=150 class="right">
            <h4>Republic of the Philippines<br>Department of Justice</h4>
        <h3>OFFICE OF THE CITY PROSECUTOR</h3>
        <h6>CITY OF DAVAO</h6>
        </div>  <br><br>
     
<?php
    
    require_once 'config.php';
 $date=date("Y");   
 
echo "<center>";

	if((isset($_GET['year']))){
			$year=$_GET['year'];
            $selectedRadio=$_GET['radio'];
			if($selectedRadio == 'all'){
				echo "<h2>".$year."&nbspINVENTORY"."</h2>";		
				$sql = "CALL violationinvent('$year')";
				$result = mysqli_query($con,$sql);
	}
	if($selectedRadio == 'investigation'){
				echo "<h2>".$year." INVESTIGATION INVENTORY"."</h2>";				
				$sql = "CALL Investigationinvent('$year')";
				$result = mysqli_query($con,$sql);
	}
	if($selectedRadio == 'inquest'){
				echo "<h2>".$year."&nbsp INQUEST &nbspINVENTORY"."</h2>";				
				$sql = "CALL Inquestinvent('$year')";
				$result = mysqli_query($con,$sql);
	}
			}
			
    echo"<table id='myTable'>";
    echo"<thread>";
    echo"<tr id='tableHeader' class='w3-blue-grey'>";
    echo"<th>"."Particulars"."</th>";
    echo"<th>"."January"."</th>";
    echo"<th>"."February"."</th>";
    echo"<th>"."March"."</th>";
    echo"<th>"."April"."</th>";
    echo"<th>"."May"."</th>";
    echo"<th>"."June"."</th>";
    echo"<th>"."July"."</th>";
    echo"<th>"."August"."</th>";
    echo"<th>"."September"."</th>";
    echo"<th>"."October"."</th>";
    echo"<th>"."November"."</th>";
    echo"<th>"."December"."</th>";
    echo"<th>"."TOTAL"."</th>";
    echo"</tr>";
    echo"</thread>";
    echo"<tbody>";
        while($row = mysqli_fetch_assoc($result)) :
        echo "<tr>";
        echo "<td>".$row['Particulars']."</td>";
        echo "<td>".$row['January']."</td>";
        echo "<td>".$row['February']."</td>";
        echo "<td>".$row['March']."</td>";
        echo "<td>".$row['April']."</td>";
        echo "<td>".$row['May']."</td>";
        echo "<td>".$row['June']."</td>";
        echo "<td>".$row['July']."</td>";
        echo "<td>".$row['August']."</td>";
        echo "<td>".$row['September']."</td>";
        echo "<td>".$row['October']."</td>";
        echo "<td>".$row['November']."</td>";
        echo "<td>".$row['December']."</td>";
		/*computing a total of the row*/
        $total=$row['January']+$row['February']+$row['March']+$row['April']+$row['May']+$row['June']+$row['July']+$row['August']+$row['September']+$row['October']+$row['November']+$row['December'];		
        echo "<td>".$total."</td>";        
   
        echo "</tr>";
        endwhile;
    echo "</tbody>";
    echo "</table>";

       ?>
 
    
     </center>
</div>
    

</div> <!-- End main -->
     
</body>

</html>

<script>
window.print();
</script>