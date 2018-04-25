<script type="text/javascript" charset="utf-8">
	// hàm kiem tra validation form:
    function checkValidation(){
        var obj = {
            'cate_name': $('#cate_name').val().trim(),
            'cate_status': $('#cate_status').val(),
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
	<form class="form-horizontal" method="POST" role="form" action="<?php echo base_url().'admin_category/admin_category_update/'.$id ?>">
		<!-- Tên danh mục -->
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"></label>
			<h2 class="col-sm-9"><?php if(isset($error)){echo $error;} ?></h2>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên danh mục </label>
			<div class="col-sm-9">
				<input type="text" id="cate_name" placeholder="Nhập tên danh mục" name="cate_name" class="col-xs-10 col-sm-8" value="<?php echo $data['cate_name']; ?>"/>
				<span class="required cate_name"><?php if(isset($valid)){echo $valid;} ?></span>
			</div>
		</div>
		<div class="space-4"></div>
		<!-- Trạng thái -->
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Trạng thái </label>
			<div class="col-sm-9">
				<select class="col-sm-8" name="cate_status" id="cate_status">
					<option value="">[--Chọn trạng thái--]</option>
					<option value="1" <?php if($data['cate_status']==1){echo 'selected';} ?>>Hoạt động</option>
					<option value="0" <?php if($data['cate_status']==0){echo 'selected';} ?>>Khóa</option>
				</select>
				<span class="required cate_status"></span>
			</div>
		</div>
		<div class="space-4"></div>

		<div class="clearfix form-actions">
			<div class="col-md-offset-3 col-md-9" style="padding-left: 0px;">
				<button class="btn btn-primary" type="button" onclick="location.href='<?php echo base_url().'admin_category/admin_category_list' ?>';" > <i class="ace-icon fa fa-undo bigger-110"></i> Quay lại </button>
				<button class="btn btn-primary" type="submit" onclick="return checkValidation();" > <i class="ace-icon fa fa-check bigger-110"></i> Cập nhật </button>
				<!-- <button class="btn btn-info" type="reset" > <i class="ace-icon fa fa-refresh bigger-110"></i> Sét lại </button> -->
			</div>
		</div>
	</form>
</div>
