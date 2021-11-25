<?php
	require_once "models/sach.php";
	require_once "libs/functions.php";
	
	class GioHangController
	{
		public function getDanhSach()
		{
			// Giả sử giỏ rỗng
			$gioRong = true;
			$mangMaSP = array();
			
			if(isset($_SESSION['GioHang']))
			{
				foreach($_SESSION['GioHang'] as $maSP => $soLuong)
				{
					if($soLuong > 0)
					{
						$gioRong = false;
						$mangMaSP[] = $maSP;
					}
				}
			}
			
			if(!$gioRong)
			{
				$chuoiMaSP = implode(",", $mangMaSP);
				$db = new SachDB();
				$sach = $db->DanhSachGioHang($chuoiMaSP);
			}
			
			include_once "views/giohang/danhsach.php";
		}
		
		public function getThem($id)
		{
			// Nếu chưa có giỏ thì đăng ký giỏ rỗng
			if(!isset($_SESSION['GioHang']))
				$_SESSION['GioHang'] = array();
			
			// Nếu trong giỏ chưa có sản phẩm $id thì gán số lượng bằng 1
			if(!isset($_SESSION['GioHang'][$id]))
				$_SESSION['GioHang'][$id] = 1;
			else // Nếu trong giỏ đã có sản phẩm $id thì tăng số lượng lên 1
				$_SESSION['GioHang'][$id] += 1;
			
			header("Location: index.php?action=giohang");
		}
		
		public function postSua($request)
		{
			foreach($request['SoLuongTrongGio'] as $maSP => $soLuong)
			{
				if($soLuong <= 0 || !is_numeric($soLuong))
					unset($_SESSION['GioHang'][$maSP]);
				else
					$_SESSION['GioHang'][$maSP] = $soLuong;
			}
			
			header("Location: index.php?action=giohang");
		}
		
		public function getXoa($id)
		{
			unset($_SESSION['GioHang'][$id]);
			
			header("Location: index.php?action=giohang");
		}
		
		public function getCapNhatGiam($id)
		{
			if($_SESSION['GioHang'][$id] > 1)
				$_SESSION['GioHang'][$id] -= 1;
			
			header("Location: index.php?action=giohang");
		}
		
		public function getCapNhatTang($id)
		{
			$_SESSION['GioHang'][$id] += 1;
			
			header("Location: index.php?action=giohang");
		}
	}
?>