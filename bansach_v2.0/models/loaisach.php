<?php
	require_once "database.php";
	
	class LoaiSachDB
	{
		public function DanhSach()
		{
			$db = DB::KetNoi();
			
			try
			{
				$sql = "SELECT * FROM tbl_loaisach";
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
				$sql = "SELECT * FROM tbl_loaisach WHERE ID = :id";
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
				$sql = "INSERT INTO tbl_loaisach(TenLoai) VALUES(:TenLoai)";
				$cmd = $db->prepare($sql);
				$cmd->bindValue(":TenLoai", $data['TenLoai']);
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
				$sql = "DELETE FROM tbl_loaisach WHERE ID = :id";
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
				$sql = "UPDATE tbl_loaisach SET TenLoai = :TenLoai WHERE ID = :ID";
				$cmd = $db->prepare($sql);
				$cmd->bindValue(":ID", $data['ID']);
				$cmd->bindValue(":TenLoai", $data['TenLoai']);
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