<!DOCTYPE html>
<html>
<head>
<title>update Voter Request</title>
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" href="mystyle.css" />
<link rel="stylesheet" href="css/fonts.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
    <div class="container">
        <div class="col-sm-6">
            <?php
            $postfix="";
            $prefix="";
            $id_generated="";
            $conn=new mysqli("localhost","root","","onlinevoting_db");
            $id=$_GET['id'];
            $select="select * from id_request_tbl where id='$id'";
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
                }
                switch($user_region)
                {
                        case 'Dhaka':
                        $prefix="Dha";
                        $rand=rand(9999999,1234567);
                        $postfix="xyz";
                        $id_generated=$prefix.$rand.$postfix;
                        break;
                        case 'Narsingdi':
                            $prefix="Nar";
                            $rand=rand(9999999,1234567);
                            $postfix="xyz";
                            $id_generated=$prefix.$rand.$postfix;
                            break;
                            case 'Chuadanga':
                                $prefix="Chu";
                                $rand=rand(9999999,1234567);
                                $postfix="xyz";
                                $id_generated=$prefix.$rand.$postfix;
                                break;
                                case 'Tangail':
                                    $prefix="Tan";
                                    $rand=rand(9999999,1234567);
                                    $postfix="xyz";
                                    $id_generated=$prefix.$rand.$postfix;
                                    break;
                                case 'Faridpur':
                                    $prefix="Far";
                                    $rand=rand(9999999,1234567);
                                    $postfix="xyz";
                                    $id_generated=$prefix.$rand.$postfix;
                                break;
                    default:
                    # code...
                    break;
                }
                   ?>
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
                            <label for="exampleInputEmail"style="color:black">Voter ID Generated by System</label>
                            <input type="email" class="form-control" name="user_id_generated" id="exampleInputEmail" placeholder="Enter Your Email Address"
                            required value="<?php echo strtoupper ($id_generated);?>"readonly>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="update" value="Update Voter ID" class="form-control btn btn-success">
                        </div>

                <?php
                
                
            }

            else
            {
                echo "Record not found";
            }

            ?>

        </div>

        <div class="col-sm-6">

        </div>

    </div>
</body>
        
</html>

<?php
if (isset($_POST['update']))
{
    $user_email=$_POST['user_email'];
    $user_id_generated=$_POST['user_id_generated'];
    $update="update users_db set user_id_generated='$user_id_generated' where user_email='$user_email'";
    $run=$conn->query($update);
    if($run)
    {
        $delete="delete from id_request_tbl where user_email='$user_email'";
        $del=$conn->query($delete);
        if($del)
        {
            echo "<script>alert('Updated Successfully')</script>";
            echo "<script>window.location.href='idrequest.php'</script>";
        }

    }
    else
    {
        echo "<script>alert('Something Went Wrong.....')</script>";
    }
}

?>