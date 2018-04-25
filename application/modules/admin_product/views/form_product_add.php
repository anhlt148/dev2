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
            'prd_cate': $('#prd_cate').val(),
            'prd_code': $('#prd_code').val().trim(),
            'prd_name': $('#prd_name').val().trim(),
            'prd_status': $('#prd_status').val(),
            'prd_price': $('#prd_price').val(),
            'prd_vat': $('#prd_vat').val(),
            'prd_number': $('#prd_number').val(),
            'prd_made_in': $('#prd_made_in').val().trim(),
            'prd_brand': $('#prd_brand').val().trim(),
            'prd_description': $('#prd_description').val().trim(),
            'prd_avatar': $('#prd_avatar').val(),
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
    <form class="form-horizontal" enctype="multipart/form-data" method="POST" role="form" action="<?php echo base_url().'admin_product/admin_product_add' ?>">
        <!-- Danh mục sản phẩm -->
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="prd_cate"> Danh mục sản phẩm </label>
            <div class="col-sm-9">
                <select class="col-sm-8"  name="prd_cate" id="prd_cate">
                    <option value="">[--Chọn danh mục sản phẩm--]</option>
                    <?php
                    if (isset($category_01)) {
                        foreach($category_01 as $value){
                    ?>
                        <option value="<?php echo $value['id']?>"><?php echo $value['cate_name']?></option>
                    <?php 
                        }
                    }
                    ?>
                </select>
                <span class="required prd_cate"></span>
            </div>
        </div>
        <div class="space-4"></div>
        <!-- Mã sản phẩm -->
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="prd_code"> Mã sản phẩm </label>
            <div class="col-sm-9">
                <input type="text" id="prd_code" placeholder="Mã sản phẩm" name="prd_code" class="col-xs-10 col-sm-8" />
                <span class="required prd_code"></span>
            </div>
        </div>
        <div class="space-4"></div>
        <!-- Tên sản phẩm -->
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="prd_name"> Tên sản phẩm </label>
            <div class="col-sm-9">
                <input type="text" id="prd_name" placeholder="Tên sản phẩm" name="prd_name" class="col-xs-10 col-sm-8" />
                <span class="required prd_name"></span>
            </div>
        </div>
        <div class="space-4"></div>
        <!-- Trạng thái -->
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="prd_status"> Trạng thái </label>
            <div class="col-sm-9">
                <select class="col-sm-8"  name="prd_status" id="prd_status">
                    <option value="">[--Chọn trạng thái--]</option>
                    <option value="1">Mở</option>
                    <option value="0">Khóa</option>
                </select>
                <span class="required prd_status"></span>
            </div>
        </div>
        <div class="space-4"></div>
        <!-- Giá -->
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="prd_price"> Giá tiền </label>
            <div class="col-sm-9">
                <input type="number" id="prd_price" min="0" placeholder="Giá sản phẩm" name="prd_price" class="col-xs-10 col-sm-8" />&nbsp;<span>VNĐ</span>
                <span class="required prd_price"></span>
            </div>
        </div>
        <div class="space-4"></div>
        <!-- Vat -->
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="prd_vat"> VAT </label>
            <div class="col-sm-9">
                <input type="number" id="prd_vat" min="0" placeholder="vat" name="prd_vat" class="col-xs-10 col-sm-8" />&nbsp;<span>%</span>
                <span class="required prd_vat"></span>
            </div>
        </div>
        <div class="space-4"></div>
        <!-- Số lượng -->
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="prd_number"> Số lượng </label>
            <div class="col-sm-9">
                <input type="number" id="prd_number" min="0" name="prd_number" placeholder="Số lượng" class="col-xs-10 col-sm-8" />
                <span class="required prd_number"></span>
            </div>
        </div>
        <div class="space-4"></div>
        <!-- Xuất xứ -->
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="prd_made_in"> Xuất xứ </label>
            <div class="col-sm-9">
                <input type="text" id="prd_made_in" placeholder="Xuất xứ" name="prd_made_in" class="col-xs-10 col-sm-8" />
                <span class="required prd_made_in"></span>
            </div>
        </div>
        <div class="space-4"></div>
        <!-- Nhãn hiệu -->
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="prd_brand"> Nhãn hiệu </label>
            <div class="col-sm-9">
                <input type="text" id="prd_brand" placeholder="Nhãn hiệu" name="prd_brand" class="col-xs-10 col-sm-8" />
                <span class="required prd_brand"></span>
            </div>
        </div>
        <div class="space-4"></div>
        <!-- Mô tả -->
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="prd_description"> Mô tả </label>
            <div class="col-sm-9">
                <textarea class="col-sm-8" name="prd_description" id="prd_description" placeholder="..."></textarea>
                <span class="required prd_description"></span>
            </div>
        </div>
        <div class="space-4"></div>
        <!-- ảnh -->
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="prd_image"> Ảnh sản phẩm </label>
            <div class="col-sm-9">
                <div class="form-group">
                    <div class="col-xs-8">
                        <input type="file" id="prd_image" name="prd_image" multiple style="padding: 7px 0px;" />
                    </div>
                    <span class="required prd_image"></span>
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
