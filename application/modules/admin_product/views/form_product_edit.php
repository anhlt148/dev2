<h2>sửa thông tin sản phẩm</h2>
<p><?php echo $error;?></p>
<div id="main">
    <form method="post" enctype="multipart/form-data" action="<?php echo base_url().'admin_product/edit_product/'.$get_sp['id_sp'];?>">
    <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
    	<tr>
            <td><label>Loại sản phẩm</label><?php echo form_error('category');?>
                <select name="category">
                	<option value="1" <?php if($get_sp['category'] == 1){echo 'selected';}?>>Điện thoại</option>
                    <option value="2" <?php if($get_sp['category'] == 2){echo 'selected';}?>>Laptop</option>
                    <option value="3" <?php if($get_sp['category'] == 3){echo 'selected';}?>>Máy ảnh</option>
                    <option value="4" <?php if($get_sp['category'] == 4){echo 'selected';}?>>Phụ kiện</option>
                </select>
                        
            </td>
        </tr>
        <tr>
            <td><label>Tên sản phẩm</label><br /><input type="text" name="ten_sp" value="<?php echo $get_sp['ten_sp'];?>" /><?php echo form_error('ten_sp');?></td>
        </tr>
        <tr>
            <td><label>Ảnh mô tả</label><br /><input type="file" name="anh_sp" /><input type="hidden" name="anh_sp" value="<?php echo $get_sp['anh_sp'];?>" /></td>
        </tr>
        <tr>
            <td><label>Nhà cung cấp</label><br />
                <select name="id_dm">
                    	
                    <?php 
					foreach($danh_muc as $value){
					?>
                    	<option value="<?php echo $value['id_dm'];?>"<?php if($get_sp['id_dm']==$value['id_dm']){echo 'selected=selected';}?>><?php echo $value['ten_dm'];?></option>                 
                    <?php
					}
					?>
                </select>	
            </td>
        </tr>
        <tr>
            <td><label>Màn hình</label><br /><input type="text" name="man_hinh" value="<?php echo $get_sp['man_hinh'];?>"/><?php echo form_error('man_hinh');?></td>
        </tr>
        <tr>
            <td><label>Phân giải màn hình</label><br /><input type="text" name="phan_giai_mh"  value="<?php echo $get_sp['phan_giai_mh'];?>"/><?php echo form_error('phan_giai_mh');?></td>
        </tr>
        <tr>
            <td><label>CPU</label><br /><input type="text" name="cpu"  value="<?php echo $get_sp['cpu'];?>"/><?php echo form_error('cpu');?></td>
        </tr>
        <tr>
            <td><label>Ram</label><br /><input type="text" name="ram"  value="<?php echo $get_sp['ram'];?>"/><?php echo form_error('ram');?></td>
        </tr>
        <tr>
            <td><label>Rom</label><br /><input type="text" name="rom"  value="<?php echo $get_sp['ram'];?>"/><?php echo form_error('ram');?></td>
        </tr>
        <tr>
            <td><label>Camera</label><br /><input type="text" name="camera"  value="<?php echo $get_sp['camera'];?>"/><?php echo form_error('camera');?></td>
        </tr>
        <tr>
            <td><label>Pin</label><br /><input type="text" name="pin"  value="<?php echo $get_sp['pin'];?>"/><?php echo form_error('pin');?></td>
        </tr>
        <tr>
            <td><label>Giá sản phẩm</label><br /><input type="text" name="gia_sp" value="<?php echo $get_sp['gia_sp'];?>" /><?php echo form_error('gia_sp');?> VNĐ</td>
        </tr>
        <tr>
            <td><label>Bảo hành</label><br /><input type="text" name="bao_hanh" value="<?php echo $get_sp['bao_hanh'];?>" /><?php echo form_error('bao_hanh');?></td>
        </tr>
        <tr>
            <td><label>Đi kèm</label><br /><input type="text" name="phu_kien" value="<?php echo $get_sp['phu_kien'];?>" /><?php echo form_error('phu_kien');?></td>
        </tr>
        <tr>
            <td><label>Tình trạng</label><br /><input type="text" name="tinh_trang" value="<?php echo $get_sp['tinh_trang'];?>" /><?php echo form_error('tinh_trang');?></td>
        </tr>
        <tr>
            <td><label>Khuyến mại</label><br /><input type="text" name="khuyen_mai" value="<?php echo $get_sp['khuyen_mai'];?>" /><?php echo form_error('khuyen_mai');?></td>
        </tr>
        <tr>
            <td><label>Còn hàng</label><br /><input type="text" name="trang_thai" value="<?php echo $get_sp['trang_thai'];?>" /><?php echo form_error('trang_thai');?></td>
        </tr>
        <tr>
            <td><label>Sản phẩm đặc biệt</label><br />Có <input type="radio" name="dac_biet" value=1 <?php if($get_sp['dac_biet'] == 1){echo 'checked = checked';}?>/> Không <input type="radio" name="dac_biet" value=0 <?php if($get_sp['dac_biet'] == 0){echo 'checked = checked';}?>/></td>
        </tr>
        <tr>
            <td><label>Thông tin chi tiết sản phẩm</label><br /><textarea cols="60" rows="12" name="chi_tiet_sp"><?php echo $get_sp['chi_tiet_sp'];?></textarea><?php echo form_error('chi_tiet_sp');?></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Cập nhật" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>