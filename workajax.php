<?php
session_start();
if($_SESSION['username']) {
    if (isset($_POST['key'])) {
        $connection = new mysqli('localhost', 'root', '', 'restaurant');

        if ($_POST['key'] == 'getRowData') {
            $rowId = $connection->real_escape_string($_POST['rowId']);
            $sql = $connection->query("select w_id,w_name,w_address,mobile_no,gender,mg_id  from workers where w_id='$rowId'");
            $data = $sql->fetch_array();

            $jsonArray = array(
                'woid' => $data['w_id'],
                'woname' => $data['w_name'],
                'woaddress' => $data['w_address'],
                'mobileno' => $data['mobile_no'],
                'gender' => $data['gender'],
                'mgid' => $data['mg_id'],

            );
            exit(json_encode($jsonArray));

        }


        if ($_POST['key'] == 'getExistingData') {

            $start = $connection->real_escape_string($_POST['start']);
            $limit = $connection->real_escape_string($_POST['limit']);

            $sql = $connection->query("select w_id,w_name,w_address,mobile_no,gender,mg_id from workers LIMIT $start,$limit");

            if ($sql->num_rows > 0) {
                $response = "";
                while ($data = $sql->fetch_array()) {

                    $response .= '
                <tr>
                <td>' . $data[0] . '</td>
                <td id="worker_' . $data[0] . '">' . $data[1] . '</td>
                <td>' . $data[2] . '</td>
                <td>' . $data[3] . '</td>
                <td>' . $data[4] . '</td>
                <td>
                <input type="button" onclick="edit(' . $data[0] . ')" value="Edit" class="btn btn-primary">
                 
                <input type="button" onclick="test('.$data[0].')" value="Delete" class="btn btn-danger">
                
                </td>
                </tr>
                ';
                }
                exit($response);
            } else {
                exit('reachedMax');

            }
        }
        $rowId = $connection->real_escape_string($_POST['rowId']);

        if ($_POST['key'] == 'deleteRow') {
            $connection->query("delete from workers where w_id='$rowId'");
            exit('The worker has been deleted');
        }

        $wid = $connection->real_escape_string($_POST['wid']);
        $wname = $connection->real_escape_string($_POST['wname']);
        $waddress = $connection->real_escape_string($_POST['waddress']);
        $mno = $connection->real_escape_string($_POST['mno']);
        $gen = $connection->real_escape_string($_POST['gen']);
        $mgid = $connection->real_escape_string($_POST['mgid']);




        if ($_POST['key'] == 'updateRow') {

            $connection->query("update workers set w_id='$wid', w_name='$wname',w_address='$waddress',mobile_no='$mno',gender='$gen',mg_id='$mgid' where w_id='$rowId'");
            exit('successfully updated');

        }

        if ($_POST['key'] == 'addNew') {
            $sql = $connection->query("select * from workers where w_id='$wid'");
            if ($sql->num_rows > 0)
                exit("The worker ID is already exists");
            else {


                $connection->query("insert into workers VALUES('$wid','$wname','$waddress','$mno','$gen','$mgid')");
                exit('worker item is inserted');

            }

        }

    }
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