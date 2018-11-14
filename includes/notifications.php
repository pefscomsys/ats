<?php
//warning, danger and success
if(isset($error))
{
    //Show error message here
    ?>
<div class="row wow shake">
    <div class="col-md-2"></div>

    <div class="col-md-8">
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            <strong>
                <i class="fa fa-exclamation-circle"></i>
                Error!
            </strong>
            <?php echo $error; ?>
        </div>
    </div>
</div>
    <?php
}
if(isset($success))
{
    //show success notification here
    ?>

<div class="row wow slideInDown">

    <div class="col-md-2"></div>

    <div class="col-md-8">
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            <strong>
                <i class="fa fa-check"></i>
                Success!
            </strong>
            <?php echo $success; ?>
        </div>
    </div>
</div>
    <?php
}

if(isset($warning))
{
    ?>

<div class="row wow pulse"  data-wow-iteration="10" data-wow-duration="1500ms">

    <div class="col-md-2"></div>

    <div class="col-md-8">
        <div class="alert alert-warning alert-dismissable" >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            
            <strong>
                <i class="fa fa-exclamation-triangle"></i>
                Warning!
            </strong>
            <?php echo $warning; ?>
        </div>
    </div>
</div>
    <?php
}

?>
