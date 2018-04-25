$(Document).ready(function () {

});
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
        // val = $(el).attr("data-val");
        // $(el).attr('onclick', val);
        // $(el).click();
        $("#grid_list").hide();
        $("#create_new").show();
        page_header = $("h2.page-header").html();
        $("h2.page-header").html("Thêm mới");
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
}
// hàm kiem tra khi xoa thành vien:
function doconfirm() {
    var role = $(".user_role").val();
    if (role != "owner") {
        tempAlert('Bạn không có quyền.', 3000)
        return false
    }
    else {
        job = confirm("Bạn có chắc chắn muốn xóa không?");
        if (job) {
            $(el).attr('onclick', $(el).attr('href'));
            $(el).click();
        }
        else {
            return job;
        }
    }
}
// hàm kiem tra tài khoản khi sửa:
function doconfirm2(el) {
    var value = $(el).attr('data-value');
    if (value == 1) {
        tempAlert('Không được phép sửa!', 3000);
        return false;
    }
    else {
        $(el).attr('onclick', $(el).attr('href'));
        $(el).click();
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