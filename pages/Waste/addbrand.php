<?php
$menu = '2,1,2';
if (isset($_REQUEST['id'])) {
    $thispageeditid = 18;
} else {
    $thispageid = 18;
}

include ('../../config/config.inc.php');
$dynamic = '1';
$datepicker = '1';
include ('../../require/header.php');
include_once "../master/uploadimage.php";

if (isset($_REQUEST['submit'])) {
    $i = 1;
    @extract($_REQUEST);
    $getid = $_REQUEST['id'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $strupload = '1';

    $vaal = checkimage12('brand', $imagename, 'brid', $_REQUEST['id']);

    if ($vaal == 'true') {
        $pimage = getbrand('image', $_REQUEST['id']);
        $imag = strtolower($_FILES["image"]["name"]);
        if ($imag) {
            $main = $_FILES['image']['name'];
            $tmp = $_FILES['image']['tmp_name'];
            $size = $_FILES['image']['size'];
            $extension = getExtension($main);
            $extension = strtolower($extension);

            if (($extension == 'jpg') || ($extension == 'png') || ($extension == 'gif') || ($extension == 'jpeg')) {
                if ($pimage != '') {
                    unlink("../../../images/brand/" . $pimage);
                }
                $width = 500;
                $height = 500;
                $m = trim($imagename);
                $image = strtolower($m) . "." . $extension;
                $thumppath = "../../../images/brand/";
                $aaa = Imageuploadd($main, $size, $width, $thumppath, $thumppath, '255', '255', '255', $height, strtolower($m), $tmp);
            } else {
                $strupload = '2';
                $msg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fa fa-close"></i> Invalid File Format! Try jpg/png/gif/jpeg files only </div>';
            }
        } else {
            $image = '';
            if (isset($_REQUEST['id'])) {
                $image = $pimage;
            }
        }
        $msg = addbrand($brand, $link, $imagename, $imagealt, $image, $metatitle, $metakeywords, $metadescription, $order, $status, $ip, $thispageid, $getid);
    } else {
        $msg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fa fa-close"></i> Image name Already Exist!! try Different</div>';
    }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Brand Mgmt
            <small><?php
if ($_REQUEST['id'] != '') {
    echo 'Edit';
} else {
    echo 'Add New';
}
?> Brand Mgmt </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo $sitename; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-asterisk"></i> Master(s)</a></li>
            <li><a href="<?php echo $sitename; ?>master/brand.htm">Brand Mgmt </a></li>
            <li class="active"><?php
                if ($_REQUEST['id'] != '') {
                    echo 'Edit';
                } else {
                    echo 'Add New';
                }
?> Brand Mgmt</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form method="post" autocomplete="off" enctype="multipart/form-data" action="">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php
                if ($_REQUEST['id'] != '') {
                    echo 'Edit';
                } else {
                    echo 'Add New';
                }
?> Brand Mgmt</h3>
                    <span style="float:right; font-size:13px; color: #333333; text-align: right;"><span style="color:#FF0000;">*</span> Marked Fields are Mandatory</span>
                </div>
                <div class="box-body">
                    <?php echo $msg; ?>
                    <div class="panel panel-info" id="comp_details_fields">
                        <div class="panel-heading">
                            Brand Mgmt
                        </div>
                        <div class="panel-body">                        
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Brand Name <span style="color:#FF0000;">*</span></label>                                  
                                    <input type="text" name="brand" id="category" placeholder="Enter The Brand Name" class="form-control" value="<?php echo getbrand('bname', $_REQUEST['id']); ?>"  pattern="[A-Z a-z 0-9 .,&_-]{1,55}" title="Special character not allowed." required />
                                </div>  
                                <div class="col-md-6">
                                    <label>Link <span style="color:#FF0000;">*</span></label>
                                    <input type="text" class="form-control" required="required" placeholder="Enter The Link"   pattern="[A-Za-z0-9.,&_-]{1,55}" title="Special character not allowed." name="link" id="link" value="<?php echo strtolower(getbrand('link', $_REQUEST['id'])); ?>"required/>
                                </div>

                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Image Name <span id="addstar" style="color:#FF0000;">*</span></label>                                  
                                    <input type="text" name="imagename" id="imagenameid" placeholder="Enter The Image Name"   pattern="[A-Z a-z 0-9 .,&_-]{1,55}" title="Special character not allowed." class="form-control" value="<?php echo getbrand('image_name', $_REQUEST['id']); ?>" required />
                                </div> 
                                <div class="col-md-6">
                                    <label>Image Alt <span id="addstar1" style="color:#FF0000;"></span></label>                                  
                                    <input type="text" name="imagealt" placeholder="Enter The Image Alt"    pattern="[A-Z a-z 0-9 .,&_-]{1,55}" title="Special character not allowed." id="imagealtid"  class="form-control" value="<?php echo getbrand('imagealt', $_REQUEST['id']); ?>"  /> 
                                </div>
                            </div><br/>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Image </label>
                                    <input type="file" name="image" id="image" onchange="imgchktore(this.value)" />
                                </div>
                                <?php if (getbrand('image', $_REQUEST['id']) != '') { ?>
                                    <div class="col-md-6" id="delimage">
                                        <img src="<?php echo $fsitename; ?>images/brand/<?php echo getbrand('image', $_REQUEST['id']); ?>" style="padding-bottom:10px;" height="100" />
                                        <button type="button" style="cursor:pointer;" class="btn btn-danger" name="del" id="del" onclick="javascript:deleteimage('<?php echo getbrand('image', $_REQUEST['id']); ?>', '<?php echo $_REQUEST['id']; ?>', 'brand', '../../images/brand/', 'image', 'brid');"><i class="fa fa-close">&nbsp;Delete Image</i></button>
                                    </div>
                                <?php } ?>
                            </div>
                            <br />


                            <div class="row">
                                <div class="col-md-6">
                                    <label>Order<span style="color:#FF0000;">*</span></label>                                  
                                    <input type="number" class="form-control" name="order" required="required" value="<?php echo getbrand('order', $_REQUEST['id']); ?>">
                                </div>
                                <div class="col-md-6">
                                    <label>Status <span style="color:#FF0000;">*</span></label>                                  
                                    <select name="status" class="form-control">
                                        <option value="1" <?php
                                if (getbrand('status', $_REQUEST['id']) == '1') {
                                    echo 'selected';
                                }
                                ?>>Active</option>
                                        <option value="0" <?php
                                        if (getbrand('status', $_REQUEST['id']) == '0') {
                                            echo 'selected';
                                        }
                                ?>>Inactive</option>

                                    </select>
                                </div>
                                <div id="txtHint1"><b></b></div>
                            </div> 
                        </div>
                    </div>
                    <div class="panel panel-info" id="comp_details_fields">
                        <div class="panel-heading">
                            SEO
                        </div>
                        <div class="panel-body">  
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Meta Title</label>
                                    <input type="text" name="metatitle" id="metatitle" class="form-control" pattern="[A-Z a-z 0-9 .,&_-]{1,55}" title="Special character not allowed."  placeholder="Enter The Meta title" value="<?php echo getbrand('metatitle', $_REQUEST['id']); ?>" />
                                </div>
                                <br/>
                                <div class="col-md-12">
                                    <label>Meta Keywords </label>
                                    <textarea name="metakeywords" class="form-control" id="metakeywords" placeholder="Enter The Meta Keywords"><?php echo getbrand('metakeyword', $_REQUEST['id']); ?></textarea>
                                </div>
                                <br/>
                                <div class="col-md-12">
                                    <label>Meta Description </label>
                                    <textarea name="metadescription" class="form-control"  id="metadescription" placeholder="Enter The Meta Description"><?php echo getbrand('metadescription', $_REQUEST['id']); ?></textarea>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo $sitename; ?>master/brand.htm">Back to Listings page</a>
                        </div>
                        <div class="col-md-6"><!--validatePassword();-->
                            <button type="submit" name="submit" id="submit" class="btn btn-success" style="float:right;"><?php
                                        if ($_REQUEST['id'] != '') {
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