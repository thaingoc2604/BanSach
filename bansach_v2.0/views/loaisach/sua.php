<div class="card">
	<h4 class="card-header">Sửa loại sách</h4>
	<div class="card-body">
		<form action="index.php?action=loaisach_sua_xuly" method="post">
			<input type="hidden" id="ID" name="ID" value="<?php echo $loaisach['ID']; ?>" />
			<div class="form-group">
				<label for="TenLoai">Tên loại sách</label>
				<input type="text" class="form-control" id="TenLoai" name="TenLoai" value="<?php echo $loaisach['TenLoai']; ?>" required />
			</div>
			
			<button type="submit" class="btn btn-primary"><i class="fad fa-save"></i> Cập nhật</button>
		</form>
	</div>
</div>