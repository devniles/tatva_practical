<?php

include("config.php");
include("functions.php");


$type=$_REQUEST['type'];

if($type=='getEventDetails'){
    
    $result = mysqli_query($mysqli, "SELECT title FROM practical_event_list WHERE id = '".$_REQUEST['id']."'");
$row = mysqli_fetch_array($result); // this is the first row

     
     	 $query="select * from practical_event_dates where status=1 and eventid='".$_REQUEST['id']."'";
$resultDates = $mysqli->query($query);

$rows = resultToArray($resultDates);




  echo json_encode(array("eventName"=>$row,"datas"=>$rows));
     
    
}elseif($type=='deleteEvent'){
    
     $result = mysqli_query($mysqli, "delete FROM practical_event_list WHERE id = '".$_REQUEST['id']."'");
    
    if(isset($result)){
        echo json_encode(array("status"=>"success","msg"=>"Event Deleted SuccessFully"));
    }else{
        
            echo json_encode(array("status"=>"error","msg"=>"Some Error Try Again"));    
    }
}