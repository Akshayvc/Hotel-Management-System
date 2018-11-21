
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
                        <h2 class="modal-title">Food Item</h2>
                    </div>

                    <div class="modal-body">
                        <div id="editContent">


                            <input type="text" class="form-control" placeholder="Worker ID" id="wid" value=""><br>
                            <input type="text" class="form-control" placeholder="Name" id="wname" value=""><br>
                            <input type="text" class="form-control" placeholder="Address" id="waddress" value=""><br>
                            <input type="text" class="form-control" placeholder="Mobile NO" id="mno" value=""><br>
                            <input type="text" class="form-control" placeholder="Gender" id="gen" value=""><br>
                            <input type="text" class="form-control" placeholder="Manager ID" id="mgid" value=""><br>
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
                <h1>ADD WORKERS</h1>
                <input type="button" style="float:right" class="btn btn-success" id="addNew" value="add New"><br><br>
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <td>Worker ID</td>
                        <td>Name</td>
                        <td>Address</td>
                        <td>Mobile NO</td>
                        <td>Gender</td>
                        <td>Options</td>
                    </tr>

                    </thead>
                    <tbody>


                    </tbody>


                </table>
            </div>

        </div>
    </div>
    <script src="jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function ()
        {
            $("#addNew").on('click', function () {

                $("#tableManager").modal('show');
            });

            $("#tableManager").on('hidden.bs.modal', function () {
                $("#editContent").fadeIn();
                $("#editRowId").val(0);
                $("#wid").val("");
                $("#wname").val("");
                $("#waddress").val("")
                $("#mno").val("")
                $("#gen").val("");
                $("#mgid").val("")
                $("#managebtn").attr('value', 'add New').attr('onclick', "manageData('addNew')").fadeIn();

            });

            getExistingData(0, 10);
        });

        function test(p) {

          alert(p);
        }

        function edit(rowId) {
            $.ajax({
                url: 'workajax.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    key: 'getRowData',
                    rowId: rowId
                },
                success: function (response) {
                    $("#editContent").fadeIn();

                    $("#editRowId").val(rowId);

                    $("#wid").val(response.woid);
                    $("#wname").val(response.woname);
                    $("#waddress").val(response.woaddress);
                    $("#mno").val(response.mobileno);
                    $("#gen").val(response.gender);
                    $("#mgid").val(response.mg_id);

                    $("#managebtn").attr('value', 'save changes').attr('onclick', "manageData('updateRow')");
                    $("#tableManager").modal('show');
                }


            });
        }

        function getExistingData(start, limit) {
            $.ajax({
                url: 'workajax.php',
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
            var wid = $("#wid");
            var wname = $("#wname");
            var waddress = $("#waddress");
            var mno = $("#mno");
            var gen = $("#gen");
            var mgid = $("#mgid");
            var editRowId = $("#editRowId");
            if (isNotEmpty(wid) && isNotEmpty(wname) && isNotEmpty(waddress) && isNotEmpty(mno) && isNotEmpty(gen) && isNotEmpty(mgid)) {
                $.ajax({
                    url: 'workajax.php',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        key: key,
                        wid: wid.val(),
                        wname: wname.val(),
                        waddress: waddress.val(),
                        mno: mno.val(),
                        gen: gen.val(),
                        mgid: mgid.val(),
                        rowId: editRowId.val()
                    },
                    success: function (response) {
                        if (response != "successfully updated")
                            alert(response);
                        else {
                            wid.val('');
                            wname.val('');
                            waddress.val('');
                            mno.val('');
                            gen.val('');
                            mgid.val('');

                            $("#tableManager").modal('hide');
                            $("#worker_" + editRowId).html(wname.val());
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
