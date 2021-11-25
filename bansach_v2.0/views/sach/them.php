<div class="card">
	<h4 class="card-header">Thêm sách</h4>
	<div class="card-body">
		<form action="index.php?action=sach_them_xuly" method="post">
			<div class="form-group">
				<label for="TenSach">Tên sách</label>
				<input type="text" class="form-control" id="TenSach" name="TenSach" required />
			</div>
			
			<div class="form-group">
				<label for="MaLoai">Loại sách</label>
				<select class="custom-select" id="MaLoai" name="MaLoai" required>
					<option value="">-- Chọn --</option>
					<?php
						foreach($loaisach as $value)
						{
							echo "<option value='{$value['ID']}'>{$value['TenLoai']}</option>";
						}
					?>
				</select>
			</div>
			
			<div class="form-group">
				<label for="MaNhaXB">Nhà xuất bản</label>
				<select class="custom-select" id="MaNhaXB" name="MaNhaXB" required>
					<option value="">-- Chọn --</option>
					<?php
						foreach($nhaxuatban as $value)
						{
							echo "<option value='{$value['ID']}'>{$value['TenNhaXB']}</option>";
						}
					?>
				</select>
			</div>
			
			<div class="form-group">
				<label for="DonGia">Đơn giá</label>
				<input type="text" class="form-control" id="DonGia" name="DonGia" required />
			</div>
			
			<div class="form-group">
				<label for="SoLuong">Số lượng</label>
				<input type="text" class="form-control" id="SoLuong" name="SoLuong" required />
			</div>
			
			<div class="form-group">
				<label for="HinhAnh">Hình ảnh bìa</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><a href="#upload" onclick="BrowseServer()">Chọn hình</a></span>
					</div>
					<input type="text" class="form-control" id="HinhAnh" name="HinhAnh" />
				</div>
			</div>
			
			<div class="form-group">
				<label for="MoTa">Mô tả sách</label>
				<textarea class="form-control" id="MoTa" name="MoTa"></textarea>
			</div>
			
			<button type="submit" class="btn btn-primary"><i class="fad fa-save"></i> Thêm vào CSDL</button>
		</form>
	</div>
</div>