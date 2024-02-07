<?php date_default_timezone_set("Asia/Manila"); 

session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
 
}
?>
<!DOCTYPE html>
<html>
<title>PROSECUTOR</title>

    
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
  
      <header class="w3-container w3-blue-grey headings nopadding" align="center">
          <a href="home.php" ><h4 style="font-size:1.5vw;">DOCKET SYSTEM</h4></a>
        </header>
  
    <div class="menu">	
        <a href="inquest.php" ><img src="Images/inquest_investigation_icon_t.png">INQUEST</a> 
        <a href="investigation.php" ><img src="Images/inquest_investigation_icon_t.png">INVESTIGATION</a>
        <a href="prosecutor.php" class="navactive"><img src="Images/prosecutors_icon.png">PROSECUTOR</a>
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
        <header class="w3-container w3-blue-grey headings" style="position:fixed;right:0;width:100%;">
            <p style="float: right">Welcome:&nbsp <?php echo $_SESSION['username']; ?>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
            <?php echo "Date: " . date("Y/m/d")." " . date("l");?> &nbsp <a href="logout.php">[LOG-OUT]</a></p>
        </header>
        <br>
    
<?php

    require_once 'config.php';
    
        $date=date("Y");
        
        $sql = "SELECT a.pros_id, a.pros_name,COUNT(b.resolvedby) AS INQUEST FROM prostecutors_table a LEFT JOIN inquest_table b ON a.pros_name = b.resolvedby AND YEAR(b.dateassigned) = '$date' GROUP BY a.pros_id";
        
        $sql1 = "SELECT a.pros_id, a.pros_name,COUNT(c.resolvedby) AS INVESTIGATION FROM prostecutors_table a 
        LEFT JOIN investigation_table c ON a.pros_name = c.resolvedby AND YEAR(c.dateassigned) = '$date' GROUP BY a.pros_id";

        $res = mysqli_query($con, $sql);
        $res1 = mysqli_query($con, $sql1);
    
    if(isset($_POST['setbtn'])){
        
        $date = $_POST['setyear'];
        
        $sql = "SELECT a.pros_id, a.pros_name,COUNT(b.resolvedby) AS INQUEST FROM prostecutors_table a LEFT JOIN inquest_table b ON a.pros_name = b.resolvedby AND YEAR(b.dateassigned) = '$date' GROUP BY a.pros_id";
        
        $sql1 = "SELECT a.pros_id, a.pros_name,COUNT(c.resolvedby) AS INVESTIGATION FROM prostecutors_table a 
        LEFT JOIN investigation_table c ON a.pros_name = c.resolvedby AND YEAR(c.dateassigned) = '$date' GROUP BY a.pros_id";

        $res = mysqli_query($con, $sql);
        $res1 = mysqli_query($con, $sql1);
        
    }
    
    if(isset($_GET['date'])){
        
        $date = $_GET['date'];
        
        $sql = "SELECT a.pros_id, a.pros_name,COUNT(b.resolvedby) AS INQUEST FROM prostecutors_table a LEFT JOIN inquest_table b ON a.pros_name = b.resolvedby AND YEAR(b.dateassigned) = '$date' GROUP BY a.pros_id";
        
        $sql1 = "SELECT a.pros_id, a.pros_name,COUNT(c.resolvedby) AS INVESTIGATION FROM prostecutors_table a 
        LEFT JOIN investigation_table c ON a.pros_name = c.resolvedby AND YEAR(c.dateassigned) = '$date' GROUP BY a.pros_id";

        $res = mysqli_query($con, $sql);
        $res1 = mysqli_query($con, $sql1);
        
    }
    
