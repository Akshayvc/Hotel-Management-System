
<?php
session_start();
if(isset($_SESSION['username']))
{
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
</head>
<body>
<div class="container" style="margin-top: 30px;">
    <div id="tableManager" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Table Add</h2>
                </div>

                <div class="modal-body">
                    <div id="editContent">
                        <select id="cat" class="form-control">

                            <option class="form-control" value="">Select Categiory</option>
                            <?php
                            $connection = new mysqli('localhost', 'root', '', 'restaurant');
                            $sql = $connection->query("select * from workers");
                            while ($data = $sql->fetch_array()) {

                                ?>
                                <option id="cat" class="form-control"
                                        value="<?php echo $data[0]; ?>"><?php echo $data[1]; ?></option>
                                <?php
                            }
                            ?>
                        </select><br>


                        <input type="text" class="form-control" placeholder="Table ID" id="tid" value=""><br>
                        <input type="text" class="form-control" placeholder="Table Capacity" id="tcap" value=""><br>
                        <input type="text" class="form-control" placeholder="Occupied" id="occ" value=""><br>
                        <input type="hidden" id="editRowId" value="">
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="button" id="managebtn" onclick="manageData('addNew')" class="btn btn-success"
                           value="save">
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <h1>Table Add</h1>
            <input type="button" style="float:right" class="btn btn-success" id="addNew" value="add New"><br><br>
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <td>Table ID</td>
                    <td>Capacity</td>
                    <td>Occupied</td>
                    <td>Options</td>
                </tr>

                </thead>
                <tbody>


                </tbody>


            </table>
        </div>

    </div>
</div>
<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#addNew").on('click', function () {

            $("#tableManager").modal('show');
        });

        $("#tableManager").on('hidden.bs.modal', function () {
            $("#editContent").fadeIn();
            $("#cat").fadeIn();
            $("#cat").val("");
            $("#editRowId").val(0);
            $("#tid").val("");
            $("#tcap").val("");
            $("#occ").val("");
            $("#managebtn").attr('value', 'add New').attr('onclick', "manageData('addNew')").fadeIn();

        });

        getExistingData(0, 10);
    });

    function deleteRow(rowId) {
        if (confirm('Are you sure??')) {
            $.ajax({
                url: 'tableajax.php',
                method: 'POST',
                dataType: 'text',
                data: {
                    key: 'deleteRow',
                    rowId: rowId
                },
                success: function (response) {
                    $("#table_" + rowId).parent().remove();
                    alert(response);

                }

            });

        }
    }

    function edit(rowId) {

        $.ajax({
            url: 'tableajax.php',
            method: 'POST',
            dataType: 'json',
            data: {
                key: 'getRowData',
                rowId: rowId
            },
            success: function (response) {

                $("#editContent").fadeIn();
                $("#cat").fadeOut();
                $("#cat").val(0);

                $("#editRowId").val(rowId);

                $("#tid").val(response.t_id);
                $("#tcap").val(response.t_capacity);
                $("#occ").val(response.occupied);
                $("#managebtn").attr('value', 'save changes').attr('onclick', "manageData('updateRow')");
                $("#tableManager").modal('show');
            }


        });
    }

    function getExistingData(start, limit) {
        $.ajax({
            url: 'tableajax.php',
            method: 'POST',
            dataType: 'text',
            data: {
                key: 'getExistingData',
                start: start,
                limit: limit

            },
            success: function (response) {
                if (response != "reachedMax") {
                    $('tbody').append(response);
                    start += limit;
                    getExistingData(start, limit);
                }
                else
                    $(".table").DataTable();
            }

        });
    }

    function manageData(key) {
        var tid = $("#tid");
        var tcap = $("#tcap");
        var occ = $("#occ");
        var cat = $("#cat");
        var editRowId = $("#editRowId");
        if (isNotEmpty(tid) && isNotEmpty(tcap) && isNotEmpty(occ) && isNotEmpty(cat)) {
            $.ajax({
                url: 'tableajax.php',
                method: 'POST',
                dataType: 'text',
                data: {
                    key: key,
                    tid: tid.val(),
                    tcap: tcap.val(),
                    occ: occ.val(),
                    cat: cat.val(),

                    rowId: editRowId.val()
                },
                success: function (response) {
                    if (response != "successfully updated")
                        alert(response);
                    else {
                        tid.val('');
                        tcap.val('');
                        occ.val('');
                        cat.val('');

                        $("#tableManager").modal('hide');
                        $("#table_" + editRowId).html(tcap.val());
                        $("#managebtn").attr('value', 'add').attr('onclick', "manageData('addNew')");
                    }
                }


            });
        }


    }

    function isNotEmpty(caller) {
        if (caller.val() == '') {
            caller.css('border', '1px solid red');
            return false;
        }
        else
            caller.css('border', '');
        return true;
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