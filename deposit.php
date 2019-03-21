<?php
    if(isset($_POST['submit'])){
        $UserId = $_POST['uID'];
        $FirstName = $_POST['fname'];
        $OtherName = $_POST['othernames'];
        $MobileNumber = $_POST['phone'];
        $email = $_POST['email'];
        $DateOfDeposit = $_POST['issue_date'];
        $IssuedBy = $_POST['Sname'];
        $StaffNo = $_POST['SNo'];
        $amoutDeposited = $_POST['amount'];
        $connection = new mysqli('localhost','root','','project');
        // `userId`, `firstName`, `Othernames`, `MobileNumber`, `email`, `dateOfBirth`, `Religion`, `Gender`, `Residence`, `DateOfSignUP`, `IssuedBy`, `StaffNo`
        $sql = "INSERT INTO `clientdeposits` VALUES (NULL,'$UserId', '$FirstName', '$OtherName', '$MobileNumber', '$email','$IssuedBy', '$StaffNo','$amoutDeposited', '$DateOfDeposit')";
        $result = $connection->query($sql);
        // echo($result);
        if($result){
            echo("amount  successfully  deposited into clients account "."<a href='index.php'>home</a>");
            // echo("<script>location.href = 'index.php';</script>");
        }else{
            // die("something went wrong");
            echo(mysqli_error($connection));
        }
    } 
        ?>