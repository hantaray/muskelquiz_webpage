<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include("../lib/db.php");
include("../models/muskel.php");
  
// initialize object

// query Muskeln
$stmt = Muskel::checkModified($db);
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // set response code - 200 OK
    http_response_code(200);
  
    // show musklen data in json format
    echo json_encode($row);
}
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no musklen found
    echo json_encode(
        array("message" => "Keine Änderungen gefunden.")
    );
}