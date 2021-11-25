<?php
	foreach($dathang as $value)
	{
?>
		<div class="card mb-2">
			<h5 class="card-header">Đơn hàng số <?php echo str_pad($value['ID'], 8, "0", STR_PAD_LEFT); ?></h5>
			<div class="card-body">
				<p class="mb-1">Địa chỉ giao hàng: <strong><?php echo $value['DiaChiGiaoHang']; ?></strong></p>
				<p class="mb-1">Điện thoại đặt hàng: <strong><?php echo preg_replace("/^1?(\d{4})(\d{3})(\d{3})$/", "$1.$2.$3", $value['DienThoai']); ?></strong></p>
				<p class="mb-2">Tình trạng đơn hàng: <strong><?php echo $value['TinhTrang'] == 0 ? "Đang xử lý" : "Đã giao hàng" ; ?></strong></p>
				<table class="table table-bordered table-sm mb-0">
					<thead>
						<tr>
							<th width="5%">#</th>
							<th width="65%">Tên sách</th>
							<th width="10%">Số lượng</th>
							<th width="10%">Đơn giá</th>
							<th width="10%">Thành tiền</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$stt = 1;
							$tongTien = 0;
							foreach($dathangchitiet as $valuect)
							{
								if($valuect['MaDatHang'] == $value['ID'])
								{
									echo "<tr>";
										echo "<td>{$stt}</td>";
										echo "<td>{$valuect['TenSach']}</td>";
										echo "<td class='text-right'>{$valuect['SoLuong']}</td>";
										echo "<td class='text-right'>" . number_format($valuect['DonGiaBan']) . "<u><sup>đ</sup></u></td>";
										echo "<td class='text-right'>" . number_format($valuect['ThanhTien']) . "<u><sup>đ</sup></u></td>";
									echo "</tr>";
									
									$stt++;
									$tongTien = $tongTien + $valuect['ThanhTien'];
								}
							}
						?>
						<tr>
							<td class="font-weight-bold text-danger" colspan="4">Tổng tiền (đã bao gồm VAT)</td>
							<td class="text-right font-weight-bold text-danger"><?php echo number_format($tongTien); ?><u><sup>đ</sup></u></td>
						</tr>
						<tr>
							<td class="font-weight-bold text-primary" colspan="5">Bằng chữ: <?php echo ucfirst(DocSoThanhChu($tongTien)); ?> đồng.</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
<?php
	}
?>