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
        <a href="prosecutor.php"><img src="Images/prosecutors_icon.png">PROSECUTOR</a>
        <a href="encoder.php"style="border-top: 0.1px solid #607d8b;border-bottom: 0.1px solid #607d8b;;font-weight:bold;color:#607d8b;background-color:#e6faff;box-shadow:2px 2px 8px -4px  black"><img src="Images/prosecutors_icon.png">ENCODER</a>
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

    
<div class="w3-container w3-white w3-card" style="margin: 0px 10px 0px 50px;padding:0px;">
      
    <div class="w3-half" style="border-right:1px solid lightgrey;">
        <?php
        require_once 'config.php';

        $sql = "SELECT a.en_id, a.encoder_name,COUNT(b.encoder) AS INQUEST FROM encoder_table a LEFT JOIN inquest_table b ON a.encoder_name = b.encoder GROUP BY a.en_id";
        
        $sql1 = "SELECT a.en_id, a.encoder_name,COUNT(c.encoder) AS INVESTIGATION FROM encoder_table a 
        LEFT JOIN investigation_table c ON a.encoder_name = c.encoder GROUP BY a.en_id";

        $res = mysqli_query($con, $sql);
        $res1 = mysqli_query($con, $sql1);


        echo "<table id='myTable' class='w3-hoverable mytable' align='center'>";
        echo "<thread>";
            echo "<tr id='tableHeader' class='w3-blue-grey'>";
                    echo"<th>"."ENCODER'S NAME"."</th>";
                    echo"<th>"."INQUEST"."</th>";
                    echo"<th>"."INVESTIGATION"."</th>";

            echo "</tr>";
            echo "</thread>";
            echo "<tbody>";

           if(mysqli_num_rows($res) != 0){
                while($row=mysqli_fetch_array($res))
            {
                $row1 = mysqli_fetch_array($res1);
                    echo "<tr onclick=\"window.location='"."encoder.php?id={$row['encoder_name']}"."'\">";
                    echo "<td>" . $row['encoder_name'] . "</td>";
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
            $encoder = $_GET['id'];
            
            echo"<h2>".$encoder."</h2>";
            echo"<br>";
                
            $sql = "SELECT * FROM inquest_table Where encoder='$encoder'";
            $sql1 = "SELECT * FROM investigation_table Where encoder='$encoder'";
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
                 echo "<tr onclick=\"window.location='"."viewencoderinquest.php?id={$row['id']}"."'\">";
                    echo "<td>" . $row['npsdocketnumber'] . "</td>";
                    echo "<td class='status'>"  .$row['status'] . "</td>";
                    echo "</tr>";
            }
            echo"    </tbody>";
            echo"</table>";
            echo"    </tbody>";
            echo"</table>";
            
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
                echo "<tr onclick=\"window.location='"."viewencoderinvestigation.php?id={$row['id']}"."'\">";
                    echo "<td>" . $row['npsdocketnumber'] . "</td>";
                    echo "<td class='status'>"  .$row['status'] . "</td>";
                    echo "</tr>";
            }
            echo"    </tbody>";
            echo"</table>";
            echo"    </tbody>";
            echo"</table>";
            
            mysqli_free_result($result);
            }else{
                    echo"<div class='w3-container w3-border w3-border-grey'><h6>No Investigation Record Handled</h6></div>";
                }    
                
                
            }
        }
        }else{
            echo"<h3 align='center'>Select Encoder</h3>";
        }
        
        ?>
        
    </div>
</div>
    
<br>

</div> <!-- End main -->

</body>

</html>