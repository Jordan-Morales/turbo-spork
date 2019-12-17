<?php
$dbconn = pg_connect(getenv("DATABASE_URL"));

class Launch {
  public $id;
  public $likes;
  public $flight_number;
  public $mission_name;
  public $site_name_long;
  public $launch_date_local;
  public $notes;

  public function __construct($id, $likes, $flight_number, $mission_name, $site_name_long, $launch_date_local, $notes){
    $this->id = $id;
    $this->likes = $likes;
    $this->flight_number = $flight_number;
    $this->mission_name = $mission_name;
    $this->site_name_long = $site_name_long;
    $this->launch_date_local = $launch_date_local;
    $this->notes = $notes;
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
        intval($row_object->likes),
        intval($row_object->flight_number),
        $row_object->mission_name,
        $row_object->site_name_long,
        $row_object->launch_date_local,
        $row_object->notes
      );
      $launches[] = $new_launch;
      $row_object = pg_fetch_object($results);
    }
    return $launches;
  }
  static function create($launch){
    error_log($launch->likes);
    error_log($launch->mission_name);
    $query = "INSERT INTO launches (likes, flight_number, mission_name, site_name_long, launch_date_local, notes) VALUES ($1, $2, $3, $4, $5, $6)";
    $query_params = array($launch->likes, $launch->flight_number, $launch->mission_name, $launch->site_name_long, $launch->launch_date_local, $launch->notes);
    pg_query_params($query, $query_params);
    return self::all();
  }

  static function update($updated_launch){
      $query = "UPDATE launches SET likes = $1, flight_number = $2, mission_name = $3, site_name_long = $4, launch_date_local = $5, notes = $6 WHERE id = $7";
      $query_params = array($updated_launch->likes, $updated_launch->flight_number, $updated_launch->mission_name, $updated_launch->site_name_long, $updated_launch->launch_date_local, $updated_launch->notes, $updated_launch->id);
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
