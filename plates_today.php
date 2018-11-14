<?php
//start by including the scripts required for this page
include_once 'classes/class.Company.php';
include_once 'classes/class.dbc.php';
include_once 'includes/functions.php'; //contains our filter function and other functions


//initialise the database variable to use in the application
$db = new dbc();
$dbc = $db->get_instance();

$day = date("d");
$month = date("m");
$year = date("Y");

$query  = "SELECT * FROM `recognised_plates`
            WHERE `day` = '$day' AND `month` = '$month' AND `year` = '$year' ";
$result = mysqli_query($dbc, $query)
    or die("Could not get the plates");

//then include static html
include_once 'includes/head.php';
 ?>
 <!-- enter custom css files needed for this page here  -->
<link rel="stylesheet" href="assets/css/lib/dataTables.bootstrap.min.css">

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
                          Plates Captured Today
                      </h2>

                      <br>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="table-responsive">
                                  <table id="table" class="table table-bordered table-hover">
                                      <tr>
                                          <th>S/N</th>
                                          <th>Image</th>
                                          <th>Date Captured</th>
                                          <th>Time Captured</th>
                                          <th>Plate Number</th>
                                          <th>Action</th>
                                      </tr>

                                      <?php
                                      $count = 1;

                                      if(mysqli_num_rows($result) == 0)
                                      {
                                          ?>
                                         <tr>
                                             <th class="text-center" colspan="7">
                                                 <strong class="text-primary">
                                                     No Plates
                                                 </strong>
                                             </th>
                                         </tr>
                                          <?php
                                      }
                                      else {
                                          while($row = mysqli_fetch_array($result))
                                          {
                                              ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td>
                                                <img src="<?php echo $row['path']; ?>" alt=""
                                                width="100px" height="100px">
                                            </td>
                                            <td>
                                                <?php echo date_from_timestamp($row['time_added']); ?>
                                            </td>

                                            <td>
                                                <?php echo time_from_timestamp($row['time_added']); ?>
                                            </td>

                                            <td>
                                                <?php echo $row['plate']; ?>
                                            </td>

                                            <td>
                                                <i class="fa fa-check text-success fa-2x"></i>
                                            </td>
                                        </tr>
                                              <?php
                                          }
                                      }
                                       ?>
                                  </table>
                              </div>
                          </div>
                      </div>
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
<script src="assets/js/lib/jquery.dataTables.min.js"></script>
<script src="assets/js/lib/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    // $('#table').DataTable()

  })
</script>
 <?php
include_once 'includes/end.php';
  ?>
