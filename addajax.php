<?php
session_start();
if(isset($_SESSION['username'])) {
    if (isset($_POST['key'])) {
        $connection = new mysqli('localhost', 'root', '', 'restaurant');

        if ($_POST['key'] == 'getRowData') {
            $rowId = $connection->real_escape_string($_POST['rowId']);
            $sql = $connection->query("select fit_id,fit_name,rate,cat_id from food_item where fit_id='$rowId'");
            $data = $sql->fetch_array();

            $jsonArray = array(
                'fit_id' => $data['fit_id'],
                'fit_name' => $data['fit_name'],
                'rat' => $data['rate'],

            );
            exit(json_encode($jsonArray));

        }


        if ($_POST['key'] == 'getExistingData') {

            $start = $connection->real_escape_string($_POST['start']);
            $limit = $connection->real_escape_string($_POST['limit']);

            $sql = $connection->query("select fit_id,fit_name,rate from food_item LIMIT $start,$limit");

            if ($sql->num_rows > 0) {
                $response = "";
                while ($data = $sql->fetch_array()) {
                    $response .= '
                <tr>
                <td>' . $data["fit_id"] . '</td>
                <td id="food_' . $data["fit_id"] . '">' . $data["fit_name"] . '</td>
                <td>' . $data["rate"] . '</td>
                <td>
                <input type="button" onclick="edit(' . $data["fit_id"] . ')" value="Edit" class="btn btn-primary"> 
                
                <input type="button" onclick="deleteRow(' . $data["fit_id"] . ')" value="Delete" class="btn btn-danger">
                
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
            $connection->query("delete from food_item where fit_id='$rowId'");
            exit('The item has been deleted');
        }

        $foodid = $connection->real_escape_string($_POST['food_id']);
        $foodname = $connection->real_escape_string($_POST['food_name']);
        $rate = $connection->real_escape_string($_POST['rate']);
        $cat = $connection->real_escape_string($_POST['cat']);


        if ($_POST['key'] == 'updateRow') {

            $connection->query("update food_item set fit_id='$foodid', fit_name='$foodname',rate='$rate' where fit_id='$rowId'");
            exit('successfully updated');

        }

        if ($_POST['key'] == 'addNew') {
            $sql = $connection->query("select fit_id from food_item where fit_id='$foodid' or fit_name='$foodname'");
            if ($sql->num_rows > 0)
                exit("The food item/food ID is already exists");
            else {


                $connection->query("insert into food_item VALUES('$foodid','$foodname','$rate','$cat')");
                exit('food item is inserted');

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