<?php
/**
 * Created by PhpStorm.
 * User: Tushar Khan
 * Date: 9/10/2017
 * Time: 3:21 AM
 */
?>

<?php
    include 'adminHader.php';
    include '../classes/Brand.php';
?>
<?php
    $brandObj = new Brand();
?>
<?php
    if (!isset($_GET['id']) || $_GET['id'] == null)
    {
        echo "<script>window.location = 'addBrand.php'</script>";
    }
    else
    {
        $brandId = $_GET['id'];
    }
?>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Form Elements</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                          <button class="btn btn-default" type="button">Go!</button>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <?php
            if (isset($_POST['updateBrand']) && $_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    $brandObj->updateBrand($brandId, $_POST['brand']);
                }
            ?>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> Brand <small> Update Brand </small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="POST">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category Name <span class="required">*</span>
                                    </label>
                                    <?php
                                    $res = $brandObj->brandById($brandId);
                                    if (isset($res)):
                                        while ($cat = $res->fetch_assoc()):
                                            ?>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="first-name" required="required" value="<?php echo $cat['brand'];?>" name="brand" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        <?php endwhile; endif; ?>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-app" name="updateBrand"><i class="fa fa-save"></i> Save</button>
                                        <button class="btn btn-app" type="reset"><i class="fa fa-repeat"></i> Reset</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include 'adminFooter.php';
?>