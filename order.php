<?php
session_start();
if(isset($_SESSION['username']))
{
include ("header.php");
?>
<html>
<head>
    <title>order</title>
</head>
<body>

<br><br>
<div id="table">
    <div id="menu">
        <select id="drop">
    <option value="">select categeory</option>
    <?php

    $connection=new mysqli('localhost','root','','restaurant');
    $sql = $connection->query("select * from category");
    while($data = $sql->fetch_array())
    {

        ?>
        <option value="<?php echo $data[0];?>"><?php echo $data[1];?></option>
        <?php
    }
    ?>
        </select>
        <br><br>

    </div>
    <div id="container">

        <?php

        $cid=$_SESSION['cid'];
        $tid=$_SESSION['tid'];
        $wid=$_SESSION['wid'];
        $q="select * from food_item";
        $result=$connection->query($q);
        echo '<table border="1" align="center" cellpadding="10">';
        echo '<tr>';
        echo '<th>Food ID</th>';
        echo '<th>Food Name</th>';
        echo '<th>Rate</th>';
        echo '<th>Options</th>';
        echo '</tr>';
        while($data=$result->fetch_array())
        {
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
        ?>
    </div>

</div>
<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

<script type="text/javascript">
$(document).ready(function () {
   $("#drop").on('change',function () {
var sel=$(this).val();
$.ajax({
   url:'fetch.php',
   method:'post',
   dataType:'text',
    data:{
       request:sel
    },
    beforeSend:function () {
       $("#container").html('working...');
    },
    success:function (data) {
        $("#container").html(data);
    },
});
   });
});


function myFunction(data) {
    var oid = prompt("Enter the Order ID", "");
    if (oid != null) {
       document.location="getorder.php?orid="+oid+"& foid="+data;
    }
}

</script>
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