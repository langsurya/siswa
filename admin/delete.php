<?php
include "../inc/class.php";
$obj = new classsiswa;
if (!empty($_GET['category_id'])) {
	$obj->hapusData($_GET['category_id'],'as_categories','category_id');
	header('location:?menu=kategori&msg=delete');
}
elseif (!empty($_GET['province_id'])) {
	$obj->hapusData($_GET['province_id'],'as_provinces','province_id');
	header('location:?menu=provinsi&msg=delete');
}
elseif (!empty($_GET['city_id'])) {
	$obj->hapusData($_GET['city_id'],'as_cities','city_id');
	header('location:?menu=kota&msg=delete');
}
elseif (!empty($_GET['user_id'])) {
	$obj->hapusData($_GET['user_id'],'as_user','user_id');
	header('location:?menu=users&msg=delete');
}
elseif (!empty($_GET['member_id'])) {
	$obj->hapusData($_GET['member_id'],'as_members','member_id');
	header('location:?menu=member&msg=delete');
}
elseif (!empty($_GET['comment_id'])) {
	$obj->hapusData($_GET['comment_id'],'as_comments','comment_id');
	header('location:?menu=comment&msg=delete');
}
elseif (!empty($_GET['message_id'])) {
	$obj->hapusData($_GET['message_id'],'as_message','message_id');
	header('location:?menu=chatting&msg=delete');
}

?>
