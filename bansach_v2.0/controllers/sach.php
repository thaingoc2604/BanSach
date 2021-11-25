<?php
	require_once "models/sach.php";
	require_once "models/loaisach.php";
	require_once "models/nhaxuatban.php";
	
	class SachController
	{
		public function getDanhSach()
		{
			$db = new SachDB();
			$sach = $db->DanhSach();
			include_once "views/sach/danhsach.php";
		}
		
		public function getDanhSachHome()
		{
			$db = new SachDB();
			$sach = $db->DanhSach();
			include_once "views/home.php";
		}
		
		public function getThem()
		{
			$db = new LoaiSachDB();
			$loaisach = $db->DanhSach();
			
			$db = new NhaXuatBanDB();
			$nhaxuatban = $db->DanhSach();
			
			$path = "http://127.0.0.1:8080/bansach_v2.0/storage/images/";
			$_SESSION['baseUrl'] = $path;
			
			include_once "views/sach/them.php";
		}
		
		public function postThem($request)
		{
			$db = new SachDB();
			$db->Them($request);
			header("Location: index.php?action=sach");
		}
		
		public function getSua($id)
		{
			$db = new LoaiSachDB();
			$loaisach = $db->DanhSach();
			
			$db = new NhaXuatBanDB();
			$nhaxuatban = $db->DanhSach();
			
			$path = "http://127.0.0.1:8080/bansach_v2.0/storage/images/";
			$_SESSION['baseUrl'] = $path;
			
			$db = new SachDB();
			$sach = $db->ChiTiet($id);
			include_once "views/sach/sua.php";
		}
		
		public function postSua($request)
		{
			$db = new SachDB();
			$db->CapNhat($request);
			header("Location: index.php?action=sach");
		}
		
		public function getXoa($id)
		{
			$db = new SachDB();
			$db->Xoa($id);
			header("Location: index.php?action=sach");
		}
	}
?>