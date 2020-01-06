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
              $('#dropdownID').append(data);
                      }
          });
  
          $('#dropdownID').change(function() {
            $.ajax({
                        url: "dropdown2.php",
                        method: "GET",
              data: {dropdown1 : $(this).val().toLowerCase()},
                        dataType: 'HTML',
                      success: function (data) {
              $('#equipmentdrop').find('option').remove().end().append(data);
                      }
          });
          });
  
          //$("#datepicker").datepicker("setDate", new Date());
  
        //  $.ajax({
              //		url: "dropdown2.php",
              //		method: "GET",
              //		dataType: 'HTML',
              //		success: function (data) {
        //      $('#equipmentdrop').append(data);
              //		}
        //  });
  
  });