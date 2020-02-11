<?php 
require_once('config\config.php');
require_once("header.php"); 
//session_start();

if ($_SESSION["empID"] == "Failed" || is_null($_SESSION["empID"])) 
{
  header("Location: login.php");
}

?>
<style>
    thead input {
        width: 100%;
        padding: 0px;
        box-sizing: border-box;
  
    }
    tfoot input {
        width: 100%;
        padding: 0px;
        box-sizing: border-box;
  
    }
#loading-image {
    display: none;
    text-align:center;
}

</style>

<div class="container-fluid">

    <!--<h4 class="section-intro__subtitle" style="padding-top: 40px;"><center>SWVA Engineering Database</center></h4>-->
    </header>

    <section class="section-margin" style="min-height: 50vh;">

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="lnr lnr-magnifier"></i></span>
                    <div class="media-body">
                        <h2>Custom Search</h2>
                    </div>
                </div>
            </div>

            <div class="row" style="padding-top: 20px;">
                <div class="col-lg-5">
                
                    <div class="form-group">
                        <div class="col">

                            <!--
                            <form>
                                <h4>Department </h4>
                                <select name="dropdown" id="dropdown" class="bg-dark text-white" style="width:50%">
                                    <option value="" disabled selected></option>
                                    <option value="alldept">---All Departments---</option>
                                </select>
                            </form>
-->
                        </div>
                    </div>
                    <!-- <form name='wildcard' method="post" class="form-contact">
                             <div style ="display: inline;">
                                <input class="form-control" name='wildcard' rows="3" id='wildcard' placeholder="Ex: Caster" type="text" required="required" size="15">
                                    <button class="btn btn-outline-secondary" id='submit' type='submit' name='submit'>
                                        <i class="fa fa-search"></i>
                                    </button>
                         </form> -->
                    <br>

                    <!-- RESET SEARCH VIA DESTROY SESSION VARIABLES -->
                   
                    <button type="submit" class="btn btn-primary ml-3"
                        onclick="window.location.href ='manualsearch.php';" style="">Reset</button>
                    
                    <br><br>


                </div>
            </div>

            <div class="row">
                <table class="table table-striped" id="results" style="display:none; table-layout:fixed;">
                    <thead>
                        <tr>
                            <th scope="col" id="id">ID</th>
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
                    <tfoot>
                    <tr>
                            <th scope="col" id="id">ID</th>
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
                    </tfoot>
                </table>

            </div>
            <div id="loading-image">
                <img src="img/loading.gif" class="img-fluid" alt="">
            </div>
        </div>
</div>
</div>

</section>

    <?php require_once("footer.php");?>
   
 
    
    
    <script src="DataTables/datatables.min.js"></script>
    <script src="js/manualsearch.js"></script>
   
