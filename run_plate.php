<?php
//start by including the scripts required for this page
include_once 'classes/class.Company.php';
include_once 'classes/class.dbc.php';
include_once 'includes/functions.php'; //contains our filter function and other functions

include_once 'classes/class.ImageUploader.php';
include_once 'classes/class.ErrorLogger.php';
include_once 'classes/class.CheckPlate.php';
include_once 'classes/class.Base64Image.php';

//initialise the database variable to use in the application
$db = new dbc();
$dbc = $db->get_instance();

//run the plate here
if(isset($_POST['post']))
{
    //validate the image

    $tmp = $_FILES['image']['tmp_name'];
    $fileName = $_FILES['image']['name'];

    $spl = new SplFileInfo($fileName);
    $extention = strtolower($spl->getExtension());

    //handle test post
    $uploadObject = new ImageUploader($tmp, $extention);
    $uploadObject->normal = FALSE;
    $imageName  = $uploadObject->uploadFile();
    $imageURL = $uploadObject->getUploadUrl();

    //prepare do the plate recognition
    $plate = new CheckPlate($imageURL);

}

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
                          Run A Plate
                      </h2>

                      <?php
                      if(isset($_POST['post']))
                      {
                          ?>
                          <div class="row">
                              <div class="col-md-6">
                                  <a href="<?php echo $imageURL; ?>" data-lightbox="<?php echo $imageURL; ?>">
                                      <div class="img-thumbnail">
                                          <img src="<?php echo $imageURL; ?>" alt="Image" class="image">
                                      </div>
                                  </a>
                              </div>

                              <div class="col-md-6">
                                  <br><br>
                                  <?php
                                  if($plate->isPlate)
                                  {
                                      ?>
                                      <div class="plate">
                                           <?php
                                           echo $plate->plateNumber;
                                            ?>
                                      </div>
                                      <?php
                                  }
                                  else {
                                      ?>
                                      <div class="no-plate">
                                          We could not find a number plate in the uploaded image
                                      </div>
                                      <?php
                                  }
                                   ?>


                              </div>
                          </div>
                          <?php
                      }
                       ?>


                      <br><br>
                      <hr>
                      <form class="form-horizontal" action="" method="post"
                        enctype="multipart/form-data">
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="image" class="control-lable col-md-4 text-bold">
                                          Image
                                          <span class="required">*</span>
                                      </label>

                                      <div class="col-md-8">
                                          <input type="file" name="image" value=""
                                          class="form-control">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="image" class="control-lable col-md-4 text-bold">

                                      </label>

                                      <div class="col-md-8">
                                          <input type="submit" name="post" value="Upload Image"
                                          class="btn btn-primary">
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </form>
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
