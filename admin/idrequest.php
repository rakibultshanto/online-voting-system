<!DOCTYPE html>
<html>
<head>
<title>Online Voting System</title>
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" href="mystyle.css" />
<link rel="stylesheet" href="css/fonts.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
<div class="container">
    <div class="col-sm-6">
       <h2>All Requested Data</h2>
       <table class="table table-responsive table-hover">
         <tr>
            <th>Number of Voters</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>User Gender</th>
            <th>User Date of Birth</th>
            <th>User Region</th>
            <th>Action</th>
         </tr>

         <?php

         $conn=new mysqli("localhost","root","","onlinevoting_db");
         $select="select * from id_request_tbl";
         $run=$conn->query($select);
         if($run->num_rows>0)
         {
            $total=0;
            while($row=$run->fetch_array())
         {
            $total=$total+1;
            $id=$row['id'];
            ?>
             <tr>
                 <td><?php echo $total;?></td>
                 <td><?php echo $row['user_name'];?></td>
                 <td><?php echo $row['user_email'];?></td>
                 <td><?php echo $row['user_gender'];?></td>
                 <td><?php echo $row['user_dob'];?></td>
                 <td><?php echo $row['user_region'];?></td>
                 <td><a href="updateid.php?id=<?php echo $id; ?>">Update</a></td>
            </tr>
            <?php
         }
        }

        else
        {


         ?>
            <tr>
            
               <td>Record not found</td>

            </tr>
 
      <?php
        }
         ?>
       </table>

    </div>
    <div class="col-sm-6">
        
    </div>
</div>
</body>
</html>
