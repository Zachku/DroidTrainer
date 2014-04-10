
$(document).ready(function() {
    $(".editProfile").hide();
});

$("#editProfileLink").live('click', function() {
    $(".editProfile").fadeIn();
});
$("#hideEditProfile").live('click', function() {
    $(".editProfile").fadeOut();
});
