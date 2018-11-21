<?php
session_start();
if(isset($_SESSION['username']))
{
if($_POST['request']) {

    $cid=$_SESSION['cid'];
    $tid=$_SESSION['tid'];
    $wid=$_SESSION['wid'];
    $res=$_POST['request'];
    $connection = new mysqli('localhost', 'root', '', 'restaurant');
    $q = "select * from food_item WHERE cat_id='$res'";
    $result = $connection->query($q);
    echo '<table border="1" align="center" cellpadding="10">';
    echo '<tr>';
    echo '<th>Food ID</th>';
    echo '<th>Food Name</th>';
    echo '<th>Rate</th>';
    echo '<th>Options</th>';
    echo '</tr>';
    while ($data = $result->fetch_array()) {
        echo '<tr>';
        echo '<td>'.$data[0].'</td>';
        echo '<td>'.$data[1].'</td>';
        echo '<td>'.$data[2].'</td>';
        echo '<td>';

        echo '<button onclick="myFunction('.$data[0].')">Order</button>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
    $connection->close();
}
    ?>
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
