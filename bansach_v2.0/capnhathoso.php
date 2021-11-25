<div class="modal fade" id="capnhathoso" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h3 class="modal-title">Hồ sơ cá nhân</h3>
								</div>
								<div class="modal-body">
								<form method="post">
									<div class="form-group"> 
										<label>Họ Tên</label> 
										<input class="form-control" type="text" name="txtHoTen"
										value="<?php echo $_SESSION["tbl_nguoidung"]["HoVaTen"]; ?>"
										>
									</div> 
									<div class="form-group"> 
										<label>Tên Đăng Nhập</label> 
										<input class="form-control" type="text" name="txttendangnhap"
											value="<?php echo $_SESSION["tbl_nguoidung"]["TenDangNhap"]; ?>"
										>
									</div>
									<div class="form-group"> 
										<input type="hidden" name="action" value="capnhat" >
										<input class="btn btn-primary" type="submit" value="Lưu">
										<input class="btn btn-warning" type="reset" value="Hủy">
									</div>
								</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
								</div>
							</div>
						</div>
					</div>