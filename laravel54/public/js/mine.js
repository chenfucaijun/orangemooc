var editor = new wangEditor('content');

// 上传图片
editor.config.uploadImgUrl = '/posts/image/upload';

// 设置 headers
editor.config.uploadHeaders = {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
};

editor.create();