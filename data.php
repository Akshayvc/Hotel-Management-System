<?php

session_start();
if(isset($_SESSION['username']))
{
include("header.php");

$cid=$_SESSION['cid'];
$tid=$_SESSION['tid'];
$wid=$_SESSION['wid'];





?>
<html>
<head>
    <title>order</title>
</head>
<body>



<?php
$connection=new mysqli('localhost','root','','restaurant');
$q="SELECT * FROM order_details JOIN food_item ON order_details.FIT_ID=food_item.FIT_ID and order_details.C_ID='$cid'";
$result=$connection->query($q);
echo '<table id="td" border="1" align="center" cellpadding="10">';
echo '<tr>';
echo '<th>Oder ID</th>';
echo '<th>Table ID</th>';
echo '<th>Date and Time</th>';
echo '<th>Food ID</th>';
echo '<th>Food Name</th>';
echo '<th>Rate</th>';
echo '<th>Quantity</th>';
echo '<th>Bill No</th>';
echo '<th>Serial No</th>';
echo '<th>Final Order ID</th>';
echo '<th>Option</th>';

echo '</tr>';
while($data=$result->fetch_array())
{
    echo '<tr>';
    echo '<td>'.$data[0].'</td>';
    echo '<td>'.$data[1].'</td>';
    echo '<td>'.$data[2].'</td>';
    echo '<td>'.$data[3].'</td>';
    echo '<td>'.$data[6].'</td>';
    echo '<td>'.$data[7].'</td>';
    echo '<form action="bill.php" method="post">';
    echo '<td>';
    echo '<input name="quan" type="text" value="">';
    echo '</td>';
    echo '<td>';
    echo '<input name="billno" type="text" value="">';
    echo '</td>';
    echo '<td>';
    echo '<input name="serialno" type="text" value="">';
    echo '</td>';
    echo '<td>';
    echo '<input type="text" name="forid" value="">';
    echo '<input name="fn" type="hidden" value='.$data['FIT_NAME'].'>';
    echo '<input name="fid" type="hidden" value='.$data[3].'>';
    echo '<input name="oid" type="hidden" value='.$data[0].'>';
    echo '<input name="rt" type="hidden" value='.$data[7].'>';

    echo '</td>';
    echo '<td>';

    echo '<input type="submit" value="Bill">';
	
    echo '</td>';
    echo '</form>';






    echo '</tr>';
}
echo '</table>';
?>

</body>
</html>
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

