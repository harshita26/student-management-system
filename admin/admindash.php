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
        <span class="link_b mrgn">Welcome to Admin Dashboard</span>
        <a href="logout.php" class="link_a">Logout</a>
</div>
<div class="border_bg">    
     <div class="link_data">
        <a href="addstudent.php">ADD STUDENT DATA</a><br>
        <a href="updatestudent.php">UPDATE STUDENT DATA</a><br>
        <a href="deletestudent.php">DELETE STUDENT DATA</a> 
     </div>
</div>
</body>
</html>
<?php include('../dbcon.php'); ?>