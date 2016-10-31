<?php
require_once '../../lib/db_connect.php'; // The mysql database connection script
$status = '%';
if(isset($_GET['status'])){
    $status = $mysqli->real_escape_string($_GET['status']);
}
$query="SELECT * from tb_photo_gallery order by photo_id desc";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr = array();
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $arr[] = $row;
    }
}

# JSON-encode the response
echo $json_response = json_encode($arr);
?>
