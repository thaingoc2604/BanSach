<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#00bfff;">
	<a class="navbar-brand" href="index.php">
		<img src="public/images/Sach.png" width="30" height="30" class="d-inline-block align-top" alt="" />
		N99_Book
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active"><a class="nav-link" href="#"><i class="fad fa-star"></i> Mua nhiều nhất</a></li>
			<li class="nav-item active"><a class="nav-link" href="index.php?action=giohang"><i class="fad fa-shopping-cart"></i> Giỏ hàng</a></li>
		</ul>
		<ul class="navbar-nav ml-auto">
			<?php
				if(!isset($_SESSION['ID']))
				{
			?>
					<li class="nav-item"><a class="nav-link" href="index.php?action=dangnhap"><i class="fad fa-sign-in-alt"></i> Đăng nhập</a></li>
					<li class="nav-item"><a class="nav-link" href="index.php?action=dangky"><i class="fad fa-user-plus"></i> Đăng ký</a></li>
			<?php
				}
				else
				{
			?>	 
					<li class="nav-item dropdown">
						<!-- index.php?action=doimatkhau  |  index.php?action=capnhathoso -->
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fad fa-user"></i> <?php echo $_SESSION['HoVaTen']; ?></a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="index.php?action=doimatkhau"><i class="fad fa-fw fa-key"></i> Đổi mật khẩu</a>
							<!-- <a class="dropdown-item" href="index.php?action=capnhathoso" data-toggle = "modal" data-taget = "capnhathoso"><i class="fad fa-fw fa-user-cog"></i> Cập nhật hồ sơ</a> -->
								<a class="dropdown-item" href="../capnhathoso.php"><i class="fad fa-fw fa-user-cog"></i> Cập nhật hồ sơ</a>
							<a class="dropdown-item" href="index.php?action=lichsumuahang"><i class="fad fa-fw fa-history"></i> Lịch sử mua hàng</a>
						</div>
					</li>
					
					<?php
						if($_SESSION['QuyenHan'] == 1)
						{
					?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fad fa-cog"></i> Quản lý</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="index.php?action=sach"><i class="fad fa-fw fa-file"></i> Sách</a>
							<a class="dropdown-item" href="index.php?action=loaisach"><i class="fad fa-fw fa-file"></i> Loại sách</a>
							<a class="dropdown-item" href="index.php?action=nhaxuatban"><i class="fad fa-fw fa-file"></i> Nhà xuất bản</a>
							<a class="dropdown-item" href="index.php?action=dathang"><i class="fad fa-fw fa-file"></i> Đặt hàng</a>
							<a class="dropdown-item" href="index.php?action=nguoidung"><i class="fad fa-fw fa-file"></i> Người dùng</a>
						</div>
					</li>
					<?php
						}
					?>
					<li class="nav-item"><a class="nav-link" href="index.php?action=dangxuat"><i class="fad fa-sign-out-alt"></i> Đăng xuất</a></li>
				
					

			<?php
				}
			?>
		</ul>
	</div>
</nav>