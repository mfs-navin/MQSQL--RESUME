$(document).ready(function()
{

	var name_err = gender_err = email_err = phone_err = skills_err = photo_err = about_err = addr_err = edu_err = linkedin_err = github_err= true;


	//Name

	$('#name').keyup( function ()
	{

		var input = $(this);

		var is_name = input.val();

		if(is_name.length < 3)
		{
			name_err=true;

			input.removeClass("valid").addClass("invalid");
			input.next().removeClass("error").addClass("error_show").text("Should be more than 3 Characters");
		}

		else if(is_name.length>=3)
		{
			if (/^[A-Za-z ]+$/.test(is_name)) 
			{
				name_err = false;
				input.removeClass("invalid").addClass("valid");
				input.next().removeClass("error_show").addClass("error");
			}

			else{
				name_err=true;

				input.removeClass("valid").addClass("invalid");
				input.next().removeClass("error").addClass("error_show").text("Should not contain any number");
			}

		}

		else
		{
			name_err=true;

			input.removeClass("valid").addClass("invalid");
			input.next().removeClass("error").addClass("error_show").text("Should be less than 10 Characters");

		}

	});




	//Email
	$('#email').keyup( function() 
	{
		var input=$(this);
		var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
		var is_email=re.test(input.val());
		if(is_email)
		{
			email_err=false;
			input.removeClass("invalid").addClass("valid");
			input.next().removeClass('error_show').addClass('error');
		}

		else
		{
			email_err=true;

			input.removeClass("valid").addClass("invalid");
			input.next().removeClass('error').addClass('error_show');
		}
	});


	//Contact Number
	$('#phone').keyup( function() 
	{
		var input = $(this);
		var is_phone = input.val();


		if(is_phone.match(/^[0-9]+$/) == null)
		{
			phone_err=true;
			input.removeClass("valid").addClass("invalid");
			input.next().removeClass('error').addClass('error_show').text("There should be only numbers");
		}

		else if( is_phone.length != 10)
		{
			phone_err=true;
			input.removeClass("valid").addClass("invalid");
			input.next().removeClass('error').addClass('error_show').text("Contact number should be of 10 digits");
		}

		else
		{
			phone_err = false;
			input.removeClass("invalid").addClass("valid");
			input.next().removeClass("error_show").addClass("error");
		}

	});


	//Address
	$('#addr').keyup( function ()
	{

		var input = $(this);
		var is_name = input.val();
		if(is_name.length < 10)
		{
			addr_err=true;
			input.removeClass("valid").addClass("invalid");
			input.next().removeClass('error').addClass('error_show').text("Should be more than 10 Characters");
		}

		else
		{
			if (is_name.match(/^[a-zA-Z0-9-\/] ?([a-zA-Z0-9-\/]|[a-zA-Z0-9-\/] )*[a-zA-Z0-9-\/]$/)!=null) {
				addr_err = false;
				input.removeClass("invalid").addClass("valid");
				input.next().removeClass("error_show").addClass("error");
			}

			else{
				addr_err=true;
				input.removeClass("valid").addClass("invalid");
				input.next().removeClass('error').addClass('error_show').text("Should be alphanumberic.");
			}

		}

	});


	//Educational Qualification
	$('#education').change(function() 
	{

		var education = $(this);
		var education_value = education.val();

		if( education_value == 0)
		{
			edu_err=true;
			education.removeClass("valid").addClass("invalid");
			education.next().removeClass("error").addClass("error_show");
		}

		else
		{
			edu_err=false;
			education.removeClass("invalid").addClass("valid");
			education.next().removeClass("error_show").addClass("error");
		}

	});

	//About
	$('#about').keyup( function () 
	{
		var about = $(this);
		var is_about = about.val();

		if( is_about.length >= 10)
		{
			if ( $.trim( is_about ) == '' )
			{
				about_err=true;
				about.removeClass("valid").addClass("invalid");
				about.next().removeClass("error").addClass("error_show").text("Please enter some text.");

			}
			else{
				about_err=false;
				about.removeClass("invalid").addClass("valid");
				about.next().removeClass("error_show").addClass("error");
			}
		}

		else
		{
			about_err=true;

			about.removeClass("valid").addClass("invalid");
			about.next().removeClass("error").addClass("error_show").text("Should be more than 10 Characters");
		}

	});

	//Professional Links
	$("#linkedin").keyup( function () 
	{

		var link = $(this);
		var is_link = link.val();

		if( is_link.match(/((https?:\/\/)?((www|\w\w)\.)?linkedin\.com\/)+[a-zA-Z]*/i)==null)
		{
			linkedin_err=true;
			link.removeClass("valid").addClass("invalid");
			link.next().removeClass("error").addClass("error_show").text("Enter a valid Linkedin Profile url");
		}
		else
		{
			linkedin_err=false;
			link.removeClass("invalid").addClass("valid");
			link.next().removeClass("error_show").addClass("error");
		}
	});

	$("#github").keyup( function () 
	{

		var link = $(this);
		var is_link = link.val();

		if( is_link.match(/((https?:\/\/)?((www|\w\w)\.)?github\.com\/)+[a-zA-Z]*/i)==null)
		{
			github_err=true;

			link.removeClass("valid").addClass("invalid");
			link.next().removeClass("error").addClass("error_show").text("Enter a valid Github profile url");
		}
		else
		{
			github_err=false;
			link.removeClass("invalid").addClass("valid");
			link.next().removeClass("error_show").addClass("error");
		}
	});

	/// File MIME type validation

	$("#upload").click(function(event)
	{


		$(this).data('clicked', true);


		var file = $("#profile_pic")[0].files;


		if (file["length"]>0){
			var fileType = file[0]["type"];

			var validImageTypes = ["image/gif", "image/jpeg", "image/png"];

			if ($("#profile_pic").val()) 
			{
				if ($.inArray(fileType, validImageTypes) < 0) {
					photo_err=true;

					$("#profile_pic").removeClass('valid').addClass('invalid');
					$("#upload").next().removeClass('error').addClass('error_show').text('Please select only an image with format gif, jpeg, jpg or png');
				}
				else{
					photo_err=false;
					$("#profile_pic").removeClass('invalid').addClass('valid');
					$("#upload").next().removeClass('error_show').addClass('error');


				}
			}
		}
	});


	// Gender validation
	$("form input:radio").change(function()
	{

		if($("input:radio[name='gender']").is(":checked")){

			gender_err = false;
			$("#error_gender").removeClass('error_show').addClass('error');

		}
		else{

			gender_err=true;
			$("#error_gender").removeClass('error').addClass('error_show');

		}
	});


	//Skills validation
	$("form input:checkbox").change(function()
	{
		
		if( $("#skill_checkbox input[name='skills[]']:checked").length !=0)
		{
			skills_err = false;
			$("#error_skills").removeClass('error_show').addClass('error');
		}

		else
		{	
			skills_err=true;
			$("#error_checkbox").removeClass('error').addClass('error_show');

		}
	});


	// Validation on submitting form
	$("#register").click(function(event)
	{

		if( name_err)
		{

			$('#error_name').removeClass('error').addClass('error_show');
		}

		if( gender_err)
		{

			$('#error_gender').removeClass('error').addClass('error_show');
		}

		if( email_err)
		{

			$('#error_email').removeClass('error').addClass('error_show');
		}

		if( phone_err)
		{

			$('#error_phone').removeClass('error').addClass('error_show');
		}

		if( skills_err)
		{

			$('#error_skills').removeClass('error').addClass('error_show');
		}

		if( addr_err)
		{

			$('#error_address').removeClass('error').addClass('error_show');
		}

		if( edu_err)
		{

			$('#error_edu').removeClass('error').addClass('error_show');
		}

		if( about_err)
		{

			$('#error_about').removeClass('error').addClass('error_show');
		}

		if( linkedin_err)
		{

			$('#error_linkedin').removeClass('error').addClass('error_show');
		}

		if( github_err)
		{

			$('#error_github').removeClass('error').addClass('error_show');
		}


	  //File Validation
	  if(!$('#upload').data('clicked')) 
	  {
	  	photo_err=true;
	  	$("#profile_pic").removeClass("valid").addClass("invalid");
	  	$("#upload").next().removeClass('error').addClass('error_show').text('Please select an image to upload and click on Upload button');

	  }
	  

	  if(name_err || gender_err || email_err|| phone_err || photo_err || about_err ||addr_err || edu_err || linkedin_err || github_err || error_check){
	  	event.preventDefault();
	  }


	});
});