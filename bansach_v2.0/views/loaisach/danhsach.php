<div class="card">
	<h4 class="card-header">Danh sách loại sách</h4>
	<div class="card-body table-responsive">
		<p><a class="btn btn-primary" href="index.php?action=loaisach_them" role="button"><i class="fad fa-plus"></i> Thêm loại sách</a></p>
		<table class="table table-bordered table-sm">
			<thead>
				<tr>
					<th width="5%">#</th>
					<th width="85%">Tên loại sách</th>
					<th width="5%">Sửa</th>
					<th width="5%">Xóa</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$stt = 1;
					foreach($loaisach as $value)
					{
						echo "<tr>";
							echo "<td>{$stt}</td>";
							echo "<td>{$value['TenLoai']}</td>";
							echo "<td class='text-center'><a href='index.php?action=loaisach_sua&id={$value['ID']}'><i class='fad fa-edit'></i></a></td>";
							echo "<td class='text-center'><a onclick='return confirm(\"Bạn có muốn xóa loại sách {$value['TenLoai']}?\")' href='index.php?action=loaisach_xoa&id={$value['ID']}'><i class='fad fa-trash-alt text-danger'></i></a></td>";
						echo "</tr>";
						$stt++;
					}
				?>
			</tbody>
		</table>
	</div>
</div>