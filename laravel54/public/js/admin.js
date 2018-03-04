$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".post-audit").click(function(event){
    target = $(event.target);
    var post_id = target.attr("post-id");
    var status = target.attr("post-action-status");

    $.ajax({
            url: "/admin/posts/" + post_id + "/status",
            method: "POST",
            data: {"status": status},
            dataType: "json",
            success: function(data) {
                if (data.error != 0) {
                    alert(data.msg);
                    return;
                }

                target.parent().parent().remove();
            }
        }
    );
});

$(".resource-delete").click(function(event){

    if (confirm("确定执行删除操作么?") == false) {
        return;
    }

    var target = $(event.target);
    event.preventDefault();
    var url = $(target).attr("delete-url");
    $.ajax({
        url: url,
        method: "POST",
        data: {"_method": 'DELETE'},
        dataType: "json",
        success: function(data) {
            if (data.error != 0) {
                alert(data.msg);
                return;
            }

            window.location.reload();
        }
    });
});

$("#jquery_jplayer_1").jPlayer({

    ready: function () {

        $(this).jPlayer("setMedia", {

            m4v: "mi4.m4v",

            ogv: "mi4.ogv",

            webmv: "http://jq22.qiniudn.com/www.jq22.commi4.webm",

            poster: "mi4.png"

        });

    },

    swfPath: "js",

    supplied: "webmv, ogv, m4v",

    size: {

        width: "570px",

        height: "340px",

        cssClass: "jp-video-360p"

    }

});