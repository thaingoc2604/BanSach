<div class="card">
	<h4 class="card-header">Trang chủ</h4>
	<div class="card-body">
		<div class="card-group row">
			<?php
				foreach($sach as $value)
				{
					echo '<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 px-2">
							<div class="card books mb-3">
								<img src="storage/images/'.$value['HinhAnh'].'" class="card-img-top" />
								<div class="card-body p-2">
									<h5 class="card-title mb-1">'.$value['TenSach'].'</h5>
									<p class="card-text text-danger font-weight-bold">'.number_format($value['DonGia']).'<u><sup>đ</sup></u></p>
								</div>
								<div class="card-footer p-2">
									<a href="index.php?action=giohang_them&id='.$value['ID'].'" class="btn btn-sm btn-danger w-75"><i class="fad fa-cart-plus"></i> Đặt mua</a>
									<a href="index.php?action=sach_chitiet&id='.$value['ID'].'" class="btn btn-sm btn-secondary"><i class="fad fa-info-circle"></i></a>
								</div>
							</div>
						  </div>';
				}
			?>
		</div>
	</div>
</div>