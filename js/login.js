
	//when the page loads
	$(document).ready(function() {
		//alert("Test");
		//.submit() used instead of .click() so enter or clicking the button will work
		$('form').submit(function(event){
			event.preventDefault();
				$.ajax({	//send to validation.php for validation
					url: "validation.php",
					method: "POST",
					data: {
							'username' : $('#username').val(),
						   	'password' : $('#password').val()
						  },
					dataType: 'HTML',
					success: function (data) {
						if (data == "Employee") 
						{	
							//alert("employee");
							window.location.href = "search.php";
						}
						if (data == "Admin")
						{
							//alert("admin");
							window.location.href = "drawEDIT.php";
						}
						else 
						{
							//alert("invalid username/password");
							//show error div and clear username/password
							$('#username').val('');
							$('#password').val('');
							$('#errordiv').delay(500).fadeIn();
						}
					}	
				});	
		});	
	});	
