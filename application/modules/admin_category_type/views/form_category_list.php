<script type="text/javascript" charset="utf-8" async defer>
$(document).ready(function() {
	getParamerter();
});
// hàm hiển thị thông báo:
function tempAlert(msg,duration) {
	var el = document.createElement("div");
	el.setAttribute("class", "notification");
	el.setAttribute("style","font-weight:bold;position:absolute; top:8vh; left:40vw; background-color:#FFB752; padding: 10px 15px;");
	el.innerHTML = msg;
	setTimeout(function(){
		el.parentNode.removeChild(el);
	},duration);
	document.body.appendChild(el);
}
// hàm kiem tra khi xoa thành vien:
function doconfirm(el) {
    var value = $(el).attr('data-value');
	if (value == 1){
		tempAlert('Không được phép xóa!', 3000)
		return false
	}
	else{
		job=confirm("Bạn có chắc chắn muốn xóa không?");
		if(job == true){
	    	$(el).attr('onclick', $(el).attr('href'));
		 	$(el).click();
		}
		else{	
			return job;
		}
	}
}
// hàm kiem tra tài khoản khi sửa:
function doconfirm2(el){
	var value = $(el).attr('data-value');
	if (value == 1){
		tempAlert('Không được phép sửa!', 3000);
		return false;
	}
	else{
		$(el).attr('onclick', $(el).attr('href'));
		$(el).click();
	}
}
// hàm kiem tra tham so tren thanh dia chỉ:
function getParamerter(){
	var status = getParameterByName('status');
	switch(status){
		case 'add': tempAlert('Thêm mới thành công!', 3000) ; break;
		case 'edit': tempAlert('Cập nhật thành công!', 3000); break;
		case 'delete': tempAlert('Xóa thành công!', 3000); break;
		case 'notAllow': tempAlert('Bạn không có quyền!', 3000); break;
	}
}
</script>
<?php 
function check_status($value){
	if ($value == 1) {
		$status = 'Hoạt động';
		$label_color = 'label-success';
	} else {
		$status = 'Khóa';
		$label_color = 'label-inverse';
	}
	return array('status' => $status, 'color' => $label_color);
}
?>
<div style="padding: 0 0 10px 12px;">
	<button class="btn btn-success" type="button" onclick="location.href='<?php echo base_url().'admin_category/admin_category_add'; ?>';" > <i class="ace-icon fa fa-plus bigger-110"></i> Thêm mới </button>
</div>
<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
	<div class="row">
		<div class="col-xs-12">
			<table id="simple-table" class="table  table-bordered table-hover">
				<!-- header -->
				<thead>
					<tr>
						<th>#</th>
						<th class="center"> <label class="pos-rel"> <input type="checkbox" class="ace" /> <span class="lbl"></span> </label> </th>
						<th>Tên danh mục</th>
						<th>Trạng thái</th>
						<th>Hành động</th>
					</tr>
				</thead>

				<!-- body -->
				<tbody>
					<?php 
					if(count($data) > 0){
						foreach ($data as $key => $value){
					?>
							<tr>
								<td><?php echo ($key+1) ?></td>
								<td class="center"> <label class="pos-rel"> <input type="checkbox" class="ace" /> <span class="lbl"></span> </label> </td>
								<td> <a href="#"><?php echo $value['cate_name'] ?></a> </td>
								<?php $status = check_status($value['cate_status']); ?>
								<td class="hidden-480"> <span class="label label-sm <?php echo $status['color'] ?>"><?php echo $status['status'] ?></span> </td>
								<td>
									<div class="hidden-sm hidden-xs btn-group">
										<input type="hidden" name="<?php echo 'status_'.$value['id'];?>" value="<?php echo $value['cate_status'];?>">
										<button class="btn btn-xs btn-info" title="Thay đổi trạng thái" onclick="location.href='<?php echo base_url().'admin_category/admin_category_change_status/'.$value['id'].'/'.$value['cate_status'];?>'"> <i class="ace-icon fa <?php if($status['color'] == 'label-success'){echo 'fa-unlock';}else{echo 'fa-lock';} ?> bigger-120"></i> </button>
										<button class="btn btn-xs btn-warning" title="Chỉnh sửa" onclick="location.href='<?php echo base_url().'admin_category/admin_category_edit/'.$value['id'];?>'"> <i class="ace-icon fa fa-pencil bigger-120"></i> </button>
										<button class="btn btn-xs btn-danger" title="Xóa" onclick="return doconfirm(this);" href="location.href='<?php echo base_url().'admin_category/admin_category_delete/'.$value['id'];?>'"> <i class="ace-icon fa fa-trash-o bigger-120"></i> </button>
									</div>

									<div class="hidden-md hidden-lg">
										<div class="inline pos-rel">
											<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto"> <i class="ace-icon fa fa-cog icon-only bigger-110"></i> </button>
											<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
												<li> <a href="#" class="tooltip-info" data-rel="tooltip" title="View"> <span class="blue"> <i class="ace-icon fa fa-search-plus bigger-120"></i> </span> </a> </li>
												<li> <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="ace-icon fa fa-pencil-square-o bigger-120"></i> </span> </a> </li>
												<li> <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete"> <span class="red"> <i class="ace-icon fa fa-trash-o bigger-120"></i> </span> </a> </li>
											</ul>
										</div>
									</div>
								</td>
							</tr>	
					<?php		
						}
					}
					?>
				</tbody>
			</table>
		</div><!-- /.span -->
	</div><!-- /.row -->
	<!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->