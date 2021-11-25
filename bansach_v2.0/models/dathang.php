<?php
	require_once "database.php";
	
	class DatHangDB
	{
		public function DanhSach()
		{
			
		}
		
		public function LichSuMuaHang()
		{
			$db = DB::KetNoi();
			
			try
			{
				$sql = "SELECT * FROM tbl_dathang WHERE MaNguoiDung = :MaNguoiDung ORDER BY NgayDatHang DESC";
				$cmd = $db->prepare($sql);
				$cmd->bindValue(":MaNguoiDung", $_SESSION['ID']);
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
		
		public function ChiTiet($id)
		{
			
		}
		
		public function Them($data)
		{
			$db = DB::KetNoi();
			
			try
			{
				$sql = "INSERT INTO tbl_dathang(MaNguoiDung, DiaChiGiaoHang, DienThoai, NgayDatHang, TinhTrang) 
						VALUES (:MaNguoiDung, :DiaChiGiaoHang, :DienThoai, now(), :TinhTrang)";
				$cmd = $db->prepare($sql);
				$cmd->bindValue(":MaNguoiDung", $_SESSION['ID']);
				$cmd->bindValue(":DiaChiGiaoHang", $data['DiaChiGiaoHang']);
				$cmd->bindValue(":DienThoai", $data['DienThoai']);
				$cmd->bindValue(":TinhTrang", 0); // Đang xử lý
				$cmd->execute();
				return $db->lastInsertId();
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