<?php

$con=mysqli_connect('localhost','root','','itproject')
    or die("connection failed".mysqli_errno());

$request=$_REQUEST;
$col = array(
    0   =>  'memo_id',
    1   =>  'memo_date',
    2   =>  'memo_description',
    3   =>  'memo_status'
);  //create column like table in database


$sql ="SELECT * FROM memo ";
$query=mysqli_query($con,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;


//Search
$sql ="SELECT * FROM memo";
if(!empty($request['search']['value'])){
    $sql.=" OR memo_id Like '".$request['search']['value']."%' ";
    $sql.=" OR memo_date Like '".$request['search']['value']."%' ";
    $sql.=" OR memo_description Like '".$request['search']['value']."%' ";
    $sql.=" OR memo_status Like '".$request['search']['value']."%' ";
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
    $subdata[]=$row[3];  
    //create event on click in button edit in cell datatable for display modal dialog $row[0] is id in table on database
    $subdata[]='<button type="button" id="getEdit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" data-id="'.$row[0].'"><i class="glyphicon glyphicon-pencil"></i> Edit</button>
             <a href="memo?delete='.$row[0].'" onclick="return confirm(\'Are You Sure ?\')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Remove</a>';
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







