function saveItem(el) {
    var code = $("#code_cate").val();
    var name = $("#name_cate").val();
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
    $.post(url, data, function(data) {
        if(data != null && data.message == ""){
            
            var rs = data.result;
            var index = $('#grid_list tbody tr').length;
            var html = "";
            html +='<tr>'
            html += '<td>' + (index+1)+'</td>'
            html +='<td>'+rs.type_code+'</td>'
            html += '<td>' + rs.type_name +'</td>'
            html +='<td>'
            if(rs.type_status == "on"){
                html += '<i class="fa fa-toggle-on" title="Hoạt động" onclick="location.href=\'' + $("#base_url").val() + 'admin_category_type/change_status/' + rs.type_id + '/' + rs.type_status +'\'"></i>'
            }
            else{
                html += '<i class="fa fa-toggle-off" title="Khóa" onclick="location.href=\'' + $("#base_url").val() + 'admin_category_type/change_status/' + rs.type_id + '/' + rs.type_status +'\'"></i>'
            }
            html +='</td>'

            html +='<td>'
            html += '<button type="button" class="btn btn-info" title="Xem" style="padding:1px 6px;"><i class="fa fa-info-circle"></i></button>'
            html += '<button type="button" class="btn btn-warning" title="Sửa" onclick="doconfirm2(this);" style="padding:1px 6px;" href="' + $("#base_url").val() + 'admin_category_type/edit/' + rs.type_id+'"><i class="fa fa-pencil-square-o"></i></button>'
            html += '<button type="button" class="btn btn-danger" title="Xóa" onclick="on_delete_record(this);" href="' + $("#base_url").val() + 'admin_category_type/delete/' + rs.type_id+'" style="padding:1px 6px;"><i class="fa fa-trash-o"></i></button>'
            html +='</td>'
            html +='</tr>';
            
            $('#grid_list tbody').append(html);
            back_to_list();
            tempAlert("Thêm mới thành công.", 3000);
        }
    }, "json")
}
function on_delete_record(el) {
    var role = $(".user_role").val();
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
                    $("#grid_list tbody tr").each(function (i, el) {
                        console.log(i);
                        $(el).find("td:eq(0)").val((i + 1));
                    });
                }
            }, function (jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            });
        }
        else {
            return job;
        }
    }
}