<?php
/**
 * Created by PhpStorm.
 * User: Tushar Khan
 * Date: 9/21/2017
 * Time: 8:34 PM
 */
?>

<?php
    include 'adminHader.php';
?>

    <div class="right_col" role="main">
        <div class="">

            <div class="page-title">
                <div class="title_left">
                    <h3>Customer Orders </h3>
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

            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                <?php if(isset($_GET['shifted']) &&  $_GET['shifted'] != null ): ?>
                    <?php $productObject->shiftToPendingById($_GET['shifted']);  ?>
                <?php elseif (isset($_GET['pending']) &&  $_GET['pending'] != null ): ?>
                    <?php $productObject->pendingToShiftById($_GET['pending']);  ?>
                <?php endif; ?>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Order Tables </h2>
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
                            <?php  $orderProduct = $productObject->allOrderProduct(); if ($orderProduct): $i = 0; ?>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Product Name</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Total Price</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php while ($allPro = $orderProduct->fetch_assoc() ): $i++; ?>
                                        <tr>
                                            <th scope="row" class="text-center"><?php echo $i; ?></th>
                                            <?php $user = $userObject->userInfoById($allPro['customerid']); if ($user): ?>
                                                <?php while ($info = $user->fetch_assoc()):  ?>
                                                    <td class="text-center">
                                                        <a class="btn btn-app" target="_blank" href="user.php?customer=<?php echo $info['userid']; ?>">
                                                            <i class="fa fa-users"></i> <?php echo strtoupper($info['name']); ?>
                                                        </a> </td>
                                                    <td class="text-center"><?php echo $info['email']; ?></td>
                                                <?php endwhile; ?>
                                            <?php endif;  ?>
                                            <td class="text-center"><?php echo $allPro['productname'] ?></td>
                                            <td class="text-center"><?php echo $allPro['quantity'] ?></td>
                                            <td class="text-center">$<?php echo ($allPro['quantity']*$allPro['price']) ?></td>
                                            <?php $image = $productObject->getProductById($allPro['productid']); if ($image): ?>
                                                <?php while ($proImage = $image->fetch_assoc()):  ?>
                                                    <td class="text-center"><img src="<?php echo $proImage['image'] ?>" alt="" style="height: 50%;" class="img-responsive"></td>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                            <td class="text-center"><?php echo $formateObject->formatDate($allPro['date']); ?></td>
                                            <td class="text-center">
                                                <?php if ($allPro['status'] == 1): ?>
                                                    <a href="?shifted=<?php echo $allPro['id']; ?>" class="btn btn-round btn-warning"> <i class="fa fa-check"></i> Shifted</a>
                                                <?php else: ?>
                                                    <a href="?pending=<?php echo $allPro['id']; ?>" class="btn btn-round btn-danger"> <i class="fa fa-delicious"></i> Pending</a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    include 'adminFooter.php';
?>