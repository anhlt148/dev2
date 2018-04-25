<h2>quản lý sản phẩm</h2>
<div id="main">
    <p id="add-prd"><a href="<?php echo base_url().'admin_product/add_product'?>"><span>thêm sản phẩm mới</span></a></p>
    <table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr id="prd-bar">
            <th width="5%">STT</th>
            <th width="5%">ID</th>
            <th width="40%">Tên sản phẩm</th>
            <th width="15%">Giá</th>
            <th width="15%">Nhà cung cấp</th>
            <th width="10%">Ảnh mô tả</th>
            <th width="5%">Sửa</th>
            <th width="5%">Xóa</th>
        </tr>
        <?php
        $i = 1;
        foreach($sp as $value){
        ?>
            <tr>
                <td><span><?php echo $i;?></span></td>
                <td><span><?php echo $value['id_sp'];?></span></td>
                <td class="l5"><?php echo $value['ten_sp'];?></td>
                <td class="l5"><span class="price"><?php echo $value['gia_sp'];?> VNĐ</span></td>
                <td class="l5"><?php echo $value['ten_dm'];?></td>
                <td><span class="thumb"><img width="60" src="<?php echo base_url();?>anh/<?php echo $value['anh_sp'];?>" /></span></td>
                <td><a href="<?php echo base_url().'admin_product/edit_product/'.$value['id_sp'];?>"><span>Sửa</span></a></td>
                <td><a onClick="return delete();" href="<?php echo base_url().'admin_product/del_product/'.$value['id_sp'];?>"><span>Xóa</span></a></td>
            </tr>  
        <?php
            $i++;   
        }
        ?> 
    </table>
	<p id="pagination"><?php echo $pagination;?></p>
</div>