<?php
session_start();
if(isset($_SESSION['username'])) {

    $conn = new mysqli('localhost', 'root', '', 'restaurant');
    $name = $_POST['Name'];
    $address = $_POST['Address'];
    $mobile = $_POST['Mobile'];
    $custid = $_POST['Id'];
    $tabid = $_POST['tabid'];
    $workerid = $_POST['workerid'];

    $_SESSION['cid'] = $custid;
	
$_SESSION['tid']=$tabid;
$_SESSION['wid']=$workerid;

    $conn->query("insert into customer values('$custid','$name','$address','$mobile','$workerid','$tabid')")
    ?>
    <script>

        alert("customer registered");
        document.location = "order.php";
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