<?php
// include "../inc/class.php";
// $siswa = new classsiswa;
if (!empty($_GET['category_id'])) {
	$siswa->hapusData($_GET['category_id'],'as_categories','category_id');
	header('location:?menu=kategori&msg=delete');
}
elseif (!empty($_GET['province_id'])) {
	$siswa->hapusData($_GET['province_id'],'as_provinces','province_id');
	header('location:?menu=provinsi&msg=delete');
}
elseif (!empty($_GET['city_id'])) {
	$siswa->hapusData($_GET['city_id'],'as_cities','city_id');
	header('location:?menu=kota&msg=delete');
}
elseif (!empty($_GET['user_id'])) {
	$siswa->hapusData($_GET['user_id'],'as_user','user_id');
	header('location:?menu=users&msg=delete');
}
elseif (!empty($_GET['member_id'])) {
	$siswa->hapusData($_GET['member_id'],'as_members','member_id');
	header('location:?menu=member&msg=delete');
}
elseif (!empty($_GET['comment_id'])) {
	$siswa->hapusData($_GET['comment_id'],'as_comments','comment_id');
	header('location:?menu=comment&msg=delete');
}
elseif (!empty($_GET['message_id'])) {
	$siswa->hapusData($_GET['message_id'],'as_message','message_id');
	header('location:?menu=chatting&msg=delete');
}
elseif (!empty($_GET['contact_id'])) {
	$siswa->hapusData($_GET['contact_id'],'as_contact','contact_id');
	header('location:?menu=contact&msg=delete');
}

?>
