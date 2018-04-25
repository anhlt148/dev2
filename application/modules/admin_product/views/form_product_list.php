<!-- JAVASCRIPT -->
<script type="text/javascript" charset="utf-8" async defer>
$(document).ready(function() {
    getParamerter();
});
// hàm hiển thị thông báo:
function tempAlert(msg) {
    var el = document.createElement("div");
    el.setAttribute("class", "notification");
    el.setAttribute("style","font-weight:bold;position:absolute; top:8vh; left:40vw; background-color:#FFB752; padding: 10px 15px;");
    el.innerHTML = msg;
    setTimeout(function(){
        el.parentNode.removeChild(el);
    },3000);
    document.body.appendChild(el);
}
// hàm kiem tra khi xoa thành vien:
function doconfirm(el) {
    var value = $(el).attr('data-value');
    if (value == 1){
        tempAlert('Không được phép xóa !')
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
        tempAlert('Không được phép sửa !');
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
        case 'add': tempAlert('Thêm mới thành công !') ; break;
        case 'edit': tempAlert('Cập nhật thành công !'); break;
        case 'delete': tempAlert('Xóa thành công !'); break;
        case 'notAllow': tempAlert('Bạn không có quyền !'); break;
        case 'editFailed': tempAlert('Không cập nhật được ảnh đại diện !'); break;
        case 'notEdit': tempAlert('Tài khoản này không được phép sửa !'); break;
    }
}
</script>
<!-- PHP -->
<?php 
    function check_role($value){
        $user_role = '';
        $user_style = '';
        switch ($value) {
            case 'owner': $user_role = 'Chủ sở hữu'; $user_style = 'owner';break;
            case 'author': $user_role = 'Tác giả'; $user_style = 'author'; break;
            case 'member': $user_role = 'Thành viên'; $user_style = 'member'; break;
            case 'admin': $user_role = 'Quản trị'; $user_style = 'admin'; break;
        }
        return [$user_role, $user_style];
    }
    function check_status($value){
        if ($value == 1) {
            $prd_status = 'Hoạt động';
            $label_color = 'label-success';
        } else {
            $prd_status = 'Khóa';
            $label_color = 'label-inverse';
        }
        return array('status' => $prd_status, 'color' => $label_color);
    }
?>


<input class="error" type="hidden" value="<?php if(isset($error)){echo $error;} ?>">
<div style="padding: 0 0 10px 12px;">
    <button class="btn btn-success" type="button" onclick="location.href='<?php echo base_url().'admin_product/admin_product_add'; ?>';" > <i class="ace-icon fa fa-plus bigger-110"></i> Thêm mới </button>
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
                        <th>Ảnh</th>
                        <th>Mã SP</th>
                        <th>Tên SP</th>
                        <th>Danh mục</th>
                        <th>Trạng thái</th>
                        <th>Nhãn hiệu</th>
                        <th>Giá tiền</th>
                        <th>Số Lượng</th>
                        <th>Nguồn gốc</th>
                        <th>Ngày cập nhật</th>
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
                                <td><img style="width:40px; height:40px;" src="<?php echo base_url().'/images/avatars/'.$value['prd_image'] ?>"></td>
                                <td><?php echo $value['prd_code'] ?></td>
                                <td> <a href="#"><?php echo $value['prd_name'] ?></a> </td>
                                <td><?php echo $value['cate_name'] ?></td>
                                <?php $prd_status = check_status($value['prd_status']); ?>
                                <td class="hidden-480"> <span class="label label-sm <?php echo $prd_status['color'] ?>"><?php echo $prd_status['status'] ?></span> </td>
                                <td><?php echo $value['prd_brand'] ?></td>
                                <td><?php echo $value['prd_price'] ?></td>
                                <td><?php echo $value['prd_number'] ?></td>
                                <td><?php echo $value['prd_made_in'] ?></td>
                                <td><?php echo $value['prd_modified_date'] ?></td>
                                
                                <td>
                                    <div class="hidden-sm hidden-xs btn-group">
                                        <button class="btn btn-xs btn-info" title="Thay đổi trạng thái" onclick="return doconfirm2(this);" data-value="<?php echo $value['prd_id'];?>" href="location.href='<?php echo base_url().'admin_product/admin_product_change_status/'.$value['prd_id'].'/'.$value['prd_status'];?>'"> <i class="ace-icon fa <?php if($prd_status['color'] == 'label-success'){echo 'fa-unlock';}else{echo 'fa-lock';} ?> bigger-120"></i> </button>
                                        <button class="btn btn-xs btn-warning" title="Chỉnh sửa" onclick="return doconfirm2(this);" data-value="<?php echo $value['prd_id'];?>" href="location.href='<?php echo base_url().'admin_product/admin_product_edit/'.$value['prd_id'];?>'"> <i class="ace-icon fa fa-pencil bigger-120"></i> </button>
                                        <button class="btn btn-xs btn-danger" title="Xóa" onclick="return doconfirm(this);" data-value="<?php echo $value['prd_id'];?>" href="location.href='<?php echo base_url().'admin_product/admin_product_delete/'.$value['prd_id'];?>'"> <i class="ace-icon fa fa-trash-o bigger-120"></i> </button>
                                    </div>

                                    <div class="hidden-md hidden-lg">
                                        <div class="inline pos-rel">
                                            <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto"> <i class="ace-icon fa fa-cog icon-only bigger-110"></i> </button>
                                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                <li>
                                                    <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                        <span class="blue"> <i class="ace-icon fa fa-search-plus bigger-120"></i> </span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                        <span class="green"> <i class="ace-icon fa fa-pencil-square-o bigger-120"></i> </span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                        <span class="red"> <i class="ace-icon fa fa-trash-o bigger-120"></i> </span>
                                                    </a>
                                                </li>
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