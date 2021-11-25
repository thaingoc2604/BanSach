<?php
	require_once "models/nhaxuatban.php";
	
	class NhaXuatBanController
	{
		public function getDanhSach()
		{
			$db = new NhaXuatBanDB();
			$nhaxuatban = $db->DanhSach();
			include_once "views/nhaxuatban/danhsach.php";
		}
		
		public function getThem()
		{
			include_once "views/nhaxuatban/them.php";
		}
		
		public function postThem($request)
		{
			$db = new NhaXuatBanDB();
			$db->Them($request);
			header("Location: index.php?action=nhaxuatban");
		}
		
		public function getSua($id)
		{
			$db = new NhaXuatBanDB();
			$nhaxuatban = $db->ChiTiet($id);
			include_once "views/nhaxuatban/sua.php";
		}
		
		public function postSua($request)
		{
			$db = new NhaXuatBanDB();
			$db->CapNhat($request);
			header("Location: index.php?action=nhaxuatban");
		}
		
		public function getXoa($id)
		{
			$db = new NhaXuatBanDB();
			$db->Xoa($id);
			header("Location: index.php?action=nhaxuatban");
		}
	}
?>