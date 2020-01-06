
$(document).ready(function() {

      $(".form-control-file").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".filetext").addClass("selected").html(fileName);
    });
      
    $.ajax({
			url: "dropdown.php",
			method: "GET",
			dataType: 'HTML',
			success: function (data) {
            $('#edept').append(data);
			}
        });

 
});

 //submit function to update drawing with new values
 $('#editform').submit(function(event){
			event.preventDefault();
      var formData = new FormData(this);
      $.ajax({
					url: "drawUpdate.php",
					method: "POST",
					data: formData,
          cache: false,
          contentType: false,
          processData: false,
                
					success: function (data) {
						if (data == "Success")
						{ //reload current page to update table with new manager entry
                //alert(data);
						    alert("Drawing successfully changed!");
                window.location.href = "drawEDIT.php";
						}
						else 
						{
              alert(data);
              window.location.href = "drawEDIT.php";
						  	//alert("Error: Drawing not updated");
						}
					}
			});
  });

//Function to delete drawing row in database(NOT DRAWING FROM SERVER FILE)
  $("#delete").click(function(event){
    event.preventDefault();
     var id = $(this).parents("tr").attr("id");

        if(confirm('Are you sure to delete this drawing?'))
        {
            $.ajax({
               url: 'drawdelete.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+id).remove();
                    alert("Drawing removed successfully!");
                    window.location.href = "drawEDIT.php";
               }
            });
        }
    });