?>    

    
<div class="w3-container w3-white w3-card" style="margin: 50px 10px 0px 50px;padding:0px;">
      
    <div class="w3-half" style="border-right:1px solid lightgrey;">
        
        <div class="w3-container w3-padding">
            <form action="prosecutor.php" method="post">
                <select style='border:none;height:30px;font-size:20px;' name='setyear'>
                    <option value="<?php echo $date;?>"><?php echo $date;?></option>
                    <option value='2015'>2015</option>
                    <option value='2016'>2016</option>
                    <option value='2017'>2017</option>
                    <option value='2018'>2018</option>
                    <option value='2019'>2019</option>
                    <option value='2020'>2020</option>
                    <option value='2021'>2021</option>
                    <option value='2022'>2022</option>
                    <option value='2023'>2023</option>
                    <option value='2024'>2024</option>
                    <option value='2025'>2025</option>
                </select>
                &nbsp
                <input class='w3-white w3-large w3-text-blue-grey w3-hover-text-blue' style='border:none;text-decoration:underline;' type='submit' name='setbtn' value='Set'>
                
            </form>
        </div>
        
        <?php

        
        
        echo "<table id='myTable' class='w3-hoverable mytable' align='center'>";
        echo "<thread>";
            echo "<tr id='tableHeader' class='w3-blue-grey'>";
                    echo"<th>"."PROSECUTORS NAME"."</th>";
                    echo"<th>"."INQUEST"."</th>";
                    echo"<th>"."INVESTIGATION"."</th>";

            echo "</tr>";
            echo "</thread>";
            echo "<tbody>";

           if(mysqli_num_rows($res) != 0){
                while($row=mysqli_fetch_array($res))
            {   
                $row1 = mysqli_fetch_array($res1);
                    echo "<tr onclick=\"window.location='"."prosecutor.php?id={$row['pros_name']}&date=$date"."'\">";
                    echo "<td>" . $row['pros_name'] . "</td>";
                    echo "<td>" . $row['INQUEST'] . "</td>";
                    echo "<td>" . $row1['INVESTIGATION'] ."</td>";

                    echo "</tr>";
            }
            echo"    </tbody>";
            echo"</table>";
            echo"    </tbody>";
            echo"</table>";

        } else {
             echo "No records are found.";
        }
         ?>
    </div>
    
    <div class="w3-half w3-padding w3-responsive" style="height:100%;">
        
        <?php 
        
        if(isset($_GET['id'])){
            $prosecutor = $_GET['id'];
            
            echo"<h2>".$prosecutor."</h2>";
            echo"<br>";
                
            $sql = "SELECT * FROM inquest_table Where resolvedby='$prosecutor' AND YEAR(dateassigned)='$date' ORDER BY datefile DESC LIMIT 5";
            $sql1 = "SELECT * FROM investigation_table Where resolvedby='$prosecutor' AND YEAR(dateassigned)='$date' ORDER BY datefile DESC LIMIT 5";
            if($result = mysqli_query($con, $sql)){
                if(mysqli_num_rows($result) > 0){

                
                echo "<table id='myTable1' class='w3-border w3-hoverable mytable'>";
                echo "<thread>";
                echo "<tr id='tableHeader' class='w3-blue-grey'>";
                echo "<th colspan='2' style='text-align:center;'>INQUEST</th>";
                    
                echo "</tr>";
                echo "</thread>";
                echo "<tbody>";
                while($row = mysqli_fetch_array($result)){
                 echo "<tr onclick=\"window.location='"."viewprosinquest.php?id={$row['id']}"."'\">";
                    echo "<td>" . $row['npsdocketnumber'] . "</td>";
                    echo "<td class='status'>"  .$row['status'] . "</td>";
                    echo "</tr>";
            }
            echo"    </tbody>";
            echo"</table>";
            echo"    </tbody>";
            echo"</table>";
                    echo "<div class='w3-padding' align='right'><a  class='w3-text-blue-grey w3-hover-text-black' href='seeallinquest.php?id=$prosecutor&page=prosecutor'>See All ></a></div>";
            
            mysqli_free_result($result);
            }else{
                    echo"<div class='w3-container w3-border w3-border-grey'><h6>No Inquest Record Handled</h6></div>";
                }
                
            echo"<br><br>";
                
            if($result = mysqli_query($con, $sql1)){
                if(mysqli_num_rows($result) > 0){


                echo "<table id='myTable1' class='w3-border w3-hoverable mytable'>";
                echo "<thread>";
                echo "<tr id='tableHeader' class='w3-blue-grey'>";
                echo "<th colspan='2' style='text-align:center;'>INVESTIGATION</th>";
                   
                echo "</tr>";
                echo "</thread>";
                echo "<tbody>";
                while($row = mysqli_fetch_array($result)){
                echo "<tr onclick=\"window.location='"."viewprosinvestigation.php?id={$row['id']}"."'\">";
                    echo "<td>" . $row['npsdocketnumber'] . "</td>";
                    echo "<td class='status'>"  .$row['status'] . "</td>";
                    echo "</tr>";
            }
            echo"    </tbody>";
            echo"</table>";
            echo"    </tbody>";
            echo"</table>";
                
            echo "<div class='w3-padding' align='right'><a class='w3-text-blue-grey w3-hover-text-black' href='seeallinvestigation.php?id=$prosecutor&page=prosecutor'>See All ></a></div>";
                    
            mysqli_free_result($result);
            }else{
                    echo"<div class='w3-container w3-border w3-border-grey'><h6>No Investigation Record Handled</h6></div>";
                }    
                
                
            }
        }
        }else{
            echo"<h3 align='center'>Please select a prosecutor</h3>";
        }
        
        ?>
        
    </div>
</div>
    
<br>

</div> <!-- End main -->

</body>

</html>