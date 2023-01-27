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
    <div class="col-sm-6">
        <h4 class="text text-center text-info bg-primary alert">How to cast your vote</h4>
        <ul>
            <li>Firstly select <b>"ID Generate"</b> From navigation bar.</li>
            <li>Firstly select <b>"ID Generate"</b> From navigation bar.</li>
            <li>Firstly select <b>"ID Generate"</b> From navigation bar.</li>
            <li>Firstly select <b>"ID Generate"</b> From navigation bar.</li>
            <li>Firstly select <b>"ID Generate"</b> From navigation bar.</li>
            <li>Firstly select <b>"ID Generate"</b> From navigation bar.</li>
            <li>Firstly select <b>"ID Generate"</b> From navigation bar.</li>
            <li>Firstly select <b>"ID Generate"</b> From navigation bar.</li>
            <li>Firstly select <b>"ID Generate"</b> From navigation bar.</li>
            <li>Firstly select <b>"ID Generate"</b> From navigation bar.</li>
            <li>Firstly select <b>"ID Generate"</b> From navigation bar.</li>
        </ul>
</div>
<div class="col-sm-6">
    <img src="images/ballot.jpg" class="img img-responsive img-thumbnail">
</div>
</div>