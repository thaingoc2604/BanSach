<div class="card">
	<h4 class="card-header">Danh mục sách</h4>
	<div class="card-body table-responsive">
		<p><a class="btn btn-primary" href="index.php?action=sach_them" role="button"><i class="fad fa-plus"></i> Thêm sách</a></p>
		<table class="table table-bordered table-sm">
			<thead>
				<tr>
					<th width="5%">#</th>
					<th width="10%">Ảnh bìa</th>
					<th>Tên sách</th>
					<th width="15%">Loại</th>
					<th width="15%">NXB</th>
					<th width="5%">SL</th>
					<th width="10%">Đơn giá</th>
					<th width="5%">Sửa</th>
					<th width="5%">Xóa</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$stt = 1;
					foreach($sach as $value)
					{
						echo "<tr>";
							echo "<td>{$stt}</td>";
							echo "<td class='text-center'><img class='rounded' src='storage/images/thumbs/Images/{$value['HinhAnh']}' width='60' /></td>";
							echo "<td>{$value['TenSach']}</td>";
							echo "<td>{$value['TenLoai']}</td>";
							echo "<td>{$value['TenNhaXB']}</td>";
							echo "<td class='text-right'>{$value['SoLuong']}</td>";
							echo "<td class='text-right'>" . number_format($value['DonGia']) . "</td>";
							echo "<td class='text-center'><a href='index.php?action=sach_sua&id={$value['ID']}'><i class='fad fa-edit'></i></a></td>";
							echo "<td class='text-center'><a onclick='return confirm(\"Bạn có muốn xóa sách {$value['TenSach']}?\")' href='index.php?action=sach_xoa&id={$value['ID']}'><i class='fad fa-trash-alt text-danger'></i></a></td>";
						echo "</tr>";
						$stt++;
					}
				?>
			</tbody>
		</table>
	</div>
</div>