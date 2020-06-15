<?php
        session_start();
        if($_SESSION['uid']){
             echo "";
        }
        else
        {
            header('location:admin.php');
        }        
?>
<?php 
include('header.php');
include('../dbcon.php');
$sid=$_GET['sid'];
$sql="SELECT * FROM `student_table` WHERE `id`='$sid'";
$run=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($run);
?>
<div class="detail">
    <a href="admindash.php" class="link_c">Back to admin</a>
    <span class="link_b">Student Details</span>
    <a href="logout.php" class="link_a">Logout</a>
</div>
<div class="border_bg">
    <form action="updatedata.php" method="post" enctype="multipart/form-data">
        <table>
            <tr><td colspan="2"><h2>Update Student details</h2></td></tr>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" id="name" value="<?php echo $data['name']; ?>" class="form_group"></td>
            </tr>
            <tr>
                <td>Roll no.:</td>
                <td><input type="number" name="roll" id="roll" value="<?php echo $data['rollno']; ?>" class="form_group"></td>
            </tr>
            <tr>
                <td>City:</td>
                <td><input type="text" name="city" id="city" value="<?php echo $data['city']; ?>" class="form_group"></td>
            </tr>
            <tr>
                <td>Parent's Contact:</td>
                <td><input type="tell" name="pcont" id="pcont" value="<?php echo $data['pcont']; ?>" class="form_group"></td>
            </tr>
            <tr>
                <td>Standard:</td>
                <td><input type="number" name="stand" id="stand" min="1" max="12" value="<?php echo $data['standard']; ?>" class="form_group"></td>
            </tr>
            <tr>
                <td>Image: </td>
                <td><input type="file" name="simg" value="<?php echo $data['image']; ?>" class="form_group"></td>
            </tr>
            <tr><td colspan="2"><input type="hidden" name="sid" value="<?php echo $data['id']; ?>"><input type="submit" name="submit" value="submit" class="submi"></td></tr>
        </table>
    </form>
</div>
</body>
</html>

    
