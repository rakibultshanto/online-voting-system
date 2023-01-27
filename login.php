<?php
session_start();
include("includes/header.php");
?>
<?php
require("includes/db.php");
$error="";
$success="";
if(isset($_POST['login']))
{
     $user_email=$_POST['email'];
     $user_password=$_POST['password'];

    $select="select * from users_db where user_email='$user_email' and user_password='$user_password'";
    $run=$conn->query($select);
    if($run->num_rows>0)
    {
        while ($row=$run->fetch_array())
        {
            $_SESSION['user_name']=$user_name=$row['user_name'];
            $_SESSION['user_email']=$user_email=$row['user_email'];
            echo"<script>window.location.href='welcome.php'</script>";
        }
    }
    else
    {
        $error="<span>Invalid Email or Password! Try Again";
    }
}
?>
    <br>
    <hr>
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 alert alert-success" style="box-shadow:2px 2px 2px 2px gray;">
                <h3 class="text text-center alert bg-primary">Voter Login Area</h3>
                <h5 class="text text-center text-danger"><?php
                if($error!="")
                {
                    echo $error;
                }
                if($success!="")
                {
                    echo $success;
                }

                ?><h5>


                <form method="post">
                
                <div class="form-group">
                    <label for="exampleInputEmail"style="color:black">Email Address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail" placeholder="Enter Your Email Address" required>
                </div>

                <div class="form-group">
                <label for="password"style="color:black">Password</label>
                 <input type="password" name="password" class="form-control"placeholder="Enter Your Password" required>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block" name="login"><b>Login</b></button>
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
