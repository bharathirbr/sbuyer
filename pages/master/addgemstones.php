<?php
if (isset($_REQUEST['gemsid'])) {
    $thispageeditid = 11;
} else {
    $thispageaddid = 11;
}
$menu = "2,1,4";
include ('../../config/config.inc.php');
$dynamic = '1';
include ('../../require/header.php');
include ('../../config/uploadimage.php');
if (isset($_REQUEST['submit'])) {
    @extract($_REQUEST);
    $getid = $_REQUEST['gemsid'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $strupload = '1';
    $sqltes1 = $db->prepare("SELECT * FROM `gemstones` WHERE `name`= ? AND `link`= ? AND `gemsid`!= ? ");
    $sqltes1->execute(array(trim($_REQUEST['name']), trim($_REQUEST['link']),$_REQUEST['gemsid']));
    $sqltes = $sqltes1->rowCount();


    if ($sqltes == 0) {
        $img = '';
        $imgt = '';
        $img = getgemstones('image', $_REQUEST['gemsid']);

    for ($i = 0; $i < count($_FILES['image']['name']); $i++) {

            if ($_FILES['image']['name'][$i]) {
                $main = $_FILES['image']['name'][$i];
                $tmp = $_FILES['image']['tmp_name'][$i];
                $size = $_FILES['image']['size'][$i];
                $width = 500;
                $height = 500;
                $extension = getExtension($main);
                $extension = strtolower($extension);
                $m = time() . rand();
                $image = $m . "." . $extension;
                $thumppath = "../../../images/gemstones/";
                Imageupload($main, $size, $width, $thumppath, $thumppath, '255', '255', '255', $height, $m, $tmp);
                if ($img == '') {
                    $img = $image;
                } else {
                    $img .= "," . $image;
                    
                }
            }
        }
        $msg =addgemstones($name, $link,$short,$description, $img,$metatitle,$metakeywords,$metadescription, $order, $status, $ip, $getid);
    } else {
        $res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button><h4><i class="icon fa fa-close"></i> Link Already Exist</h4></div>';
    }
    
}
?>
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
    </script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            GemStones & Crystals
            <small><?php
                if ($_REQUEST['gemsid'] != '') {
                    echo 'Edit';
                } else {
                    echo 'Add New';
                }
                ?> GemStones & Crystals</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo $sitename; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-asterisk"></i> Dynamic Page(s)</a></li>
            <li><a href="<?php echo $sitename; ?>master/gemstones.htm"><i class="fa fa-circle-o"></i> GemStones & Crystals</a></li>
            <li class="active"><?php
                if ($_REQUEST['gemsid'] != '') {
                    echo 'Edit';
                } else {
                    echo 'Add New';
                }
                ?> GemStones & Crystals</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <form name="department" id="department" action="#" method="post" enctype="multipart/form-data">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php
                        if ($_REQUEST['gemsid'] != '') {
                            echo 'Edit';
                        } else {
                            echo 'Add New';
                        }
                        ?> GemStones & Crystals</h3>
                    <span style="float:right; font-size:13px; color: #333333; text-align: right;"><span style="color:#FF0000;">*</span> Marked Fields are Mandatory</span>
                </div>
                <div class="box-body">
                    <?php echo $msg; ?>
                    <div class="panel panel-info" id="comp_details_fields">
                        <div class="panel-heading">
                            GemStones & Crystals
                        </div>
                        <div class="panel-body"> 
                    <div class="row">
                        <div class="col-md-6">
                            <label>Name <span style="color:#FF0000;">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter the Name" name="name" id="name" required="required" pattern="[0-9 A-Z a-z .,:'()]{2,60}" title="Allowed Characters (0-9A-Za-z .,:'()]{2,60})" value="<?php echo getgemstones('name', $_REQUEST['gemsid']); ?>" />
                        </div>
                        <div class="col-md-6">
                            <label>Link <span style="color:#FF0000;">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter the Link" name="link" id="link" pattern="[A-Za-z0-9\S]{0,255}" title="Allowed Characters (0-9A-Za-z .,:'()]{2,255})" value="<?php echo getgemstones('link', $_REQUEST['gemsid']); ?>" required />
                        </div>
                    </div>
                    <div class="clearfix"><br /></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label>Short Description <span style="color:#FF0000;">*</span></label>
                            <textarea  name="short" required="required" class="form-control" rows="5" cols="80"><?php echo getgemstones('short', $_REQUEST['gemsid']); ?></textarea>
                        </div>
                    </div>
                    <div class="clearfix"><br /></div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Content <span style="color:#FF0000;"></span></label>
                            <textarea id="editor1" name="description" required="required" class="form-control" rows="5" cols="80"><?php echo getgemstones('description', $_REQUEST['gemsid']); ?></textarea>
                        </div>
                    </div>
                    <div class="clearfix"><br /></div>
                    <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    if (isset($_REQUEST['gemsid'])) {

                                        if (getgemstones('image', $_REQUEST['gemsid']) != '') {
                                            ?>
                                            <table>
                                                <?php
                                                $pimg = explode(",", getgemstones('image', $_REQUEST['gemsid']));
                                                $i = 0;
                                                foreach ($pimg as $img) {
                                                    if ($img == '') {
                                                        break;
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <div class="col-md-12" id="delimage<?php echo $i; ?>">
                                                                <img src="<?php echo $fsitename; ?>images/gemstones/<?php echo $img; ?>" style="padding-bottom:10px;" height="100" />
                                                                <button type="button" style="cursor:pointer;" class="btn btn-danger" name="del" id="del" onclick="javascript:deletemultiimage('<?php echo $img; ?>', '<?php echo $_REQUEST['gemsid']; ?>', 'gemstones', '../../images/gemstones/', 'image', 'gemsid', 'delimage<?php echo $i; ?>');"><i class="fa fa-close">&nbsp;Delete Image</i></button>
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
                                                        <div class="col-md-12">
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
                                                        </div>
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
                                                        <input type="file" name="image[0]" id="image[0]"/>
                                                        <br/>
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
                            </div> <br/>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Order <span style="color:#FF0000;">*</span></label>
                            <input type="number" name="order" id="order" min="1" max="100" required="required" class="form-control" placeholder="Order" value="<?php echo getgemstones('order', $_REQUEST['gemsid']); ?>" />
                        </div>
                        <div class="col-md-6">
                            <label>Status  <span style="color:#FF0000;">*</span></label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" <?php
                                if (getgemstones('status', $_REQUEST['gemsid']) == '1') {
                                    echo 'selected';
                                }
                                ?>>Active</option>
                                <option value="0" <?php
                                if (getgemstones('status', $_REQUEST['gemsid']) == '0') {
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
                                    <input type="text" name="metatitle" id="metatitle" class="form-control" pattern="[A-Z a-z 0-9 .,&_-]{1,55}" title="Special character not allowed."  placeholder="Enter The Meta title" value="<?php echo getgemstones('metatitle', $_REQUEST['gemsid']); ?>" />
                                </div>
                                </div><div class="clearfix"><br/></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Meta Keywords </label>
                                    <textarea name="metakeywords" class="form-control" id="metakeywords" placeholder="Enter The Meta Keywords"><?php echo getgemstones('metakeywords', $_REQUEST['gemsid']); ?></textarea>
                                </div>
                                </div><div class="clearfix"><br/></div>
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <label>Meta Description </label>
                                    <textarea name="metadescription" class="form-control"  id="metadescription" placeholder="Enter The Meta Description"><?php echo getgemstones('metadescription', $_REQUEST['gemsid']); ?></textarea>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo $sitename; ?>master/gemstones.htm">Back to Listings page</a>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" name="submit" id="submit" class="btn btn-success" style="float:right;"><?php
                                if ($_REQUEST['gemsid'] != '') {
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
