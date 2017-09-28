<?php
/**
 * Created by PhpStorm.
 * User: Tushar Khan
 * Date: 9/24/2017
 * Time: 5:24 PM
 */
?>

<?php
    include 'adminHader.php';
?>
<?php
    if (!isset($_GET['customer']) && $_GET['customer'] == null )
    {
        echo "<script> window.location = 'orderDetails.php'; </script>";
    }
    else
    {
        $userId = $_GET['customer'];
    }
?>
    <div class="right_col" role="main">
        <div class="">

            <div class="page-title">
                <div class="title_left">
                    <h3>Customer Details </h3>
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

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>User</h2>
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
                        <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php $user = $userObject->userInfoById($userId); if ($user) :  ?>
                                        <table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc text-center" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 190px;">Name</th>
                                                    <th class="sorting text-center" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 298px;">Image</th>
                                                    <th class="sorting text-center" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 148px;">Country zip-code</th>
                                                    <th class="sorting text-center" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 51px;">Phone</th>
                                                    <th class="sorting text-center" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 118px;">Country</th>
                                                    <th class="sorting text-center" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 119px;">City</th>
                                                    <th class="sorting text-center" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 119px;">E-mail</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($userInfo = $user->fetch_assoc()): ?>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1 text-center"><?php echo $userInfo['name']; ?></td>
                                                        <td class="text-center"><img style="height:100px; margin: 0 auto;" src="../<?php echo $userInfo['image']; ?>" alt="<?php echo $userInfo['name']; ?>" class="img-responsive img-circle " /></td>
                                                        <td class="text-center"><?php echo $userInfo['zip']; ?></td>
                                                        <td class="text-center"><?php echo $userInfo['phone']; ?></td>
                                                        <td class="text-center"><?php echo $userInfo['country']; ?></td>
                                                        <td class="text-center"><?php echo $userInfo['city']; ?></td>
                                                        <td class="text-center"><?php echo $userInfo['email']; ?></td>
                                                    </tr>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    <?php endif;  ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include 'adminFooter.php';
?>