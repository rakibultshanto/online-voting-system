<?php 
session_start();
include("includes/loginheader.php");
if(!$_SESSION['user_email'])
{
    header("location:login.php");
}
?>
<br>
<div class="container">
    <?php
    require("includes/db.php");
       $user_email=$_SESSION['user_email'];
       $select="select * from id_request_tbl where user_email='$user_email'";
       $run=$conn->query($select);
       
       if($run->num_rows>0)
       {
    ?>  
    <div class="col-sm-6 col-sm-offset-3 bg-success alert text text-center">
        <h4><b>Your request already submitted. Please wait until your information being verified and your unique ID being generated...</b></h4>
    </div>
    
    <?php
       }
       else
       {
    ?>

    <?php
               $select="select * from users_db where User_email='$user_email'";
               $run=$conn->query($select);
               if($run->num_rows>0)
               {
                   while ($row=$run->fetch_array())
                   {
                    $user_name=$row['user_name'];
                    $user_email=$row['user_email'];
                    $user_gender=$row['user_gender'];
                    $user_dob=$row['user_dob'];
                    $user_region=$row['user_region'];
                    $user_id_generated=$row['user_id_generated'];
                   }
                }
                if($user_id_generated!="")
                {
    ?>
                  <div class="col-sm-6 col-sm-offset-3 bg-success alert">
                    <h4>Your ID is "<span class="text text-danger"><?php echo $user_id_generated; ?></span>"</h4> 
                    <p><b>Note:</b> Use this ID with your login password to cast your vote.</p>
                  </div>
    <?php
                }
                else
                {
    ?>

<div class="col-sm-6 col-sm-offset-3 bg-success alert">
                    <form method="post">
                        
                        <div class="form-group">
                            <label for="exampleInputFullName" style="color:black">Full Name</label>
                            <input type="text" class="form-control" id="exampleInputFullname" name="user_name" placeholder="Enter Your Full Name"
                            required value="<?php echo $user_name;?>"readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail"style="color:black">Email Address</label>
                            <input type="email" class="form-control" name="user_email" id="exampleInputEmail" placeholder="Enter Your Email Address"
                            required value="<?php echo $user_email;?>"readonly>
                        </div>
        
                        <div class="form-group">
                            <label for="Gender"style="color:black">Gender</label>
                            <input type="gender" class="form-control" name="user_gender" id="gender" placeholder="Enter Gender" 
                            required value="<?php echo $user_gender;?>"readonly>
                        </div>
        
                        <div class="form-group">
                            <label for="dob"style="color:black">Enter your Date of Birth</label>
                            <input type="date" class="form-control" name="user_dob" id="exampleInputDOB" placeholder="Enter your Date of Birth"
                            required value="<?php echo $user_dob;?>"readonly>
                        </div>
        
                        <div class="form-group">
                            <label for="region"style="color:black">Region</label>
                            <input type="region" class="form-control" name="user_region" id="exampleInputregion" placeholder="Enter your region" 
                            required value="<?php echo $user_region;?>"readonly>
                        </div>
        
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block" name="idrequest">ID Request</button>
                        </div>
                    </form>
            </div>
        
</div>

<?php    
    }
}
?>

<?php

if(isset($_POST['idrequest']))
{
   $user_name=$_POST['user_name'];
   $user_email=$_POST['user_email'];
   $user_gender=$_POST['user_gender'];
   $user_dob=$_POST['user_dob'];
   $user_region=$_POST['user_region'];
   require("includes/db.php");


    $insert="insert into id_request_tbl (user_name,user_email,user_gender,user_dob,user_region) values ('$user_name','$user_email','$user_gender','$user_dob','$user_region')";
   
   $run=$conn->query($insert);
   if($run)
   {
    echo "<script>alert('Your requested has been submitted successfully!')</script>";
    header('location:idgenerate.php');
   }
   else
   {
    echo "error";
   }
}
       
?>
