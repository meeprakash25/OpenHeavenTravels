<?php require_once('../../../private/initialize.php');
require_login();
?>

<?php
if (!isset($_GET['id'])) {
   redirect_to(url_for('/admin/tours/index.php'));
}
$id = $_GET['id'];

$tour = find_tour_by_id($id);
?>

<?php $page_title = 'Tour Details'; ?>

<?php include(SHARED_PATH . '/admin_header.php') ?>

    <header id="main-header" class="py-4 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3><?php echo h($tour['tour_name']) ?></h3>
                </div>
                <div class="col-md-4">
                   <?php
                   echo display_info(info());
                   ?>
                </div>
            </div>
        </div>
    </header>

    <!-- ACTIONS -->
    <section id="action" class="mb-4 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mr-auto pt-2">
                    <a href="<?php echo url_for('/admin/index.php'); ?>" class="btn btn-light btn-block">
                        <i class="fa fa-arrow-left"></i> Back To Dashboard
                    </a>
                </div>
                <div class="col-md-3 pt-2 mr-auto">
                    <a href="<?php echo url_for('/admin/tours/index.php'); ?>" class="btn btn-success btn-block">
                        <i class="fa fa-arrow-left"></i> Go Back
                    </a>
                </div>
                <div class="col-md-3 pt-2">
                    <a href="<?php echo url_for('/admin/tours/edit.php?id=' . h(u($id))); ?>" class="btn btn-info btn-block">
                        <i class="fa fa-check"></i> Edit Tour
                    </a>
                </div>
                <div class="col-md-3 pt-2">
                    <a href="<?php echo url_for('/admin/tours/delete.php?id=' . h(u($id))); ?>" class="btn btn-danger btn-block">
                        <i class="fa fa-remove"></i> Delete Tour
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- TOUR -->
    <section id="tour">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header bg-dark text-light">
                            <h4>Tour Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="facts">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card card-table">
                                                    <div class="card-header  bg-dark text-light">Facts of Tour</div>
                                                    <div class="card-body">
                                                        <table class="table table-sToured table-hover">
                                                            <tr>
                                                                <td>Destination</td>
                                                                <td>
                                                                   <?php echo h($tour['destination']); ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Activities</td>
                                                                <td>
                                                                   <?php echo h($tour['activities']); ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tour Duration</td>
                                                                <td>
                                                                   <?php echo h($tour['tour_duration']); ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tour Grade</td>
                                                                <td>
                                                                   <?php echo h($tour['tour_grade']); ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Seasons</td>
                                                                <td>
                                                                   <?php echo h($tour['seasons']); ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Group Size</td>
                                                                <td>
                                                                   <?php echo h($tour['group_size']); ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Altitude</td>
                                                                <td>
                                                                   <?php echo h($tour['altitude']); ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Accommodation</td>
                                                                <td>
                                                                   <?php echo h($tour['accommodation']); ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Transport</td>
                                                                <td>
                                                                   <?php echo h($tour['transport']); ?>
                                                                </td>
                                                            </tr>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="card bt-0">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-overview-tab border-left" data-toggle="tab"
                                                   href="#nav-overview" role="tab" aria-controls="nav-overview"
                                                   aria-selected="true">Overview</a>
                                                <a class="nav-item nav-link" id="nav-itinenarary-tab" data-toggle="tab" href="#nav-itinenarary"
                                                   role="tab" aria-controls="nav-itinenarary"
                                                   aria-selected="false">itinenarary</a>
                                                <a class="nav-item nav-link" id="nav-cost-info-tab" data-toggle="tab" href="#nav-cost-info" role="tab"
                                                   aria-controls="nav-cost-info"
                                                   aria-selected="false">Cost Info</a>
                                                <a class="nav-item nav-link" id="nav-gallery-tab" data-toggle="tab" href="#nav-gallery" role="tab"
                                                   aria-controls="nav-gallery"
                                                   aria-selected="false">Gallery</a>
                                            </div>
                                        </nav>
                                        <div class="tab-content m-2" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-overview" role="tabpanel"
                                                 aria-labelledby="nav-overview-tab">
                                                <div class="card border-top-0">
                                                   <?php echo h($tour['overview']); ?>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav-itinenarary" role="tabpanel" aria-labelledby="nav-itinenarary-tab">
                                                <div class="card border-top-0">
                                                   <?php echo h(($tour['itinenarary'])); ?>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav-cost-info" role="tabpanel" aria-labelledby="nav-cost-info-tab">
                                                <div class="card border-top-0">
                                                   <?php echo h(($tour['cost_info'])); ?>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade py-10" id="nav-gallery" role="tabpanel" aria-labelledby="nav-gallery-tab">
                                                <section id="gallery" class="gallery-section bg-dark">
                                                    <div class="container-fluid p-0">
                                                       <?php echo h(($tour['gallery'])); ?>
                                                    </div>
                                                </section>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3 mx-5 float-right">
                                        Published:&nbsp;<b><?php if ($tour['visible']) {
                                             echo 'Yes';
                                          } else {
                                             echo 'No';
                                          } ?></b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

<?php include(SHARED_PATH . '/admin_footer.php') ?>