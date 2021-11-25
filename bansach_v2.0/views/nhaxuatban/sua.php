<div class="card">
	<h4 class="card-header">Sửa nhà xuất bản</h4>
	<div class="card-body">
		<form action="index.php?action=nhaxuatban_sua_xuly" method="post">
			<input type="hidden" id="ID" name="ID" value="<?php echo $nhaxuatban['ID']; ?>" />
			<div class="form-group">
				<label for="TenNhaXB">Tên nhà xuất bản</label>
				<input type="text" class="form-control" id="TenNhaXB" name="TenNhaXB" value="<?php echo $nhaxuatban['TenNhaXB']; ?>" required />
			</div>
			
			<button type="submit" class="btn btn-primary"><i class="fad fa-save"></i> Cập nhật</button>
		</form>
	</div>
</div>