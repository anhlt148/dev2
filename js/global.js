var base_url;
var obj_role = {
    "owner": "Chủ sở hữu",
    "admin": "Quản trị viên"
};
$(document).ready(function () {
    base_url = $("#base_url").val();
});

function call_ajax(type, url, data, successcallback, failcallback) {
    $.ajax({
        type: type,
        url: url,
        cache: false,
        data: data,
        dataType: 'json',
        // contentType: "application/json",
        success: function (data, textStatus, jqXHR) {
            successcallback(data, textStatus, jqXHR);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            failcallback(jqXHR, textStatus, errorThrown);
        }
    });
}

// hàm hiển thị thông báo:
function tempAlert(msg, duration) {
    var el = document.createElement("div");
    el.setAttribute("class", "notification");
    el.setAttribute("style", "font-weight:bold;position:absolute; top:8vh; left:40vw; background-color:#FFB752; padding: 10px 15px;");
    el.innerHTML = msg;
    setTimeout(function () {
        el.parentNode.removeChild(el);
    }, duration);
    document.body.appendChild(el);
}
function show_notify(msg, type) {
    var _class = "alert alert-info alert-dismissable";
    switch (type) {
        case "ss":
            _class = "alert alert-success alert-dismissable";
            break;
        // case "if":
        //     _class = "alert alert-info alert-dismissable"
        //     break;
        case "wn":
            _class = "alert alert-warning alert-dismissable"
            break;
        case "dg":
            _class = "alert alert-danger alert-dismissable"
            break;
    }
    var html = '';
    html += '<div id="_notify" class="' + _class+'">'
    html +='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'
    html += '<span>' + msg+'</span'
    html +='</div>'
    return html;
}
// hàm thêm mới 1 cái gì đó:
var page_header = "";
function create() {
    check_role(function(){
        $("#grid_list").hide();
        $("#create_new").show();
        page_header = $("h2.page-header").html();
        $("h2.page-header").html("Thêm mới");
        $("#save").show();
        $("#update").hide();
        currentRecord = null;
    });
}
function check_role(callback) {
    var role = $(".user_role").val();
    if (role != "owner" && role != "admin") {
        tempAlert('Bạn không có quyền.', 3000)
        return;
    } 
    else{
        callback();
    }
}
// hàm back to list:
function back_to_list() {
    $('#create_new input').val("");
    $('#create_new select').val("");
    $("h2.page-header").html(page_header);
    $("#grid_list").show();
    $("#create_new").hide();
    currentRecord = null;
}
// hàm kiem tra khi xoa thành vien:
function doconfirm(el, callback) {
    var role = $(".user_role").val();
    if (role != "owner" && role != "admin") {
        tempAlert('Bạn không có quyền.', 3000)
        return false
    }
    else {
        callback();
    }
}
// hàm kiem tra tài khoản khi sửa:
function confirm_edit(el) {
    var role = $(".user_role").val();
    if (role != "owner" && role != "admin") {
        tempAlert('Bạn không có quyền.', 3000)
        return false;
    }
    else {
        on_edit(el);
    }
}
// hàm kiem tra tham so tren thanh dia chỉ:
function getParamerter() {
    var status = getParameterByName('status');
    switch (status) {
        case 'add': tempAlert('Thêm mới thành công!', 3000); break;
        case 'edit': tempAlert('Cập nhật thành công!', 3000); break;
        case 'delete': tempAlert('Xóa thành công!', 3000); break;
        case 'notAllow': tempAlert('Bạn không có quyền!', 3000); break;
    }
}
// chọn nhiều:
var _arrID = [];
function check_all() {
    $('.check_item').prop('checked', $('.check_all').prop('checked'));
    $('.check_item').each(function (index) {
        checkOne($(this));
    });
}
// chọn một:
function checkOne(e) {
    var _id = $(e).attr("data-id");
    if ($(e).prop("checked") == true) {
        if (_arrID.indexOf(_id) < 0) {
            _arrID.push(_id)
        }
    }
    else {
        _arrID.splice(_arrID.indexOf(_id), 1);
    }
}
function format_code(el) {
    var value = $(el).val().replace(/[^0-9a-z_A-Z]/g, '');
    $(el).val(value);
}
function on_FormatMoney(e) {
    var num = $(e).val().replace(/[^0-9.%]/g, '');
    $(e).val(num.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
}