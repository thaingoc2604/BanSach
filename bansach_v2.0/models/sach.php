<?php
	require_once "database.php";
	
	class SachDB
	{
		public function DanhSach()
		{
			$db = DB::KetNoi();
			
			try
			{
				$sql = "SELECT s.*, l.TenLoai, n.TenNhaXB 
						FROM tbl_sach s, tbl_loaisach l, tbl_nhaxuatban n
						WHERE s.MaLoai = l.ID AND s.MaNhaXB = n.ID";
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
		
		public function DanhSachGioHang($strSanPhamTrongGio)
		{
			$db = DB::KetNoi();
			
			try
			{
				$sql = "SELECT * FROM tbl_sach WHERE ID IN($strSanPhamTrongGio)";
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
		
		public function ChiTiet($id)
		{
			$db = DB::KetNoi();
			
			try
			{
				$sql = "SELECT * FROM tbl_sach WHERE ID = :id";
				$cmd = $db->prepare($sql);
				$cmd->bindValue(":id", $id);
				$cmd->execute();
				return $cmd->fetch();
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
				$sql = "INSERT INTO tbl_sach(MaLoai, MaNhaXB, TenSach, MoTa, DonGia, SoLuong, HinhAnh) 
						VALUES (:MaLoai, :MaNhaXB, :TenSach, :MoTa, :DonGia, :SoLuong, :HinhAnh)";
				$cmd = $db->prepare($sql);
				$cmd->bindValue(":MaLoai", $data['MaLoai']);
				$cmd->bindValue(":MaNhaXB", $data['MaNhaXB']);
				$cmd->bindValue(":TenSach", $data['TenSach']);
				$cmd->bindValue(":MoTa", $data['MoTa']);
				$cmd->bindValue(":DonGia", $data['DonGia']);
				$cmd->bindValue(":SoLuong", $data['SoLuong']);
				$cmd->bindValue(":HinhAnh", $data['HinhAnh']);
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
			$db = DB::KetNoi();
			
			try
			{
				$sql = "DELETE FROM tbl_sach WHERE ID = :id";
				$cmd = $db->prepare($sql);
				$cmd->bindValue(":id", $id);
				$cmd->execute();
			}
			catch(PDOException $e)
			{
				$error_message = $e->getMessage();
				include_once "views/layouts/error.php";
				exit();
			}
		}
		
		public function CapNhat($data)
		{
			$db = DB::KetNoi();
			
			try
			{
				$sql = "UPDATE	tbl_sach
						SET		MaLoai	= :MaLoai,
								MaNhaXB = :MaNhaXB,
								TenSach = :TenSach,
								MoTa	= :MoTa,
								DonGia	= :DonGia,
								SoLuong = :SoLuong,
								HinhAnh = :HinhAnh
						WHERE	ID		= :ID";
				$cmd = $db->prepare($sql);
				$cmd->bindValue(":ID", $data['ID']);
				$cmd->bindValue(":MaLoai", $data['MaLoai']);
				$cmd->bindValue(":MaNhaXB", $data['MaNhaXB']);
				$cmd->bindValue(":TenSach", $data['TenSach']);
				$cmd->bindValue(":MoTa", $data['MoTa']);
				$cmd->bindValue(":DonGia", $data['DonGia']);
				$cmd->bindValue(":SoLuong", $data['SoLuong']);
				$cmd->bindValue(":HinhAnh", $data['HinhAnh']);
				$cmd->execute();
			}
			catch(PDOException $e)
			{
				$error_message = $e->getMessage();
				include_once "views/layouts/error.php";
				exit();
			}
		}
		
		public function CapNhatSoLuong($id, $soLuong)
		{
			$db = DB::KetNoi();
			
			try
			{
				$sql = "UPDATE	tbl_sach
						SET		SoLuong = SoLuong - :SoLuong
						WHERE	ID = :ID";
				$cmd = $db->prepare($sql);
				$cmd->bindValue(":ID", $id);
				$cmd->bindValue(":SoLuong", $soLuong);
				$cmd->execute();
			}
			catch(PDOException $e)
			{
				$error_message = $e->getMessage();
				include_once "views/layouts/error.php";
				exit();
			}
		}
	}
?>