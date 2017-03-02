<?php
/**
 *
 */
class ClassSiswa
{
  private $host = "localhost";
	private $user = "root";
	private $db = "db_siswa";
	private $pass = "";

  protected $conn;

  function __construct()
  {
    $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,$this->pass);
  }

  public function showData($query){
		// $sql = "SELECT * FROM $table";
		$q = $this->conn->query($query) or die("failed!");
		while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
			$data[]=$r;
		}
		return $data;
	}

  public function getData($id,$table,$key)
	{
		$stmt = $this->conn->prepare("SELECT * FROM $table WHERE $key=:key");
		$stmt->execute(array(":key"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

  public function create_anggota(){
    
  }

}

?>
