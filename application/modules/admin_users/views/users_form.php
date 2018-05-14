<div class="row">
	<!-- /.col-lg-12 -->
	<div class="col-lg-12">
		<!-- Lưới danh sách -->
		<div id="grid_list" class="panel panel-default">
			<div class="panel-heading">
				<button type="button" class="btn btn-success" onclick="create(this)" data-val="location.href='<?php echo base_url().'admin_category/add'?>'">Thêm mới</button>
				<button type="button" class="btn btn-info" onclick="reload_list()">Tải lại</button>
				<button type="button" class="btn btn-danger" onclick="delete_multi(this)" data-val="<?php echo base_url().'admin_category/delete_multi'?>">Xóa nhiều</button>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="table-responsive">
					<table id="grid_list" class="table">
						<thead>
							<tr>
								<th>#</th>
								<th><input class="check_all" type="checkbox" onchange="check_all(this);"></th>
								<th>Email</th>
								<th>Tên tài khoản</th>
								<th>Trạng thái</th>
								<th>Quyền</th>
								<th>Hình ảnh</th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<!-- /.table-responsive -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->

		<!-- form thêm mới -->	
		<div id="create_new" class="panel panel-default" style="display:none;">
            <form>
                <fieldset style="padding: 10px 0;">
                    <!-- Email -->
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label for="">Email đăng nhập</label>
                        </div>
                        <div class="col-lg-9">
                            <input class="form-control" id="email" type="text" placeholder="Bắt buộc...">
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <!-- tên -->
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label for="">Tên tài khoản</label>
                        </div>
                        <div class="col-lg-9">
                            <input class="form-control" id="user_name" type="text" placeholder="Bắt buộc...">
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <!-- mat khau -->
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label for="">Mật khẩu</label>
                        </div>
                        <div class="col-lg-9">
                            <input class="form-control" id="password" type="password" placeholder="Bắt buộc...">
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <!-- mat khau 2-->
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label for="">Xác nhận mật khẩu</label>
                        </div>
                        <div class="col-lg-9">
                            <input class="form-control" id="password2" type="password" placeholder="Bắt buộc...">
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <!-- trạng thái -->
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label for="">Trạng thái</label>
                        </div>
                        <div class="col-lg-9">
                            <select id="status" class="form-control">
                                <option value="on">Hoạt động</option>
                                <option value="off">Khóa</option>
                            </select>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <!-- quyền -->
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label for="">Quyền</label>
                        </div>
                        <div class="col-lg-9">
                            <select id="user_role" class="form-control">
                                <option value="owner">Chủ sở hữu</option>
                                <option value="admin">Quản trị</option>
                            </select>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <!-- hình ảnh -->
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label for="">Hình ảnh</label>
                        </div>
                        <div class="col-lg-9">
                            <select id="user_role" class="form-control">
                                <option value="owner">Chủ sở hữu</option>
                                <option value="admin">Quản trị</option>
                            </select>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    
                    <div class="form-group">
                        <div class="col-lg-12">
                            <button type="button" class="btn btn-primary" onclick="saveItem(this)" href="<?php echo base_url().'admin_category/add'?>" id="save">Lưu</button>
                            <button type="button" class="btn btn-primary" onclick="saveItem(this)" href="<?php echo base_url().'admin_category/update'?>" id="update" style="display: none;">Cập nhật</button>
                            <button type="reset" class="btn btn-danger">Hủy</button>
                            <button type="button" onclick="back_to_list()" class="btn btn-warning">Danh sách</button>
                        </div>
                    </div>
                </fieldset>
            </form>
		</div>	
	</div>
</div>

	