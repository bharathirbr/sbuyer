<?php
if (isset($_REQUEST['bid'])) {
    $thispageeditid = 11;
} else {
    $thispageaddid = 11;
}
$menu = "2,1,1";
include ('../../config/config.inc.php');
$dynamic = '1';
include ('../../require/header.php');

if (isset($_REQUEST['submit'])) {
    @extract($_REQUEST);
    $getid = $_REQUEST['banid'];
    $ip = $_SERVER['REMOTE_ADDR'];


    $msg = addbanner($title, $content, $order, $status, $ip, $getid);
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Banner
            <small><?php
if ($_REQUEST['banid'] != '') {
    echo 'Edit';
} else {
    echo 'Add New';
}
?> Banner</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo $sitename; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-asterisk"></i> Master(s)</a></li>            
            <li><a href="<?php echo $sitename; ?>master/banner.htm"><i class="fa fa-circle-o"></i> Banner</a></li>
            <li class="active"><?php
                if ($_REQUEST['banid'] != '') {
                    echo 'Edit';
                } else {
                    echo 'Add New';
                }
?> Banner</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <form name="department" id="department" action="#" method="post" enctype="multipart/form-data">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php
                if ($_REQUEST['banid'] != '') {
                    echo 'Edit';
                } else {
                    echo 'Add New';
                }
?> banner</h3>
                    <span style="float:right; font-size:13px; color: #333333; text-align: right;"><span style="color:#FF0000;">*</span> Marked Fields are Mandatory</span>
                </div>
                <div class="box-body">
                    <?php echo $msg; ?>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Title <span style="color:#FF0000;">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter the Title" name="title" id="title" required="required" pattern="[0-9 A-Z a-z .,:'()]{2,60}" title="Allowed Characters (0-9A-Za-z .,:'()]{2,60})" value="<?php echo getbanner('title', $_REQUEST['banid']); ?>" />
                        </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Content </label>
                                <textarea  name="content" required="required" class="form-control" ><?php echo getbanner('content', $_REQUEST['banid']); ?></textarea>
                            </div>
                        </div><br>
                    

                 
                    <div class="row">
                        <div class="col-md-6">
                            <label>Order <span style="color:#FF0000;">*</span></label>
                            <input type="number" name="order" id="order" min="1" max="100" required="required" class="form-control" placeholder="Order" value="<?php echo getbanner('order', $_REQUEST['banid']); ?>" />
                        </div>
                        <div class="col-md-6">
                            <label>Status  <span style="color:#FF0000;">*</span></label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" <?php
                    if (getbanner('status', $_REQUEST['banid']) == '1') {
                        echo 'selected';
                    }
                    ?>>Active</option>
                                <option value="0" <?php
                                if (getbanner('status', $_REQUEST['banid']) == '0') {
                                    echo 'selected';
                                }
                    ?>>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo $sitename; ?>master/banner.htm">Back to Listings page</a>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" name="submit" id="submit" class="btn btn-success" style="float:right;"><?php
                                if ($_REQUEST['banid'] != '') {
                                    echo 'UPDATE';
                                } else {
                                    echo 'SUBMIT';
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
