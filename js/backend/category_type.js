function saveItem(el) {
    var code = $("#code_cate").val().trim();
    var name = $("#name_cate").val().trim();
    var status = $("#status_cate").val();
    if (code == '' || name == '' || status == ''){
        alert("Nhập thiếu thông tin.")
        return false;
    }
    var data = {
        "data": {
            "type_code": code,
            "type_name": name,
            "type_status": status
        }
    };
    var url = $(el).attr("href");
    if(currentRecord != null){
        url += "?id=" + currentRecord.type_id;
    }
    call_ajax("POST", url, data, function (data, textStatus, jqXHR) {
        if (data != null && data.message == "") {
            var rs = data.result;
            var index = $('#grid_list tbody tr').length;
            var html = "";
            html += '<tr data-id="' + rs.type_id+'">'
            html += '<td>' + (index + 1) + '</td>'
            html += '<td> <input class="check_item" type="checkbox" data-id="' + rs.type_id+'" onclick="checkOne(this)"></td>'
            html += '<td>' + rs.type_code + '</td>'
            html += '<td>' + rs.type_name + '</td>'
            html += '<td>'
            if (rs.type_status == "on") {
                html += '<i class="fa fa-toggle-on" title="Hoạt động" onclick="location.href=\'' + $("#base_url").val() + 'admin_category_type/change_status/' + rs.type_id + '/' + rs.type_status + '\'"></i>'
            }
            else {
                html += '<i class="fa fa-toggle-off" title="Khóa" onclick="location.href=\'' + $("#base_url").val() + 'admin_category_type/change_status/' + rs.type_id + '/' + rs.type_status + '\'"></i>'
            }
            html += '</td>'

            html += '<td>'
            // html += '<button type="button" class="btn btn-info" title="Xem" style="padding:1px 6px;"><i class="fa fa-info-circle"></i></button>'
            html += '<button type="button" class="btn btn-warning" title="Sửa" onclick="confirm_edit(this);" style="padding:1px 6px; margin: 0 4px 0 0;" href="' + $("#base_url").val() + 'admin_category_type/edit/' + rs.type_id + '"><i class="fa fa-pencil-square-o"></i></button>'
            html += '<button type="button" class="btn btn-danger" title="Xóa" onclick="on_delete_record(this);" href="' + $("#base_url").val() + 'admin_category_type/delete/' + rs.type_id + '" style="padding:1px 6px;"><i class="fa fa-trash-o"></i></button>'
            html += '</td>'
            html += '</tr>';
            if (currentRecord == null){
                $('#grid_list tbody').append(html);
                tempAlert("Thêm mới thành công.", 3000);
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
            $(".page-header").html(page_header);
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
        job = confirm("Bạn có chắc chắn muốn xóa không?");
        if (job) {
            var url = $(el).attr("href");
            call_ajax("POST", url, null, function (data, textStatus, jqXHR) {
                if(data.result == true && data.message == ""){
                    tempAlert("Xóa thành công.", 3000);
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
            // 
            $("#save").hide();
            $("#update").show();
            // set value:
            $("#code_cate").val(currentRecord.type_code);
            $("#name_cate").val(currentRecord.type_name);
            $("#status_cate").val(currentRecord.type_status);
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