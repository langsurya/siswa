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

  public function getData($id,$table,$key,$query)
	{
    if (empty($query)) {
      $stmt = $this->conn->prepare("SELECT * FROM $table WHERE $key=:key");
      $stmt->execute(array(":key"=>$id));
    }else {
      $stmt = $this->conn->prepare($query);
      $stmt->execute(array());
    }
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

  public function hapusData($id,$table,$key){
		$stmt = $this->conn->prepare("DELETE FROM $table WHERE $key=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}

  public function createMembers($facebook_id,$twitter_id,$email,$username,$password,$ufoto,$first_name,$last_name,$province_id,$city_id,$hp,$alamat,$biografi,$created_at){
    try {
			$stmt = $this->conn->prepare('INSERT INTO as_members(facebook_id,twitter_id,email,username,password,photo,first_name,last_name,province_id,city_id,hp,alamat,biografi,created_at)
      VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
			$stmt->bindParam(1,$facebook_id);
			$stmt->bindParam(2,$twitter_id);
      $stmt->bindParam(3,$email);
      $stmt->bindParam(4,$username);
      $stmt->bindParam(5,$password);
      $stmt->bindParam(6,$ufoto);
      $stmt->bindParam(7,$first_name);
      $stmt->bindParam(8,$last_name);
      $stmt->bindParam(9,$province_id);
      $stmt->bindParam(10,$city_id);
      $stmt->bindParam(11,$hp);
      $stmt->bindParam(12,$alamat);
      $stmt->bindParam(13,$biografi);
      $stmt->bindParam(14,$created_at);

			$stmt->execute();
			return true;
		} catch (PDOException $e) {
			return false;
		}
  }

  public function create_user($username,$password,$full_name,$email,$phone,$level,$blocked,$created_userid){
    try {
			$stmt = $this->conn->prepare('INSERT INTO as_user(username,password,full_name,email,phone,level,blocked,created_userid) VALUES(?,?,?,?,?,?,?,?)');
			$stmt->bindParam(1,$username);
			$stmt->bindParam(2,$password);
      $stmt->bindParam(3,$full_name);
      $stmt->bindParam(4,$email);
      $stmt->bindParam(5,$phone);
      $stmt->bindParam(6,$level);
      $stmt->bindParam(7,$blocked);
      $stmt->bindParam(8,$created_userid);

			$stmt->execute();
			return true;
		} catch (PDOException $e) {
			return false;
		}
  }

  public function create_provinsi($province_name,$status,$created_userid)
  {
    try {
			$stmt = $this->conn->prepare('INSERT INTO as_provinces(province_name,status,created_userid) VALUES(?,?,?)');
			$stmt->bindParam(1,$province_name);
			$stmt->bindParam(2,$status);
      $stmt->bindParam(3,$created_userid);

			$stmt->execute();
			return true;
		} catch (PDOException $e) {
			return false;
		}
  }

  public function create_kota($province_id,$city_code,$city_name,$status,$created_userid)
  {
    try {
			$stmt = $this->conn->prepare('INSERT INTO as_cities(province_id,city_code,city_name,status,created_userid) VALUES(?,?,?,?,?)');
			$stmt->bindParam(1,$province_id);
      $stmt->bindParam(2,$city_code);
      $stmt->bindParam(3,$city_name);
			$stmt->bindParam(4,$status);
      $stmt->bindParam(5,$created_userid);

			$stmt->execute();
			return true;
		} catch (PDOException $e) {
			return false;
		}
  }

  public function createCategories($category_name,$category_ceo,$status,$created_userid)
  {
    try {
			$stmt = $this->conn->prepare('INSERT INTO as_categories(category_name,category_ceo,status,created_userid) VALUES(?,?,?,?)');
			$stmt->bindParam(1,$category_name);
			$stmt->bindParam(2,$category_ceo);
      $stmt->bindParam(3,$status);
      $stmt->bindParam(4,$created_userid);

			$stmt->execute();
			return true;
		} catch (PDOException $e) {
			return false;
		}
  }

  public function update_user($id,$username,$password,$full_name,$email,$phone,$level,$blocked)
	{
		try {
			if (empty($password)) {
				$stmt = $this->conn->prepare("UPDATE as_user SET username=:username, full_name=:full_name, email=:email, phone=:phone, level=:level, blocked=:blocked WHERE user_id=:user_id");
			}else{
  			$stmt = $this->conn->prepare("UPDATE as_user SET
        username=:username, password=:password, full_name=:full_name, email=:email, phone=:phone, level=:level, blocked=:blocked
        WHERE user_id=:user_id");
  			$stmt->bindparam(":password",$password);
			}

			$stmt->bindparam(":user_id",$id);
			$stmt->bindparam(":username",$username);
			$stmt->bindparam(":full_name",$full_name);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":phone",$phone);
			$stmt->bindparam(":level",$level);
			$stmt->bindparam(":blocked",$blocked);

			$stmt->execute();
			return true;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}

  public function update_member($id,$facebook_id,$twitter_id,$email,$username,$password,$photo,$first_name,$last_name,$province_id,$city_id,$hp,$alamat,$biografi)
  {
    try {
			if (empty($photo)) {
        if (empty($password)) {
          $stmt = $this->conn->prepare("UPDATE as_members SET
          facebook_id=:facebook_id, twitter_id=:twitter_id, email=:email, username=:username, first_name=:first_name, last_name=:last_name, province_id=:province_id, city_id=:city_id, hp=:hp, alamat=:alamat, biografi=:biografi
          WHERE member_id=:member_id");
        }else {
          $stmt = $this->conn->prepare("UPDATE as_members SET
            facebook_id=:facebook_id, twitter_id=:twitter_id, email=:email, username=:username, password=:password, first_name=:first_name, last_name=:last_name, province_id=:province_id, city_id=:city_id, hp=:hp, alamat=:alamat, biografi=:biografi
            WHERE member_id=:member_id");
            $stmt->bindparam(":password",$password);
            // $stmt->bindparam(":photo",$photo);
        }
			}
      elseif(!empty($photo)){
        if (empty($password)) {
          # jika photo di upload namun password kosong...
          $stmt = $this->conn->prepare("UPDATE as_members SET
            facebook_id=:facebook_id, twitter_id=:twitter_id, email=:email, username=:username, photo=:photo, first_name=:first_name, last_name=:last_name, province_id=:province_id, city_id=:city_id, hp=:hp, alamat=:alamat, biografi=:biografi
            WHERE member_id=:member_id");
            // $stmt->bindparam(":password",$password);
            $stmt->bindparam(":photo",$photo);
        }elseif(isset($password)){
          # jika photo di upload dan pasword tidak kosong maka lakukan..
          $stmt = $this->conn->prepare("UPDATE as_members SET
            facebook_id=:facebook_id, twitter_id=:twitter_id, email=:email, username=:username,  password=:password, photo=:photo, first_name=:first_name, last_name=:last_name, province_id=:province_id, city_id=:city_id, hp=:hp, alamat=:alamat, biografi=:biografi
            WHERE member_id=:member_id");
            $stmt->bindparam(":password",$password);
            $stmt->bindparam(":photo",$photo);
        }
			}elseif(empty($password&&$photo)){
        $stmt = $this->conn->prepare("UPDATE as_members SET
        facebook_id=:facebook_id, twitter_id=:twitter_id, email=:email, username=:username, first_name=:first_name, last_name=:last_name, province_id=:province_id, city_id=:city_id, hp=:hp, alamat=:alamat, biografi=:biografi
        WHERE member_id=:member_id");
      }

			$stmt->bindparam(":member_id",$id);
			$stmt->bindparam(":facebook_id",$facebook_id);
			$stmt->bindparam(":twitter_id",$twitter_id);
      $stmt->bindparam(":email",$email);
			$stmt->bindparam(":username",$username);
			$stmt->bindparam(":first_name",$first_name);
      $stmt->bindparam(":last_name",$last_name);
      $stmt->bindparam(":province_id",$province_id);
      $stmt->bindparam(":city_id",$city_id);
      $stmt->bindparam(":hp",$hp);
      $stmt->bindparam(":alamat",$alamat);
      $stmt->bindparam(":biografi",$biografi);

			$stmt->execute();
			return true;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
  }

  public function updateProvinsi($id,$province_name,$status)
	{
		try {
			$stmt = $this->conn->prepare("UPDATE as_provinces
        SET province_name=:province_name, status=:status
        WHERE province_id=:province_id");

			$stmt->bindparam(":province_id",$id);
			$stmt->bindparam(":province_name",$province_name);
			$stmt->bindparam(":status",$status);

			$stmt->execute();
			return true;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}

  public function updateKota($id,$province_id,$city_name,$city_code,$status)
	{
		try {
			$stmt = $this->conn->prepare("UPDATE as_cities
        SET province_id=:province_id, city_code=:city_code, city_name=:city_name, status=:status
        WHERE city_id=:city_id");

			$stmt->bindparam(":city_id",$id);
      $stmt->bindparam(":province_id",$province_id);
			$stmt->bindparam(":city_name",$city_name);
      $stmt->bindparam(":city_code",$city_code);
			$stmt->bindparam(":status",$status);

			$stmt->execute();
			return true;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}

  public function updateCategories($id,$category_name,$category_ceo,$status)
	{
		try {
			$stmt = $this->conn->prepare("UPDATE as_categories
        SET category_name=:category_name, category_ceo=:category_ceo, status=:status
        WHERE category_id=:category_id");

			$stmt->bindparam(":category_id",$id);
			$stmt->bindparam(":category_name",$category_name);
			$stmt->bindparam(":category_ceo",$category_ceo);
			$stmt->bindparam(":status",$status);

			$stmt->execute();
			return true;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}

  public function paging($query,$records_per_page)
	{
		$starting_position=0;
		if (isset($_GET["page_no"])) {
			$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$query2=$query." limit $starting_position,$records_per_page";
		return $query2;
	}

	public function paginglink($query,$records_per_page){
		$self = $_SERVER['PHP_SELF'];
		if ($_GET['menu']==$_GET['menu']) {
			$menu = $_GET['menu'];
		}

		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		$total_no_of_records = $stmt->rowCount();

		if ($total_no_of_records > 0) {
			?><ul class="pagination"><?php
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;

			if (isset($_GET["page_no"])) {
				$current_page=$_GET["page_no"];
			}

			if ($current_page!=1) {
				$previous = $current_page-1;
				echo "<li><a href='".$self."?menu=".$menu."&page_no=1'>First</a></li>";
				echo "<li><a href='".$self."?menu=".$menu."&page_no=".$previous."'>First</a></li>";
			}

			for ($i=1; $i<=$total_no_of_pages; $i++) {
				if ($i==$current_page) {
					echo "<li><a href='".$self."?menu=".$menu."&page_no=".$i."' style='color:red;'>".$i."</a></li>";
				}else{
					echo "<li><a href='".$self."?menu=".$menu."&page_no=".$i."'>".$i."</a></li>";
				}
			}

			if ($current_page!=$total_no_of_pages) {
				$next=$current_page+1;
				echo "<li><a href='".$self."?menu=".$menu."&page_no=".$next."'>Next</a></li>";
				echo "<li><a href='".$self."?menu=".$menu."&page_no=".$total_no_of_pages."'>Last</a></li>";
			}
		}

	}

}

?>
