var UploaderScript = UploaderScript || {};
UploaderScript.config = {
    url : '/file/upload',
    file_ext : 'jpg,gif,png,jpeg,bmp',
    browse_button : '',
    image_wrapper : '',
    csrf_token : {},
    loading : '',
    error_wrapper : '',
    max_file_size : '10mb',
    file_name : ''
}
UploaderScript.init = function(option, callback){
    $.extend(UploaderScript.config, option);
    if(!UploaderScript.config.browse_button || !$('#'+UploaderScript.config.browse_button).length){
        console.log('Error : Khong tim thay browse_button');
        return false;
    }

    var uploader = new plupload.Uploader({
        runtimes : 'html5,flash,html4',
        multipart_params : UploaderScript.config.csrf_token,
        browse_button : UploaderScript.config.browse_button,
        max_file_size : UploaderScript.config.max_file_size,
        url : UploaderScript.config.url,
        flash_swf_url : 'plupload/js/plupload.flash.swf',
        silverlight_xap_url : 'plupload/js/plupload.silverlight.xap',
        filters : [
            {title : "Image files", extensions : UploaderScript.config.file_ext}
        ]
    });
    uploader.init();
    uploader.bind('FilesAdded',function(up,file){
        uploader.start();
    });
    uploader.bind('UploadProgress',function(up,file){
        if(UploaderScript.config.loading){
            $('#'+UploaderScript.config.loading).html(file.percent + '%');
        }
    });
    uploader.bind('FileUploaded',function(up,file,resp){
        if(resp.status == 200){
            var fileInfo = resp.response;
            fileInfo = JSON.parse(fileInfo);
            filename = fileInfo.result.filename;
            filepath = fileInfo.result.filepath;
            $('#'+UploaderScript.config.image_wrapper).attr('src',filepath);
            UploaderScript.config.file_name = filename;
            callback();
        }
    });
}