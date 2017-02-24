<?php
class login {
  private $db;

  function __construct($DB_con){
    $this->db = $DB_con;
  }

  public function ceksession(){
    if (isset($_SESSION)) {
      # code...
    }
  }

  public function ceklogin($username,$password){
    try {
      $sql = "SELECT * FROM as_user WHERE username=:username AND password=:password";
      $stmt = $this->db->prepare($sql);
			$stmt->bindparam(':username',$username);
			$stmt->bindparam(':password',$password);
			$stmt->execute();
			$count = $stmt->rowCount();
      while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
        // if ($count != 0) {
          $_SESSION['username'] = $username;
					$_SESSION['nama'] = $row['full_name'];
					$_SESSION['level'] = $row['level'];
        // }
      }
    } catch (PDOException $e) {

    }

  }
}
?>
