<?php
$menu = "2,1,1,3";
if (isset($_REQUEST['qid'])) {
    $thispageeditid = 9;
} else {
    $thispageid = 9;
}
include ('../../config/config.inc.php');


$dynamic = '1';
$datepicker = '1';
include ('../../require/header.php');

if (isset($_REQUEST['submit'])) {
    @extract($_REQUEST);
    //print_r($_REQUEST);
   // exit;
    $getid = $_REQUEST['qid'];
    $ip = $_SERVER['REMOTE_ADDR'];

    $msg=addquiz($cid, $question, $answer,$order, $status, $ip, $thispageid, $getid);
  
     
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
            Quiz Mgmt
            <small><?php
                if ($_REQUEST['qid'] != '') {
                    echo 'Edit';
                } else {
                    echo 'Add New';
                }
                ?> Quiz Details </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo $sitename; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-cogs"></i> Dynamic Pages</a></li>
            <li><a href="<?php echo $sitename; ?>master/quiz.htm"> Quiz Mgmt </a></li>
            <li class="active"><?php
                if ($_REQUEST['qid'] != '') {
                    echo 'Edit';
                } else {
                    echo 'Add New';
                }
                ?> Quiz Details</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form method="post" autocomplete="off" enctype="multipart/form-data" action="">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php
                        if ($_REQUEST['qid'] != '') {
                            echo 'Edit';
                        } else {
                            echo 'Add New';
                        }
                        ?> Quiz Mgmt</h3>
                    <span style="float:right; font-size:13px; color: #333333; text-align: right;"><span style="color:#FF0000;">*</span> Marked Fields are Mandatory</span>
                </div>
                <div class="box-body">
                  <?php
                    echo $msg;
 ?>
                    <div class="panel panel-info" id="comp_details_fields">
                      
                        <div class="panel-body">  
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Quiz Category Name <span style="color:#FF0000;">*</span></label>                                  
                                    <select name="cid" class="form-control" required >
                                        <option value="">Select Quiz Category</option>
                                        <?php
                                        $getmanuf = $db->prepare("SELECT * FROM `quizcategory`");

                                        $getmanuf->execute(array());

                                        $getmanuf1 = $getmanuf->rowCount();

                                        while ($fdepart = $getmanuf->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <option value="<?php echo $fdepart['qcid']; ?>"
                                            <?php
                                            if ($fdepart['qcid'] == getquiz('category', $_REQUEST['qid'])) {
                                                echo 'selected="selected"';
                                            }
                                            ?> > <?php echo $fdepart['title']; ?></option>
                                                <?php } ?>
                                    </select>
                                </div>
                                
                            </div>
                            <br/>

                            <div class="row"><br/></div>

                            <div class="row">

                                <div class="col-md-12">
                                    <label>Question <span style="color:#FF0000;"></span></label>
                                    <textarea  required="required " class="form-control" name="question"> <?php echo getquiz('question', $_REQUEST['qid']); ?></textarea>
                                </div>
                                </div>
                            <br>
                                <div class="row">
                                <div class="col-md-12">
                                    <label>Answer</label>
                                    <textarea  required="required " class="form-control" name="answer"> <?php echo getquiz('answer', $_REQUEST['qid']); ?></textarea>
                                </div>

                            </div>

                            
                            <br/>

                            
                            <br/>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Order<span style="color:#FF0000;">*</span></label>                                  
                                    <input type="number" class="form-control" name="order" required="required" value="<?php
                                    if ($_REQUEST['qid'] != '') {
                                        echo getquiz('order', $_REQUEST['qid']);
                                    }
                                    ?>">
                                </div>
                                <div class="col-md-6">
                                    <label>Status <span style="color:#FF0000;">*</span></label>                                  
                                    <select name="status" class="form-control">
                                        <option value="1" <?php
                                        //  echo  getcategory('status', $_REQUEST['id']);
                                        if (getquiz('status', $_REQUEST['qid']) == '1') {
                                            echo 'selected';
                                        }
                                        ?>>Active</option>
                                        <option value="0" <?php
                                        if (getquiz('status', $_REQUEST['qid']) == '0') {
                                            echo 'selected';
                                        }
                                        ?>>Inactive</option>

                                    </select>
                                </div>

                            </div>

                        </div>
                        </div>
                        
                    
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo $sitename; ?>master/quiz.htm">Back to Listings page</a>
                        </div>
                        <div class="col-md-6"><!--validatePassword();-->
                            <button type="submit" name="submit" id="submit" class="btn btn-success" style="float:right;"><?php
                                if ($_REQUEST['qid'] != '') {
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