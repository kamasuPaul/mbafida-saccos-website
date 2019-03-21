
<?php 
session_start();
if(!isset($_SESSION['login'])){
    header('Location: login.html');
}
?>
<?php
    if(isset($_POST['submit'])){
        $UserId = $_POST['uID'];
        $FirstName = $_POST['fname'];
        $OtherName = $_POST['othernames'];
        $MobileNumber = $_POST['phone'];
        $email = $_POST['email'];
        $dateOfBirth = $_POST['dob'];
        $Religion = $_POST['religion'];
        $Gender = $_POST['gender'];
        $Residence = $_POST['residence'];
        $DateOfSignup = $_POST['issue_date'];
        $IssuedBy = $_POST['Sname'];
        $StaffNo = $_POST['SNo'];
        $connection = new mysqli('localhost','root','','project');
        // `userId`, `firstName`, `Othernames`, `MobileNumber`, `email`, `dateOfBirth`, `Religion`, `Gender`, `Residence`, `DateOfSignUP`, `IssuedBy`, `StaffNo`
        $sql = "INSERT INTO `clients`VALUES (NULL,'$UserId', '$FirstName', '$OtherName', '$MobileNumber', '$email', '$dateOfBirth', '$Religion', '$Gender', '$Residence', '$DateOfSignup', '$IssuedBy', '$StaffNo')";
        $result = $connection->query($sql);
        // echo($result);
        if($result){
            echo("client created successfully "."<a href='index.php'>home</a>");
            // echo("<script>location.href = 'index.php';</script>");
        }else{
            // die("something went wrong");
            echo(mysqli_error($connection));
        }
    }else{
        header("Location: index.php");
    }
        ?>