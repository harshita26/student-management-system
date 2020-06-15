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
<form action="updatestudent.php" method="post" align="center">    
    <h2>Update Student details</h2>
    Name:<input type="text" name="name" id="name" class="form_group">
    Standard:<input type="number" name="stand" id="stand" class="form_group">
    <input type="submit" name="submit" value="Search" class="butt">    
</form>

            <?php
                if(isset($_POST['submit']))
                {
                    include('../dbcon.php');
                    $name=$_POST['name'];
                    $stan=$_POST['stand'];
                    $sql="SELECT * FROM `student_table` WHERE `name` like '%$name%' OR `standard`='$stan'";
                    $run= mysqli_query($conn,$sql);
                    $row= mysqli_num_rows($run);
                    ?>
                    <div class="border_bg top_left">
                    <table border="1" class="border_c">
                        <tr>
                            <th>Sr No.</th>
                            <th>Name</th>
                            <th>Roll no.</th>
                            <th>City</th>
                            <th>Parent's Contact</th>
                            <th>Standard</th>
                            <th>Image</th>
                            <th>Edit</th>
                        </tr>
                        <tr>
                    <?php
                    if($row<1)
                    {
                        echo "<tr><td colspan='7'>No Record Found</td></tr>";
                    }
                    else
                    {
                        $count=0;
                        while($data=mysqli_fetch_assoc($run))
                        {
                            $count++;
                            ?>
                            </tr>
                            <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $data['name']; ?></td>
                            <td><?php echo $data['rollno']; ?></td>
                            <td><?php echo $data['city']; ?></td>
                            <td><?php echo $data['pcont']; ?></td>
                            <td><?php echo $data['standard']; ?></td>
                            <td><img src="../dataimage/<?php echo $data['image'];?>" alt="simg" style="max-width:100px;"></td>
                            <td><a style="color:white;" href="updatestud.php?sid=<?php echo $data['id']; ?>">Edit</a></td>
                            <?php
                        }      
                    }
                }
            ?>
        </tr>
    </table>
</div>
</body>
</html>
