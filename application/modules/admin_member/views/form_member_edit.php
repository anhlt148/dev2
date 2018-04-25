<script type="text/javascript" charset="utf-8">
	// hàm kiem tra validation form:
    function checkValidation(){
        var obj = {
            'user_name': $('#user_name').val().trim(),
            'email': $('#email').val().trim(),
            'user_role': $('#user_role').val(),
            'status': $('#status').val(),
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

<div class="col-xs-12" style="margin-top:15px;">
	<!-- PAGE CONTENT BEGINS -->
	<form class="form-horizontal" method="POST" enctype="multipart/form-data" role="form" action="<?php echo base_url().'admin_member/admin_member_edit/'.$data['id'] ?>">
		<!-- tài khoản -->
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="user_name"> Tài khoản </label>
			<div class="col-sm-9">
				<input type="text" id="user_name" placeholder="Nhập tài khoản" name="user_name" class="col-xs-10 col-sm-8" value="<?php echo $data['user_name'] ?>" />
				<span class="required user_name"></span>
			</div>
		</div>
		<div class="space-4"></div>
		<!-- email -->
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="email"> Email </label>
			<div class="col-sm-9">
				<input type="text" id="email" placeholder="Nhập email" name="email" class="col-xs-10 col-sm-8" value="<?php echo $data['email'] ?>" />
				<span class="required email"><?php if(isset($emailValid) && $emailValid !=''){echo $emailValid;} ?></span>
			</div>
		</div>
		<div class="space-4"></div>
		<!-- Quyền hạn -->
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="user_role"> Quyền hạn </label>
			<div class="col-sm-9">
				<select class="col-sm-8" name="user_role" id="user_role">
					<option value="owner" <?php if($data['user_role'] == 'owner'){echo 'selected';}?> >Chủ sở hữu</option>
					<option value="admin" <?php if($data['user_role'] == 'admin'){echo 'selected';}?> >Quản trị viên</option>
					<option value="author" <?php if($data['user_role'] == 'author'){echo 'selected';}?> >Tác giả</option>
					<option value="member" <?php if($data['user_role'] == 'member'){echo 'selected';}?> >Nhân viên</option>
				</select>
				<span class="required user_role"></span>
			</div>
		</div>
		<div class="space-4"></div>
		<!-- Trạng thái -->
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="status"> Trạng thái </label>
			<div class="col-sm-9">
				<select class="col-sm-8" name="status" id="status">
					<option value="">[--Chọn trạng thái--]</option>
					<option value="1" <?php if($data['status'] == '1'){echo 'selected';}?> >Hoạt động</option>
					<option value="0" <?php if($data['status'] == '0'){echo 'selected';}?> >Khóa</option>
				</select>
				<span class="required status"></span>
			</div>
		</div>
		<div class="space-4"></div>
		<!-- ảnh -->
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Ảnh hiện tại </label>
			<div class="col-sm-9">
				<img style="height:200px;" src="<?php echo base_url().'images/avatars/'.$data['user_image'];?>" alt="<?php echo $data['user_name']; ?>">
				<span class="required"></span>
			</div>
		</div>
		<div class="space-4"></div>
		<!-- Upload image -->
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="user_image"> Upload </label>
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
				<button class="btn btn-primary" type="submit" onclick="return checkValidation();" name="submit"> <i class="ace-icon fa fa-check bigger-110"></i> Cập nhật </button>
			</div>
		</div>
	</form>
</div>
