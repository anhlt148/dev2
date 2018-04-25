<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		checkError();

	});
	// hàm hiển thị thông báo:
	function tempAlert(msg) {
		var el = document.createElement("div");
		el.setAttribute("class", "notification");
		el.setAttribute("style","font-weight:bold;position:absolute; top:8vh; left:40vw; background-color:#FFB752; padding: 10px 15px;");
		el.innerHTML = msg;
		setTimeout(function(){
			el.parentNode.removeChild(el);
		}, 3000);
		document.body.appendChild(el);
	}
	// hàm kiểm tra có lỗi không:
	function checkError() {
		var error = $('.error').val();
		if (error != '') {
			alert(error);
		}
	}
	// hàm kiem tra validation form:
    function checkValidation(){
        var obj = {
            'user_name': $('#user_name').val().trim(),
            'email': $('#email').val().trim(),
            'password': $('#password').val().trim(),
            'user_role': $('#user_role').val(),
            'status': $('#status').val(),
            'user_image': $('#user_image').val(),
        }
        var value = '(*)';
        var validation = false;
        $('.required').html('');
        for (key in obj) {
            if(obj[key] == ''){
                $('.'+key).html(value);
                validation = true;                
            }
        }
        if(validation)
            return false
    }
</script>
<input class="error" type="hidden" name="" value="<?php if(isset($error)){echo $error;} ?>">
<div class="col-xs-12" style="margin-top:15px;">
	<!-- PAGE CONTENT BEGINS -->
	<form class="form-horizontal" enctype="multipart/form-data" method="POST" role="form" action="<?php echo base_url().'admin_member/admin_member_add' ?>">
		<!-- tài khoản -->
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"></label>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tài khoản </label>
			<div class="col-sm-9">
				<input type="text" id="user_name" placeholder="Nhập tài khoản" name="user_name" class="col-xs-10 col-sm-8" />
				<span class="required user_name"></span>
			</div>
		</div>
		<div class="space-4"></div>
		<!-- email -->
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Email </label>
			<div class="col-sm-9">
				<input type="text" id="email" placeholder="Nhập email" name="email" class="col-xs-10 col-sm-8" />
				<span class="required email"><?php if(isset($emailValid) && $emailValid !=''){echo $emailValid;} ?></span>
			</div>
		</div>
		<div class="space-4"></div>
		<!-- Mật khẩu -->
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Mật khẩu </label>
			<div class="col-sm-9">
				<input type="password" id="password" placeholder="Nhập mật khẩu" name="password" class="col-xs-10 col-sm-8" />
				<span class="required password"></span>
			</div>
		</div>
		<div class="space-4"></div>
		<!-- Quyền hạn -->
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Quyền hạn </label>
			<div class="col-sm-9">
				<select class="col-sm-8"  name="user_role" id="user_role">
					<option value="owner">Chủ sở hữu</option>
					<option value="admin">Quản trị viên</option>
					<option value="author">Tác giả</option>
					<option value="member">Nhân viên</option>
				</select>
				<span class="required user_role"></span>
			</div>
		</div>
		<div class="space-4"></div>
		<!-- Trạng thái -->
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Trạng thái </label>
			<div class="col-sm-9">
				<select class="col-sm-8" name="status" id="status">
					<option value="">[--Chọn trạng thái--]</option>
					<option value="1">Hoạt động</option>
					<option value="0">Khóa</option>
				</select>
				<span class="required status"></span>
			</div>
		</div>
		<div class="space-4"></div>
		<!-- ảnh -->
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Ảnh đại diện </label>
			<div class="col-sm-9">
				<div class="form-group">
					<div class="col-xs-8">
						<input type="file" id="user_image" name="user_image" style="padding: 7px 0;" />
					</div>
					<span class="required user_image"></span>
				</div>
			</div>
		</div>
		<div class="space-4"></div>

		<div class="clearfix form-actions">
			<div class="col-md-offset-3 col-md-9" style="padding-left: 0px;">
				<button class="btn btn-primary" type="button" onclick="location.href='<?php echo base_url().'admin_member/admin_member_list' ?>';" > <i class="ace-icon fa fa-undo bigger-110"></i> Quay lại </button>
				<button class="btn btn-primary" type="submit" onclick="return checkValidation();" > <i class="ace-icon fa fa-check bigger-110"></i> Lưu </button>
				<button class="btn btn-primary" type="reset" > <i class="ace-icon fa fa-refresh bigger-110"></i> Sét lại </button>
		</div>
	</form>
</div>
