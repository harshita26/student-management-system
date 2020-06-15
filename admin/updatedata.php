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
include('../dbcon.php');
    $id=$_POST['sid'];
    $name=$_POST['name'];
    $roll=$_POST['roll'];
    $city=$_POST['city'];
    $pcon=$_POST['pcont'];
    $stan=$_POST['stand'];
    $imagename=$_FILES['simg']['name'];
    $tempname=$_FILES['simg']['tmp_name'];
    move_uploaded_file($tempname,"../dataimage/$imagename");
    $sql="UPDATE `student_table` SET `rollno`='$roll',`name`='$name',`city`='$city',`pcont`='$pcon',`standard`='$stan',`image`='$imagename' WHERE `id`=$id;";
    $run= mysqli_query($conn,$sql);
    if($run==true)
    {
        ?>
        <script>
            alert("Data Update Successful!");
            window.open('updatestud.php?sid=<?php echo $id; ?>','_self');
        </script>
        <?php
    }

?>
