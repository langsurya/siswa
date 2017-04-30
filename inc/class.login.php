<?php
class login {
  private $db;

  function __construct($DB_con){
    $this->db = $DB_con;
  }

  public function ceksession(){
    if (isset($_SESSION['username'])==0) {
			header('Location: ../');
		}
  }

  public function ceklogin($username,$password){
    try {
      $sql = "SELECT * FROM as_members WHERE username=:username AND password=:password";
      $stmt = $this->db->prepare($sql);
			$stmt->bindparam(':username',$username);
			$stmt->bindparam(':password',$password);
			$stmt->execute();
			$count = $stmt->rowCount();
      while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($count != 0) {
          $_SESSION['username'] = $username;
          $_SESSION['member_id'] = $row['member_id'];
					$_SESSION['nama'] = $row['first_name'];
          return true;
        }
      }
    } catch (PDOException $e) {

    }

  }

  public function cekloginadmin($username,$password){
		try {
			$sql = "SELECT * FROM as_user WHERE username=:username AND password=:password";
			$stmt = $this->db->prepare($sql);
			$stmt->bindparam(':username',$username);
			$stmt->bindparam(':password',$password);
			$stmt->execute();
			$count = $stmt->rowCount();
			while ($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				if ($count != 0) {
					$_SESSION['username'] = $username;
          $_SESSION['user_id'] = $row['user_id'];
					$_SESSION['full_name'] = $row['full_name'];
					$_SESSION['level'] = $row['level'];
					$_SESSION['blocked'] = $row['blocked'];
					if ($_SESSION['blocked']=='Y') {
						echo "<script>alert('Akun Anda Tidak Bisa Di Block Silahkan hubungi Admin');</script>";
						echo "<meta http-equiv='refresh' content='0; url=index.php'>";
						session_destroy();
					}elseif ($_SESSION['blocked']=='N') {
						if ($_SESSION['level']!='admin') {
							echo "<script>alert('Silahkan Login Sebagai Admininstrator');</script>";
							echo "<meta http-equiv='refresh' content='0; url=index.php'>";
							session_destroy();
						}else{
							if ($row['level']=='admin') {
							echo "<script>alert('Berhasil Login Sebagai Admininstrator');</script>";
							header("Location: admin/");
							return;
							}							
						}
					}
				}
			}
		} catch (PDOException $e) {

		}
	}

}
?>
