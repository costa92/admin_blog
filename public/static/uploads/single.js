var url = "/admin/upload";

function single(uploadBtn, uploadFile, imgPath) {
    if (typeof (FileReader) != "undefined") {
        var formdata = new FormData();
        var v_this = uploadBtn;
        var fileObj = v_this.get(0).files;
        var img = imgPath ? $("#" + imgPath) : '';
        formdata.append("file", fileObj[0]);
        $.ajax({
            url: url,
            type: "POST",
            dataType: "JSON",
            async: false,
            data: formdata,
            cache: false,
            contentType: false,
            processData: false,
            timeout: 5000,
            success: function (data) {
                if (data.code == "success") {
                    if (img) {
                        img.attr('src', data.data.url);
                        img.css('display', 'block');
                    }
                    $("#" + uploadFile).val(data.data.url);
                } else {
                    alert("上传错误!!");
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(errorThrown)
            }
        });
    }
}