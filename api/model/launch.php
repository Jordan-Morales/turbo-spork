<?php
$dbconn = pg_connect(getenv("DATABASE_URL"));

class Launch {
  public $id;
  public $likes:
  public $flight_number:
  public $notes:

  public function __construct($id, $flight_number){
    $this->id = $id;
    $this->likes = $likes;
    $this->flight_number = $flight_number;
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
        ArrayObject($row_object->notes)
      );
      $launches[] = $new_launch;
      $row_object = pg_fetch_object($results);
    }
    return $launches;
  }
  static function create($launch){
    $query = "INSERT INTO launches (likes, flight_number, notes) VALUES ($1, $2, $3)";
    $query_params = array($launch->flight_number, $launch->likes, $launch->notes);
    pg_query_params($query, $query_params);
    return self::all();
  }

  static function update($updated_launch){
      $query = "UPDATE launches SET likes = $1, flight_number = $2, notes = $3 WHERE id = $4";
      $query_params = array($updated_launch->likes, $updated_launch->flight_number, $updated_launch->notes, $updated_launch->id);
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
