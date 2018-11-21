<?php
include("header.php");
?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<!DOCTYPE html>
<html>
<head>
  <title>MONTHLY INCOME</title>
</head>
<body>

<script src="https://code.jquery.com/jquery-2.2.4.js">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<div class="container">
    <div class="row">
    
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">MONTHLY INCOME</h3>
                  </div>
                  
                </div>
              </div>
              <div class="panel-body table-responsive">
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        
                        <th class="hidden-xs">SI NO</th>
                        <th>FROM MONTH</th>
                        <th>TO MONTH</th>
                        <th>TAX</th>
                        <th>NET AMOUNT</th>
                        
                        
                  
                    </tr> 
                  </thead>
                  <tbody id="myTable">
                
                          <tr>
                            <td class="hidden-xs">1</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            
                          </tr>
                          <tr>
                            <td class="hidden-xs">2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            
                          </tr>
                          <tr>
                            <td class="hidden-xs">3</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            
                          </tr>              
                          <tr>
                            <td class="hidden-xs">4</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            
                          </tr>
                          <tr>
                            <td class="hidden-xs">5</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            
                          </tr>
                      
                            
                        </tbody>
                </table>

                <div class="col col-xs-6 text-right">
                    <button type="button" class="btn btn-sm btn-primary btn-create">CLOSE</button>
                  </div>
            
            
              </div>
              <div class="panel-footer">
                <div class="row">
                  
                  
                  <div class="col col-xs-8">
                    <ul class="pagination hidden-xs pull-right" id="myPager">
                    </ul>
                    <ul class="pagination visible-xs pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

</div></div></div>







</body>
</html>



