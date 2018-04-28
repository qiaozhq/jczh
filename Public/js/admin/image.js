/**
 * 图片上传功能
 */
$(function() {
    $('#file_upload').uploadify({
        'swf'      : SCOPE.ajax_upload_swf,
        'uploader' : SCOPE.ajax_upload_image_url,
        'buttonText': '上传图片',
        'fileTypeDesc': 'Image Files',
        'fileObjName' : 'file',
        "multi": false,
        //允许上传的文件后缀
        'fileTypeExts': '*.gif; *.jpg; *.png',
        'onCancel': function(file){
            console.log('The file'+ file.name + 'was cancelled.')
        },
        'onUploadSuccess' : function(file,data,response) {
            // response true ,false
            if(response) {
                var obj = JSON.parse(data); //由JSON字符串转换为JSON对象

                console.log(data);
                $('#' + file.id).find('.data').html(' 上传完毕');

                $("#upload_org_code_img").attr("src",obj.data);
                $("#file_upload_image").attr('value',obj.data);
                $("#upload_org_code_img").show();
            }else{
                alert('上传失败');
            }
        },
    });
});

/**
 * 图片上传功能
 */
$(function() {
    $('#file_upload2').uploadify({
        'swf'      : SCOPE.ajax_upload_swf,
        'uploader' : SCOPE.ajax_upload_image_url,
        'buttonText': '上传图片',
        'fileTypeDesc': 'Image Files',
        'fileObjName' : 'file',
        "multi": true,
        //允许上传的文件后缀
        'fileTypeExts': '*.gif; *.jpg; *.png',
        'onCancel': function(file){
            console.log('The file'+ file.name + 'was cancelled.')
        },
        'onUploadSuccess' : function(file,data,response) {
            // response true ,false
            if(response) {
                var obj = JSON.parse(data); //由JSON字符串转换为JSON对象

                console.log(data);
                $('#' + file.id).find('.data').html(' 上传完毕');
                if(obj.data !==""){
                    $("#upload_org_code_img2").append("<img width='70' height='70' src="+obj.data+">")
                    var value = $("#file_upload_image2").attr('value');
                    if(typeof(value) !== "undefined" &&  value !==null && value!==""){
                        $("#file_upload_image2").attr('value',value+"##"+obj.data);
                    }else{
                        $("#file_upload_image2").attr('value',obj.data);
                    }
                }
                $("#upload_org_code_img2").show();
            }else{
                alert('上传失败');
            }
        },
    });
});

function clearThumb(){
    $('#file_upload_image2').attr('value','');
    $("#upload_org_code_img2").empty();
}