<?php

session_start();

if(isset($_SESSION['username']))
{
include ("header.php");



    

    $connection = new mysqli('localhost', 'root', '', 'restaurant');
	$cid=$_SESSION['cid'];
    $q = "select * from bills WHERE c_id='$cid'";
    $result = $connection->query($q);
    if($result->num_rows > 0)
    {
        echo '<table border="1" align="center" cellpadding="10">';
        echo '<tr>';
        echo '<th>Bill No</th>';
        echo '<th>SL No</th>';
        echo '<th>Food Name</th>';
        echo '<th>Quantity</th>';
        echo '<th>Amount</th>';
        echo '<th>Date</th>';
        echo '<th>Tax</th>';
        echo '<th>NET Amount</th>';
        echo '</tr>';
        while ($data = $result->fetch_array()) {
            echo '<tr>';
            echo '<td>' . $data[0] . '</td>';
            echo '<td>' . $data[1] . '</td>';
            echo '<td>' . $data[2] . '</td>';
            echo '<td>' . $data[3] . '</td>';
            echo '<td>' . $data[4] . '</td>';
            echo '<td>' . $data[6] . '</td>';
            echo '<td>' . $data[7] . '</td>';
            echo '<td>' . $data[9] . '</td>';

            echo '</tr>';
        }

        echo '</table>';

        $connection->close();
    }
    else
    {
        ?>
        <script type="text/javascript">
            alert("Customer order is not available");
            document.location="customer.php";
        </script>
<?php
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