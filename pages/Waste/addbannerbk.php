<?php
$menu = '2,1';
global $db;
if (isset($_REQUEST['id'])) {
    $thispageeditid = 11;
} else {
    $thispageid = 11;
}

include ('../../config/config.inc.php');
$dynamic = '1';
$datepicker = '1';
include ('../../require/header.php');


if (isset($_REQUEST['submit'])) {
    @extract($_REQUEST);
    $getid = $_REQUEST['banid'];
    $ip = $_SERVER['REMOTE_ADDR'];
    if ($imagename != '') {
        $imagec = $imagename;
    } else {
        $imagec = time();
    }
    $imag = strtolower($_FILES["image"]["name"]);
    if ($getid != '') {
        $linkimge = $db->prepare("SELECT * FROM `banner` WHERE `bid` = ? ");
        $linkimge->execute(array($getid));
        $linkimge1 = $linkimge->fetch();
        $pimage = $linkimge1['image'];
    }
    if ($imag) {
        if ($pimage != '') {
            unlink("../../images/banner/" . $pimage);
        }
        $main = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $size = $_FILES['image']['size'];
        $width = 1000;
        $height = 1000;
        $extension = getExtension($main);
        $extension = strtolower($extension);
        if (($extension == 'jpg') || ($extension == 'png') || ($extension == 'gif')) {
            $m = $imagec;
            $imagev = $m . "." . $extension;
            $thumppath = "../../images/banner/";
            move_uploaded_file($tmp, $thumppath . $imagev);
        } else {
            $ext = '1';
        }
        $image = $imagev;
    } else {
        if ($_REQUEST['banid']) {
            $image = $pimage;
        } else {
            $image = '';
        }
    }
    if ($ext == '1') {
        $msg = '<h4 class="icon fa fa-close" style="color:#e73d4a;"> <i class="icon fa fa-close" ></i> Select Image Only...!</h4>';
    } else {
        $msg =addbanner($title,$externellink,$Content,$bannername, $image, $imagename, $imagealt, $order, $status, $ip, $getid);
    }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Banner Mgmt
            <small><?php
                if ($_REQUEST['banid'] != '') {
                    echo 'Edit';
                } else {
                    echo 'Add New';
                }
                ?> Banner Mgmt </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo $sitename; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i>Master(s)</a></li>
            <li><a href="<?php echo $sitename; ?>master/banner.htm"><i class="fa fa-asterisk"></i>Banner Mgmt</a></li>
            <li class="active"><?php
                if ($_REQUEST['banid'] != '') {
                    echo 'Edit';
                } else {
                    echo 'Add New';
                }
                ?> Banner Mgmt</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form name="state" id="state"  method="post" onSubmit="return check();" enctype="multipart/form-data">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php
                        if ($_REQUEST['banid'] != '') {
                            echo 'Edit';
                        } else {
                            echo 'Add New';
                        }
                        ?> Banner Mgmt </h3>
                    <span style="float:right; font-size:13px; color: #333333; text-align: right;"><span style="color:#FF0000;"> *</span> Marked Fields are Mandatory</span>
                </div>
                <div class="box-body">
                    <?php echo $msg; ?>
                    <div class="panel panel-info" id="comp_details_fields">
                        <div class="panel-heading">
                            Banner Mgmt
                        </div>
                        <div class="panel-body">   
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Banner Title<span style="color:#FF0000;"> *</span></label>                                  
                                        <input type="text" name="title" class="form-control" value="<?php echo getbanner('title', $_REQUEST['banid']); ?>"  required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Externel Link </label>                                  
                                        <input type="text" name="externellink" class="form-control" value="<?php echo getbanner('link', $_REQUEST['banid']); ?>"  />                     
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Banner Content<span style="color:#FF0000;"> *</span></label>                                  
                                        <textarea name="Content" class="form-control"><?php echo getbanner('content', $_REQUEST['banid']); ?></textarea>                    
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image Alt<span style="color:#FF0000;"> *</span></label>                                  
                                        <input type="text" name="imagealt" class="form-control" value="<?php echo getbanner('image_alt', $_REQUEST['banid']); ?>" required />                     
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image Name<span style="color:#FF0000;"> *</span></label>                                  
                                        <input type="text" name="imagename" pattern="[A-Za-z0-9 -_]{2,110}" class="form-control" value="<?php echo getbanner('imagename', $_REQUEST['banid']); ?>" required />                     
                                    </div>
                                </div>
                            </div>
                            <div class="row">                                             
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Image <span style="color:#FF0000;"> *(Recommended Size 1390 * 350)</span></label>
                                        <input class="form-control spinner" <?php if (getbanner('image', $_REQUEST['banid'])=='') { ?> required="required" <?php } ?> name="image" type="file"> 
                                    </div>
                                </div>
                                <?php if (getbanner('image', $_REQUEST['banid'])!= '') { ?>
                                    <div class="col-md-6 col-sm-6 col-xs-12" id="delimage">
                                        <label> </label>
                                        <img src="<?php echo $sitename; ?>images/banner/<?php echo getbanner('image', $_REQUEST['banid']); ?>" style="padding-bottom:10px;" height="100" />
                                        <button type="button" style="cursor:pointer;" class="btn btn-danger" name="del" id="del" onclick="javascript:deleteimage('<?php echo $editresult1['image']; ?>', '<?php echo $editresult1['bid']; ?>', 'banner', '../images/banner/', 'image', 'bid');"><i class="fa fa-close">&nbsp;Delete Image</i></button>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Order<span style="color:#FF0000;"> *</span></label>                                  
                                        <input type="number" name="order" class="form-control" value="<?php echo getbanner('order', $_REQUEST['banid']); ?>" min="0" required />                     
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status<span style="color:#FF0000;"> *</span></label>                                  
                                        <select class="form-control" name="status">
                                            <option value="1" <?php if(getbanner('status', $_REQUEST['banid'])=='1'){ echo 'selected="selected"'; } ?>>Active </option>
                                            <option value="0" <?php if(getbanner('status', $_REQUEST['banid'])=='0'){ echo 'selected="selected"'; } ?>>InActive</option>
                                        </select>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
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
                                        echo 'SAVE';
                                    }
                                    ?></button>
                            </div>
                        </div>
                    </div></div>
        </form>
        <!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include ('../../require/footer.php'); ?>