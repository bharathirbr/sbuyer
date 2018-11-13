<?php
$menu = "3,2,3";
$thispageid = 9;
include ('../../config/config.inc.php');
$dynamic = '1';
//$datepicker = '1';
$datatable = '1';

include ('../../require/header.php');

if (isset($_REQUEST['delete']) || isset($_REQUEST['delete_x'])) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $chk = $_REQUEST['chk'];
    $chk = implode('.', $chk);
    $msg = delproduct($chk, $thispageid, $ip);
}
?>
<script type="text/javascript" >
    function validcheck(name)
    {
        var chObj = document.getElementsByName(name);
        var result = false;
        for (var i = 0; i < chObj.length; i++) {
            if (chObj[i].checked) {
                result = true;
                break;
            }
        }
        if (!result) {
            return false;
        } else {
            return true;
        }
    }

    function checkdelete(name)
    {
        if (validcheck(name) == true)
        {
            if (confirm("Please confirm you want to Delete this Subcategory(s)"))
            {
                return true;
            } else
            {
                return false;
            }
        } else if (validcheck(name) == false)
        {
            alert("Select the check box whom you want to delete.");
            return false;
        }
    }

</script>
<script type="text/javascript">
    function checkall(objForm) {
        len = objForm.elements.length;
        var i = 0;
        for (i = 0; i < len; i++) {
            if (objForm.elements[i].type == 'checkbox') {
                objForm.elements[i].checked = objForm.check_all.checked;
            }
        }
    }
</script>
<style type="text/css">
    .row { margin:0;}
    #normalexamples tbody tr td:nth-child(2) {
        text-align:left;
    }
</style>
<style type="text/css">
    .row { margin:0;}
    #normalexamples tbody tr td:nth-child(1), tbody tr td:nth-child(3) , tbody tr td:nth-child(4),tbody tr td:nth-child(5),tbody tr td:nth-child(6),tbody tr td:nth-child(7),tbody tr td:nth-child(8){
        text-align:center;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Product 
            <small>Manage Product Mgmt</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo $sitename; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-cogs"></i> Dynamic Pages</a></li>
            <li class="active">Product Mgmt</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><a href="<?php echo $sitename; ?>products/addproduct.htm">Add New Product </a></h3><!---->
            </div>
            <div class="box-body">
                <?php echo $msg; ?>
                <form name="form1" method="post" action="">
                    <div class="table-responsive">

                        <table id="normalexamples" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align: center;" width="5%" >S.id</th>
                                    <th width="35%" >Product </th>   
                                    <th style="text-align: center" width="5%" >Status</th>
                                    <th style="text-align: center" width="5%"  >Order</th>
                                    <th width="5%" data-sortable="false" align="center"  style="text-align: center; padding-right:0; padding-left: 0;">Edit</th>
                                    <th  width="5%"data-sortable="false" align="center"  style="text-align: center; padding-right:0; padding-left: 0;"><input name="check_all" id="check_all" value="1" onclick="javascript:checkall(this.form)" type="checkbox" /></th><!-- -->
                                </tr>
                            </thead>
                            <?php
                            //$depart = DB("SELECT * FROM `product` WHERE `status`='1' ");
                            //$ndepart = DB_NUM("SELECT * FROM `product`  WHERE `status`='1' ");
                            //    if ($ndepart > 0) {
                            ?>
                            <tbody>
                                <?php
                                /*   $i = '1';
                                  while ($fdepart = mysql_fetch_array($depart)) {
                                  ?>
                                  <tr>
                                  <td style="text-align: center"><?php echo $i; ?></td>
                                  <td ><?php echo $mast->getcategory('category', $fdepart['cid']); ?></td>
                                  <td ><?php echo $mast->getsubcategory('subcategory', $fdepart['sid']); ?></td>
                                  <td ><?php echo $fdepart['productname']; ?></td>
                                  <td style="text-align: center"><?php echo $fdepart['order']; ?></td>
                                  <td width="10%"><?php
                                  if ($fdepart['status'] == '1') {
                                  echo 'Active';
                                  } if ($fdepart['status'] == '0') {
                                  echo 'Inactive';
                                  }
                                  ?></td>
                                  <td align="center" ><i class="fa fa-edit" onclick="javascript:editthis('<?php echo $fdepart['pid']; ?>');" style="cursor:pointer;"></i></td>
                                  <td align="center" ><input type="checkbox" name="chk[]" id="chk[]" value="<?php echo $fdepart['pid']; ?>" /></td>
                                  </tr>
                                  <?php
                                  $i++;
                                  } */
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5">&nbsp;</th>
                                    <th style="margin:0px auto;"><button type="submit" class="btn btn-danger" name="delete" id="delete" value="Delete" onclick="return checkdelete('chk[]');"> DELETE </button></th><!-- -->
                                </tr>
                            </tfoot>
                            <?php //} ?>
                        </table>
                    </div>
                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script type="text/javascript">
    function editthis(a)
    {
        var sid = a;
        window.location.href = '<?php echo $sitename; ?>products/' + a + '/editproduct.htm';
    }
</script>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<!--<script>
    jQuery('#example1').ddTableFilter();
</script>-->
<?php
include ('../../require/footer.php');
?>

<script>
//    $(document).ready(function () {
//
//        setTimeout(function () {
//            $("#delete").css("display", "block");
//        }, 1000);
//
//    });


    $('#normalexamples').dataTable({
        "bProcessing": true,
        "bServerSide": true,
        //"scrollX": true,
        "searching": true,
        "sAjaxSource": "<?php echo $sitename; ?>pages/dataajax/gettablevalues.php?types=producttable"
    });
</script>