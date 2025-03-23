$(function () {
    "use strict"
    $(".btn-refresh").click(function () {
        $.ajax({
            type: 'GET',
            url: '/refresh/captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
})