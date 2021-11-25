<?php
	if($gioRong)
	{
		$message = "Giỏ hàng chưa có sản phẩm nào! Xin vui lòng quay về trang mua hàng.";
		include_once "views/layouts/empty.php";
	}
	else
	{
?>
<div class="card">
	<h4 class="card-header">Giỏ hàng</h4>
	<div class="card-body">
		<p><a class="btn btn-primary" href="index.php" role="button"><i class="fad fa-plus"></i> Tiếp tục mua hàng</a></p>
		<form method="post" action="index.php?action=giohang_capnhat">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th width="5%">#</th>
						<th width="10%">Ảnh bìa</th>
						<th width="40%">Tên sách</th>
						<th width="15%">Số lượng</th>
						<th width="10%">Đơn giá</th>
						<th width="15%">Thành tiền</th>
						<th width="5%">Xóa</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$stt = 1;
						$tongTien = 0;
						foreach($sach as $value)
						{
							echo "<tr>";
								echo "<th>{$stt}</th>";
								echo "<td><img src='storage/images/{$value['HinhAnh']}' width='90' /></td>";
								echo "<td>{$value['TenSach']}</td>";
								echo "<td>
									<div class='input-group'>
										<div class='input-group-prepend'>
											<span class='input-group-text'><a href='index.php?action=giohang_capnhat_giam&id=".$value['ID']."'><i class='fal fa-minus'></i></a></span>
										</div>
										<input type='text' class='form-control text-center' name='SoLuongTrongGio[".$value['ID']."]' value='".$_SESSION['GioHang'][$value['ID']]."' />
										<div class='input-group-append'>
											<span class='input-group-text'><a href='index.php?action=giohang_capnhat_tang&id=".$value['ID']."'><i class='fal fa-plus'></i></a></span>
										</div>
									</div>
								</td>";
								echo "<td class='text-right'>" . number_format($value['DonGia']) . "<u><sup>đ</sup></u></td>";
								echo "<td class='text-right'>" . number_format($_SESSION['GioHang'][$value['ID']] * $value['DonGia']) . "<u><sup>đ</sup></u></td>";
								echo "<td class='text-center'><a href='index.php?action=giohang_xoa&id={$value['ID']}'><i class='fad fa-trash-alt text-danger'></i></a></td>";
							echo "</tr>";
							$stt++;
							$tongTien += $_SESSION['GioHang'][$value['ID']] * $value['DonGia'];
						}
					?>
					<tr>
						<td colspan="5" class="font-weight-bold text-primary">Tổng thành tiền (đã bao gồm VAT)</td>
						<td class="text-right font-weight-bold text-danger"><?php echo number_format($tongTien); ?><u><sup>đ</sup></u></td>
						<td></td>
					</tr>
					<tr>
						<td colspan="7" class="font-weight-bold text-primary">Bằng chữ: <span class="text-danger"><?php echo ucfirst(DocSoThanhChu($tongTien)); ?> đồng.</span></td>
					</tr>
				</tbody>
			</table>
			<button type="submit" class="btn btn-warning"><i class="fad fa-sync"></i> Cập nhật giỏ hàng</button>
			<a class="btn btn-info" href="index.php?action=dathang_them"><i class="fad fa-credit-card"></i> Thanh toán</a>
		</form>
	</div>
</div>
<?php
	}
?>