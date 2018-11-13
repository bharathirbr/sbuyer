<?php
if ($_REQUEST['hid'] != '') {
    $thispageeditid = 12;
} else {
    $thispageaddid = 12;
}
include ('../../config/config.inc.php');
$dynamic = '1';
$editor = '1';

include ('../../require/header.php');
$_SESSION['sid'] = '';


if (isset($_REQUEST['submit'])) {
    @extract($_REQUEST);
    $_SESSION['hid'] = $_REQUEST['hid'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $msg = addhomeblocks($title1, $content1, $content2, $title2, $content3, $content4,  $title3, $content5, $content6, $ip, $_SESSION['hid']);
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Home Blocks
            <small><?php
                if ($_REQUEST['hid'] != '') {
                    echo 'Edit';
                } else {
                    echo 'Add New';
                }
                ?> Home Blocks</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo $sitename; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i> Settings</a></li>
            <li><a href="<?php echo $sitename; ?>settings/homeblocks.htm">Home Blocks </a></li>
            <li class="active"><?php
                if ($_REQUEST['hid'] != '') {
                    echo 'Edit';
                } else {
                    echo 'Add New';
                }
                ?>&nbsp;Home Blocks</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <form name="department" id="department" action="#" method="post" enctype="multipart/form-data">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php
                        if ($_REQUEST['hid'] != '') {
                            echo 'Edit';
                        } else {
                            echo 'Add New';
                        }
                        ?> Home Blocks</h3>
                    <span style="float:right; font-size:13px; color: #333333; text-align: right;"><span style="color:#FF0000;">*</span> Marked Fields are Mandatory</span>
                </div>
                <div class="box-body">
                    <?php echo $msg; ?>
                    <div class="panel panel-info">
                        <div class="panel-heading">Block 1</div>
                        <div class="panel-body">
                            <div class="row">
                               
                                <div class="col-md-6">
                                    <label>Title </label>
                                    <input class="form-control" placeholder="Enter the Title" title="Special Characters are not allowed" type="text" pattern="[0-9 A-Z a-z ./-*()]{0,60}" name="title1" id="title1"  value="<?php echo stripslashes(gethomeblocks('title1', $_REQUEST['hid'])); ?>" />
                                </div>
                            </div>
                            <div class="clearfix"><br /></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Content1</label>
                                    <textarea name="content1" id="content1" class="form-control" placeholder="Enter the Content here"><?php echo stripslashes(gethomeblocks('content1', $_REQUEST['hid'])); ?></textarea>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Content2</label>
                                    <textarea name="content2" id="content2" class="form-control" placeholder="Enter the Content here"><?php echo stripslashes(gethomeblocks('content2', $_REQUEST['hid'])); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading">Block 2</div>
                        <div class="panel-body">
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <label>Title </label>
                                    <input class="form-control" placeholder="Enter the Title" title="Special Characters are not allowed" type="text" pattern="[0-9 A-Z a-z ./-*()]{0,60}" name="title2" id="title2"  value="<?php echo stripslashes(gethomeblocks('title2', $_REQUEST['hid'])); ?>" />
                                </div>
                            </div>
                            <div class="clearfix"><br /></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Content1</label>
                                    <textarea name="content3" id="content3" class="form-control" placeholder="Enter the Content here"><?php echo stripslashes(gethomeblocks('content3', $_REQUEST['hid'])); ?></textarea>
                                </div>
                            </div><br>
                             <div class="row">
                                <div class="col-md-12">
                                    <label>Content2</label>
                                    <textarea name="content4" id="content4" class="form-control" placeholder="Enter the Content here"><?php echo stripslashes(gethomeblocks('content4', $_REQUEST['hid'])); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading">Block 3</div>
                        <div class="panel-body">
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <label>Title </label>
                                    <input class="form-control" placeholder="Enter the Title" title="Special Characters are not allowed" type="text" pattern="[0-9 A-Z a-z ./-*()]{0,60}" name="title3" id="title3"  value="<?php echo stripslashes(gethomeblocks('title3', $_REQUEST['hid'])); ?>" />
                                </div>
                            </div>
                            <div class="clearfix"><br /></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Content1</label>
                                    <textarea name="content5" id="content5" class="form-control" placeholder="Enter the Content here"><?php echo stripslashes(gethomeblocks('content5', $_REQUEST['hid'])); ?></textarea>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Content2</label>
                                    <textarea name="content6" id="content6" class="form-control" placeholder="Enter the Content here"><?php echo stripslashes(gethomeblocks('content6', $_REQUEST['hid'])); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo $sitename; ?>settings/homeblocks.htm">Back to Listings page</a>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" name="submit" id="submit" class="btn btn-success" style="float:right;"><?php
                                if ($_REQUEST['hid'] != '') {
                                    echo 'UPDATE';
                                } else {
                                    echo 'SAVE';
                                }
                                ?></button>
                        </div>
                    </div>
                </div>
            </div><!-- /.box -->
        </form>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include ('../../require/footer.php'); ?>