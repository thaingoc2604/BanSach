<?php
	if(!isset($_SESSION['ID']))
	{
		$error_message = "Vui lòng <a href='index.php?action=dangnhap'>đăng nhập</a> để thanh toán. Nếu chưa có tài khoản, xin vui lòng <a href='index.php?action=dangky'>đăng ký</a>.";
		include_once "views/layouts/error.php";
	}
	else
	{
?>
		<div class="card">
			<h5 class="card-header">Thông tin thanh toán</h5>
			<div class="card-body">
				<form action="index.php?action=dathang_them_xuly" method="post">
					<div class="form-group">
						<label for="DiaChiGiaoHang">Địa chỉ giao hàng</label>
						<input type="text" class="form-control" id="DiaChiGiaoHang" name="DiaChiGiaoHang" required />
					</div>
					<div class="form-group">
						<label for="DienThoai">Điện thoại đặt hàng</label>
						<input type="text" class="form-control" id="DienThoai" name="DienThoai" required />
					</div>
					
					<button type="submit" class="btn btn-primary"><i class="fad fa-check-circle"></i> Hoàn tất đặt hàng</button>
				</form>
			</div>
		</div>
		
		<div class="card mt-3">
			<h5 class="card-header">Sản phẩm đã đặt</h5>
			<div class="card-body table-responsive">
				<table class="table table-bordered table-sm">
					<thead>
						<tr>
							<th width="5%">#</th>
							<th width="10%">Ảnh bìa</th>
							<th width="55%">Tên sách</th>
							<th width="10%">Số lượng</th>
							<th width="10%">Đơn giá</th>
							<th width="10%">Thành tiền</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$stt = 1;
							$tongTien = 0;
							foreach($sach as $value)
							{
								echo "<tr>";
									echo "<td>{$stt}</td>";
									echo "<td class='text-center'><img class='img-thumbnail' src='storage/images/{$value['HinhAnh']}' width='60' /></td>";
									echo "<td>{$value['TenSach']}</td>";
									echo "<td class='text-right'>" . $_SESSION['GioHang'][$value['ID']] . "</td>";
									echo "<td class='text-right'>" . number_format($value['DonGia']) . "<u><sup>đ</sup></u></td>";
									echo "<td class='text-right'>" . number_format($_SESSION['GioHang'][$value['ID']] * $value['DonGia']) . "<u><sup>đ</sup></u></td>";
								echo "</tr>";
								
								$stt++;
								$tongTien = $tongTien + $_SESSION['GioHang'][$value['ID']] * $value['DonGia'];
							}
						?>
						<tr>
							<td class="font-weight-bold text-danger" colspan="5">Tổng tiền (đã bao gồm VAT)</td>
							<td class="text-right font-weight-bold text-danger"><?php echo number_format($tongTien); ?><u><sup>đ</sup></u></td>
						</tr>
						<tr>
							<td class="font-weight-bold text-primary" colspan="6">Bằng chữ: <?php echo ucfirst(DocSoThanhChu($tongTien)); ?> đồng.</td>
						</tr>
					</tbody>
				</table>
				<a class="btn btn-info" href="index.php?action=giohang" role="button"><i class="fad fa-edit"></i> Chỉnh sửa đơn hàng</a>
			</div>
		</div>
<?php
	}
?>