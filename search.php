<?php require_once("header.php"); 
//session_start();

if ($_SESSION["empID"] == "Failed" || is_null($_SESSION["empID"])) 
{
  header("Location: login.php");
}

?>
 
 <div class="container-fluid">

<section class="section-margin" style="min-height: 50vh;">

  <div class="container-fluid">
    <div class="media contact-info">
      <span class="contact-info__icon"><i class="lnr lnr-enter"></i></span>
      <div class="media-body">
        <h2>Search Drawings</h2>
        <p>Welcome<?php echo " " . $_SESSION["empID"] . "!"; ?></p>
      </div>
      
    </div>
    <!-- RESET SEARCH VIA DESTROY SESSION VARIABLES -->
    <button type="button" class="btn btn-warning btn-md" onclick="window.location.href ='search.php';">Reset</button>
    <br>
    <br>
        <div class="alert alert-info alert-dismissible" style="width:10%">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Start Here!</strong>
        </div>
    <div class="row">
      <!-- DROPDOWN 1 -->
      <div class="col">
        <form>
          <h4>Department </h4>
          <select name="dropdown" id="dropdown" class="bg-dark text-white" style="width:100%">
            <option value="" disabled selected></option>
          </select>
        </form>
      </div>


      <!-- DROPDOWN 2 -->
      <div class="col">
        <form name="dropdown2" method="post">
          <h4>Equipment</h4>
          <select name="dropdown2" id="dropdown2" style="width:100%" class="bg-dark text-white">
            <option value="" disabled selected></option>
          </select>
        </form>
      </div>

      <!-- DROPDOWN 2 SUB -->
      <div class="col">
        <form name="dropdown2sub" method="post">
          <h4>Sub Equip</h4>
          <select name="dropdown2sub" id="dropdown2sub" style="width:100%" class="bg-dark text-white">
            <option value="" disabled selected></option>
          </select>
        </form>
      </div>

      <!-- DROPDOWN 3 -->
      <div class="col">
        <form>
          <h4>Filter</h4>
          <input type="text" id="dropdown3" name="dropdown3" class="bg-dark text-white" style="width:100%;" />
        </form>
      </div>

    </div>
    <br>
        <div class="row">
          <table class="table table-striped" id="results">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">DEPARTMENT</th>
                <th scope="col">EQUIPMENT</th>
                <th scope="col">EQ-ID</th>
                <th scope="col">EQ-SUB</th>
                <th scope="col">SIZE</th>
                <th scope="col">NUM</th>
                <th scope="col">EXT</th>
                <th scope="col">VENDOR</th>
                <th scope="col">VEN. DWG</th>
                <th scope="col">VEN. JOB</th>
                <th scope="col">REV</th>
                <th scope="col">DATE</th>
                <th scope="col">BY</th>
                <th scope="col">DESCRIPTION</th>
                <th scope="col">DRAWING</th>
              </tr>
            </thead>
            <tbody id="myTable">
            </tbody>
          </table>
        </div>

    </section>
    
    <?php require_once("footer.php");?>

    <script>

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
      $('#dropdown2sub').find('option').remove().end();
      //
     // $('#results').DataTable();
		}
  });
  });

  $("#dropdown2").change(function() {
    $.ajax({
		url: "dropdown2sub.php",
		method: "GET",
    data: {dropdown2 : $(this).val().toLowerCase()},
		dataType: 'HTML',
		success: function (data) {
      $('#dropdown2sub').find('option').remove().end().append(data);
      searchResults();
      //
     // $('#results').DataTable();
		}
  });
  });

  $("#dropdown2sub").change(function() {
    $.ajax({
		url: "dropdown4.php",
		method: "GET",
    data: {dropdown2sub : $(this).val().toLowerCase()},
		dataType: 'HTML',
		success: function (data) {
      searchResults3();
		}
  });
  });

  $("#dropdown3").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
//$('#results').DataTable();

});
  </script>

<?php require_once("footer.php"); ?>