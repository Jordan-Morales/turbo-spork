<?php


class Launch {
  public $id;
  public $flight_number:
  public $launch_date_local:
  public $rocket:

  public function __construct($id, $flight_number, $launch_date_local, $rocket){
    $this->id = $id;
    $this->flight_number = $flight_number;
    $this->launch_date_local = $launch_date_local;
    $this->rocket = $rocket;
  }
}

class Launches {
  static function all(){
    $launches = array();

    $results = pg_query("SELECT * FROM launches");

    $row_object = pg_fetch_object($results);
    while($row_object){
      $new_launch = new Launch(
        intval($row_object->id),
        intval($row_object->flight_number),
        $launch_date_local,
        $rocket
      );
      $launches[] = $new_launch;
      $row_object = pg_fetch_object($results);
    }
    return $launches;
  }
}


?>
