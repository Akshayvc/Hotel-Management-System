<?php

session_start();
if(isset($_SESSION['username']))
{
include ("header.php");

$oid=$_GET['orid'];
$fid=$_GET['foid'];
$tid=$_SESSION['tid'];
$otd=date("Y-m-d h:i:s");

$cid=$_SESSION['cid'];

$connection = new mysqli('localhost', 'root', '', 'restaurant');
$connection->query("insert into order_details values('$oid','$tid','$otd','$fid','$cid')");
?>
<script type="text/javascript">
    alert("item is ordered!!!!!")
document.location="order.php";
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

