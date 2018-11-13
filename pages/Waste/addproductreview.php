<?php
$menu = '4,4,20';
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
    $getid = $_REQUEST['prid'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $strupload = '1';


    $msg = addproductreview($Name, $email, $pid, $comments,  $order, $status, $ip, $thispageid, $getid);
} else {
    
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
                ?> produc Review Mgmt </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo $sitename; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-asterisk"></i> Product(s)</a></li>
            <li><a href="<?php echo $sitename; ?>products/productreview.htm">produc Review Mgmt </a></li>
            <li class="active"><?php
                if ($_REQUEST['id'] != '') {
                    echo 'Edit';
                } else {
                    echo 'Add New';
                }
                ?> produc Review Mgmt</li>
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
                        ?> produc Review Mgmt</h3>
                    <span style="float:right; font-size:13px; color: #333333; text-align: right;"><span style="color:#FF0000;">*</span> Marked Fields are Mandatory</span>
                </div>
                <div class="box-body">
                    <?php echo $msg; ?>
                    <div class="panel panel-info" id="comp_details_fields">
                        <div class="panel-heading">
                            produc Review Mgmt
                        </div>
                        <div class="panel-body">                        
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Name </label>                                  
                                    <input type="text" name="Name" id="Name" placeholder="Enter The  Name" class="form-control" value="<?php echo getproductreview('name', $_REQUEST['prid']); ?>"  pattern="[A-Z a-z 0-9 .,&_-]{1,55}" title="Special character not allowed."  />
                                </div>  
                                <div class="col-md-4">
                                    <label>Email </label>
                                    <input type="email" class="form-control" required="required" placeholder="Enter The email"   name="email" id="email" value="<?php echo strtolower(getproductreview('email', $_REQUEST['prid'])); ?>"/>
                                </div>
                                <div class="row" id="<?php echo $idss ?>" style="margin-bottom: 10px">
                                    <div class="col-md-4">
                                        <label>Product <span style="color:#FF0000;">*</span></label>                                  
                                        <select name="pid" class="form-control" required>
                                            <option value="">Select Product</option>
                                            <?php
                                            $getmanuf = $db->prepare("SELECT * FROM `Product`");

                                            $getmanuf->execute(array());

                                            $getmanuf1 = $getmanuf->rowCount();

                                            while ($fdepart = $getmanuf->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <option value="<?php echo $fdepart['pid']; ?>"
                                                <?php
                                                if ($fdepart['pid'] == getproductreview('productname', $_REQUEST['prid'])) {
                                                    echo 'selected="selected"';
                                                }
                                                ?> > <?php echo $fdepart['productname']; ?></option>
                                                    <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br/>

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Comments</label>  
                                            <textarea  required="required " class="form-control" name="comments"> <?php echo getproductreview('comments', $_REQUEST['prid']); ?></textarea>
                                        </div>
                                    </div><br/>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-6">
                                    <label>Order<span style="color:#FF0000;">*</span></label>                                  
                                    <input type="number" class="form-control" name="order" required="required" value="<?php echo getproductreview('order', $_REQUEST['prid']); ?>">
                                </div>
                                <div class="col-md-6">
                                    <label>Status <span style="color:#FF0000;">*</span></label>                                  
                                    <select name="status" class="form-control">
                                        <option value="1" <?php
                                        if (getproductreview('status', $_REQUEST['prid']) == '1') {
                                            echo 'selected';
                                        }
                                        ?>>Active</option>
                                        <option value="0" <?php
                                        if (getproductreview('status', $_REQUEST['prid']) == '0') {
                                            echo 'selected';
                                        }
                                        ?>>Inactive</option>

                                    </select>
                                </div>
                                <div id="txtHint1"><b></b></div>
                            </div> 
                        </div>
                    </div>
                   
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo $sitename; ?>products/productreview.htm">Back to Listings page</a>
                        </div>
                        <div class="col-md-6"><!--validatePassword();-->
                            <button type="submit" name="submit" id="submit" class="btn btn-success" style="float:right;"><?php
                                if ($_REQUEST['prid'] != '') {
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