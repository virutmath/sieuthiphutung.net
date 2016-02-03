var chat = {};
chat.frame = '<iframe src="http://chat.n-k.de/" style="position : absolute;top : 0; left : 0; width : 480px; height: 800px;"></iframe>';
$(document).ready(function () {
    $('body').append(chat.frame);
});
