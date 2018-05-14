// Hàm thêm mới or cập nhật
function saveItem(el) {
    var code = $("#cate_code").val().trim();
    var name = $("#cate_name").val().trim();
    var status = $("#cate_status").val();
    var parent = $("#cate_parent").val();
    var type = $("#cate_type").val();
    
    if (code == '' || name == '' || status == '' || type == ''){
        alert("Nhập thiếu thông tin.")
        return false;
    }
    var data = {
        "data": {
            "cate_code": code,
            "cate_name": name,
            "cate_status": status,
            "cate_parent": parent,
            "cate_type": type
        }
    };
    var url = $(el).attr("href");
    if(currentRecord != null){
        url += "?id=" + currentRecord.cate_id;
    }
    call_ajax("POST", url, data, function (data, textStatus, jqXHR) {
        if (data != null && data.message == "") {
            var rs = data.result;
            var index = $('#grid_list tbody tr').length;
            var html = "";
            html += '<tr data-id="' + rs.cate_id + '" data-code="' + rs.cate_code+'">'
            html += '<td>' + (index + 1) + '</td>'
            html += '<td> <input class="check_item" type="checkbox" data-id="' + rs.cate_id+'" onclick="checkOne(this)"></td>'
            html += '<td>' + rs.cate_code + '</td>'
            html += '<td>' + rs.cate_name + '</td>'
            html += '<td>'
            if (rs.cate_status == "on") {
                html += '<i class="fa fa-toggle-on" title="Hoạt động" onclick="location.href=\'' + $("#base_url").val() + 'admin_category/change_status/' + rs.cate_id + '/' + rs.cate_status + '\'"></i>'
            }
            else {
                html += '<i class="fa fa-toggle-off" title="Khóa" onclick="location.href=\'' + $("#base_url").val() + 'admin_category/change_status/' + rs.cate_id + '/' + rs.cate_status + '\'"></i>'
            }
            html += '</td>'

            html += '<td>' + rs.cate_type + '</td>'
            html += '<td>' + rs.cate_parent + '</td>'
            html += '<td>'
            // html += '<button type="button" class="btn btn-info" title="Xem" style="padding:1px 6px;"><i class="fa fa-info-circle"></i></button>'
            html += '<button type="button" class="btn btn-warning" title="Sửa" onclick="confirm_edit(this);" style="padding:1px 6px; margin: 0 4px 0 0;" href="' + $("#base_url").val() + 'admin_category/edit/' + rs.cate_id + '"><i class="fa fa-pencil-square-o"></i></button>'
            html += '<button type="button" class="btn btn-danger" title="Xóa" onclick="on_delete_record(this);" href="' + $("#base_url").val() + 'admin_category/delete/' + rs.cate_id + '" style="padding:1px 6px;"><i class="fa fa-trash-o"></i></button>'
            html += '</td>'
            html += '</tr>';
            if (currentRecord == null){
                $('#grid_list tbody').append(html);
                tempAlert("Thêm mới thành công.", 3000);
                $("#cate_parent").append('<option value="' + rs.cate_code + '" cate_type="' + rs.cate_type +'">' + rs.cate_name+'</option>');
            }
            else{
                if(element != null){
                    element.closest("tr").remove();
                    $('#grid_list tbody').prepend(html);
                    $('#grid_list tbody tr').each(function(i, el){
                        $(el).find("td:first").html((i+1));
                    });
                }
                tempAlert("Cập nhật thành công.", 3000);
            }
            $(".page-header").html("Danh mục");
            back_to_list();
        }
        else{
            alert(data.message);
        }
    }, function (jqXHR, textStatus, errorThrown) {
        alert(errorThrown);
    });
}
function on_delete_record(el) {
    var role = $(".user_role").val().trim();
    if (role != "owner" && role != "admin") {
        tempAlert('Bạn không có quyền.', 3000)
        return false
    }
    else {
        job = confirm("Nếu bạn xóa, những danh mục khác có cha là danh mục này(nếu có) sẽ bị xóa danh mục cha, bạn có chắc chắn muốn xóa không?");
        if (job) {
            var url = $(el).attr("href");
            call_ajax("POST", url, null, function (data, textStatus, jqXHR) {
                if(data.result == true && data.message == ""){
                    tempAlert("Xóa thành công.", 3000);
                    var code = $(el).closest("tr").attr('data-code');
                    $('#cate_parent option[value="' + code+'"]').remove();
                    $(el).closest("tr").remove();
                    reset_stt();

                }
            }, function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            });
        }
        else {
            return job;
        }
    }
}
function reset_stt() {
    $("#grid_list tbody tr").each(function (i, el) {
        $(el).find("td:first").html((i + 1));
    });
}
var currentRecord, element;
function on_edit(el) {
    element = $(el);
    var url = $(el).attr("href");
    call_ajax("GET", url, null, function (data, textStatus, jqXHR) {
        if (data.result != null && data.message == "") {
            $("#grid_list").hide();
            $("#create_new").show();
            $(".page-header").html("Sửa");
            currentRecord = data.result;
            page_header = $(".page-header").html();
            // 
            $("#save").hide();
            $("#update").show();
            // set value:
            $("#cate_code").val(currentRecord.cate_code);
            $("#cate_name").val(currentRecord.cate_name);
            $("#cate_status").val(currentRecord.cate_status);
            $("#cate_parent").val(currentRecord.cate_parent);
            $("#cate_type").val(currentRecord.cate_type);
            // ẩn mã danh mục cha của chính mình:
            $("#cate_parent option[value='" + currentRecord.cate_code+"']").hide();
            
        }
    }, function (jqXHR, textStatus, errorThrown) {
        alert(errorThrown);
    });
}
function delete_multi(el) {
    if(_arrID.length == 0){
        alert("Chưa chọn bản ghi nào.")
    }
    else{
        var r = confirm("Bạn có chắc chắn muốn xóa không ?")
        if(r){
            var url = $(el).attr("data-val");
            var data = {
                'data': _arrID.toString()
            }
            call_ajax("POST", url, data, function (data, textStatus, jqXHR) {
                if (data != null && data.result == true) {
                    for (let i = 0; i < _arrID.length; i++) {
                        const id = _arrID[i];
                        $('#grid_list tbody tr[data-id="' + id + '"]').remove();
                    }
                    reset_stt();
                    alert("Xóa thành công " + _arrID.length + " Bản ghi.");
                    _arrID = [];
                }
            }, function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            });
        }
    }
}
// thay đổi danh mục cha:
function on_change_cate_parent(el) {
    var value = $(el).val();
    var cate_type = $(el).find("option:selected").attr("cate_type");
    if(value == ""){
        $("#cate_type").val('');
        $("#cate_type").closest(".form-group").show();
    }
    else{
        $("#cate_type").val(cate_type);
        $("#cate_type").closest(".form-group").hide();
    }
}
// load danh sách:
function reload_list(){
    var url = base_url+'admin_category/load_list';
    call_ajax("GET", url, null, function (data, textStatus, jqXHR) {
        if (data.result != null && data.message == "") {
            var html = "";
            for (let i = 0; i < data.result.length; i++) {
                const element = data.result[i];
                html += '<tr data-id="' + element.cate_id + '" data-code="'+element.cate_code+'">'
                html += '<td>'+(i+1)+'</td>'
                html += '<td><input class="check_item" type="checkbox" data-id="' + element.cate_id+'" onclick="checkOne(this)"></td>'
                html += '<td>' + element.cate_code+'</td>'
                html += '<td>' + element.cate_name+'</td>'
                html += '<td>'
                if (element.cate_status == "on")
                    html += '<i class="fa fa-toggle-on" title="Hoạt động" onclick="location.href=' + base_url + 'admin_category/change_status/' + element.cate_id + '/'+ element.cate_status + '"></i>'
                else
                    html += '<i class="fa fa-toggle-off" title="Khóa" onclick="location.href=' + base_url + 'admin_category/change_status/' + element.cate_id + '/'+ element.cate_status + '"></i>'
                html += '</td>'
                html += '<td>'+element.cate_type+'</td>'
                html += '<td>'+element.cate_parent+'</td>'
                html += '<td>'
                html += '<button type="button" class="btn btn-warning" title="Sửa" onclick="confirm_edit(this);" style="padding:1px 6px;" href="' + base_url + 'admin_category/edit/' + element.cate_id+'"><i class="fa fa-pencil-square-o"></i></button>'
                html += '<button type="button" class="btn btn-danger" title="Xóa" onclick="on_delete_record(this);" style="padding:1px 6px;" href="' + base_url + 'admin_category/delete/' + element.cate_id +'"><i class="fa fa-trash-o"></i></button>'
                html += '</td>'
                html += '</tr>'
            }
            $("#grid_list tbody").html(html);
        }
    }, function (jqXHR, textStatus, errorThrown) {
        alert(errorThrown);
    });
}


