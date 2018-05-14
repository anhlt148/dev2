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
								<th>Mã danh mục</th>
								<th>Tên danh mục</th>
								<th>Trạng thái</th>
								<th>Loại danh mục</th>
								<th>Mã DM cha</th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if(count($data) > 0){
								foreach ($data as $key => $value) {
								?>
									<tr data-id="<?php echo $value['cate_id']?>" data-code="<?php echo $value['cate_code']?>">
										<td><?php echo ($key+1) ?></td>
										<td><input class="check_item" type="checkbox" data-id="<?php echo $value['cate_id']?>" onclick="checkOne(this)"></td>
										<td><?php echo $value['cate_code'] ?></td>
										<td><?php echo $value['cate_name'] ?></td>
										<td>
											<?php
											if($value['cate_status'] == "on"){
												?>
												<i class="fa fa-toggle-on" title="Hoạt động" onclick="location.href='<?php echo base_url().'admin_category/change_status/'.$value['cate_id'].'/'.$value['cate_status'];?>'"></i>
												<?php
											}
											else{
												?>
												<i class="fa fa-toggle-off" title="Khóa" onclick="location.href='<?php echo base_url().'admin_category/change_status/'.$value['cate_id'].'/'.$value['cate_status'];?>'"></i>
												<?php
											}
											?>
										</td>
										<td><?php echo $value['cate_type'] ?></td>
										<td><?php echo $value['cate_parent'] ?></td>
										<td>
											<!-- <button type="button" class="btn btn-info" title="Xem" style="padding:1px 6px;"><i class="fa fa-info-circle"></i></button> -->
											<button type="button" class="btn btn-warning" title="Sửa" onclick="confirm_edit(this);" style="padding:1px 6px;" href="<?php echo base_url().'admin_category/edit/'.$value['cate_id'];?>"><i class="fa fa-pencil-square-o"></i></button>
											<button type="button" class="btn btn-danger" title="Xóa" onclick="on_delete_record(this);" href="<?php echo base_url().'admin_category/delete/'.$value['cate_id'];?>" style="padding:1px 6px;"><i class="fa fa-trash-o"></i></button>
										</td>
									</tr>
								<?php
								}
							}
							?>
						</tbody>
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
                    <!-- mã -->
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label for="">Mã danh mục</label>
                        </div>
                        <div class="col-lg-9">
                            <input onkeyup="format_code(this)" class="form-control" id="cate_code" type="text" placeholder="Bắt buộc...">
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <!-- tên -->
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label for="">Tên danh mục</label>
                        </div>
                        <div class="col-lg-9">
                            <input class="form-control" id="cate_name" type="text" placeholder="Bắt buộc...">
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <!-- trạng thái -->
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label for="">Trạng thái</label>
                        </div>
                        <div class="col-lg-9">
                            <select id="cate_status" class="form-control">
                                <option value="on">Hoạt động</option>
                                <option value="off">Khóa</option>
                            </select>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <!-- Danh mục cha -->
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label for="">Danh mục cha</label>
                        </div>
                        <div class="col-lg-9">
                            <select id="cate_parent" class="form-control" onchange="on_change_cate_parent(this);">
                                <option value="">[--Lựa chọn--]</option>
								<?php
								if(isset($data)){
									foreach ($data as $key => $value) {
									?>
									<option value="<?php echo $value['cate_code']?>" cate_type="<?php echo $value['cate_type']?>"><?php echo $value['cate_name']?></option>
									<?php
									}
								}
								?>
                            </select>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <!-- Loại danh mục -->
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label for="">Loại danh mục</label>
                        </div>
                        <div class="col-lg-9">
                            <select id="cate_type" class="form-control" placeholder="Bắt buộc">
								<?php
								if(isset($cate_type)){
									foreach ($cate_type as $key => $value) {
										?>
										<option value="<?php echo $value["type_code"]?>"><?php echo $value["type_name"]?></option>
										<?php
									}
								}
								?>
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

	