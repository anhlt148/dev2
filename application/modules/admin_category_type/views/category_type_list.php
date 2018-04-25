<div class="row">
	<!-- /.col-lg-12 -->
	<div class="col-lg-12">
		<!-- Lưới danh sách -->
		<div id="grid_list" class="panel panel-default">
			<div class="panel-heading">
				<button type="button" class="btn btn-success" onclick="create(this)" data-val="location.href='<?php echo base_url().'admin_category_type/add'?>'">Thêm mới</button>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Mã loại</th>
								<th>Tên loại</th>
								<th>Trạng thái</th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if(count($data) > 0){
								foreach ($data as $key => $value) {
								?>
									<tr>
										<td><?php echo ($key+1) ?></td>
										<td><?php echo $value['type_code'] ?></td>
										<td><?php echo $value['type_name'] ?></td>
										<td>
											<?php
											if($value['type_status'] == "on"){
												?>
												<i class="fa fa-toggle-on" title="Hoạt động" onclick="location.href='<?php echo base_url().'admin_category_type/change_status/'.$value['type_id'].'/'.$value['type_status'];?>'"></i>
												<?php
											}
											else{
												?>
												<i class="fa fa-toggle-off" title="Khóa" onclick="location.href='<?php echo base_url().'admin_category_type/change_status/'.$value['type_id'].'/'.$value['type_status'];?>'"></i>
												<?php
											}
											?>
										</td>
										<td>
											<button type="button" class="btn btn-info" title="Xem" style="padding:1px 6px;"><i class="fa fa-info-circle"></i></button>
											<button type="button" class="btn btn-warning" title="Sửa" style="padding:1px 6px;"><i class="fa fa-pencil-square-o"></i></button>
											<button type="button" class="btn btn-danger" title="Xóa" onclick="return doconfirm();" style="padding:1px 6px;"><i class="fa fa-trash-o"></i></button>
											
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
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url().'admin_category_type/add'?>">
                <fieldset style="padding: 10px 0;">
                    <!-- mã -->
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label for="">Mã loại danh mục</label>
                        </div>
                        <div class="col-lg-9">
                            <input class="form-control" id="" type="text" placeholder="Bắt buộc...">
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <!-- tên -->
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label for="">Tên loại danh mục</label>
                        </div>
                        <div class="col-lg-9">
                            <input class="form-control" id="" type="text" placeholder="Bắt buộc...">
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <!-- trạng thái -->
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label for="">Trạng thái</label>
                        </div>
                        <div class="col-lg-9">
                            <select id="" class="form-control">
                                <option value="on">Hoạt động</option>
                                <option value="off">Khóa</option>
                            </select>
                        </div>
                    </div>
                    <div style="clear: both;"></div>

                    <!-- <div class="checkbox">
                        <label>
                            <input type="checkbox">Disabled Checkbox
                        </label>
                    </div> -->
                    
                    <div class="form-group">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                            <button type="reset" class="btn btn-danger">Hủy</button>
                            <button type="button" onclick="back_to_list()" class="btn btn-warning">Danh sách</button>
                        </div>
                    </div>
                </fieldset>
            </form>
		</div>	
	</div>
</div>

	