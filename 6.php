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
            <title>Client Loan Details</title>
            <link rel="stylesheet" type="text/css" href="css/main.css">
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
                    
                    <li><div class="current-section">Client's Loan Details</div></li>
                    <li><a href="logout.php" class="nav-buttons logout">Logout</a></li>
                    
                </ul>
                <div class="clr"></div>
            <!--End of Navigation Section-->
            
            <!--Body Container-->
            <?php 
            $useId =  $_GET['userId'];
                $connection = new mysqli("localhost","root","","project");
                $sql = "SELECT * FROM loans WHERE userId LIKE '%$useId%'";
                $sql1 = "SELECT SUM(amount) AS loanpay FROM loanpayementhistory";
                $sql2 = "SELECT SUM(amountDeposited) AS deposits FROM clientdeposits";
                $result = $connection->query($sql);
                $result1 = $connection->query($sql1);
                $result2 = $connection->query($sql2);
                if($result->num_rows>0){
                    $row = $result->fetch_assoc();
                    if($result1->num_rows>0){
                        $row1 = $result1->fetch_assoc();
                    }
                    if($result2->num_rows>0){
                        $row2 = $result2->fetch_assoc();
                    }

                
            ?>
            <div class="container">    
                <!--Form-Section-->
                <div class="form-section">
                    <!--Left Sided of Form-->
                    <div class="left-side">
                        <div class="detail-section">
                            <p class="label">Client ID</p>
                            <div class="entry"><?php echo $_GET['userId'];?></div>
                        </div>
                        
                        <div class="detail-section">
                            <p class="label">Name</p>
                            <div class="entry"><?php echo $row['firstName']." ".$row['Othernames'];?></div>
                        </div>
                        
                        <div class="detail-section">
                            <p class="label">Date Loaned</p>
                            <div class="entry"><?php echo $row['DOL'];?></div>
                        </div>
                        
                        <div class="detail-section">
                            <p class="label">Loan Amount</p>
                            <div class="entry"><?php echo $row['amount']; ?></div>
                        </div>
                    </div>
                    <!--End of Left Side-->
                    
                    <!--Right Side of Form-->
                    <div class="right-side">
                        <div class="detail-section">
                            <p class="label">Total Deposits</p>
                            <div class="entry"><?php echo $row2['deposits']; ?></div>
                        </div>
                        
                        <div class="detail-section">
                            <p class="label">TTLoanAmountPaid</p>
                            <div class="entry"><?php echo $row1['loanpay'];}?></div>
                        </div>
                        
                        <!-- <div class="detail-section">
                            <p class="label">Interest</p>
                            <div class="entry"></div>
                        </div> -->
                    </div>
                    <!--End of Right Side-->
                </div>
                <div class="clr"></div>
                <!--End of Form Section-->
                
                <!-- Report Table
                <div class="tabular-section">
                    
                <p>Track Report</p>
                <hr>
                    <table>
                          <tr>
                            <th>Month</th>
                            <th>Principal</th>
                            <th>Interest</th>
                            <th>Total</th>
                            <th>Paid</th>
                          </tr>
                          
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                    </table>
                </div> -->
                <!--End of Report Table-->
                
            </div>
            <!--End of Body Container-->
        </body>
        
    </html>