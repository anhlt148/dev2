<!-- crop js -->
<script src="<?php echo base_url().'js/crop/crop.js'?>"></script>
<link href="<?php echo base_url().'js/crop/crop.css'?>" rel="stylesheet">
<link href="<?php echo base_url().'css/bootstrap.css'?>" rel="stylesheet">
<!-- end crop.-->

<!-- upload ảnh dai dien.-->
<div id="upload-modal" style="z-index: 10002; width: 500px; height: 350px; display: none;" class="modal">
    <div class="modal-header page-top">
    <button onclick="onCancel_PopupUploadAnh()" class="close">x</button>
    <h3 style="margin: 0; font-size: 14px; font-weight: bold;">Upload ảnh đại điện</h3>
    </div>
    <div class="modal-body">
    <div style="width: auto !important; display: block;" class="avatarcontainer">
        <div style="width: 470px; height: 260px; background-size: 319.346px 318.779px; background-repeat: no-repeat; background-position: 147px -7px;" class="imageBox">
        <div class="thumbBox"></div>
        <div style="display: none;" class="spinner">Đang đọc </div>
        </div>
        <div style="width:470px; padding:0 15px" class="action">
        <input id="file" type="file" style="float:left; width: 300px">
        <input id="btnCrop" type="button" style="float:right;" value="Cắt">
        <input id="btnZoomIn" type="button" style="float:right;" value="+">
        <input id="btnZoomOut" type="button" style="float:right;" value="-">
        </div>
    </div>
    </div>
</div>

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
                            <!-- <select id="user_role" class="form-control">
                                <option value="owner">Chủ sở hữu</option>
                                <option value="admin">Quản trị</option>
                            </select> -->
                            <div class="cropped" style="padding-right:0px;padding-top:10px"><img src="<?php echo base_url().'images/male.png'?>"></div>
                            <div class="editable" style="width:auto !important;display:inline-block;">
                                <a onclick="on_openUploadAnh();" style="cursor:pointer">
                                    <span style="color:black;font-weight:bold;font-size:12px;">Tải ảnh lên </span>
                                    <i class="fa fa-upload"></i>
                                </a>
                            </div>
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

	