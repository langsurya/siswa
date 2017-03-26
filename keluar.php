<?php
$id = $_SESSION['member_id'];
$status = 'off';
if ($siswa->updateStatusM($id,$status)) {
  echo "<script>alert('Anda berhasil Logout');</script>";
  echo "<meta http-equiv='refresh' content='0; url=index.php'>";
  session_destroy();
}
?>
