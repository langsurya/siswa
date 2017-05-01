<?php
// include "../inc/class.php";
// $siswa = new classsiswa;
if (!empty($_GET['category_id'])) {
	$siswa->hapusData($_GET['category_id'],'as_categories','category_id');
	header('location:?menu=kategori&msg=delete');
}
elseif (!empty($_GET['topic_id'])) {
	$siswa->hapusData($_GET['topic_id'],'as_topics','topic_id');
	header('location:?menu=post&msg=delete');
}

?>
