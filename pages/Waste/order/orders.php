<?php
$menu = "3,2,6";
$thispageid = 11;
include ('../../config/config.inc.php');
$dynamic = '1';
$datatable = '1';
include ('../../require/header.php');
?>


<style type="text/css">
    .row { margin:0;}
    #normalexamples tbody tr td:nth-child(1),tbody tr td:nth-child(2), tbody tr td:nth-child(3),tbody tr td:nth-child(7) {
        text-align:center;
    }
    #normalexamples tbody tr td:nth-child(5) {
        text-align:center;
    }
</style>
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Orders
            <small>List of order(s)</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo $sitename; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="#"><i class="fa fa-asterisk"></i>order</a></li>
            <li class="active"><a href="#"><i class="fa fa-circle-o"></i>Orders</a></li>            
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box">

            <div class="box-body">
                <?php echo $msg; ?>
                <form name="form1" method="post" action="">
                    <div class="table-responsive">
                        <table id="normalexamples" class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th style="width:5%;">O.id</th>
                                    <th style="width:30%">Date</th>
                                    <th style="width:10%">Order ID</th>
                                    <th style="width:30%">Customer</th>
                                    <th style="width:10%">Amount</th>
                                    <th style="width:15%">Order Status</th>
                                    <th style="width:10%">View</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th colspan="7">&nbsp;</th>
                                </tr>
                            </tfoot>
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
        var did = a;
        window.location.href = '<?php echo $sitename; ?>order/' + a + '/vieworder.htm';
    }
</script>
<?php
include ('../../require/footer.php');
?>  
<script type="text/javascript">
    $('#normalexamples').dataTable({
        "bProcessing": true,
        "bServerSide": true,
        //"scrollX": true,
        "searching": true,
        "sAjaxSource": "<?php echo $sitename; ?>pages/dataajax/gettablevalues.php?types=ordertable"
    });
</script>
