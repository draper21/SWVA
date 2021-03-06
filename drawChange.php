<?php 
require_once("header.php");
require_once('config\config.php');
//session_start();
$target_dir = "swvaengpics";
if ($_SESSION["empID"] == "Failed" || is_null($_SESSION["empID"])) 
{
  header("Location: login.php");
}

//if not admin, alert and redirect
if ($_SESSION["admin"] == 0){
  echo "<script type='text/javascript'>alert('You are not logged in as an admin.'); window.location.href='search.php';</script>";
  //header("Location: search.php");
}

//get the id from querystring of user we need to edit
if (!empty($_GET))
	{
        $edituser =  $_GET['id'];
        $_SESSION["editID"] = $_GET['id'];
    }
    
@$database = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_errno()) {
  echo '<p>Error: Could not connect to database man.<br/> Please try again later.</p>';
  exit; 
} 
$query = "SELECT DEPARTMENT, EQUIPMENT, SIZE, NUMBER, EXTENSION, VENDOR, `VENDOR DWG NO`, `VENDOR JOB NO`, REVISION, DATE, WHO, DESCRIPTION, EQID, EQSUB, DRAW FROM sheet1 WHERE ID = ?";
$stmt = $database->prepare($query);
$stmt->bind_param('i',	$edituser);   
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($department, $equipment, $size, $number, $ext, $evendor, $evendwg, $evenjob, $revision, $date, $who, $description, $eqid, $eqsub, $draw);
$stmt->fetch();

?>

<header>

  <div class="container">
    <br>
    <h4 class="section-intro__subtitle">
      <center>Edit Drawing</center>
    </h4>

  </div>
</header>

<section class="section-margin" style="min-height: 50vh;">

  <div class="container">
    <div class="media contact-info">
      <span class="contact-info__icon"><i class="lnr lnr-user"></i></span>
      <div class="media-body">
        <h2><?php echo "Drawing to edit ID: " . $edituser; ?></h2>
      </div>
    </div>

    <div class="row">
      <form id="editform">
        <div class="form-group">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Department</th>
                <th scope="col">Equipment</th>
                <th scope="col">Size</th>
                <th scope="col">Number</th>
                <th scope="col">EXT</th>
                <th scope="col">Revision</th>
                <th scope="col">Date</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td><select name="edept" id="edept" style="width:100%;max-width:100%;" required='required'
                    class="bg-dark text-light">
                    <option selected><?php echo $department?></option>
                  </select></td>
                <td><input class="form-control" type="text" size="40" id="eequip" name="eequip"
                    value="<?php echo $equipment;?>"></td>
                <td><input class="form-control" type="text" size="2" id="esize" name="esize"
                    value="<?php echo $size;?>"></td>
                <td><input class="form-control" type="text" size="4" id="enumber" name="enumber"
                    value="<?php echo $number;?>"></td>
                <td><input class="form-control" type="text" size="3" id="eext" name="eext" value="<?php echo $ext;?>">
                </td>
                <td><input class="form-control" type="text" size="2" id="erevision" name="erevision"
                    value="<?php echo $revision;?>"></td>
                <td><input type="date" class="form-control" size="4" id="edate" name="edate"
                    value="<?php echo $date;?>"></td>
              </tr>
            </tbody>
          </table>
          <br>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Vendor</th>
                <th scope="col">Vendor DWG No</th>
                <th scope="col">Vendor Job No</th>
                <th scope="col">By</th>
                <th scope="col">Description</th>
                <th scope="col">EQID</th>
                <th scope="col">EQSUB</th>
                <th scope="col">Drawing</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td><input class="form-control" type="text" size="20" id="evendor" name="evendor"
                    value="<?php echo $evendor;?>"></td>
                <td><input class="form-control" type="text" size="4" id="evendwg" name="evendwg"
                    value="<?php echo $evendwg;?>"></td>
                <td><input class="form-control" type="text" size="4" id="evenjob" name="evenjob"
                    value="<?php echo $evenjob;?>"></td>
                <td><input class="form-control" type="text" size="4" id="ewho" name="ewho" value="<?php echo $who;?>">
                </td>
                <td><input class="form-control" type="text" size="50" id="edesc" name="edesc"
                    value="<?php echo $description;?>"></td>
                <td><input class="form-control" type="text" size="2" id="eeqid" name="eeqid"
                    value="<?php echo $eqid;?>"></td>
                <td><input class="form-control" type="text" size="10" id="eeqsub" name="eeqsub"
                    value="<?php echo $eqsub;?>"></td>
                <td>
                  <label class="btn btn-sm"><input class="form-control-file" type="file" id="edraw" name="edraw"
                      hidden><span class="filetext">Select</span></label>
                </td>
              </tr>
            </tbody>
          </table>
          <button id="submitedit" class="btn btn-warning btn-sm">Update</button>
          <button id="delete" class="float-right btn btn-danger btn-sm remove">Delete</button>
        </div>
      </form>
      <div style="padding-top: 75px;">
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-sm-4">
        <center>
          <h4> Current Drawing </h4>

<?php 
    	
    echo "<a target='_blank' href='" . (strripos($draw, ".") !== false ? $draw : $target_dir . "/" . $edituser . "." . $draw) . "'>";
    if ((strripos(($draw), "jpg") !== false) || (strripos(($draw), "jpeg") !== false) || (strripos(($draw), "png") !== false) || (strripos(($draw), "gif") !== false))  {
			echo '<img width="250" height="250" border="0" src="'.
			(strripos($draw, ".") !== false ? $draw : $target_dir . "/" . $edituser . "." . $draw) .'" class ="img-responsive"  title = "Click to enlarge in new tab" 
			alt = "Either No Image or PDF"/></a>' . "</td></tr>";
		}
		//if the drawing is a pdf, 
		if (strripos(($draw), "pdf") !== false) {
			echo (strripos($draw, ".") !== false ? "<iframe src=\"$draw\" width=\"250\" style=\"height:250\"></iframe>" : "<iframe src=\"$edituser.pdf\" width=\"250\" style=\"height:250\"></iframe>");
		}	
		//if the drawing is a tif, 
		if (strripos(($draw), "tif") !== false) {
			echo "Download TIF";
		}	

?>
        </center>
      </div>
    </div>

</section>

<?php require_once("footer.php");?>
<script src="js/drawChange.js"></script>

<?php
$stmt->free_result();
$database->close();
?>