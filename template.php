<?php
//start by including the scripts required for this page
include_once 'classes/class.Company.php';
include_once 'classes/class.dbc.php';
include_once 'includes/functions.php'; //contains our filter function and other functions


//initialise the database variable to use in the application
$db = new dbc();
$dbc = $db->get_instance();


//then include static html
include_once 'includes/head.php';
 ?>
 <!-- enter custom css files needed for this page here  -->

 <?php
include_once 'includes/top_bar.php'; //for the page title and logo and account information
include_once 'includes/navigation.php'; //page navigations.

  ?>

  <br>
  <div class="wrapper">
      <div class="container-fluid">

          <?php
          //show errors here
          include_once 'includes/notifications.php';
           ?>

          <div class="row">
              <div class="col-md-12">
                  <div class="card-box">
                      <h2 class="page-header">
                          Page Heading
                      </h2>
                  </div>
              </div>
          </div>

      </div> <!-- end container -->
  </div>
  <!-- end wrapper -->

  <?php
include_once 'includes/footer.php';
include_once 'includes/scripts.php';
   ?>
 <!-- enter your custom scripts needed for the page here -->

 <?php
include_once 'includes/end.php';
  ?>
