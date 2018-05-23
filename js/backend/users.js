$(document).ready(function() {
    reload_list();    
    
    On_Register_EffectImage();
});
// Hàm thêm mới or cập nhật
function saveItem(el) {
    var code = $("#email").val().trim();
    var name = $("#user_name").val().trim();
    var password = $("#password").val();
    var password2 = $("#password2").val();
    var status = $("#status").val();
    var role = $("#user_role").val(); 
    var dataImages = $('.cropped img').attr('src');
    var data2 = {
        "data": {
            "email": code,
            "user_name": name,
            "status": status,
            "password": password,
            "user_image": dataImages,
            "user_role": role
        }
    };

    var invalid = false;
    if (currentRecord == null){
        if (password == '' || password2 == '') {
            invalid = true;
        }
        else if(password != password2) {
            alert("Xác nhận mật khẩu chưa chính xác.")
            return false;
        } 
    }
    else{
        delete data2.data.password;
    }

    if (code == '' || name == '' || status == '' || role == ''){
        invalid = true;
    }
    if (invalid) {
        alert("Nhập thiếu thông tin.");
        return false;
    }    

    if (dataImages != null && dataImages.indexOf("images/male.png") >= 0) {
        data2.data.user_image = $('#url_img').val();
        update();
    }
    else if (currentRecord != null && dataImages.indexOf(currentRecord.user_image) >= 0){
        data2.data.user_image = $('#url_img').val();
        update();
    }
    else {
        var url1 = base_url + "admin_users/uploadAvatar";
        var data1 = {"image": dataImages};
        console.log(data1);
        call_ajax("POST", url1, data1, function (data, textStatus, jqXHR) {
            console.log(data)
            if (data != null && data.result != null && data.result != false && data.message == ""){
                data2.data.user_image = data.result;
                update();
            }
            else{
                alert(data.message);
                return false;
            }
        }, function (jqXHR, textStatus, errorThrown) { alert(errorThrown); });
    }
    function update() {
        var url2 = $(el).attr("href");
        var url2 = base_url +"admin_users/update";
        if (currentRecord != null) {
            url2 += "?id=" + currentRecord.user_id;
        }
        call_ajax("POST", url2, data2, function (data, textStatus, jqXHR) {
            if (data != null && data.message == "") {
                var rs = data.result;
                var index = $('#grid_list tbody tr').length;
                var html = "";
                html += '<tr data-id="' + rs.user_id + '" data-email="' + rs.email + '">'
                html += '<td>' + (index + 1) + '</td>'
                html += '<td> <input class="check_item" type="checkbox" data-id="' + rs.user_id + '" onclick="checkOne(this)"></td>'
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

                html += '<td>' + obj_role[rs.user_role] + '</td>'
                html += '<td><img class="img_user" src="' + base_url + rs.user_image+'"></td>'
                html += '<td>'
                // html += '<button type="button" class="btn btn-info" title="Xem" style="padding:1px 6px;"><i class="fa fa-info-circle"></i></button>'
                html += '<button type="button" class="btn btn-warning" title="Sửa" onclick="confirm_edit(this);" style="padding:1px 6px; margin: 0 4px 0 0;" href="' + $("#base_url").val() + 'admin_users/edit/' + rs.user_id + '"><i class="fa fa-pencil-square-o"></i></button>'
                html += '<button type="button" class="btn btn-danger" title="Xóa" onclick="on_delete_record(this);" href="' + $("#base_url").val() + 'admin_users/delete/' + rs.user_id + '" style="padding:1px 6px;"><i class="fa fa-trash-o"></i></button>'
                html += '</td>'
                html += '</tr>';
                if (currentRecord == null) {
                    $('#grid_list tbody').append(html);
                    tempAlert("Thêm mới thành công.", 3000);
                    $("#user_image").append('<option value="' + rs.email + '" user_role="' + rs.user_role + '">' + rs.user_name + '</option>');
                }
                else {
                    if (element != null) {
                        element.closest("tr").remove();
                        $('#grid_list tbody').prepend(html);
                        $('#grid_list tbody tr').each(function (i, el) {
                            $(el).find("td:first").html((i + 1));
                        });
                    }
                    tempAlert("Cập nhật thành công.", 3000);
                    currentRecord = null;
                }
                $(".page-header").html("Danh mục");
                back_to_list();
            }
            else {
                alert(data.message);
            }
        }, function (jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
        });
    }
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
            $("#password, #password2").closest(".form-group").hide();
            // set value:
            $("#url_img").val(currentRecord.user_image);
            $("#email").val(currentRecord.email);
            $("#user_name").val(currentRecord.user_name);
            $("#status").val(currentRecord.status);
            $("#user_image img").attr("src", base_url + currentRecord.user_image);
            $("#user_role").val(currentRecord.user_role);
            
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
// phần upload ảnh:
function on_openUploadAnh() {
    $('#upload-modal').css('display', 'block');
    $('#overlay').css('display', 'block');
    $('#upload-modal .imageBox').css('background-image', '#fff'); // set lai khi chon anh dai dien.
} 
function onCancel_PopupUploadAnh() {
    $('#upload-modal').hide();
    $('#overlay').css('display', 'none');
}
// preview image upload:
function On_Register_EffectImage() {
    var options = {
        thumbBox: '.thumbBox',
        spinner: '.spinner',
        imgSrc: 'avatar.png'
    }
    var cropper;
    $('#file').on('change', function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            options.imgSrc = e.target.result;
            cropper = $('.imageBox').cropbox(options);
        }
        reader.readAsDataURL(this.files[0]);
    })
    $('#btnCrop').on('click', function () {
        if (cropper != null){
            var img = cropper.getDataURL()
            $('.cropped').html('<img src="' + img + '">');
            onCancel_PopupUploadAnh();
        }
    })
    $('#btnZoomIn').on('click', function () {
        if (cropper != null) {
            cropper.zoomIn();
        }
    })
    $('#btnZoomOut').on('click', function () {
        if (cropper != null) {
            cropper.zoomOut();
        }
    })
}