<?php
$dbconn = pg_connect(getenv("DATABASE_URL"));

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
  static function create($launch){
    $query = "INSERT INTO launches (flight_number, launch_date_local, rocket) VALUES ($1, $2, $3)";
    $query_params = array($launch->flight_number, $launch->launch_date_local, $launch->rocket);
    pg_query_params($query, $query_params);
    return self::all();
  }

  static function update($updated_launch){
      $query = "UPDATE launches SET flight_number = $1, launch_date_local = $2, rocket = $3 WHERE id = $4";
      $query_params = array($updated_launch->flight_number, $updated_launch->launch_date_local, $updated_launch->rocket, $updated_launch->id);
      $result = pg_query_params($query, $query_params);

      return self::all();
    }
    static function delete($id){
      $query = "DELETE FROM launches WHERE id = $1";
      $query_params = array($id);
      $result = pg_query_params($query, $query_params);

      return self::all();
    }
}


?>
