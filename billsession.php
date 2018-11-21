<?php
session_start();
if(isset($_SESSION['username']))
{
$cid=$_POST['cid'];
$tid=$_POST['tid'];
$wid=$_POST['wid'];



$_SESSION['cid']=$cid;
$_SESSION['tid']=$tid;
$_SESSION['wid']=$wid;
?>
    <script>
        document.location="data.php";
    </script>
<?php
}

else
{
    ?>
    <script>
        document.location="index.php";
    </script>
    <?php
}
?>