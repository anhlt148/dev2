$(document).ready(function() {
    reload_list();    
});
// Hàm thêm mới or cập nhật
function saveItem(el) {
    var code = $("#email").val().trim();
    var name = $("#user_name").val().trim();
    var status = $("#status").val();
    var parent = $("#user_image").val();
    var type = $("#user_role").val();
    
    if (code == '' || name == '' || status == '' || type == ''){
        alert("Nhập thiếu thông tin.")
        return false;
    }
    var data = {
        "data": {
            "email": code,
            "user_name": name,
            "status": status,
            "user_image": parent,
            "user_role": type
        }
    };
    var url = $(el).attr("href");
    if(currentRecord != null){
        url += "?id=" + currentRecord.user_id;
    }
    call_ajax("POST", url, data, function (data, textStatus, jqXHR) {
        if (data != null && data.message == "") {
            var rs = data.result;
            var index = $('#grid_list tbody tr').length;
            var html = "";
            html += '<tr data-id="' + rs.user_id + '" data-email="' + rs.email+'">'
            html += '<td>' + (index + 1) + '</td>'
            html += '<td> <input class="check_item" type="checkbox" data-id="' + rs.user_id+'" onclick="checkOne(this)"></td>'
            html += '<td>' + rs.email + '</td>'
            html += '<td>' + rs.user_name + '</td>'
            html += '<td>'
            if (rs.status == "on") {
                html += '<i class="fa fa-toggle-on" title="Hoạt động" onclick="location.href=\'' + $("#base_url").val() + 'admin_users/change_status/' + rs.user_id + '/' + rs.status + '\'"></i>'
            }
            else {
                html += '<i class="fa fa-toggle-off" title="Khóa" onclick="location.href=\'' + $("#base_url").val() + 'admin_users/change_status/' + rs.user_id + '/' + rs.status + '\'"></i>'
            }
            html += '</td>'

            html += '<td>' + rs.user_role + '</td>'
            html += '<td>' + rs.user_image + '</td>'
            html += '<td>'
            // html += '<button type="button" class="btn btn-info" title="Xem" style="padding:1px 6px;"><i class="fa fa-info-circle"></i></button>'
            html += '<button type="button" class="btn btn-warning" title="Sửa" onclick="confirm_edit(this);" style="padding:1px 6px; margin: 0 4px 0 0;" href="' + $("#base_url").val() + 'admin_users/edit/' + rs.user_id + '"><i class="fa fa-pencil-square-o"></i></button>'
            html += '<button type="button" class="btn btn-danger" title="Xóa" onclick="on_delete_record(this);" href="' + $("#base_url").val() + 'admin_users/delete/' + rs.user_id + '" style="padding:1px 6px;"><i class="fa fa-trash-o"></i></button>'
            html += '</td>'
            html += '</tr>';
            if (currentRecord == null){
                $('#grid_list tbody').append(html);
                tempAlert("Thêm mới thành công.", 3000);
                $("#user_image").append('<option value="' + rs.email + '" user_role="' + rs.user_role +'">' + rs.user_name+'</option>');
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
                    var code = $(el).closest("tr").attr('data-email');
                    $('#user_image option[value="' + code+'"]').remove();
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
            $("#email").val(currentRecord.email);
            $("#user_name").val(currentRecord.user_name);
            $("#status").val(currentRecord.status);
            $("#user_image").val(currentRecord.user_image);
            $("#user_role").val(currentRecord.user_role);
            // ẩn mã danh mục cha của chính mình:
            $("#user_image option[value='" + currentRecord.email+"']").hide();
            
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
function on_change_user_image(el) {
    var value = $(el).val();
    var user_role = $(el).find("option:selected").attr("user_role");
    if(value == ""){
        $("#user_role").val('');
        $("#user_role").closest(".form-group").show();
    }
    else{
        $("#user_role").val(user_role);
        $("#user_role").closest(".form-group").hide();
    }
}
// load danh sách:
function reload_list(){
    var url = base_url +'admin_users/grid';
    call_ajax("GET", url, null, function (data, textStatus, jqXHR) {
        if (data.result != null && data.message == "") {
            var html = "";
            for (let i = 0; i < data.result.length; i++) {
                const element = data.result[i];
                html += '<tr data-id="' + element.user_id + '" data-email="'+element.email+'">'
                html += '<td>'+(i+1)+'</td>'
                html += '<td><input class="check_item" type="checkbox" data-id="' + element.user_id+'" onclick="checkOne(this)"></td>'
                html += '<td>' + element.email+'</td>'
                html += '<td>' + element.user_name+'</td>'
                html += '<td>'
                if (element.status == "on")
                    html += '<i class="fa fa-toggle-on" title="Hoạt động" onclick="location.href=\'' + base_url + 'admin_users/change_status/' + element.user_id + '/'+ element.status + '\'"></i>'
                else
                    html += '<i class="fa fa-toggle-off" title="Khóa" onclick="location.href=\'' + base_url + 'admin_users/change_status/' + element.user_id + '/'+ element.status + '\'"></i>'
                html += '</td>'
                html += '<td>'+obj_role[element.user_role]+'</td>'
                html += '<td><img class="img_user" src="' +base_url+element.user_image+'"></td>'
                html += '<td>'
                html += '<button type="button" class="btn btn-warning" title="Sửa" onclick="confirm_edit(this);" style="padding:1px 6px;" href="' + base_url + 'admin_users/edit/' + element.user_id+'"><i class="fa fa-pencil-square-o"></i></button>'
                html += '<button type="button" class="btn btn-danger" title="Xóa" onclick="on_delete_record(this);" style="padding:1px 6px;" href="' + base_url + 'admin_users/delete/' + element.user_id +'"><i class="fa fa-trash-o"></i></button>'
                html += '</td>'
                html += '</tr>'
            }
            $("#grid_list tbody").html(html);
        }
    }, function (jqXHR, textStatus, errorThrown) {
        alert(errorThrown);
    });
}


