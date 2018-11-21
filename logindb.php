<?php
session_start();
$username=$_POST['uname'];
$password=$_POST['Password'];

$connection=new mysqli('localhost','root','','restaurant');

$sql=$connection->query("select * from login where log_name='$username' and log_pass='$password'");

if($sql->num_rows > 0)
{
$_SESSION['username']=$username;
?>
<script type="text/javascript">
alert("your successfully login");
document.location="custdetails.php";
</script>
<?php

}
else
{
?>
    <script type="text/javascript">
        alert("username/passsword is invalid");
        document.location="index.php";

    </script>
    <?php
}
?>