<?php
include_once __DIR__ . '/../model/launch.php';

if ($_REQUEST['action'] === 'index') {
  echo json_encode(Launches::all());
  } elseif ($_REQUEST['action'] === 'post') {
    $request_body = file_get_contents('php://input');
    $body_object = json_decode($request_body);
    $new_launch = new Launch(null, $body_object->likes, $body_object->flight_number, $body_object->mission_name, $body_object->site_name_long, $body_object->launch_date_local, $body_object->notes);
    $all_launches = Launches::create($new_launch);
    echo json_encode($all_launches);
    } else if ($_REQUEST['action'] === 'update'){
      $request_body = file_get_contents('php://input');
      print_r(file_get_contents('php://input'));
      print_r($request_body);
      $body_object = json_decode($request_body, true);
      print_r($body_object);
      $updated_launch = new Launch($_REQUEST['id'], $body_object->likes, $body_object->flight_number, $body_object->mission_name, $body_object->site_name_long, $body_object->launch_date_local, $body_object->notes);
      $all_launches = Launches::update($updated_launch);
      echo json_encode($all_launches);
      } else if ($_REQUEST['action'] === 'delete') {
        $all_launches = Launches::delete($_REQUEST['id']);
        echo json_encode($all_launches);
        }

?>
