$(function() {
    
    //===== Form wizards =====//

    $("#new_employee_form").formwizard({
        formPluginEnabled: false,
        validationEnabled: true,
        focusFirstInput: false,
        disableUIStyles: true
    });

	$(function() {
    	$( "#dob" ).datepicker({
      		changeMonth: true,
      		changeYear: true,
			dateFormat: 'dd-mm-yy',
			yearRange: "-70:-12"
    	});
  	});

	$(function() {
    	$( "#start_date" ).datepicker({
      		changeMonth: true,
      		changeYear: true,
			dateFormat: 'dd-mm-yy',
			yearRange: "-70:+0"
    	});
  	});

	
	$("#copy_times").click(copyTime);
	         function copyTime()
	         {
	               var start=$("#monday_start").val();
					var finish=$("#monday_finish").val();
	               if (this.checked==true) {
	        			$("#tuesday_start").val(start);
						$("#tuesday_finish").val(finish);
						$("#wednesday_start").val(start);
						$("#wednesday_finish").val(finish);
						$("#thursday_start").val(start);
						$("#thursday_finish").val(finish);
						$("#friday_start").val(start);
						$("#friday_finish").val(finish);
						$("#saturday_start").val(start);
						$("#saturday_finish").val(finish);
						$("#sunday_start").val(start);
						$("#sunday_finish").val(finish);
					}
	}

    $("#wizard2").formwizard({
        formPluginEnabled: true,
        validationEnabled: false,
        focusFirstInput: false,
        disableUIStyles: true,
        formOptions: {
            success: function(data) {
                $("#status1").fadeTo(500, 1, function() {
                    $(this).html("<span>Form was submitted!</span>").fadeTo(5000, 0);
                })
            },
            beforeSubmit: function(data) {
                $("#data1").html("<span>Form was submitted with ajax. Data sent to the server: " + $.param(data) + "</span>");
            },
            resetForm: true
        }
    });

    $("#wizard3").formwizard({
        formPluginEnabled: true,
        validationEnabled: false,
        focusFirstInput: false,
        formOptions: {
            success: function(data) {
                $("#status2").fadeTo(500, 1, function() {
                    $(this).html("<span>Form was submitted!</span>").fadeTo(5000, 0);
                })
            },
            beforeSubmit: function(data) {
                $("#data2").html("<span>Form was submitted with ajax. Data sent to the server: " + $.param(data) + "</span>");
            },
            resetForm: true
        },
        inAnimation: {height: 'show'},
        outAnimation: {height: 'hide'},
        inDuration: 400,
        outDuration: 400,
        easing: 'easeInBack'	//see e.g. http://gsgd.co.uk/sandbox/jquery/easing/ for information on easing
    }
    );


});
