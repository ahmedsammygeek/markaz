$(function() {

    $('#side-menu').metisMenu();

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
$(function() {
    $(window).bind("load resize", function() {
        console.log($(this).width())
        if ($(this).width() < 768) {
            $('div.sidebar-collapse').addClass('collapse')
        } else {
            $('div.sidebar-collapse').removeClass('collapse')
        }
    })
})


$(function () {
	new_row = '<div class=row><div class=col-md-8><div class=form-group><label>رقم القضية</label><input name="cause_number[]" class=form-control></div><div class=form-group><label>التهمة</label><textarea name="charge_type[]" class=form-control rows=3></textarea></div></div></div>';

	$('input.add_charge').on('click', function(event) {
		event.preventDefault();
		$('div.causes').append(new_row);
	});
});