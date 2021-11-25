<?php
	require_once "database.php";
	
	class DatHangChiTietDB
	{
		public function DanhSach()
		{
			
		}
		
		public function ChiTiet($id)
		{
			
		}
		
		public function LichSuMuaHang()
		{
			$db = DB::KetNoi();
			
			try
			{
				$sql = "SELECT * FROM tbl_dathang_chitiet WHERE 1";
				$cmd = $db->prepare($sql);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e)
			{
				$error_message = $e->getMessage();
				include_once "views/layouts/error.php";
				exit();
			}
		}
		
		public function Them($data)
		{
			$db = DB::KetNoi();
			
			try
			{
				$sql = "INSERT INTO tbl_dathang_chitiet(MaDatHang, MaSach, SoLuong, DonGiaBan) 
						VALUES (:MaDatHang, :MaSach, :SoLuong, :DonGiaBan)";
				$cmd = $db->prepare($sql);
				$cmd->bindValue(":MaDatHang", $data['MaDatHang']);
				$cmd->bindValue(":MaSach", $data['MaSach']);
				$cmd->bindValue(":SoLuong", $data['SoLuong']);
				$cmd->bindValue(":DonGiaBan", $data['DonGiaBan']);
				$cmd->execute();
			}
			catch(PDOException $e)
			{
				$error_message = $e->getMessage();
				include_once "views/layouts/error.php";
				exit();
			}
		}
		
		public function Xoa($id)
		{
			
		}
		
		public function CapNhat($data)
		{
			
		}
	}
?>