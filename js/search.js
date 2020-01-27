$(document).ready(function() {
 
    //function if first 2 dropdowns are selected
       function searchResults(){ 
          $.ajax({
                url: "searchresults.php",
                method: "GET",
                dataType: 'HTML',
                success: function (data) {
            $('#myTable').empty().append(data);
          }
          });
         
       }
    
    //function if all dropdowns are selected
       function searchResults3(){ 
          $.ajax({
                url: "searchresults3.php",
                method: "GET",
                dataType: 'HTML',
                success: function (data) {
            $('#myTable').empty().append(data);
            //
            //$('#results').DataTable();
                }
          });
       }
            
      $.ajax({
            url: "dropdown.php",
            method: "GET",
            dataType: 'HTML',
            success: function (data) {
          $('#dropdown').append(data);
          //
         // $('#results').DataTable();
            }
      });
    
      $("#dropdown").change(function()
      {
        $.ajax({
            url: "dropdown2.php",
            method: "GET",
        data: {dropdown1 : $(this).val().toLowerCase()},
            dataType: 'HTML',
            success: function (data) {
          $('#dropdown2').find('option').remove().end().append(data);
          $('#dropdown3').find('option').remove().end();
         // $('#dropdown2sub').find('option').remove().end();
          $('#dropdown2eqid').find('option').remove().end();
          //
         // $('#results').DataTable();
            }
      });
      });
    
    //  $("#dropdown2").change(function() {
    //    $.ajax({
    //        url: "dropdown2sub.php",
    //        method: "GET",
    //    data: {dropdown2 : $(this).val().toLowerCase()},
    //        dataType: 'HTML',
    //        success: function (data) {
    //      $('#dropdown2sub').find('option').remove().end().append(data);
    //      searchResults();
    //      //
    //     // $('#results').DataTable();
    //        }
    //  });
    //  });

  //   $("#dropdown2").change(function() {
  //     $.ajax({
  //         url: "dropdown2eqid.php",
  //         method: "GET",
  //     data: {dropdown2 : $(this).val().toLowerCase()},
  //         dataType: 'HTML',
  //         success: function (data) {
  //       $('#dropdown2eqid').find('option').remove().end().append(data);
  //       searchResults();
  //       //
  //      // $('#results').DataTable();
  //         }
  //   });
  //   });
    
    
  //    $("#dropdown2sub").change(function() {
  //      $.ajax({
  //          url: "dropdown4.php",
  //          method: "GET",
  //      data: {dropdown2sub : $(this).val().toLowerCase()},
  //          dataType: 'HTML',
  //          success: function (data) {
  //        searchResults3();
  //          }
  //    });
  //    });

  //    $("#dropdown2eqid").change(function() {
  //      $.ajax({
  //          url: "dropdown4.php",
  //          method: "GET",
  //      data: {dropdown2eqid : $(this).val().toLowerCase()},
  //          dataType: 'HTML',
  //          success: function (data) {
  //        searchResults3();
  //          }
  //    });
  //    });





    
      $("#dropdown3").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    //$('#results').DataTable();
    
    });