<?php
	require_once "models/sach.php";
	require_once "models/dathang.php";
	require_once "models/dathang_chitiet.php";
	require_once "libs/functions.php";
	
	class DatHangController
	{
		public function getThem()
		{
			$SanPhamTrongGio = array();
			if(isset($_SESSION['GioHang']))
			{
				foreach($_SESSION['GioHang'] as $maSP => $soLuong)
				{
					if(isset($maSP))
					{
						$SanPhamTrongGio[] = $maSP;
					}
				}
			}
			
			// Biến mảng thành chuỗi
			$strSanPhamTrongGio = implode(",", $SanPhamTrongGio);
			$sachdb = new SachDB();
			$sach = $sachdb->DanhSachGioHang($strSanPhamTrongGio);
			
			include_once "views/dathang/them.php";
		}
		
		public function postThem($request)
		{
			// Lưu vào tbl_dathang, trả về $id
			$dathangdb = new DatHangDB();
			$id = $dathangdb->Them($request);
			
			// Lưu vào tbl_dathang_chitiet
			foreach($_SESSION['GioHang'] as $maSP => $soLuong)
			{
				$sachdb = new SachDB();
				$sach = $sachdb->ChiTiet($maSP);
				
				$data = array(
					'MaDatHang' => $id,
					'MaSach' => $maSP,
					'SoLuong' => $soLuong,
					'DonGiaBan' => $sach['DonGia']
				);
				
				$dhctdb = new DatHangChiTietDB();
				$dhctdb->Them($data);
				
				// Trừ số lượng sách trong kho
				$sachdb->CapNhatSoLuong($maSP, $soLuong);
			}
			
			// Xóa giỏ hàng
			unset($_SESSION['GioHang']);
			
			$message = "Đặt hàng thành công!";
			include_once "views/layouts/success.php";
		}
		
		public function getLichSuMuaHang()
		{
			$dathangdb = new DatHangDB();
			$dathang = $dathangdb->LichSuMuaHang();
			
			$dathang_chitietdb = new DatHangChiTietDB();
			$dathang_chitiet = $dathang_chitietdb->LichSuMuaHang();
			
			$dathangchitiet = array();
			foreach($dathang_chitiet as $value)
			{
				$sachdb = new SachDB();
				$sach = $sachdb->ChiTiet($value['MaSach']);
				$dathangchitiet[] = array(
					'MaDatHang' => $value['MaDatHang'],
					'MaSach' => $value['MaSach'],
					'TenSach' => $sach['TenSach'],
					'SoLuong' => $value['SoLuong'],
					'DonGiaBan' => $value['DonGiaBan'],
					'ThanhTien' => $value['SoLuong'] * $value['DonGiaBan']
				);
			}
			
			include_once "views/dathang/lichsumuahang.php";
		}
	}
?>