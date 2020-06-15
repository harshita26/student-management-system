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
<?php include('header.php'); ?>
<div class="detail">
    <a href="admindash.php" class="link_c">Back to admin</a>
    <span class="link_b">Student Details</span>
    <a href="logout.php" class="link_a">Logout</a>
</div>
<div class="border_bg">
    <form action="addstudent.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td colspan="2"><h2>Add Student details</h2></td>
            </tr>
            <tr>
                <td>Roll no.:</td>
                <td><input type="number" name="roll" id="roll" class="form_group" required ></td>
            </tr>
            <tr>
                <td>Name: </td>
                <td><input type="text" name="name" id="name" class="form_group" required></td>
            </tr>
            <tr>
                <td>City:</td>
                <td><input type="text" name="city" id="city" class="form_group"required></td>
            </tr>
            <tr>
                <td>Parent's Contact:</td>
                <td><input type="tel" name="pcont" id="pcont" class="form_group"required></td>
            </tr>
            <tr>
                <td>Standard:</td>
                <td><input type="number" name="stand" id="stand"min="1" max="12" class="form_group" required></td>
            </tr>
            <tr>
                <td>Image: </td>
                <td><input type="file" name="simg" class="form_group" required></td>
            </tr>
            <tr><td colspan="2"><input type="submit" name="submit" value="submit" class="submi"></td></tr>            
        </table>
    </form>
</div>
</body>
</html>
<?php 
if(isset($_POST['submit']))
{
    include('../dbcon.php');
    $name=$_POST['name'];
    $roll=$_POST['roll'];
    $city=$_POST['city'];
    $pcon=$_POST['pcont'];
    $stan=$_POST['stand'];
    $imagename=$_FILES['simg']['name'];
    $tempname=$_FILES['simg']['tmp_name'];
    move_uploaded_file($tempname,"../dataimage/$imagename");

    $sql="INSERT INTO `student_table`(`rollno`, `name`, `city`, `pcont`, `standard`,`image`) VALUES ('$roll','$name','$city','$pcon','$stan','$imagename')";
    $run=mysqli_query($conn,$sql);
    if($run==true)
    {
        ?>
        <script>
            alert('Data Insert Successful');
            // window.open('location:addstudent.php','_self');
        </script>
        <?php
    }
}
?>
