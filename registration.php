<?php
include("includes/header.php");
?>
<?php
require("includes/db.php");
$emailError="";
$accountSuccess="";
if(isset($_POST['register']))
{
  $user_name=$_POST['fullname'];
  $user_email=$_POST['email'];
  $user_gender=$_POST['gender'];
  $user_dob=$_POST['dob'];
  $user_region=$_POST['region'];
  $user_password=$_POST['password'];

  $select="select * from users_db where user_email='$user_email'";
  $exe=$conn->query($select);
  if($exe->num_rows>0)
  {
    $emailError= "<p class='text text-center text-danger'>This Voter using this Email already registered</p>";
  }
  else
  {
    $insert="insert into users_db (user_name,user_email,user_gender,user_dob,user_region,user_password) values('$user_name','$user_email','$user_gender','$user_dob','$user_region','$user_password')";
    $run=$conn->query($insert);

if($run)
{
    $accountSuccess="<p class='text text-center text-success'>Account Create Successfully</p>";
}

else
{
    echo "error";
}

  }
}
?>
<body>
    <br>
    <hr>
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 alert alert-success" style="box-shadow:2px 2px 2px 2px gray;">
                <h3 class="text text-center alert bg-primary">Voter Registration</h3>
                <?php
                if($emailError!="")
                {
                    echo $emailError;
                }
                if($accountSuccess!="")
                {
                    echo $accountSuccess;

                }

                ?>


                <form method="post">
                <div class="form-group">
                    <label for="exampleInputFullName" style="color:black">Full Name</label>
                    <input type="text" class="form-control" id="exampleInputFullname" name="fullname" placeholder="Enter Your Full Name" required>
                </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail"style="color:black">Email Address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail" placeholder="Enter Your Email Address" required>
                </div>

                <div class="form-group">
                    <label for="Gender"style="color:black">Gender</label>
                    <select name="gender" class="form-control">
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>  
                    </select>
                </div>

                <div class="form-group">
                    <label for="dob"style="color:black">Enter your Date of Birth</label>
                    <input type="date" class="form-control" name="dob" id="exampleInputDOB" placeholder="Enter your Date of Birth" required>
                </div>
                <div class="form-group">
                    <label for="region"style="color:black">Region</label>
                    <select name="region" class="form-control">
                        <option value="">Select</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Narsingdi">Narsingdi</option>
                        <option value="Chuadanga">Chuadanga</option>  
                        <option value="Tangail">Tangail</option>
                        <option value="Faridpur">Faridpur</option>
                    </select>
                </div>

                <div class="form-group">
                <label for="password"style="color:black">Password</label>
                 <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block" name="register"><b>Submit</b></button>
                </div>
            </form>
         </div>
    </div>
</div>

<?php
include("includes/footer.php");
?>

</body>

</html>
