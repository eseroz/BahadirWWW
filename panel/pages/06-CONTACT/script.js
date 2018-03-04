var AJAX_PATH = '/panel/pages/06-CONTACT/ajax.php';

$(document).ready(function () {
    
    $(".tab").find("a").click(function () {
        $("[name='CURRENT_PAGE']").val($(this).attr("href"));
    });
    
    $(".progress").hide();
    
});