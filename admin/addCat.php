<?php
/**
 * Created by PhpStorm.
 * User: Tushar Khan
 * Date: 9/9/2017
 * Time: 11:44 PM
 */
?>
<?php
    include 'adminHader.php';
    include '../classes/Category.php';
?>
<?php
    $categoryObject = new Category();
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
                if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['addCategory']))
                {
                    $categoryObject->addCategory($_POST['category']);
                }

                if (isset($_GET['delCat']))
                {
                    $dalId = $_GET['delCat'];
                    $categoryObject->deleteCategoryById($dalId);
                }
            ?>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> Category <small> Add Category </small></h2>
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
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" required="required" name="category" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-app" name="addCategory"><i class="fa fa-save"></i> Save</button>
                                        <button class="btn btn-app" type="reset"><i class="fa fa-repeat"></i> Reset</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Category List</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li>
                                    <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                                <li>
                                    <a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <p class="text-muted font-13 m-b-30">
                                Category Table
                            </p>
                            <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc text-center" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 194px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Serial Number</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 298px;" aria-label="Position: activate to sort column ascending">Category Name</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 151px;" aria-label="Office: activate to sort column ascending">Edit</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 53px;" aria-label="Age: activate to sort column ascending">Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $allCategory = $categoryObject->allCategory();
                                                if (isset($allCategory)) :
                                                    $i = 0;
                                                    while ($res = $allCategory->fetch_assoc()): $i++;
                                            ?>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1 text-center"><?php echo $i;?></td>
                                                    <td class="text-center"><?php echo $res['catname']; ?></td>
                                                    <td class="text-center">
                                                        <a class="btn btn-round btn-success" href="categoryEdit.php?id=<?php echo $res['id']; ?>">
                                                            <i class="fa fa-pencil"></i> Edit
                                                        </a>
                                                    </td>
                                                    <td class="text-center">
<!--                                                        <button type="button" class="btn btn-round btn-danger"><i class="fa fa-times"></i> Delete </button>-->
                                                        <a class="btn btn-round btn-danger" onclick="return confirm('Are You Sure You Want to Delete ?');" href="?delCat=<?php echo $res['id']; ?>">
                                                            <i class="fa fa-times"></i> Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php endwhile; ?>
                                                <?php else: ?>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1 text-center">Empty</td>
                                                        <td class="text-center">Empty</td>
                                                        <td class="text-center">
                                                            No Category to Edit
                                                        </td>
                                                        <td class="text-center">
                                                            No Category to Delete
                                                        </td>
                                                    </tr>
                                            <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include 'adminFooter.php'
?>