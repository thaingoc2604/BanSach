<div class="card">
	<h4 class="card-header">Danh sách người dùng</h4>
	<div class="card-body table-responsive">
		<p><a class="btn btn-primary" href="index.php?action=dangky" role="button"><i class="fad fa-plus"></i> Thêm người dùng</a></p>
		<table class="table table-bordered table-sm">
			<thead>
				<tr>
					<th width="5%">#</th>
					<th width="35%">Họ và tên</th>
					<th width="20%">Tên đăng nhập</th>
					<th width="20%">Quyền hạn</th>
					<th width="10%">Khóa</th>
					<th width="5%">Sửa</th>
					<th width="5%">Xóa</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$stt = 1;
					foreach($nguoidung as $value)
					{
						echo "<tr>";
							echo "<td>{$stt}</td>";
							echo "<td>{$value['HoVaTen']}</td>";
							echo "<td>{$value['TenDangNhap']}</td>";
							echo "<td>";
								if($value['QuyenHan'] == 1)
									echo "<span class='badge badge-primary'>Quản trị</span>";
								else
									echo "<span class='badge badge-secondary'>Khách hàng</span>";
							echo "</td>";
							echo "<td class='text-center'>";
								if($value['Khoa'] == 0)
									echo "<a href='index.php?action=nguoidung_khoa&id={$value['ID']}'><i class='fad fa-check text-primary'></i></a>";
								else
									echo "<a href='index.php?action=nguoidung_khoa&id={$value['ID']}'><i class='fad fa-ban text-danger'></i></a>";
							echo "</td>";
							echo "<td class='text-center'><a href='index.php?action=nguoidung_sua&id={$value['ID']}'><i class='fad fa-edit'></i></a></td>";
							echo "<td class='text-center'><a onclick='return confirm(\"Bạn có muốn xóa người dùng {$value['HoVaTen']}?\")' href='index.php?action=nguoidung_xoa&id={$value['ID']}'><i class='fad fa-trash-alt text-danger'></i></a></td>";
						echo "</tr>";
						$stt++;
					}
				?>
			</tbody>
		</table>
	</div>
</div>