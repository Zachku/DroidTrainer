
$(document).ready(function() {
    $(".editProfile").hide();
});

$("#editProfileLink").live('click', function() {
    if ($(".editProfile").is(":hidden"))
        $(".editProfile").fadeIn();
    else
        $(".editProfile").fadeOut();
});
