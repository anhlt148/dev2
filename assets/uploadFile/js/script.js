function getQueryParams(qs) {
    qs = qs.split("+").join(" ");

    var params = {}, tokens,
        re = /[?&]?([^=]+)=([^&]*)/g;

    while (tokens = re.exec(qs)) {
        params[decodeURIComponent(tokens[1])]
            = decodeURIComponent(tokens[2]);
    }

    return params;
}
$.fn.createdropbox = function (maxfile) {
   var maxfiles=5;
   if(typeof maxfile!='undefined')
       {
            maxfiles=maxfile;
       }
   var dropbox = this,
		message = $('.message', dropbox);

    dropbox.filedrop({
        // The name of the $_FILES entry:
        paramname: 'pic',
        maxfiles: maxfiles,
        maxfilesize: 2,
        url: fileBussiness + '/upload?orgid=' + getCookieMBW("orgid"),

        uploadFinished: function (i, file, response) {
            $.data(file).addClass('done');
            $.data(file).attr('data-original-link', response.message);
            var paralatlong = getQueryParams(response.message);
            if (paralatlong.lat != "" && paralatlong.long != "") {
				$.data(file).find('.imageHolder').append('<span class="gps" onclick="on_ChangeLongLatImage('+paralatlong.lat+','+paralatlong.long+')" style="top:100px"></span>');
            }
			else
			{
				$.data(file).find('.uploaded').css("height","100%")
			}
            // response is the JSON object that post_file.php returns
        },

        error: function (err, file) {
            switch(err) {
                case 'BrowserNotSupported':
                    showMessage('Trình duyệt của bạn không hỗ trợ HTML5!');
                    break;
                case 'TooManyFiles':
                    alert('Cấu hình chỉ cho phép 5 ảnh');
                    break;
                case 'FileTooLarge':
                    alert(file.name + ' kích thước quá lớn (<2Mb)');
                    break;
                default:
                    break;
            }
        },

        // Called before each upload is started
        beforeEach: function (file) {
            if(!file.type.match(/^image\//)) {
                alert('Chỉ cho phép tải ảnh lên server!');

                // Returning false will cause the
                // file to be rejected
                return false;
            }
        },

        uploadStarted: function (i, file, len, containerDrop) {
            createImage(file, containerDrop);
        },

        progressUpdated: function (i, file, progress) {
            $.data(file).find('.progress').width(progress);
        }

    });

    var template = '<div class="preview">' +
						'<span class="imageHolder">' +
							'<img />' +
							'<span class="uploaded" onclick="on_DeleteImage(this)"></span>' +
						'</span>' +
						'<div class="progressHolder">' +
							'<div class="progress"></div>' +
						'</div>' +
					'</div>';


    function createImage(file, containerDrop) {

        var preview = $(template),
			image = $('img', preview);

        var reader = new FileReader();

        image.width = 100;
        image.height = 100;

        reader.onload = function (e) {

            // e.target.result holds the DataURL which
            // can be used as a source of the image:

            image.attr('src', e.target.result);
        };

        // Reading the file as a DataURL. When finished,
        // this will trigger the onload function above:
        reader.readAsDataURL(file);


        $('#' + containerDrop + ' .message').hide();
        preview.appendTo($('#' + containerDrop));

        // Associating a preview container
        // with the file, using jQuery's $.data():

        $.data(file, preview);
    }

    function showMessage(msg) {
        message.html(msg);
    }

};