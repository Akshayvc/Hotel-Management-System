<?php
session_start();
if(isset($_SESSION['username'])) {
    if (isset($_POST['key'])) {
        $connection = new mysqli('localhost', 'root', '', 'restaurant');

        if ($_POST['key'] == 'getRowData') {
            $rowId = $connection->real_escape_string($_POST['rowId']);
            $sql = $connection->query("select t_id,t_capacity,occupied from rtable where t_id='$rowId'");
            $data = $sql->fetch_array();

            $jsonArray = array(
                't_id' => $data['t_id'],
                't_capacity' => $data['t_capacity'],
                'occupied' => $data['occupied'],

            );
            exit(json_encode($jsonArray));

        }


        if ($_POST['key'] == 'getExistingData') {

            $start = $connection->real_escape_string($_POST['start']);
            $limit = $connection->real_escape_string($_POST['limit']);

            $sql = $connection->query("select t_id,t_capacity,occupied from rtable LIMIT $start,$limit");

            if ($sql->num_rows > 0) {
                $response = "";
                while ($data = $sql->fetch_array()) {
                    $response .= '
                <tr>
                <td>' . $data["t_id"] . '</td>
                <td id="table_' . $data["t_id"] . '">' . $data["t_capacity"] . '</td>
                <td>' . $data["occupied"] . '</td>
                <td>
                <input type="button" onclick="edit(' . $data["t_id"] . ')" value="Edit"  class="btn btn-primary"> 
                
                <input type="button" onclick="deleteRow(' . $data["t_id"] . ')" value="Delete" class="btn btn-danger">
                
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
            $connection->query("delete from rtable where t_id='$rowId'");
            exit('Table is deleted');
        }

        $tid = $connection->real_escape_string($_POST['tid']);
        $tcap = $connection->real_escape_string($_POST['tcap']);
        $occ = $connection->real_escape_string($_POST['occ']);
        $cat = $connection->real_escape_string($_POST['cat']);



        if ($_POST['key'] == 'updateRow') {

            $connection->query("update rtable set t_id='$tid', t_capacity='$tcap',occupied='$occ' where t_id='$rowId'");
            exit('successfully updated');

        }

        if ($_POST['key'] == 'addNew') {
            $sql = $connection->query("select t_id from rtable where t_id='$tid'");
            if ($sql->num_rows > 0)
                exit("The table is already exists");
            else {


                $connection->query("insert into rtable VALUES('$tid','$tcap','$cat','$occ')");
                exit("Table is added");

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