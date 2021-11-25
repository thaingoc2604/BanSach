<div class="card">
	<h4 class="card-header">Danh sách nhà xuất bản</h4>
	<div class="card-body table-responsive">
		<p><a class="btn btn-primary" href="index.php?action=nhaxuatban_them" role="button"><i class="fad fa-plus"></i> Thêm nhà xuất bản</a></p>
		<table class="table table-bordered table-sm">
			<thead>
				<tr>
					<th width="5%">#</th>
					<th width="85%">Tên nhà xuất bản</th>
					<th width="5%">Sửa</th>
					<th width="5%">Xóa</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$stt = 1;
					foreach($nhaxuatban as $value)
					{
						echo "<tr>";
							echo "<td>{$stt}</td>";
							echo "<td>{$value['TenNhaXB']}</td>";
							echo "<td class='text-center'><a href='index.php?action=nhaxuatban_sua&id={$value['ID']}'><i class='fad fa-edit'></i></a></td>";
							echo "<td class='text-center'><a onclick='return confirm(\"Bạn có muốn xóa nhà xuất bản {$value['TenNhaXB']}?\")' href='index.php?action=nhaxuatban_xoa&id={$value['ID']}'><i class='fad fa-trash-alt text-danger'></i></a></td>";
						echo "</tr>";
						$stt++;
					}
				?>
			</tbody>
		</table>
	</div>
</div>