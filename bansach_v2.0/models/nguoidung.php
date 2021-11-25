<?php
	require_once "database.php";
	
	class NguoiDungDB
	{
		public function DanhSach()
		{
			$db = DB::KetNoi();
			
			try
			{
				$sql = "SELECT * FROM tbl_nguoidung";
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
				$sql = "SELECT * FROM tbl_nguoidung WHERE ID = :id";
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
		
		public function DangNhap($data)
		{
			$db = DB::KetNoi();
			
			try
			{
				$sql = "SELECT * FROM tbl_nguoidung WHERE TenDangNhap = :TDN AND MatKhau = :MK";
				$cmd = $db->prepare($sql);
				$cmd->bindValue(":TDN", $data['TenDangNhap']);
				$cmd->bindValue(":MK", sha1($data['MatKhau']));
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
				$sql = "INSERT INTO tbl_nguoidung(HoVaTen, TenDangNhap, MatKhau, QuyenHan, Khoa) 
						VALUES (:HoVaTen, :TenDangNhap, :MatKhau, :QuyenHan, :Khoa)";
				$cmd = $db->prepare($sql);
				$cmd->bindValue(":HoVaTen", $data['HoVaTen']);
				$cmd->bindValue(":TenDangNhap", $data['TenDangNhap']);
				$cmd->bindValue(":MatKhau", sha1($data['MatKhau']));
				$cmd->bindValue(":QuyenHan", $data['QuyenHan']);
				$cmd->bindValue(":Khoa", $data['Khoa']);
				return $cmd->execute();
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
				$sql = "DELETE FROM tbl_nguoidung WHERE ID = :id";
				$cmd = $db->prepare($sql);
				$cmd->bindValue(":id", $id);
				return $cmd->execute();
			}
			catch(PDOException $e)
			{
				$error_message = $e->getMessage();
				include_once "views/layouts/error.php";
				exit();
			}
		}
		
		public function Sua($data)
		{
			$db = DB::KetNoi();
			
			try
			{
				$sql = "UPDATE	tbl_nguoidung
						SET		HoVaTen = :HoVaTen,
								TenDangNhap = :TenDangNhap,
								MatKhau = :MatKhau,
								QuyenHan = :QuyenHan,
								Khoa = :Khoa
						WHERE	ID = :ID";
				$cmd = $db->prepare($sql);
				$cmd->bindValue(":ID", $data['ID']);
				$cmd->bindValue(":HoVaTen", $data['HoVaTen']);
				$cmd->bindValue(":TenDangNhap", $data['TenDangNhap']);
				$cmd->bindValue(":MatKhau", sha1($data['MatKhau']));
				$cmd->bindValue(":QuyenHan", $data['QuyenHan']);
				$cmd->bindValue(":Khoa", $data['Khoa']);
				return $cmd->execute();
			}
			catch(PDOException $e)
			{
				$error_message = $e->getMessage();
				include_once "views/layouts/error.php";
				exit();
			}
		}
		// cập nhật hồ sơ người dùng
		public function capnhathosonguoidung($ID,$HoVaTen,$TenDangNhap){
			$db = DB::KetNoi();
			try{
				$sql = "update tbl_nguoidung HoVaTen = :HoVaTen and TenDangNhap = :TenDangNhap where ID = :ID";
				$cmd = $dbcon ->prepare($sql);
				$cmd -> bindValue(":ID",$ID);
				$cmd -> bindValue(":HoVaTen",$HoVaTen);
				$cmd -> bindValue(":TenDangNhap",$TenDangNhap);
				$result = $cmd->execute();
				return $result;
			}catch(PDOException $e){
				$error_message = $e ->getMessage();
				echo "<p> Lỗi Truy Vấn : $error_message </p>";
				exit();
			}
		}
		public function doimatkhaunguoidung($ID,$MatKhau){
			$db = DB::KetNoi();
			try{
				$sql = "update tbl_nguoidung MatKhau = :MatKhau where ID = :ID";
				$cmd = $dbcon ->prepare($sql);
				$cmd -> bindValue(":ID",$ID);
				$cmd -> bindValue(":MatKhau",md5($MatKhau));
				$result = $cmd->execute();
				return $result;
			}catch(PDOException $e){
				$error_message = $e ->getMessage();
				echo "<p> Lỗi Truy Vấn : $error_message </p>";
				exit();
			}
		}
	}
?>