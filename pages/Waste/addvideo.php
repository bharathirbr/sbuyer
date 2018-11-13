<?php
$menu = '2,1,4';

if (isset($_REQUEST['vid'])) {
    $thispageeditid = 13;
} else {
    $thispageid = 13;
}
include ('../../config/config.inc.php');
$dynamic = '1';
$datepicker = '1';
include ('../../require/header.php');

if (isset($_REQUEST['submit'])) {
    @extract($_REQUEST);
    $getid = $_REQUEST['vid'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $date = date('Y:m:d');
    $msg = addvideo($title, $link, $order, $status, $ip, $date, $thispageid, $getid);
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Video Mgmt
            <small><?php
                if ($_REQUEST['vid']) {
                    echo 'Edit';
                } else {
                    echo 'Add New';
                }
                ?> Video Mgmt </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo $sitename; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-cogs"></i> Master(s)</a></li>
            <li><a href="<?php echo $sitename; ?>master/video.htm">Video Mgmt </a></li>
            <li class="active"><?php
                if ($_REQUEST['vid'] != '') {
                    echo 'Edit';
                } else {
                    echo 'Add New';
                }
                ?> Video Mgmt</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form method="post" autocomplete="off" enctype="multipart/form-data" action="">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php
                        if ($_REQUEST['vid'] != '') {
                            echo 'Edit';
                        } else {
                            echo 'Add New';
                        }
                        ?> Video Mgmt</h3>
                    <span style="float:right; font-size:13px; color: #333333; text-align: right;"><span style="color:#FF0000;">*</span> Marked Fields are Mandatory</span>
                </div>
                <div class="box-body">
                    <?php echo $msg; ?>
                    <div class="panel panel-info" id="comp_details_fields">
                        <div class="panel-heading">
                            Video Mgmt
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Video Title<span style="color:#FF0000;">*</span></label>  
                                    <input type="text" class="form-control" placeholder="Enter the Title" name="title" id="title" required="required" pattern="[0-9 A-Z a-z .,:'()]{2,60}" title="Allowed Characters (0-9A-Za-z .,:'()]{2,60})" value='<?php echo stripslashes(getvideo('title', $_REQUEST['vid'])); ?>' />
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Video Link<span style="color:#FF0000;">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-addon">https://www.youtube.com/watch?v=</span>
                                        <input type="text" class="form-control" placeholder="Enter the External Link" name="link" id="link" required="required" value="<?php echo stripslashes(getvideo('link', $_REQUEST['vid'])); ?>" />
                                    </div>
                                </div>
                                <?php if (getvideo('link', $_REQUEST['vid']) != '') { ?>
                                    <div class="col-md-6 col-sm-6 col-xs-12" id="delimage">
                                        <label> </label>
                                        <iframe width="200" height="100" src="https://www.youtube.com/embed/<?php echo stripslashes(getvideo('link', $_REQUEST['vid'])); ?>" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                <?php } ?>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Order<span style="color:#FF0000;">*</span></label>                                  
                                    <input type="number" required="required " class="form-control" name="order" value="<?php echo stripslashes(getvideo('order', $_REQUEST['vid'])); ?>">
                                </div>
                                <div class="col-md-6">
                                    <label>Status <span style="color:#FF0000;">*</span></label>                                  
                                    <select name="status" class="form-control">
                                        <option value="1" <?php
                                        if (stripslashes(getvideo('status', $_REQUEST['vid'])) == '1') {
                                            echo 'selected';
                                        }
                                        ?>>Active</option>
                                        <option value="0" <?php
                                        if (stripslashes(getvideo('status', $_REQUEST['vid']) == '0')) {
                                            echo 'selected';
                                        }
                                        ?>>Inactive</option>

                                    </select>
                                </div>

                            </div>
                        </div><br/>

                    </div>

                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo $sitename; ?>master/video.htm">Back to Listings page</a>
                        </div>
                        <div class="col-md-6"><!--validatePassword();-->
                            <button type="submit" name="submit" id="submit" class="btn btn-success" style="float:right;"><?php
                                if ($_REQUEST['vid'] != '') {
                                    echo 'UPDATE';
                                } else {
                                    echo 'SAVE';
                                }
                                ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include ('../../require/footer.php'); ?>
<script type="text/javascript">
    function delrec(a, b) {
        if (confirm("Are you sure you want to remove this timing?")) {
            a.parent().parent().remove();
            var rtn = '';
            $.ajax({
                url: "<?php echo $sitename; ?>pages/master/delthistime.php",
                async: false,
                data: {id: b},
                success: function (data) {
                    rtn = '1';
                }
            });
            if (rtn == '1') {

            }
        }
    }

</script>
<script>
    function showUser(str) {

        $("#one").hide();
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "<?php echo $sitename; ?>pages/master/add_branch_statebg.php?q=" + str, true);
        xmlhttp.send();
    }
    function showUser1(str) {

        // $("#two").hide();
        if (str == "") {
            document.getElementById("txtHint1").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint1").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "<?php echo $sitename; ?>pages/master/add_branch_citybg.php?z=" + str, true);
        xmlhttp.send();
    }
    function showUser2(str) {

        //$("#two").hide();
        if (str == "") {
            document.getElementById("city").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("city").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "<?php echo $sitename; ?>pages/master/add_branch_citybg.php?z=" + str, true);
        xmlhttp.send();
    }
</script>
