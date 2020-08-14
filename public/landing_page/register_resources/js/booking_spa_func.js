	jQuery(function ($) {
	    "use strict";
	    $('form#wrapped').attr('action', 'booking_spa.php');
	    $("#wizard_container").wizard({
	        stepsWrapper: "#wrapped",
	        submit: ".submit",
	        beforeSelect: function (event, state) {
	            if ($('input#website').val().length != 0) {
	                return false;
	            }
	            if (!state.isMovingForward)
	                return true;
	            var inputs = $(this).wizard('state').step.find(':input');
	            return !inputs.length || !!inputs.valid();
	        }
	    }).validate({
	        errorPlacement: function (error, element) {
	            if (element.is(':radio') || element.is(':checkbox')) {
	                error.insertBefore(element.next());
	            } else {
	                error.insertAfter(element);
	            }
	        }
	    });
	    //  progress bar
	    $("#progressbar").progressbar();
	    $("#wizard_container").wizard({
	        afterSelect: function (event, state) {
	            $("#progressbar").progressbar("value", state.percentComplete);
	            $("#location").text("(" + state.stepsComplete + "/" + state.stepsPossible + ")");
	        }
	    });
	    // validate select
	    $('#wrapped').validate({
	        ignore: [],
	        rules: {
	            select: {
	                required: true
	            }
	        },
	        errorPlacement: function (error, element) {
	            if (element.is('select:hidden')) {
	                error.insertAfter(element.next('.nice-select'));
	            } else {
	                error.insertAfter(element);
	            }
	        }
	    });
	    // date picker
	    $('input[name="dates"]').daterangepicker({
	        autoUpdateInput: false,
	        "singleDatePicker": true,
	        "opens": "left",
	        locale: {
	            cancelLabel: 'Clear'
	        }
	    });
	    $('input[name="dates"]').on('apply.daterangepicker', function (ev, picker) {
	        $(this).val(picker.startDate.format('MM-DD-YY'));
	    });
	    $('input[name="dates"]').on('cancel.daterangepicker', function (ev, picker) {
	        $(this).val('');
	    });
	});