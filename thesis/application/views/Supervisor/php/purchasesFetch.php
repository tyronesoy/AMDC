<?php
$con=mysqli_connect('localhost','root','','itproject')
    or die("connection failed".mysqli_errno());

$request=$_REQUEST;
$col = array(
	0   =>  'inventory_order_id',
    1   =>  'inventory_order_created_date',
    2   =>  'inventory_order_name',
    3   =>  'intentory_order_dept',
    4   =>  'inventory_order_quantity',
    5   =>  'inventory_order_description',
    6   =>  'inventory_order_status',
    7   =>  'inventory_order_remarks'
	
);  //create column like table in database

$sql ="SELECT * FROM inventory_order";
$query=mysqli_query($con,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql ="SELECT * FROM inventory_order WHERE 1=1";	
if(!empty($request['search']['value'])){
	$sql.=" OR po_id Like '".$request['search']['value']."%' ";
	$sql.=" OR order_date Like '".$request['search']['value']."%' ";
    $sql.=" OR order_quantity Like '".$request['search']['value']."%' ";
    $sql.=" OR order_unit Like '".$request['search']['value']."%' ";
    $sql.=" OR po_unitprice Like '".$request['search']['value']."%' ";
	$sql.=" OR total Like '".$request['search']['value']."%' ";
	$sql.=" OR grand_total Like '".$request['search']['value']."%' ";
	$sql.=" OR remarks Like '".$request['search']['value']."%' ";
}
$query=mysqli_query($con,$sql);
$totalData=mysqli_num_rows($query);

//Order
$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".
    $request['start']."  ,".$request['length']."  ";

$query=mysqli_query($con,$sql);

$data=array();

while($row=mysqli_fetch_array($query)){
    $subdata=array();
    $subdata[]=$row[0]; 
	$subdata[]=$row[1]; 
    $subdata[]=$row[2]; 	 	
    $subdata[]=$row[3];
    $subdata[]=$row[6];
    $subdata[]=$row[7];
	
           //create event on click in button edit in cell datatable for display modal dialog           $row[0] is id in table on database
    /*$subdata[]='
             <a href="purchases?delete='.$row[0].'" onclick="return confirm(\'Are You Sure to delete the item?\')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash">&nbsp;</i>Remove</a>'; */
    $data[]=$subdata;
}

$json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($json_data);

?>
