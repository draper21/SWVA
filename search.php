<?php require_once("header.php"); 
//session_start();

if ($_SESSION["empID"] == "Failed" || is_null($_SESSION["empID"])) 
{
  header("Location: login.php");
}

?>
 
 <div class="container-fluid">

   <section class="section-margin" style="min-height: 50vh;">
     <div class="row justify-content-center">
       <div class="col-sm-2" align="center">
         <br>
         <br>
         <div class="alert alert-info alert-dismissible">
           <button type="button" class="close" data-dismiss="alert">&times;</button>
           <strong>Start Here!</strong>
         </div>
       </div>

       <div class="col-sm-4" align="center">
         <br>
         <br>
         <div class="media contact-info">
           <span class="contact-info__icon"><i class="lnr lnr-magnifier"></i></span>
           <h2>Drawing Search</h2>
           <p class="pt-3 pl-4">Welcome<?php echo " " . $_SESSION["empID"] . "!"; ?></p>
         </div>
       </div>

       <!--END DIV CLASS ROW JUSTIFY CONTENT CENTER -->

       <!-- RESET SEARCH VIA DESTROY SESSION VARIABLES -->
       <div class="col-sm-2" align="center">
         <br>
         <br>
         <button type="button" class="btn btn-warning btn-md"
           onclick="window.location.href ='search.php';">Reset</button>

       </div>
       <!-- END RESET BUTTON -->

     </div>
     <div class="row justify-content-center">
       <!-- DROPDOWN 1 -->
       <div class="col-sm-2">
         <form>
           <h4>Department </h4>
           <select name="dropdown" id="dropdown" class="bg-dark text-white" style="width:100%">
             <option value="" disabled selected></option>
           </select>
         </form>
       </div>


       <!-- DROPDOWN 2 -->
       <div class="col-sm-2">
         <form name="dropdown2" method="post">
           <h4>Equipment</h4>
           <select name="dropdown2" id="dropdown2" style="width:100%" class="bg-dark text-white">
             <option value="" disabled selected></option>
           </select>
         </form>
       </div>

       <!-- DROPDOWN 2 SUB -->
       <div class="col-sm-1">
         <form name="dropdown2sub" method="post">
           <h4>Sub Equip</h4>
           <select name="dropdown2sub" id="dropdown2sub" style="width:100%" class="bg-dark text-white">
             <option value="" disabled selected></option>
           </select>
         </form>
       </div>
       

       <!-- DROPDOWN EQ ID -->
       <div class="col-sm-1">
         <form name="dropdown2eqid" method="post">
           <h4>Equip ID</h4>
           <select name="dropdown2eqid" id="dropdown2eqid" style="width:100%" class="bg-dark text-white">
             <option value="" disabled selected></option>
           </select>
         </form>
       </div>

       <!-- DROPDOWN 3 -->
       <div class="col-sm-2">
         <!--Prevent Enter key from resetting page-->
         <form onkeydown="return event.key != 'Enter';">
           <h4>Filter Description</h4>
           <input type="text" id="dropdown3" name="dropdown3" class="bg-dark text-white" style="width:100%;" />
         </form>
       </div>

     </div>
     <br>
     <div class="row justify-content-center">
       <div class="col-xl-12">
         <table class="table table-striped" id="results">
           <thead>
             <tr>
               <th scope="col">ID</th>
               <th scope="col">DEPARTMENT</th>
               <th scope="col">EQUIPMENT</th>
               <th scope="col">EQ.ID</th>
               <th scope="col">EQ.SUB</th>
               <th scope="col">SIZE</th>
               <th scope="col">NUM</th>
               <th scope="col">EXT</th>
               <th scope="col">VENDOR</th>
               <th scope="col">VEN.DWG</th>
               <th scope="col">VEN.JOB</th>
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
     </div>
 </div>

 </section>
    <?php require_once("footer.php");?>
    <script src="js/search.js"></script>
   
