<?php
session_start();
if(isset($_SESSION['uid']))
{
    header('location:admindash.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Welcome to Admin login</title>
</head>
<body>
    <div class="detail">
        <span class="link_b">Admin Login</span>
    </div>
    <div class="border_bg">
        <form action="admin.php" method="post">
            <table>
                <tr><td colspan="2"><h2>Login Here</h2></td></tr>
                <tr>
                    <td>User Name:</td>
                    <td><input type="text" name="name" id="name" class="form_group"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" id="password" class="form_group"></td>
                </tr> 
                <tr>
                    <td colspan="2"><input type="submit" value="submit" name="submit"class="submi"></td>
                </tr>            
            </table>
        </form>
    </div>
</body>
</html>
<?php include('../dbcon.php'); ?>
<?php 
if(isset($_POST['submit'])){
    $uname=$_POST['name'];
    $pass=$_POST['password'];
    $sql="SELECT * FROM `admin` WHERE `username`='$uname' AND `password`='$pass';";
    $run= mysqli_query($conn,$sql);
    $row= mysqli_num_rows($run);
    if($row<1)
    {?>
        <script>
            alert('Username or password not match!');
            window.open('admin.php','_self');
        </script>
        <?php
    }
    else
    {
        $data=mysqli_fetch_assoc($run);
        $id=$data['id'];
        echo "id = ".$id; 
        
        $_SESSION['uid']=$id;
        header('location:admindash.php');       
    }
}

?>