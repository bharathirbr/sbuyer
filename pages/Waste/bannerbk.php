<?php
$menu = "2,1,1,1";
$thispageid = 11;
include ('../../config/config.inc.php');
$dynamic = '1';
$datatable = '1';

include ('../../require/header.php');

if (isset($_REQUEST['delete']) || isset($_REQUEST['delete_x'])) {
    $chk = $_REQUEST['chk'];
    $chk = implode('.', $chk);
    $msg =delbanner($chk);
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
            if (confirm("Please confirm you want to Delete records"))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else if (validcheck(name) == false)
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
    #normalexamples tbody tr td:nth-child(4),#normalexamples tbody tr td:nth-child(5),#normalexamples tbody tr td:nth-child(6) {
        text-align:center;
        }
        
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Banner Mgmt
            <small>Manage all Banner Mgmt</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo $sitename; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i>Master(s)</a></li>
            <li><a href="#"><i class="fa fa-asterisk"></i>Banner Mgmt</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><a href="<?php echo $sitename; ?>master/addbanner.htm">Add New Banner </a></h3>
            </div>

            <div class="box-body">

                <?php echo $msg; ?>
                <form name="form1" method="post" action="">


                    <div class="table-responsive">

                        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
                        <script src="<?php echo $sitename; ?>pages/master/ddtf.js"></script>

                        <table id="normalexamples" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align: left" width="5%"> S.Id</th>
                                    <th style="text-align: left" width="15%" >Banner Title</th>                                  
                                    <th style="text-align: left" width="50%" >Image</th>
                                    <th style="text-align: center" width="10%" >Order</th>

                                    <th width="10%" data-sortable="false" align="center"  style="text-align: center; padding-right:0; padding-left: 0;">Edit</th>
                                    <th  width="10%"data-sortable="false" align="center" style="text-align: center; padding-right:0; padding-left: 0;"><input name="check_all" id="check_all" value="1" onclick="javascript:checkall(this.form)" type="checkbox" /></th>
                                </tr>
                            </thead>
                            <?php
                            
                            $depart = $db->prepare("SELECT * FROM `banner`");
                            $depart->execute(array());
                            
                            
                            
                            //$depart = DB("SELECT * FROM `banner`");
                            
                            $depart = $db->prepare("SELECT * FROM `banner` ");
                            $depart->execute();
                            $ndepart=$depart->rowCount();
                            
                            
                            //$ndepart = DB_NUM("SELECT * FROM `banner` ");
                            if ($ndepart > 0) {
                                ?>
                                <tbody>
                                    <?php
                                    $i = '1';
                                    while ($fdepart = $depart->fetch()) {
                                        ?>
                                        <tr>
                                            <td style="text-align: center"><?php echo $i; ?></td>
                                            <td style="text-align: left"><?php echo $fdepart['title']; ?></td>

                                            <td style="text-align: center"><?php if ($fdepart['image'] != '') { ?>

                                                    <img src="<?php echo $fsitename . 'admin/images/banner/' . $fdepart['image']; ?>" style="padding-bottom:10px;" height="100" />
                                                <?php } ?>
                                            </td>

                                            <td style="text-align: center"><?php echo $fdepart['order']; ?></td>


                                            <td align="center" ><i class="fa fa-edit" onclick="javascript:editthis('<?php echo $fdepart['bid']; ?>');" style="cursor:pointer;"></i></td>
                                            <td align="center" ><input type="checkbox" name="chk[]" id="chk[]" value="<?php echo $fdepart['bid']; ?>" /></td>

                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">&nbsp;</th>
                                        <th style="margin:0px auto;"><button type="submit"  style="width:100%;"class="btn btn-danger" name="delete" id="delete" value="Delete" onclick="return checkdelete('chk[]');"> DELETE </button></th>

                                    </tr>
                                </tfoot>
                            <?php } ?>
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
        window.location.href = '<?php echo $sitename; ?>master/' + a + '/editbanner.htm';
    }
</script>
<script>
    jQuery('#example1').ddTableFilter();
</script>
<?php
include ('../../require/footer.php');
?>


