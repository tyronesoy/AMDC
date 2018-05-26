 <link rel="stylesheet" href="../assets/orderedit/bootstrap.min.css" />
 <?php 
 $connect = new PDO("mysql:host=localhost;dbname=itproject", "root", "");
 function supply_dropdown($connect)
{ 
 $output = '';
 $query = "SELECT * FROM supplies WHERE soft_deleted= 'N' ORDER BY supply_description ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
    $output .= '<option value="'.$row["supply_description"].'">'.$row["supply_description"].'</option>';
 }
 return $output;
}
?>
<script type="text/javascript">
  $("select").on('focus', function () {
    previous = this.value;
    }).change(function() {
         $("select[value="+$(this).val()+"]").not(this).val(previous);
    });
</script>
<?php
/**
 for display full info. and edit data
 */
// start again
$con=mysqli_connect('localhost','root','','itproject'); 
if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="SELECT * FROM inventory_order JOIN inventory_order_supplies USING(inventory_order_uniq_id) WHERE inventory_order_id=$id GROUP BY inventory_order_id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $per_id=$row[1];
        $per_uniq_id=$row[0];
        $per_date=$row[2];
        $per_name=$row[3]; 
        $per_department=$row[4];
        $per_status=$row[5];
        $per_remarks=$row[6];
        $per_supplyName=$row[8];
        $per_supplyUnit=$row[9];
        $per_supplyQuantity=$row[10];

    }//end while
?>
<form name="plus_name" id="plus_name">
<div class="box-header">
        <div class="modal-content">
                <div class="modal-header">
                 <div class="col-md-2">
                                                <img src="../assets/dist/img/user3-128x128.png" alt="User Image" style="width:80px;height:80px;">
                                            </div>
                                            <div class="col-md-8">
                                                
                                                <div class="margin">
                                                    <center><h5>Assumption Medical Diagnostic Center, Inc.</h5></center>
                                                    <center><h6>10 Assumption Rd., Baguio City</h6></center>
                                                    <center><h6>Philippines</h6></center>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="modal-body">
                                        <div class="box-header">
                                          <div class="margin">
                                              <center><h4><b>View Order Details</b></h4></center>
                                            </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-11">
                                    <div class="form-group">
                                <label for="exampleInputEmail1">Supervisor Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" class="form-control" id="custName" name="custName" value="<?php echo $per_name ?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="txtid">Order ID</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="txtid" name="txtid" value="<?php echo $per_id;?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                    </div>
                                </div>
                        
                            </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Order Date</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control" id="orDate" name="orDate" value="<?php echo $per_date ?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                                <div class="form-group">
                                    <label >Order UNIQ ID</label>
                                    <div class="input-group">
                                        <input  class="form-control" id="uniq_ID" name="uniq_ID" value="<?php echo $per_uniq_id;?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                    </div>
                                </div>
                        
                            </div>
                        </div>
                        <?php
                        $sql="SELECT * FROM inventory_order io JOIN inventory_order_supplies ios USING(inventory_order_uniq_id) JOIN supplies s ON s.supply_description=ios.supply_name WHERE inventory_order_id=$id AND quantity !=0";
                        $result = $con->query($sql);    
                      ?>
                      <div class="row">
                    <div class="table-responsive">
                        <span id="error"></span>
                        <table class="table table-bordered" id="dynamic_field">
                            <tr>
                                <th style="display: none;">ID</th>
                                <th width="10%"> Quantity </th>
                                <th> Description </th>
                                <th> Unit </th>
                            </tr>
                            <?php if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) { 
                            ?>
                            <tr>
                                <td style="display: none;" ><input class="form-control" id="id" name="id" value="<?php echo $row['inventory_order_supplies_id'];?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                </td>


                                <td><input class="form-control" id="quantity" name="quantity" value="<?php echo $row['quantity'];?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                </td>

                                <td>
                                    <select class="form-control select2" id="supply" name="supply" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                  <option><?php echo $row['supply_description'];?></option>
                                                  <?php echo supply_dropdown($connect);?>
                                                </select>
                                </td>
                                            
                                <td width="20%"><input type="text" class="form-control" id="unit" name="unit" value="<?php echo $row['unit'];?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">  
                            </tr>
                                              </td>
              <?php 
                            }
                        }?>
                        </table>
                    </div>


                    <div class="row">
                    <div class="table-responsive">
                        <span id="error"></span>
                        <table class="table table-bordered" id="dynamic">
                            <tr>
                                <th width="10%"> Quantity </th>
                                <th> Description </th>
                                <th> Unit </th>
                            </tr>

                            <tr>
                                
                                <td><input class="form-control" id="number[]" name="number[]" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                </td>

                                <td>
                                    <select class="form-control select2" id="neym[]" name="neym[]" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                  <option value=""></option>
                                                  <?php echo supply_dropdown($connect);?>
                                                </select>
                                </td>
                                            
                                <td width="50px">
                                              <button type="button" name="plus" id="plus" class="btn btn-success">+</button> 
                                            </td>
                                </tr>
 
                        </table>
                    </div>

            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                <button type="submit" class="btn btn-primary" name="update" id="update">Save</button>
            </div>
        </form>
        </div>
        
<?php
}//end if
?>


<script>
$(document).ready(function(){
  var postURL = "order/updateItem";
  var i=1;
  var supplyDrop = <?php echo(json_encode(supply_dropdown($connect))); ?>;
  // var unitDrop = <?php // echo(json_encode(unit_measure($connect))); ?>;
  $('#plus').click(function(){
    if (i < 10){
      i++;
      // document.getElementById('row'+i+'').setAttribute("class", " ");
      $('#dynamic').append('<tr id="row'+i+'"></td> <td><input type="text" name="number[]" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" required /></td><td><select class="form-control select2" name="neym[]" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;"><option value=""></option> '+supplyDrop+' </select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">x</button></td></tr>');
    }

  });
  
  // $(document).on('click', '.btn_remove', function(){
  //   var button_id = $(this).attr("id"); 
  //   document.getElementById('row'+button_id+'').setAttribute("class", "hidden");
  //   i--;
  //   // $('#row'+button_id+'').remove();
  // });

  $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id"); 
        $('#row'+button_id+'').remove();
    });
  
  $('#update').click(function(){    
    $.ajax({
      url: postURL,
      method:"POST",
      data:$('#plus_name').serialize(),
      type: 'json',
      success:function(data)
      {
          i=1;
                  $('.dynamic-added').remove();
                  $('#plus_name')[0].reset();
            alert('Record Inserted Successfully.');
      }
    });
  });
  
});
</script>


