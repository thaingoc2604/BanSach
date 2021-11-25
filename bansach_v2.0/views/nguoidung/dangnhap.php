<div class="card">
	<h4 class="card-header">Đăng nhập</h4>
	<div class="card-body">
		<form action="index.php?action=dangnhap_xuly" method="post">
			<div class="form-group">
				<label for="TenDangNhap">Tên đăng nhập</label>
				<input type="text" class="form-control" id="TenDangNhap" name="TenDangNhap" required />
			</div>
			<div class="form-group">
				<label for="MatKhau">Mật khẩu</label>
				<input type="password" class="form-control" id="MatKhau" name="MatKhau" required />
			</div>
			
			<button type="submit" class="btn btn-primary"><i class="fad fa-sign-in-alt"></i> Đăng nhập</button>
		</form>
	</div>
</div>