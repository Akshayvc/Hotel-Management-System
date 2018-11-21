<?php
session_start();
if(isset($_SESSION['username']))
{
    $connection=new mysqli('localhost','root','','restaurant');


$quantity=$_POST['quan'];
$rate=$_POST['rt'];
$amount=$quantity*$rate;
$cid=$_SESSION['cid'];
$date=date("Y-m-d");
$tax=($rate*5)/100;
$netamount=$amount+$tax;
$foid=$_POST['forid'];
$fid=$_POST['fid'];
$bl=$_POST['billno'];
$sl=$_POST['serialno'];
$oid=$_POST['oid'];
$wid=$_SESSION['wid'];
echo $fid;
$sql=$connection->query("select * from food_item where fit_id='$fid'");
$row=$sql->fetch_array();
$fname=$row[1];

$connection->query("insert into order_item values('$foid','$oid','$fid','$quantity','$amount','$rate','$wid')");
$connection->query("insert into bills values('$bl','$sl','$fname','$quantity','$amount','$cid','$date','$tax','$foid','$netamount')");

?>
<script type="text/javascript">
    alert("Bill is created");
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