<html>
<head>
    <title>order</title>
</head>
<body>



        <?php

session_start();
if(isset($_SESSION['username']))
{
        include ("header.php");
        $connection=new mysqli('localhost','root','','restaurant');
        $q="select * from customer";
        $result=$connection->query($q);
        echo '<table border="1" align="center" cellpadding="10">';
        echo '<tr>';
        echo '<th>Customer ID</th>';
        echo '<th>Name</th>';
        echo '<th>Address</th>';
        echo '<th>Mobile No</th>';
        echo '<th>Options</th>';
        echo '</tr>';
        while($data=$result->fetch_array())
        {
            echo '<tr>';
            echo '<td>'.$data[0].'</td>';
            echo '<td>'.$data[1].'</td>';
            echo '<td>'.$data[2].'</td>';
            echo '<td>'.$data[3].'</td>';
            echo '<td>';
            echo '<form action="ordersession.php" method="post">';
            echo '<input name="cid" type="hidden" value='.$data[0].'>';
            echo '<input name="tid" type="hidden" value='.$data[5].'>';
            echo '<input name="wid" type="hidden" value='.$data[4].'>';
            echo '<input type="submit" value="More order">';
            echo '</form>';
            echo '<form action="billsession.php" method="post">';
            echo '<input name="cid" type="hidden" value='.$data[0].'>';
            echo '<input name="tid" type="hidden" value='.$data[5].'>';
            echo '<input name="wid" type="hidden" value='.$data[4].'>';
            echo '<input type="submit" value="Bill">';
            echo '</form>';
            echo '<form action="finalbillsession.php" method="post">';
            echo '<input name="cid" type="hidden" value='.$data[0].'>';
            echo '<input name="tid" type="hidden" value='.$data[5].'>';
            echo '<input name="wid" type="hidden" value='.$data[4].'>';
            echo '<input type="submit" value="Final Bill">';
            echo '</form>';
            echo '</td>';
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