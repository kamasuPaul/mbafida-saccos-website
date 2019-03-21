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
            
            <title>Dashboard</title>
            <link rel="stylesheet" type="text/css" href="css/main.css">
            <style>
                body{
                    background: linear-gradient(to top left, #f3d3be 3%, #efc5a9 97%);
                }
                .dashboard-flex{
                    padding: 20px;
                    padding-left: 8%;
                    background-color: transparent;
                    margin-top: 3%
                }
                
                .flex-row-1,.flex-row-2{
                    display: flex;
                    padding-top: 10px;
                    margin: 18px 0;
                }
                .flex-item-row-1, .flex-item-row-2{
                    height: 200px;
                    margin-bottom: 10px;
                    border-radius: 8px;
                    width: 30%;
                    box-shadow: 0px 0px 2px 1px rgba(37, 37, 37, 0.39);
                    margin-right: 20px;
                    text-align: center;
                    line-height: 10;
                    text-decoration: none;
                    color: white;
                    font-size: 19px;
                    word-break: break-all;
                    background: linear-gradient(to top right, #800000 5%, #f7b580 256%);
                    text-transform: uppercase;
                }
                a:hover{
                    background:#e2766a;
                    color: #9D2C1F;
                }
                
            </style>
        </head>
        
        <body>
            <!--Header Section-->
            <div class="top-header">
                <h4>MBADIFA SACCO RECORDS MANAGEMENT SYSTEM</h4>    
            </div>
            <!--End of Header Section-->
        
                    
            <!--Body Container-->
            <div class="container">
                <div class="dashboard-flex">
                    <div class="flex-row-1">
                        <a href="1.html" class="flex-item-row-1">
                            <div>Member Registration</div>
                        </a>
                                  
                        <a href="2.html" class="flex-item-row-1">
                            <div>Member Deposits</div>
                        </a>
                    
                        <a href="3.html" class="flex-item-row-1">
                            <div>Loan Acquisation</div>
                        </a>
                    </div>
                    
                    
                    <div class="flex-row-2">
                        <a href="4.html" class="flex-item-row-1">
                            <div>Loan Payment</div>
                        </a>
                        <a href="5.php" class="flex-item-row-2">
                            <div>Clients' Report</div>
                        </a>
                        <a href="logout.php" class="flex-item-row-2">
                            <div>Logout</div>
                        </a>
                    </div>
                </div>
            </div>
            <!--End of Body Container-->
        </body>
        
    </html>
    
            
    
                