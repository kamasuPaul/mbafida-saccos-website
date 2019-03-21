<?php
    if(isset($_POST['submit'])){
        $UserId = $_POST['uID'];
        $FirstName = $_POST['fname'];
        $OtherName = $_POST['othernames'];
        $MobileNumber = $_POST['phone'];
        $email = $_POST['email'];
        $MShipPeriod = $_POST['period'];
        $DOL = $_POST['issue_date'];
        $Amout = $_POST['amount'];
        $Security = $_POST['security'];
        $IssuedBy = $_POST['Sname'];
        $StaffNo = $_POST['SNo'];
        $connection = new mysqli('localhost','root','','project');
        // INSERT INTO `loans` (`userId`, `firstName`, `Othernames`, `MobileNumber`, `email`, `MembershipPeriod`, `DOL`, `amount`, `Security`, `IssuedBy`, `StaffNo`) 
        ;
        $sql = "INSERT INTO `loans` VALUES (NULL,'$UserId', '$FirstName', '$OtherName', '$MobileNumber', '$email', '$MShipPeriod', '$DOL', '$Amout', '$Security', '$IssuedBy', '$StaffNo')";
        $result = $connection->query($sql);
        // echo($result);
        if($result){
            echo(" success client given loan "."<a href='index.php'>home</a>");
            // echo("<script>location.href = 'index.html';</script>");
        }else{
            // die("something went wrong");
            echo(mysqli_error($connection));
        }
    } 
        ?>