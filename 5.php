<?php 
session_start();
if(!isset($_SESSION['login'])){
    header('Location: login.html');
}
?>
<!DOCTYPE HTML>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="css/main.css">
            <title>Clients Report</title>
            
            <style>
                .count-box{
                    border:2px solid #8B110C;
                    padding: 20px;
                    border-radius: 6px;
                    background-color: #F3D3BE;
                    width: 40%;
                }
                .count-label{
                    font-size: 16px;
                    padding: 12px;
                }
                .count-show{
                    color: #8B110C;
                }
                .table-label{
                    margin-top: 40px;
                }
                .tabular-section .table-1, .tabular-section .table-2{
                    width: 70%;
                    margin: auto;
                    margin-top: 10px;
                }
                .table-1 th, .table-2 th {
                    background-color: rgba(150, 33, 23, 0.85);
                    color: white;
                }
                
            </style>
        </head>
        
        <body>
            <!--Header Section-->
            <div class="top-header">
                <h4>MBADIFA SACCO RECORDS MANAGEMENT SYSTEM</h4>    
            </div>
            <!--End of Header Section-->
            
            <!--Navigation Section-->            
            <ul class="nav-section">
                <li><a href="index.php" class="nav-buttons home">Home</a></li>    
                <li><div class="current-section">Clients' Report</div></li>
                <li><a href="logout.php" class="nav-buttons logout">Logout</a></li>
                
            </ul>
            <div class="clr"></div>
            <!--End of Navigation Section-->
            
            
            <!--Body Container-->
            <div class="container">
                <!--Clients Count-->
                <div class="count-box">
                    <?php
                    $connection = new mysqli("localhost","root","","project");
                    $sql = "SELECT * FROM clients";
                    $sql1 = "SELECT * FROM loans";
                    $sql2 = "SELECT * FROM clients WHERE userId NOT IN (SELECT userId FROM loans)";

                    $result = $connection->query($sql);
                    $result1 = $connection->query($sql1);
                    $result2 = $connection->query($sql2);
                    echo(mysqli_error($connection));

                    $loans = $result1->num_rows;
                    $Total = $result->num_rows;
                    $Noloans = $Total - $loans;
                    if(true){

                    $connection->close();                  
                    ?>
                    <p class="count-label">Total Number of Clients with Loans:<?php echo($loans);?> <span class="count-show"></span></p>
                    <p class="count-label">Total Number of Clients without Loans:<?php echo($Noloans);?> <span class="count-show"></span></p>
                    <p class="count-label">Overall Total:<?php echo($Total);?> <span class="count-show"></span></p>
                </div>
                <!--End of Clients Count-->
                
                <div class="tabular-section">
                    <!--Loaned Clients Display-->
                    <p class="table-label">Loaned Clients</p>
                    <hr>
                    <table class="table-1">
                        <tr>
                            <th>Client ID</th>
                            <th>Full Name</th>
                            <th>View Loan Details</th>
                        </tr>

                         
                        <?php 
                        
                    
                        if($result1->num_rows>0){
                            while($row = $result1->fetch_assoc()){
                               echo "<tr> <td>".$row['userId']."</td><td>".$row['firstName']." ".$row['Othernames']."</td><td><a href='6.php?userId=".$row['userId']."'>more info</a></td> </tr>";
                            }
                        } 

                            ?>

                       
                        <tr>  
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                    
                    <p class="table-label">Debtless Clients</p>
                    <hr>
                    <table class="table-2">
                        <tr>
                            <th>Client ID</th>
                            <th>Full Name</th>
                            <th>Current Savings</th>
                        </tr>
                        <?php 
                        
                    
                        if($result2->num_rows>0){
                            while($row = $result2->fetch_assoc()){
                               echo "<tr> <td>".$row['userId']."</td><td>".$row['firstName']." ".$row['Othernames']."</td><td></td> </tr>";
                            }
                        } 
                    }
                            ?>
                        <tr>  
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                    <!--End of Loaned Clients Display-->
                </div>
                
            </div>
            <!--End of Body Container-->
        </body>
        
    </html>