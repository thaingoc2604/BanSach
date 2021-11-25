<?php
	require_once "models/loaisach.php";
	
	class LoaiSachController
	{
		public function getDanhSach()
		{
			$db = new LoaiSachDB();
			$loaisach = $db->DanhSach();
			include_once "views/loaisach/danhsach.php";
		}
		
		public function getThem()
		{
			include_once "views/loaisach/them.php";
		}
		
		public function postThem($request)
		{
			$db = new LoaiSachDB();
			$db->Them($request);
			header("Location: index.php?action=loaisach");
		}
		
		public function getSua($id)
		{
			$db = new LoaiSachDB();
			$loaisach = $db->ChiTiet($id);
			include_once "views/loaisach/sua.php";
		}
		
		public function postSua($request)
		{
			$db = new LoaiSachDB();
			$db->CapNhat($request);
			header("Location: index.php?action=loaisach");
		}
		
		public function getXoa($id)
		{
			$db = new LoaiSachDB();
			$db->Xoa($id);
			header("Location: index.php?action=loaisach");
		}
	}
?>