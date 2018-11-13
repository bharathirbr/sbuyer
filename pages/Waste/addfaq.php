<?php
$menu = '2,1,3';

if (isset($_REQUEST['id'])) {
    $thispageeditid = 12;
} else {
    $thispageid = 12;
}
include ('../../config/config.inc.php');
$dynamic = '1';
$datepicker = '1';
include ('../../require/header.php');

if (isset($_REQUEST['submit'])) {
    @extract($_REQUEST);
    $getid = $_REQUEST['id'];
    $ip = $_SERVER['REMOTE_ADDR'];

    if ($imagetitle != '') {
        $imagec = $imagetitle;
    } else {
        $imagec = time();
    }

    $imag = strtolower($_FILES["image"]["name"]);
    if ($getid != '') {

        $linkimge = $db->prepare("SELECT * FROM `faq` where `id` = ? ");
        $linkimge->execute(array($getid));
        $linkimge1 = $linkimge->fetch();



        //$linkimge = DB_QUERY("SELECT * FROM `banner` where `bid` ='$getid'");
        $pimage = $linkimge1['image'];
    }

    if ($imag) {
        if ($pimage != '') {

            unlink("../../../images/faq/" . $pimage);

            //unlink("../../../banner/" . $pimage);
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

            $thumppath = "../../../images/faq/";
            //$thumppath = "../../../banner/";

            move_uploaded_file($tmp, $thumppath . $imagev);
        } else {
            $ext = '1';
        }
        $image = $imagev;
    } else {
        if ($_REQUEST['id']) {
            $imagetitle = $pimage;
        } else {
            $imagetitle = '';
        }
    }
    
        
     $msg =addfaq($faqq, $faqa, $imagealt, $imagetitle, $image, $order, $status,$ip,$getid);
}


?>

<script>



    function fillInAddress() {
   
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
        }

        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }
    }


</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            FAQ Mgmt
            <small><?php
                if ($_REQUEST['id']) {
                    echo 'Edit';
                } else {
                    echo 'Add New';
                }
                ?> FAQ Mgmt </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo $sitename; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-cogs"></i> Masteer(s)</a></li>
            <li><a href="<?php echo $sitename; ?>master/faq.htm">FAQ Mgmt </a></li>
            <li class="active"><?php
                if ($_REQUEST['id'] != '') {
                    echo 'Edit';
                } else {
                    echo 'Add New';
                }
                ?> FAQ Mgmt</li>
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
                        ?> FAQ Mgmt</h3>
                    <span style="float:right; font-size:13px; color: #333333; text-align: right;"><span style="color:#FF0000;">*</span> Marked Fields are Mandatory</span>
                </div>
                <div class="box-body">
                    <?php echo $msg; ?>
                    <div class="panel panel-info" id="comp_details_fields">
                        <div class="panel-heading">
                            FAQ Mgmt
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>FAQ Question<span style="color:#FF0000;">*</span></label>  
                                    <textarea  required="required " class="form-control" name="faqq"> <?php echo getfaq('faqquestion', $_REQUEST['id']); ?></textarea>
                                </div>
                            </div><br/>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>FAQ Answer</label>
                                    <textarea name="faqa"  id="editor1"  required="required" class="form-control" placeholder="Enter The Description"><?php echo getfaq('faqanswer', $_REQUEST['id']); ?> </textarea>
                                </div>
                            </div><br/>
                             <div class="row">
                                 <div class="col-md-6">
                            <div class="form-group">
                                <label>Image Alt<span style="color:#FF0000;"> *</span></label>                                  
                                <input type="text" name="imagealt" class="form-control" value="<?php echo getfaq('imagealt', $_REQUEST['id']); ?>" required />                     
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image Name<span style="color:#FF0000;"> *</span></label>                                  
                                <input type="text" name="imagetitle" pattern="[A-Za-z0-9 -_]{2,110}" class="form-control" value="<?php echo getfaq('imagetitle', $_REQUEST['id']); ?>" required />                     
                            </div>
                        </div>
                            </div>

                            <div class="row">                                             
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Image <span style="color:#FF0000;"> *(Recommended Size 1390 * 350)</span></label>
                                <input class="form-control spinner" <?php if (getfaq('image', $_REQUEST['id']) == '') { ?> required="required" <?php } ?> name="image" type="file"> 
                            </div>
                        </div>
                        <?php if (getfaq('image', $_REQUEST['id']) != '') { ?>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="delimage">
                                <label> </label>
                               <img src="<?php echo $fsitename; ?>images/faq/<?php echo getfaq('image', $_REQUEST['id']); ?>" style="padding-bottom:10px;" height="100" />
                               <button type="button" style="cursor:pointer;" class="btn btn-danger" name="del" id="del" onclick="javascript:deleteimage('<?php echo getfaq('image', $_REQUEST['id']); ?>', '<?php echo $_REQUEST['id']; ?>', 'faq', '../images/faq/', 'image', 'id');"><i class="fa fa-close">&nbsp;Delete Image</i></button>
                                    </div>
                        <?php } ?>
                    </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Order<span style="color:#FF0000;">*</span></label>                                  
                                    <input type="number" required="required " class="form-control" name="order" value="<?php echo getfaq('order', $_REQUEST['id']); ?>">
                                </div>
                                <div class="col-md-6">
                                    <label>Status <span style="color:#FF0000;">*</span></label>                                  
                                    <select name="status" class="form-control">
                                        <option value="1" <?php
                                        if (getfaq('status', $_REQUEST['id']) == '1') {
                                            echo 'selected';
                                        }
                                        ?>>Active</option>
                                        <option value="0" <?php
                                        if (getfaq('status', $_REQUEST['id']) == '0') {
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
                            <a href="<?php echo $sitename; ?>master/faq.htm">Back to Listings page</a>
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
