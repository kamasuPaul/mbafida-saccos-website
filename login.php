<?php 
session_start();
if(isset($_POST['submit'])){
    $Username = $_POST['sID'];
    $password = $_POST['password'];
    $connection = new mysqli('localhost','root','','project');
    $sql = "SELECT * FROM  `staff` WHERE StaffId LIKE '%$Username%' AND Password LIKE '%$password%'";
    $result = $connection->query($sql);
    if($result->num_rows>0){
        $row = $result->fetch_assoc();
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $Username = $row['username'];
        $password = $row['password'];
        $_SESSION['login'] = 'true';
        header("Location: index.php");
    }else{
        echo "wrong credentials"."<a href='login.php'>back</a>";
    }

}


?>