<?php 
require_once("header.php"); 
//session_start();

if ($_SESSION["empID"] == "Failed" || is_null($_SESSION["empID"])) 
{
  header("Location: login.php");
}

//if not admin, alert and redirect
if ($_SESSION["admin"] == 0){
  echo "<script type='text/javascript'>alert('You are not logged in as an admin.'); window.location.href='search.php';</script>";
  //header("Location: search.php");
}
?>

<div class="container">
  <h4 class="section-intro__subtitle"></h4>
</div>

<section class="section-margin">

  <div class="container">
    <div class="media contact-info">
      <span class="contact-info__icon"><i class="lnr lnr-file-add"></i></span>
      <div class="media-body">
        <h2>Add to database</h2>
        <div class="row align-items-center">
          <div class="col-lg-12">
            <!-- START OF FORM -->
            <form action="addDraw.php" class="form-contact" method="post" enctype="multipart/form-data" name="form1">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Department</label>
                    <!--<textarea class="form-control" name = "department" rows="3" placeholder="ex: 1 FINISH"></textarea>-->
                    <select name="dropdown" id="dropdownID" style="width:100%;max-width:100%;" required='required'
                      class="bg-dark text-light">
                      <option option value="" disabled selected></option>
                    </select>
                    <br>
                    <br>
                    <label for="date">Date</label>
                    <input type="date" class="form-control" name="date" id="datepicker"
                      value="<?php echo date('Y-m-d'); ?>" required='required'>
                    <br>
                    <label for="exampleFormControlTextarea1" style="padding-top: 15px;">Size</label>
                    <textarea class="form-control" name="size" rows="3" placeholder="ex: D or 3A"></textarea>
                    <br>
                    <label for="exampleFormControlTextarea1">Equipment ID</label>
                    <textarea class="form-control" name="equipid" rows="3" placeholder="if applicable"></textarea>
                    <br>
                    <label for="exampleFormControlTextarea1">Equipment Sub</label>
                    <textarea class="form-control" name="equipsub" rows="3" placeholder="if applicable"></textarea>
                    <br>
                    <label for="exampleFormControlTextarea1">Number</label>
                    <textarea class="form-control" name="number" rows="3" placeholder="ex: 6801"></textarea>
                    <br>
                    <label for="exampleFormControlTextarea1">Extension</label>
                    <textarea class="form-control" name="extension" rows="3" placeholder="ex: 1 or A"></textarea>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="description">Equipment</label>
                    <!--<textarea class="form-control different-control" name="equipment"
                        placeholder="Enter Equipment" required='required'></textarea>-->
                    <select name="equipment" id="equipmentdrop" style="width:100%;max-width:100%;" required='required'
                      class="bg-dark text-light">
                      <option value="" disabled selected></option>
                    </select>
                  </div>
                  <div class="form-group">

                    <label for="description">Description</label>
                    <textarea class="form-control different-control w-20" name="description"
                      placeholder="Enter Description" required='required'></textarea>
                    <br>
                    <label for="exampleFormControlTextarea1">Vendor</label>
                    <textarea class="form-control" name="vendor" rows="3" placeholder="if applicable"></textarea>
                    <br>
                    <label for="exampleFormControlTextarea1">Vendor Drawing Number</label>
                    <textarea class="form-control" name="vendwg" rows="3" placeholder="if applicable"></textarea>
                    <br>
                    <label for="exampleFormControlTextarea1">Vendor Job Number</label>
                    <textarea class="form-control" name="venjob" rows="3" placeholder="if applicable"></textarea>
                    <br>
                    <label for="exampleFormControlTextarea1">Revision</label>
                    <textarea class="form-control" name="revision" rows="3" placeholder="if applicable"></textarea>
                    <br>
                    <label for="exampleFormControlTextarea1">By</label>
                    <textarea class="form-control" name="by" rows="3" placeholder="ex: DJD"></textarea>
                  </div>
                </div>
              </div>
              <p>Upload Drawing: .pdf, .jpeg, .png, etc.</p>
              <!-- FILE UPLOAD -->
              <!--<label class ="btn active btn">Browse<input type="file" name="drawing" hidden></label>-->
              <label class="btn active btn"><input class="form-control-file" type="file" name="drawing" hidden><span
                  class="filetext">Select File</span></label>
              <!-- END FILE UPLOAD -->

              <div class="form-group text-center text-md-right">

                <input type="submit" value="submit" name="submit" class="btn active btn--leftBorder"
                  value="add to database">
              </div>
            </form>
            <!-- END OF FORM -->
          </div>
        </div>
        <br><br>
</section>

  <?php require_once("footer.php");?>
  <script src="js/addtoDB.js"></script>
