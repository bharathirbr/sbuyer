<?php
if (isset($_REQUEST['bmid'])) {
    $thispageeditid = 11;
} else {
    $thispageaddid = 11;
}
$menu = "7,6,9";
include ('../../config/config.inc.php');
$dynamic = '1';
include ('../../require/header.php');

if (isset($_REQUEST['submit'])) {
    @extract($_REQUEST);
    $getid = $_REQUEST['bmid'];
    $ip = $_SERVER['REMOTE_ADDR'];

    if ($imagename != '') {
        $imagec = $imagename;
    } else {
        $imagec = time();
    }
    $imag = strtolower($_FILES["image"]["name"]);
    if ($getid != '') {
        $linkimge = $db->prepare("SELECT * FROM `blogmanagement` WHERE `bmid` = ? ");
        $linkimge->execute(array($getid));
        $linkimge1 = $linkimge->fetch();
        $pimage = $linkimge1['image'];
    }
    if ($imag) {
        if ($pimage != '') {
            unlink("../../../images/blogmanage/" . $pimage);
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
            $thumppath = "../../../images/blogmanage/";
            move_uploaded_file($tmp, $thumppath . $imagev);
        } else {
            $ext = '1';
        }
        $image = $imagev;
    } else {
        if ($_REQUEST['bmid']) {
            $image = $pimage;
        } else {
            $image = '';
        }
    }
    if ($ext == '1') {
        $msg = '<h4 class="icon fa fa-close" style="color:#e73d4a;"> <i class="icon fa fa-close" ></i> Select Image Only...!</h4>';
    } else {
        $cid_im = implode(",", $bcid);
        $msg =addblogmanagement($cid_im,$title, $link, $description, $image, $imagename, $imagealt,$metatitle,$metakeywords,$metadescription, $order, $status, $ip, $getid);
    }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blog Management
            <small><?php
                if ($_REQUEST['bmid'] != '') {
                    echo 'Edit';
                } else {
                    echo 'Add New';
                }
                ?> Blog Management</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo $sitename; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-asterisk"></i> Dynamic Page(s)</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Blog</a></li>
            <li><a href="<?php echo $sitename; ?>blog/blogmanagement.htm"><i class="fa fa-circle-o"></i> Blog Management</a></li>
            <li class="active"><?php
                if ($_REQUEST['bmid'] != '') {
                    echo 'Edit';
                } else {
                    echo 'Add New';
                }
                ?> Blog Management</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <form name="department" id="department" action="#" method="post" enctype="multipart/form-data">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php
                        if ($_REQUEST['bmid'] != '') {
                            echo 'Edit';
                        } else {
                            echo 'Add New';
                        }
                        ?> Blog Management</h3>
                    <span style="float:right; font-size:13px; color: #333333; text-align: right;"><span style="color:#FF0000;">*</span> Marked Fields are Mandatory</span>
                </div>
                <div class="box-body">
                    <?php echo $msg; ?>
                    <div class="panel panel-info" id="comp_details_fields">
                        <div class="panel-heading">
                            Blog Management
                        </div>
                        <div class="panel-body"> 
                    <div class="row">
                        <div class="col-md-4">
                                    <label>Category Name <span style="color:#FF0000;">*</span></label>                                  
                                    <select name="bcid[]" id="bcid" class="form-control" multiple="multiple" required>
                                        <option value="">Select Category</option>
                                        <?php
                                        $sel=explode(',',getblogmanagement('category', $_REQUEST['bmid']));
                                        $s = $db->prepare("SELECT * FROM `blogcategorys` WHERE `status`= ? ");
                                        $s->execute(array('1'));

                                        //$s = DB("SELECT * FROM `category` WHERE `status`=1");
                                        while ($cate = $s->fetch()) {
                                            
                                            ?>
                                            <option value="<?php echo $cate['blid']; ?>" <?php if (in_array($cate['blid'], $sel)) { echo 'selected'; } ?> ><?php echo $cate['title']; ?></option>
                                                <?php } ?>
                                    </select>
                                </div>
                        <div class="col-md-4">
                            <label>Title <span style="color:#FF0000;">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter the Title" name="title" id="title" required="required" pattern="[0-9 A-Z a-z .,:'()]{2,60}" title="Allowed Characters (0-9A-Za-z .,:'()]{2,60})" value="<?php echo getblogmanagement('title', $_REQUEST['bmid']); ?>" />
                        </div>
                        <div class="col-md-4">
                            <label>Link <span style="color:#FF0000;"></span></label>
                            <input type="text" class="form-control" placeholder="Enter the Link" name="link" id="link" pattern="[0-9 A-Z a-z .,:'()/]{0,255}" title="Allowed Characters (0-9A-Za-z .,:'()]{2,255})" value="<?php echo getblogmanagement('link', $_REQUEST['bmid']); ?>" required />
                        </div>
                    </div>
                    <div class="clearfix"><br /></div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Description <span style="color:#FF0000;"></span></label>
                            <textarea id="editor1" name="description" required="required" class="form-control" rows="5" cols="80"><?php echo getblogmanagement('description', $_REQUEST['bmid']); ?></textarea>
                        </div>
                    </div>
                    <div class="clearfix"><br /></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image Alt<span style="color:#FF0000;"> *</span></label>                                  
                                <input type="text" name="imagealt" required="required" class="form-control" value="<?php echo getblogmanagement('imagealt', $_REQUEST['bmid']); ?>" required />                     
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image Name<span style="color:#FF0000;"> *</span></label>                                  
                                <input type="text" name="imagename" pattern="[A-Za-z0-9 -_]{2,110}" class="form-control" value="<?php echo getblogmanagement('imagename', $_REQUEST['bmid']); ?>" required />                     
                            </div>
                        </div>
                    </div>
                    <div class="row">                                             
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Image <span style="color:#FF0000;"> *(Recommended Size 1390 * 350)</span></label>
                                <input class="form-control spinner" <?php if (getblogmanagement('image', $_REQUEST['bmid']) == '') { ?> <?php } ?> name="image" type="file" > 
                            </div>
                        </div>
                        <?php if (getblogmanagement('image', $_REQUEST['bmid']) != '') { ?>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="delimage">
                                <label> </label>
                               <img src="<?php echo $fsitename; ?>images/blogmanage/<?php echo getblogmanagement('image', $_REQUEST['bmid']); ?>" style="padding-bottom:10px;" height="100" />
                               <button type="button" style="cursor:pointer;" class="btn btn-danger" name="del" id="del" onclick="javascript:deleteimage('<?php echo getblogmanagement('image', $_REQUEST['bmid']); ?>', '<?php echo $_REQUEST['bmid']; ?>', 'blogmanagement', '../../images/blogmanage/', 'image', 'bmid');"><i class="fa fa-close">&nbsp;Delete Image</i></button>
                                    </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Order <span style="color:#FF0000;">*</span></label>
                            <input type="number" name="order" id="order" min="1" max="100" required="required" class="form-control" placeholder="Order" value="<?php echo getblogmanagement('order', $_REQUEST['bmid']); ?>" />
                        </div>
                        <div class="col-md-6">
                            <label>Status  <span style="color:#FF0000;">*</span></label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" <?php
                                if (getblogmanagement('status', $_REQUEST['bmid']) == '1') {
                                    echo 'selected';
                                }
                                ?>>Active</option>
                                <option value="0" <?php
                                if (getblogmanagement('status', $_REQUEST['bmid']) == '0') {
                                    echo 'selected';
                                }
                                ?>>Inactive</option>
                            </select>
                        </div>
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
                                    <input type="text" name="metatitle" id="metatitle" class="form-control" pattern="[A-Z a-z 0-9 .,&_-]{1,55}" title="Special character not allowed."  placeholder="Enter The Meta title" value="<?php echo getblogmanagement('metatitle', $_REQUEST['bmid']); ?>" />
                                </div>
                                </div><div class="clearfix"><br/></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Meta Keywords </label>
                                    <textarea name="metakeywords" class="form-control" id="metakeywords" placeholder="Enter The Meta Keywords"><?php echo getblogmanagement('metakeywords', $_REQUEST['bmid']); ?></textarea>
                                </div>
                                </div><div class="clearfix"><br/></div>
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <label>Meta Description </label>
                                    <textarea name="metadescription" class="form-control"  id="metadescription" placeholder="Enter The Meta Description"><?php echo getblogmanagement('metadescription', $_REQUEST['bmid']); ?></textarea>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo $sitename; ?>blog/blogmanagement.htm">Back to Listings page</a>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" name="submit" id="submit" class="btn btn-success" style="float:right;"><?php
                                if ($_REQUEST['bmid'] != '') {
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
