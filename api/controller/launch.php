<?php
include_once __DIR__ . '/../model/launch.php';

if ($_REQUEST['action'] === 'index') {
  echo json_encode(Launches::all());
  } elseif ($_REQUEST['action'] === 'post') {
    $request_body = file_get_contents('php://input');
    $body_object = json_decode($request_body);
    $new_launch = new launch(null, $body_object->flight_number);
    $all_launches = Launches::create($new_launch);
    echo json_encode($all_launches);
    } else if ($_REQUEST['action'] === 'update'){
      $request_body = file_get_contents('php://input');
      $body_object = json_decode($request_body);
      $updated_launch = new launch($_REQUEST['id'], $body_object->like, $body_object->notes);
      $all_launches = Launches::update($updated_launch);
      echo json_encode($all_launches);
      } else if ($_REQUEST['action'] === 'delete') {
        $all_launches = Launches::delete($_REQUEST['id']);
        echo json_encode($all_launches);
        }

?>
