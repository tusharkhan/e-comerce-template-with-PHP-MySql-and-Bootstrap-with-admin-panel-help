<?php
/**
 * Created by PhpStorm.
 * User: Tushar Khan
 * Date: 9/11/2017
 * Time: 4:08 AM
 */
?>

<?php
    include 'adminHader.php';
    include '../classes/Product.php';
    include '../classes/Category.php';
    include '../classes/Brand.php';
?>
<?php
    $categoryObject = new Category();
    $brandObject    = new Brand();
    $productObject  = new Product();
?>
<?php
    if (!isset($_GET['proid']) || $_GET['proid'] == null)
    {
        echo "<script>window.location = 'addProduct.php'</script>";
    }
    else
    {
        $productId = $_GET['proid'];
    }
?>
    <!-- /top navigation -->

    <!-- page content -->
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
            <?php if (isset($_POST['editProduct']) && $_SERVER['REQUEST_METHOD'] == 'POST'): ?>
                <?php $productObject->updateProductById($productId, $_POST, $_FILES) ?>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> Product <small> Add Product </small></h2>
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
                            <?php $allProduct = $productObject->allProductById($productId); if (isset($allProduct)) : while ($pro = $allProduct->fetch_assoc()): ?>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" required="required" name="product" value="<?php echo $pro['proname'] ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <!--Category-->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Category</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="select2_single form-control" tabindex="-1" name="category" title="Category">
                                            <option></option>
                                            <?php
                                            $category = $categoryObject->allCategory();
                                            if (isset($category)):
                                                while ($cat = $category->fetch_assoc()):
                                                    ?>
                                                    <option <?php if ($pro['catid'] == $cat['id']){ echo 'selected = "selected"';} ?> value="<?php echo $cat['id'];?>" ><?php echo $cat['catname'];?></option>
                                                <?php endwhile; endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <!--Brand-->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Brand</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="select2_single form-control" tabindex="-1" name="brand" title="Brand">
                                            <option></option>
                                            <?php
                                            $brand = $brandObject->allBrand();
                                            if (isset($brand)):
                                                while ($bra = $brand->fetch_assoc()):
                                                    ?>
                                                    <option <?php if ($pro['brandid'] == $bra['id']){ echo 'selected = "selected"';} ?> value="<?php echo $bra['id'];?>"><?php echo $bra['brand'];?></option>
                                                <?php endwhile; endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Description</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea class="form-control" rows="5" name="prodis" id="comment" title="Brand Description"><?php echo $pro['body'] ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Price <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" required="required" value="<?php echo $pro['price'] ?>" name="price" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Picture</label>
                                    <div class="btn-group col-md-6 col-sm-6 col-xs-12">
                                        <img src="<?php echo $pro['image'] ?>" alt="" class="img-responsive" />
                                        <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                                        <input type="file" data-role="magic-overlay" name="image" data-target="#pictureBtn" data-edit="insertImage" />
                                    </div>
                                </div>

                                <!--Type-->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Type <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" required="required" value="<?php echo $pro['type'] ?>" name="type" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-app" name="editProduct"><i class="fa fa-save"></i> Update </button>
                                        <button class="btn btn-app" type="reset"><i class="fa fa-repeat"></i> Reset</button>
                                    </div>
                                </div>

                            </form>
                            <?php endwhile; endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    include 'adminFooter.php';
?>