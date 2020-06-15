<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student panel</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-image:url('images/pic.jpg');">
<div class="detail">
    <span class="link_b mrgn">Welcome to Student Management </span>
<a href="admin/admin.php" class="link_a">Admin login</a>
</div>    
<form action="index.php" method="post" align="center">
    <h2>Login Here</h2>
    Choose Standard:<input type="number" name="stand" id="stand" class="form_group">
    Roll No.:<input type="text" name="roll_no" class="form_group">  
    <input type="submit" name="login" value="Submit" class="butt">    
</form>        
</body>
</html>
<?php
if(isset($_POST['login'])){
    include('dbcon.php');
    include('function.php');
    $rollno=$_POST['roll_no'];
    $stand=$_POST['stand'];
    showdetails($stand,$rollno);
    
}
?>
