<?php
session_start();
if(isset($_SESSION['username'])) {
    if (isset($_POST['key'])) {
        $connection = new mysqli('localhost', 'root', '', 'restaurant');

        if ($_POST['key'] == 'getRowData') {
            $rowId = $connection->real_escape_string($_POST['rowId']);
            $sql = $connection->query("select desg_no,desg_name,salary from designation where desg_no='$rowId'");
            $data = $sql->fetch_array();

            $jsonArray = array(
                'desg_no' => $data['desg_no'],
                'desg_name' => $data['desg_name'],
                'salary' => $data['salary'],

            );
            exit(json_encode($jsonArray));

        }


        if ($_POST['key'] == 'getExistingData') {

            $start = $connection->real_escape_string($_POST['start']);
            $limit = $connection->real_escape_string($_POST['limit']);

            $sql = $connection->query("select desg_no,mg_id,desg_name,salary from designation LIMIT $start,$limit");

            if ($sql->num_rows > 0) {
                $response = "";
                while ($data = $sql->fetch_array()) {
                    $response .= '
                <tr>
                <td>' . $data["desg_no"] . '</td>
                <td id="desg_' . $data["desg_no"] . '">' . $data["mg_id"] . '</td>
                <td>' . $data["desg_name"] . '</td>
                <td>' . $data["salary"] . '</td>
                <td>
                <input type="button" onclick="edit(' . $data["desg_no"] . ')" value="Edit" class="btn btn-primary"> 
                
                <input type="button" onclick="deleteRow(' . $data["desg_no"] . ')" value="Delete" class="btn btn-danger">
                
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
            $connection->query("delete from designation where desg_no='$rowId'");
            exit('The Designation has been deleted');
        }

        $did = $connection->real_escape_string($_POST['did']);
        $mgid = $connection->real_escape_string($_POST['mgid']);
        $dname = $connection->real_escape_string($_POST['dname']);
        $sal = $connection->real_escape_string($_POST['sal']);


        if ($_POST['key'] == 'updateRow') {

            $connection->query("update designation set desg_no='$did', desg_name='$dname',salary='$sal' where desg_no='$rowId'");
            exit('successfully updated');

        }

        if ($_POST['key'] == 'addNew') {
            $sql = $connection->query("select desg_no from designation where desg_no='$did' or desg_name='$dname' or mg_id='$mgid'");
            if ($sql->num_rows > 0)
                exit("The desg no/desg name/manager id is already exists");
            else {


                $connection->query("insert into designation VALUES('$did','$mgid','$dname','$sal')");
                exit('Designation is added');

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