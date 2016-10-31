<?php
/**
 * Created by PhpStorm.
 * User: new0309
 * Date: 2016-10-17
 * Time: 오후 5:01
 */
$con = mysqli_connect("127.0.0.1","romstravel","Gogh0330!!","romstravel");
if(!con){
    die('could not connet : ' .mysqli_error());
}
mysqli_select_db($con,'romstravel');
$sql = mysqli_query("SELECT * FROM states");
if(mysqli_num_rows($sql)){
    $data = $array();
    while($row = mysqli_fetch_array($sql)){
        $data[] = array(
            'id' => $row['id'],
            'name' => $row['name']
        );
    }
    header('Content-type:application/json');
    echo json_encode($data);

}
?>