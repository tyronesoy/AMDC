<?php
//ISSUED SUPPLIES RETRIEVE / FETCH
$con=mysqli_connect('localhost','root','','itproject')
    or die("connection failed".mysqli_errno());

$request=$_REQUEST;
$col = array(
    0   =>  'requisition_id',
    1   =>  'request_date',
    2   =>  'quantity_ordered',
    3   =>  'issued_date',
    4   =>  'department_name',
    5   =>  'description',
    6   =>  'supply_type'
);  //create column like table in database

$sql ="SELECT * FROM request_supplies";
$query=mysqli_query($con,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql ="SELECT * FROM request_supplies WHERE 1=1";
if(!empty($request['search']['value'])){
    $sql.=" 0R requisition_id            Like '%".$request['search']['value']."%' ";
    $sql.=" OR request_date   Like '%".$request['search']['value']."%' ";
    $sql.=" OR quantity_ordered                 Like '%".$request['search']['value']."%' ";
    $sql.=" OR issued_date    Like '%".$request['search']['value']."%' ";
    $sql.=" OR department_name          Like '%".$request['search']['value']."%' ";
    $sql.=" OR description      Like '%".$request['search']['value']."%' ";
    
}
$query=mysqli_query($con,$sql);
$totalData=mysqli_num_rows($query);

//Order
$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".
    $request['start']."  ,".$request['length']." ";

$query=mysqli_query($con,$sql);

$data=array();

while($row=mysqli_fetch_array($query)){
    $subdata=array();
    $subdata[]=$row[1];
    $subdata[]=$row[3];
    $subdata[]=$row[6];
    $subdata[]=$row[5];
    $subdata[]=$row[2];  
    $subdata[]=$row[4];
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