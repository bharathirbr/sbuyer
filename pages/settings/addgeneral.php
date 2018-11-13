<?php
if ($_REQUEST['gid'] != '') {
    $thispageeditid = 2;
} else {
    $thispageaddid = 2;
}
include ('../../config/config.inc.php');
$dynamic = '1';
$editor = '1';

include ('../../require/header.php');
$_SESSION['sid'] = '';


if (isset($_REQUEST['submit'])) {
    @extract($_REQUEST);
    $_SESSION['gid'] = $_REQUEST['gid'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $msg = addgeneral($phone, $supportemail, $about, $facebook, $beforehead, $afterbody, $openhours, $copyrights,$map, $og_tag, $ip, $_SESSION['gid']);
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            General Settings
            <small><?php
                if ($_REQUEST['gid'] != '') {
                    echo 'Edit';
                } else {
                    echo 'Add New';
                }
                ?> General Settings</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo $sitename; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i> Settings</a></li>
            <li><a href="<?php echo $sitename; ?>settings/general.htm">General Settings </a></li>
            <li class="active"><?php
                if ($_REQUEST['gid'] != '') {
                    echo 'Edit';
                } else {
                    echo 'Add New';
                }
                ?>&nbsp;General Settings</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <form name="department" id="department" action="#" method="post" enctype="multipart/form-data">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php
                        if ($_REQUEST['gid'] != '') {
                            echo 'Edit';
                        } else {
                            echo 'Add New';
                        }
                        ?> General Settings</h3>
                    <span style="float:right; font-size:13px; color: #333333; text-align: right;"><span style="color:#FF0000;">*</span> Marked Fields are Mandatory</span>
                </div>
                <div class="box-body">
                    <?php echo $msg; ?>
                    <div class="panel panel-info">
                        <div class="panel-heading">General Settings Details</div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <label>Phone Number</label>
                                    <input class="form-control" type="text" pattern="[0-9]{1,15}" name="phone" id="phone" value="<?php echo stripslashes(getgeneral('phone', $_REQUEST['gid'])); ?>" />

                                </div>
                                <div class="col-md-6">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="supportemail" id="supportemail" value="<?php echo stripslashes(getgeneral('support_mail', $_REQUEST['gid'])); ?>" />
                                </div>
                            </div>
                            <br />
                            <div class="row">

                                <div class="col-md-6">
                                    <label>About (Footer Block)</label>
                                    <textarea class="form-control"  name="about" id="about" /><?php echo stripslashes(getgeneral('about', $_REQUEST['gid'])); ?></textarea>

                                </div>
                                <div class="col-md-6">
                                    <label>Facebook (Footer Block)</label>
                                    <textarea class="form-control"  name="facebook" id="facebook" /><?php echo stripslashes(getgeneral('facebook', $_REQUEST['gid'])); ?></textarea>
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Before Head ( Scripts and Styles )</label>
                                    <textarea class="form-control"  name="beforehead" id="beforehead" /><?php echo stripslashes(getgeneral('beforehead', $_REQUEST['gid'])); ?></textarea>
                                </div>
                            </div><br/>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>After Head ( Scripts and Styles )</label>
                                    <textarea class="form-control"  name="afterbody" id="afterbody" /><?php echo stripslashes(getgeneral('afterbody', $_REQUEST['gid'])); ?></textarea>
                                </div>
                            </div><br/>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Opening Hours</label>
                                    <textarea class="form-control"  name="openhours" id="address" /><?php echo stripslashes(getgeneral('openhours', $_REQUEST['gid'])); ?></textarea>
                                </div>
                            </div><br/>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Copyrights</label>
                                    <textarea class="form-control"  name="copyrights" id="copyrights" /><?php echo stripslashes(getgeneral('copyrights', $_REQUEST['gid'])); ?></textarea>
                                </div>
                            </div><br/>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Map</label>
                                    <textarea class="form-control"  name="map" id="map" /><?php echo stripslashes(getgeneral('map', $_REQUEST['gid'])); ?></textarea>
                                </div>
                            </div><br/>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>OG Tag</label>
                                    <textarea class="form-control"  name="og_tag" id="og_tag" /><?php echo stripslashes(getgeneral('og_tags', $_REQUEST['gid'])); ?></textarea>
                                <br />
                                eg: <br />
                                &lt;meta property="og:type" content="" /&gt; <br />
                                &lt;meta property="og:locale" content="en-AU" /&gt; <br />
                                &lt;meta property="og:twitter:sie" content="@sitename" /&gt; <br />
                                &lt;meta property="og:copyrights" content="" /&gt; <br />
                                &lt;meta property="og:author" content="" /&gt; <br />
                                &lt;meta property="og:publisher" content="" /&gt; <br />
                                &lt;meta property="og:summary" content="" /&gt; <br />
                                &lt;meta property="fb:appid" content="" /&gt; <br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo $sitename; ?>settings/general.htm">Back to Listings page</a>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" name="submit" id="submit" class="btn btn-success" style="float:right;"><?php
                                if ($_REQUEST['gid'] != '') {
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