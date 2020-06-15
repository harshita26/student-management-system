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
    $id=$_REQUEST['sid'];
    $sql="DELETE FROM `student_table` WHERE `id`='$id';";
    $run= mysqli_query($conn,$sql);
    if($run==true)
    {
        ?>
        <script>
            alert("Data Delete Successful!");
            window.open('deletestudent.php','_self');
        </script>
        <?php
    }

?>
