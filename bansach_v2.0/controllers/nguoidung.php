<?php
	require_once "models/nguoidung.php";
	
	class NguoiDungController
	{
		public function getDanhSach()
		{
			$db = new NguoiDungDB();
			$nguoidung = $db->DanhSach();
			include_once "views/nguoidung/danhsach.php";
		}
		
		public function getThem()
		{
			include_once "views/nguoidung/them.php";
		}
		
		public function postThem($request)
		{
			$db = new NguoiDungDB();
			$kq = $db->Them($request);
			if($kq)
			{
				$message = "Đăng ký thành công!";
				include_once "views/layouts/success.php";
			}
		}
		
		public function getDangNhap()
		{
			include_once "views/nguoidung/dangnhap.php";
		}
		
		public function postDangNhap($request)
		{
			$db = new NguoiDungDB();
			
			if(trim($request['TenDangNhap']) == "")
			{
				$error_message = "Tên đăng nhập không được bỏ trống!";
				include_once "views/layouts/error.php";
			}
			elseif(trim($request['MatKhau']) == "")
			{
				$error_message = "Mật khẩu không được bỏ trống!";
				include_once "views/layouts/error.php";
			}
			else
			{
				$nguoidung = $db->DangNhap($request);
				if($nguoidung)
				{
					if($nguoidung['Khoa'] == 1)
					{
						$error_message = "Tài khoản người dùng đã bị khóa!";
						include_once "views/layouts/error.php";
					}
					else
					{
						$_SESSION['ID'] = $nguoidung['ID'];
						$_SESSION['HoVaTen'] = $nguoidung['HoVaTen'];
						$_SESSION['QuyenHan'] = $nguoidung['QuyenHan'];
						header("Location: index.php");
					}
				}
				else
				{
					$error_message = "Tài khoản không tồn tại!";
					include_once "views/layouts/error.php";
				}
			}
		}
		
		public function getDangXuat()
		{
			unset($_SESSION['ID']);
			unset($_SESSION['HoVaTen']);
			unset($_SESSION['QuyenHan']);
			header("Location: index.php");
		}
		
		public function getSua($id)
		{
			$db = new NguoiDungDB();
			$nguoidung = $db->ChiTiet($id);
			include_once "views/nguoidung/sua.php";
		}
		
		public function postSua($request)
		{
			$db = new NguoiDungDB();
			$db->Sua($request);
			header("Location: index.php?action=nguoidung");
		}
		
		public function getXoa($id)
		{
			$db = new NguoiDungDB();
			$db->Xoa($id);
			header("Location: index.php?action=nguoidung");
		}
		
	}
?>