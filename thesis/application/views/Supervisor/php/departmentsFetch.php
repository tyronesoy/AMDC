<?php
$con=mysqli_connect('localhost','root','','itproject')
    or die("connection failed".mysqli_errno());
$request=$_REQUEST;
$col = array(
    0   =>  'department_id',
    1   =>  'department_name',
    2   =>  'location'
);  //create column like table in database

$sql ="SELECT * FROM departments";
$query=mysqli_query($con,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql ="SELECT * FROM departments WHERE 1=1 AND soft_deleted = 'N' ";
if(!empty($request['search']['value'])){
    $sql.=" OR department_id Like '".$request['search']['value']."%' ";
    $sql.=" OR department_name Like '".$request['search']['value']."%' ";
    $sql.=" OR location Like '".$request['search']['value']."%' ";
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
    $subdata[]=$row[1]; 
    $subdata[]=$row[2]; 

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
