<?php
session_start();
$cid=$_SESSION['cid'];
$connection = new mysqli('localhost', 'root', '', 'restaurant');
$connection->query("delete from order_details where c_id='$cid'");
?>
<script type="text/javascript">
alert("order is cancelled");
document.location="data.php";
</script>