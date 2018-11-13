<?php
$menu = "3,2,3";
if (isset($_REQUEST['id'])) {
    $thispageeditid = 9;
} else {
    $thispageid = 9;
}
include ('../../config/config.inc.php');

include_once('keys.php');
include_once('eBaySession.php');
include ('../../config/uploadimage.php');
$dynamic = '1';
$datepicker = '1';
include ('../../require/header.php');

if (isset($_REQUEST['submit'])) {
    @extract($_REQUEST);
    //print_r($_REQUEST);
   // exit;
    $_SESSION['product_id'] = $_REQUEST['id'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $strupload = '1';

    $sqltes1 = $db->prepare("SELECT * FROM `product` WHERE `productname`= ? AND `link`= ? AND `pid`!= ? ");
    $sqltes1->execute(array(trim($_REQUEST['product']), trim($_REQUEST['link']), $_REQUEST['id']));
    $sqltes = $sqltes1->rowCount();


    if ($sqltes == 0) {
        $img = '';
        $imgt = '';
        $img = getproduct('image', $_REQUEST['id']);


        for ($i = 0; $i < count($_FILES['image']['name']); $i++) {

            if ($_FILES['image']['name'][$i]) {
                $main = $_FILES['image']['name'][$i];
                $tmp = $_FILES['image']['tmp_name'][$i];
                $size = $_FILES['image']['size'][$i];
                $width = 100;
                $height = 100;
                $width1 = 500;
                $height1 = 500;
                $width2 = 2000;
                $height2 = 2000;
                $extension = getExtension($main);
                $extension = strtolower($extension);
                $m = time() . rand();
                $image = $m . "." . $extension;
                $thumppath = "../../../images/product/thump/";
                $fileimage = "../../../images/product/small/";
                $fileimage1 = "../../../images/product/big/";
                Imageupload($main, $size, $width, $thumppath, $thumppath, '255', '255', '255', $height, $m, $tmp);
                Imageupload($main, $size, $width1, $fileimage, $fileimage, '255', '255', '255', $height1, $m, $tmp);
                Imageupload($main, $size, $width2, $fileimage1, $fileimage1, '255', '255', '255', $height2, $m, $tmp);
                if ($img == '') {
                    $img = $image;
                } else {
                    $img .= "," . $image;
                }
            }
        }




        $date = date("Y-m-d h:i:sa");

        if ($strupload == '1') {
            if ($sprice == '') {
                $sprice = '0';
            }
            if ($strupload == '1') {
                if ($brand == '') {
                    $brand = '0';
                }
            }
            $msg = addproduct($cid, $product, $link, $price, $sprice, $videolink, $home, $img, $description, $order, $status, $metatitle, $metakeyword, $metadescription, $date,$ip, $thispageid, $_REQUEST['id']);
        }
    } else {
        $res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-close"></i> Link Already Exist</h4></div>';
    }
}
?>
<style>
    .fa
    {
        cursor:pointer;
    }
    .new_m
    {

        margin-bottom:10px;
        padding-left: 10px;
        padding-right: 10px;
    }
</style>
<script>


    
    

    function insRow(e)
    {
        var last_row = document.getElementById("add_rows").rowIndex;
        if (last_row <= 6) {
            var x = document.getElementById('myTable').insertRow(last_row);

            var yx = document.getElementById('com').value = last_row;

            var y = x.insertCell(0);
            var w = x.insertCell(1);
            y.align = 'left';
            var dename = 'image[' + yx + ']';
            //alert(dename);
            y.innerHTML = "<input type='file' name='" + dename + "' id='" + dename + "'><img src='<?php echo $sitename; ?>images/delete-icon.gif' alt='Delete' title='Close' onclick='deleteRow(this);' style='cursor:pointer'><br/>";
            w.align = 'left';
            w.innerHTML = "";
        } else {
            alert('You are not allowed to add more than 7 images')
        }
    }

    function deleteRow(r)
    {
        var te = document.getElementById('com').value;
        for (i = te; i >= 1; i--)
        {
            document.getElementById('com').value = i - 1;
            document.getElementById('myTable').deleteRow(i);
            return false;
        }
    }
    function deletecheck()
    {
        if (confirm("Please confirm you want to delete this image. "))
        {
            return true;
        } else
        {
            return false;
        }
    }
    
</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Product Mgmt
            <small><?php
                if ($_REQUEST['id'] != '') {
                    echo 'Edit';
                } else {
                    echo 'Add New';
                }
                ?> Product Details </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo $sitename; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-cogs"></i> Dynamic Pages</a></li>
            <li><a href="<?php echo $sitename; ?>products/product.htm"> Product Mgmt </a></li>
            <li class="active"><?php
                if ($_REQUEST['id'] != '') {
                    echo 'Edit';
                } else {
                    echo 'Add New';
                }
                ?> Product Details</li>
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
                        ?> Product Mgmt</h3>
                    <span style="float:right; font-size:13px; color: #333333; text-align: right;"><span style="color:#FF0000;">*</span> Marked Fields are Mandatory</span>
                </div>
                <div class="box-body">
                    <?php
                    echo $msg;
                    if (isset($_REQUEST['suc'])) {
                        echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Successfully Saved</h4></div>';
                    }
                    ?>
                    <div class="panel panel-info" id="comp_details_fields">
                        <div class="panel-heading">
                            Product Mgmt 
<!--                            <a target="_blank" style="float: right;margin-top: -7px;"  href="<?php echo $fsitename . 'productview' . '/' . getproduct('link', $_REQUEST['id']) ?>" class="btn  btn-primary" >Preview</a>-->
                        </div>
                        <div class="panel-body">  
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Category Name <span style="color:#FF0000;">*</span></label>                                  
                                    <select name="cid" class="form-control" required >
                                        <option value="">Select Category</option>
                                        <?php
                                        $getmanuf = $db->prepare("SELECT * FROM `category` WHERE `status`!=?");

                                        $getmanuf->execute(array('2'));

                                        $getmanuf1 = $getmanuf->rowCount();

                                        while ($fdepart = $getmanuf->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <option value="<?php echo $fdepart['cid']; ?>"
                                            <?php
                                            if ($fdepart['cid'] == getproduct('cid', $_REQUEST['id'])) {
                                                echo 'selected="selected"';
                                            }
                                            ?> > <?php echo $fdepart['category']; ?></option>
                                                <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Product Name <span style="color:#FF0000;">*</span></label>
                                    <input type="text" class="form-control" required="required" placeholder="Enter The Product Name" name="product" id="product" value='<?php
                                    if ($_REQUEST['id'] != '') {
                                        echo getproduct('productname', $_REQUEST['id']);
                                    }
                                    ?>'/>
                                </div>
                            </div>
                            <br/>

                            <div class="row">

                                <div class="col-md-6">
                                    <label>Link <span style="color:#FF0000;">*</span></label>
                                    <input type="text" class="form-control"  pattern="[A-Za-z0-9.,&_- ]{1,55}" title="Special character not allowed." required="required" placeholder="Enter The Link" name="link" id="link" value="<?php
                                    if ($_REQUEST['id'] != '') {
                                        echo getproduct('link', $_REQUEST['id']);
                                    }
                                    ?>"/>
                                </div>
                                <div class="col-md-6">
                                    <label></label>
                                    <div class="input-group">
                                        <label>
                                            <input type="checkbox" name="home"  id="home"  value="1"
                                            <?php
                                            if ($_REQUEST['id'] != '') {
                                                $ched = getproduct('home', $_REQUEST['id']);
                                                if ($ched == '1') {
                                                    echo 'checked="checked"';
                                                }
                                            }
                                            ?>> Show in HomePage</label>
                                    </div>

                                </div> 

                            </div>
                            <br/>
                            <div class="row"><br/></div>

                            <div class="row">

                                <div class="col-md-6">
                                    <label>Price <span style="color:#FF0000;"></span></label>
                                    <input type="number" step="0.01" class="form-control" placeholder="Enter The Price" name="price" id="price" value="<?php
                                    if ($_REQUEST['id'] != '') {
                                        echo getproduct('price', $_REQUEST['id']);
                                    }
                                    ?>"/>
                                </div>
                                <div class="col-md-6">
                                    <label>Special Price</label>
                                    <input  type="number" step="0.01" name="sprice" id="sprice" class="form-control" value="<?php
                                    if ($_REQUEST['id'] != '') {
                                        echo getproduct('sprice', $_REQUEST['id']);
                                    }
                                    ?>">
                                </div>

                            </div>

                            <br />

                            <div class="row">

                                <div class="col-md-6">
                                    <label>Video Link</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">https://www.youtube.com/watch?v=</span>
                                        <input type="text" class="form-control" placeholder="Enter the External videolink" name="videolink" id="videolink" value="<?php echo stripslashes(getproduct('videolink', $_REQUEST['id'])); ?>" />
                                    </div>
                                </div>
                                <?php if (getproduct('videolink', $_REQUEST['id']) != '') { ?>
                                    <div class="col-md-6 col-sm-6 col-xs-12" id="delimage">
                                        <label> </label>
                                        <iframe width="200" height="100" src="https://www.youtube.com/embed/<?php echo stripslashes(getproduct('videolink', $_REQUEST['id'])); ?>" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                <?php } ?>



                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    if (isset($_REQUEST['id'])) {

                                        if (getproduct('image', $_REQUEST['id']) != '') {
                                            ?>
                                            <table>
                                                <?php
                                                $pimg = explode(",", getproduct('image', $_REQUEST['id']));
                                                $i = 0;
                                                foreach ($pimg as $img) {
                                                    if ($img == '') {
                                                        break;
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <div class="col-md-6" id="delimage<?php echo $i; ?>">
                                                                <img src="<?php echo $fsitename; ?>images/product/small/<?php echo $img; ?>" style="padding-bottom:10px;" height="100" />
                                                                <button type="button" style="cursor:pointer;" class="btn btn-danger" name="del" id="del" onclick="javascript:deletemultiimage('<?php echo $img; ?>', '<?php echo $_REQUEST['id']; ?>', 'product', '../../images/product/small/', 'image', 'pid', 'delimage<?php echo $i; ?>');"><i class="fa fa-close">&nbsp;Delete Image</i></button>
                                                                <br />
                                                                <br />
                                                                <input type="file" name="image[<?php echo $i; ?>]" id="image[<?php echo $i; ?>]"/>
                                                                <br />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $i++;
                                                }
                                                ?>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="com" id="com" />
                                                        <table id="myTable">
                                                            <?php
                                                            foreach ($pimg as $r) {
                                                                if ($r != '') {
                                                                    echo "<tr><td></td></tr>";
                                                                }
                                                            }
                                                            ?>
                                                            <tr id="add_rows">
                                                                <td align="left"><a href="javascript:insRow()" class="invitlink">Add another Images</a>&nbsp;</td>
                                                            </tr>
                                                        </table>
                                                    </td>

                                                </tr>
                                            </table>
                                            <?php
                                        } else {
                                            ?>
                                            <table id="myTable">
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="com" id="com" />
                                                        <input type="file" name="image[0]" id="image[0]" />
                                                    </td>
                                                </tr>
                                                <tr id="add_rows">
                                                    <td align="left">
                                                        <a href="javascript:insRow()" class="invitlink">Add another Images</a>
                                                    </td>
                                                </tr>
                                            </table>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <table id="myTable">
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="com" id="com" />
                                                    <input type="file" name="image[0]" id="image[0]" />
                                                    <br/>
                                                </td>
                                            </tr>
                                            <tr id="add_rows">
                                                <td align="left">
                                                    <a href="javascript:insRow()" style=" color:#069; font-weight:bold;">Add another Images</a>
                                                </td>
                                            </tr>
                                        </table>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div> 
                            <br/>

                            <div class="row">
                                <div class="col-md-12">
                                    <label>Description </label>
                                    <textarea name="description" id="editor1" class="form-control" placeholder="Enter The Description"><?php
                                        if ($_REQUEST['id'] != '') {
                                            echo getproduct('description', $_REQUEST['id']);
                                        }
                                        ?></textarea>
                                </div>
                            </div>
                            <br/>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Order<span style="color:#FF0000;">*</span></label>                                  
                                    <input type="number" class="form-control" name="order" required="required" value="<?php
                                    if ($_REQUEST['id'] != '') {
                                        echo getproduct('order', $_REQUEST['id']);
                                    }
                                    ?>">
                                </div>
                                <div class="col-md-6">
                                    <label>Status <span style="color:#FF0000;">*</span></label>                                  
                                    <select name="status" class="form-control">
                                        <option value="1" <?php
                                        //  echo  getcategory('status', $_REQUEST['id']);
                                        if (getproduct('status', $_REQUEST['id']) == '1') {
                                            echo 'selected';
                                        }
                                        ?>>Active</option>
                                        <option value="0" <?php
                                        if (getproduct('status', $_REQUEST['id']) == '0') {
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
                                        <input type="text" name="metatitle" id="metatitle"   class="form-control"  placeholder="Enter The title" value="<?php echo getproduct('metatitle', $_REQUEST['id']); ?>" />
                                    </div><br/>
                                    <div class="col-md-12">
                                        <label>Meta Keywords</label>
                                        <textarea name="metakeyword" class="form-control" id="metakeyword"  placeholder="Enter The Meta Keyword" id="contact_number"><?php echo getproduct('metakeyword', $_REQUEST['id']); ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Meta Description</label>
                                        <textarea name="metadescription" class="form-control" id="metadescription"  placeholder="Enter The Meta Description" id="contact_number"><?php echo getproduct('metadescription', $_REQUEST['id']); ?></textarea>
                                    </div>
                                </div>
                                <br />
                            </div> 
                        </div>
                    
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo $sitename; ?>products/product.htm">Back to Listings page</a>
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
        </form>
</div>
<!-- /.box -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include ('../../require/footer.php'); ?>