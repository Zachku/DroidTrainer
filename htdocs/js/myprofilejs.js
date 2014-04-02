
$(document).ready(function() {
    $("#editProfile").hide();
});

$("#editProfileLink").live('click', function() {
    $("#editProfile").show();
});
$("#hideEditProfile").live('click', function() {
    $("#editProfile").hide();
});
