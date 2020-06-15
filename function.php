<?php
    function showdetails($stand,$rollno){
        include('dbcon.php');
        $qry="SELECT * FROM `student_table` WHERE `rollno`='$rollno' AND `standard`='$stand';";
        $run=mysqli_query($conn,$qry);        
        $row= mysqli_num_rows($run);
        if($row<1)
        {
            echo "<script>alert('Student data not found!');</script>";
        }
        else{            
            $data=mysqli_fetch_assoc($run);            
            ?>
            <div class="border_bg" style="top:45%;left:32%;">
                <table border="1" class="border_c">
                    <tr><th colspan="3">Student Details</th></tr>
                    <tr>
                        <td rowspan="5"><img src="dataimage/<?php echo $data['image']; ?>" alt="image" width="150px"></td>
                        <th>Roll no.</th>
                        <td><?php echo $data['rollno']; ?></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><?php echo $data['name']; ?></td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td><?php echo $data['city']; ?></td>
                    </tr>
                    <tr>
                        <th>Parent's contact</th>
                        <td><?php echo $data['pcont']; ?></td>
                    </tr>
                    <tr>
                        <th>Standard</th>
                        <td><?php echo $data['standard']; ?></td>
                    </tr>                
                </table>
            </div>
            <?php
        }        
    }
    
?>