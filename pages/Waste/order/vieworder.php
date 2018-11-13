<?php
$menu = "3,2,6";
if ($_REQUEST['oid'] != '') {
    $thispageeditid = 1;
} else {
    $thispageid = 1;
}
include ('../../config/config.inc.php');
$dynamic = '1';
$datepicker = '1';
include ('../../require/header.php');

if (isset($_REQUEST['submit'])) {
    @extract($_REQUEST);



    $subject = "Invoice " . $_REQUEST['product_ref_no'];
    $message = ' <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="m_-2371669209747940510bodyTable" style="background-color:#f4f4f4;margin:0;padding:0;height:100%;width:100%">
            <tbody>
               <tr>
                  <td align="center" valign="top" id="m_-2371669209747940510bodyCell" style="background-color:#f4f4f4;margin:0;padding:0;height:100%;width:100%">
                     <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                           <tr>
                              <td align="center" valign="top" id="m_-2371669209747940510templateHeader" style="background-color:#233971;border-bottom:1px solid #ffffff">
                                 <table align="center" border="0" cellpadding="0" cellspacing="0" class="m_-2371669209747940510templateContainer" style="width:600px">
                                    <tbody>
                                       <tr>
                                          <td valign="top" class="m_-2371669209747940510templateContainerCell" style="padding-top:20px;padding-bottom:20px;text-align: center;">
                                             <span class="m_-2371669209747940510hiddenPreheader" style="color:#fff;font-size:34px;line-height:1px;text-align: center;text-align:center">Welcome to GPT Tools. </span>
                                             <table align="left" border="0" cellpadding="0" cellspacing="0" class="m_-2371669209747940510headerContainer"></table>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td align="center" valign="top" id="m_-2371669209747940510templateBody">
                                 <table align="center" border="0" cellpadding="0" cellspacing="0" class="m_-2371669209747940510templateContainer" style="width:600px">
                                    <tbody>
                                     
                                       <tr>
                                          <td align="center" valign="top" class="m_-2371669209747940510templateContainerCell" style="padding-top:40px;padding-bottom:30px">
                                             <table align="center" border="0" cellpadding="10" cellspacing="0" width="80%" class="m_-2371669209747940510templateStatBlock" style="background-color:#fcfcfc;border:1px solid #dadada;border-radius:3px;border-collapse:separate">
                                                <tbody>
                                                   <tr>
                                                      <td class="m_-2371669209747940510statContent" style="color:#202020;font-family:Helvetica;font-size:16px;line-height:150%;padding-top:20px;padding-bottom:20px;text-align:center">' . $_REQUEST['message'] . '</td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td align="center" valign="top" id="m_-2371669209747940510templateFooter" style="padding-bottom:40px">
                                 <table align="center" border="0" cellpadding="0" cellspacing="0" class="m_-2371669209747940510templateContainer" style="width:600px">
                                    <tbody>
                                       <tr>
                                          <td align="center" valign="top" class="m_-2371669209747940510templateContainerCell" style="border-top:1px solid #ffffff;padding-top:20px">
                                             <table align="right" border="0" cellpadding="0" cellspacing="0" class="m_-2371669209747940510footerContainer">
                                                <tbody>
                                                   <tr>
                                                      <td align="center" valign="bottom">
                                                         <table border="0" cellpadding="0" cellspacing="0" class="m_-2371669209747940510footerUtilityLinks">
                                                            <tbody>
                                                               <tr>
                                                                  <td align="center" valign="bottom" class="m_-2371669209747940510footerUtilityContent" style="font-family:Helvetica;font-size:11px;font-weight:bold;line-height:200%;letter-spacing:-.5px;text-align:center;text-decoration:none;color:#808080"></td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                             <table align="left" border="0" cellpadding="0" cellspacing="0" class="m_-2371669209747940510footerContainer">
                                                <tbody>
                                                   <tr>
                                                      <td valign="bottom" class="m_-2371669209747940510footerContent" style="color:#808080;font-family:Helvetica;font-size:10px;line-height:150%;text-align:left">Â© Copyright 2017 GPT TOOLS. All Rights Reserved<br></td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </td>
               </tr>
            </tbody>
         </table>';
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    $headers .= "From: " . $adminemail_s . "\r\n";

    mail($_REQUEST['email'], $subject, $message, $headers);


    $ins = $db->prepare("INSERT INTO `order_mails` SET `product_id`=?,`message`=? ");
    $ins->execute(array($_REQUEST['oid'], $_REQUEST['message']));
    //print_r($_REQUEST);


    $msg = "Successfully Sent";
}
$norderfetch1 = $db->prepare("SELECT * FROM `norder` WHERE `oid`=? ");
$norderfetch1->execute(array($_REQUEST['oid']));
$norderfetch = $norderfetch1->fetch();

$norderfetch2 = $db->prepare("SELECT * FROM `order` WHERE `oid`=? ");
$norderfetch2->execute(array($_REQUEST['oid']));
$norderfetch1 = $norderfetch2->fetch();

$nfetch =$db->prepare("SELECT * FROM `customer` ");
$nfetch->execute(array());
$nfetch1 = $nfetch->fetch();

if ($norderfetch['order_status'] == '0') {
    $odstatus = 'Unpaid/Incomplete Order';
} elseif ($norderfetch['order_status'] == '1') {
    $odstatus = 'Processing';
} elseif ($norderfetch['order_status'] == '2') {
    $odstatus = 'Success';
} elseif ($norderfetch['order_status'] == '3') {
    $odstatus = 'Failure';
} elseif ($norderfetch['order_status'] == '4') {
    $odstatus = 'Cancelled';
}
?>
<style>
    td{
        border: none;

    }

</style>
<script>

    function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
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
            Order Mgmt

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo $sitename; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo $sitename; ?>order/orders"><i class="fa fa-shopping-cart"></i> order</a></li>
            <li><a href="#">view Order</a></li>

        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form method="post" autocomplete="off" enctype="multipart/form-data" action="">
            <div class="box box-info">
                <div class="box-header with-border">

                    <span style="float:right; font-size:13px; color: #333333; text-align: right;"><span style="color:#FF0000;">*</span> Marked Fields are Mandatory</span>
                </div>
                <div class="box-body">
<?php echo $msg; ?>
                    <div class="panel panel-info" id="comp_details_fields">
                        <div class="panel-heading">
                            Customer Details
                        </div>
                        <div class="panel-body">         
                            <div class="col-md-12" style="padding-bottom: 10px;">

                                <!--<a href="<?php echo $fsitename ?>downloadpdf/<?php echo $norderfetch['product_ref_no'] ?>/" target="_blank" style="font-size: 21px;float:right">View Invoice</a>  -->             
                            </div>
                            <div class="col-md-12">



                                <div class="col-md-6">

                                    <table   class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Name : 
                                                </td>
                                                <td>
<?php echo $nfetch1['FirstName']; ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    Email : 
                                                </td>
                                                <td>
<?php echo $nfetch1['E-mail'] ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    Phone : 
                                                </td>
                                                <td>
<?php echo $nfetch1['Mobile'] ?>
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table   class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Invoice No : 
                                                </td>
                                                <td>
                                                    
                                                   <?php echo '#ORD' . str_pad($norderfetch1['oid'], 6, 0, STR_PAD_LEFT)?>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Date : 
                                                </td>
                                                <td>
<?php echo date("d-M-Y", strtotime($norderfetch['date'])) ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>  
                            </div><br/>
                        </div>
                    </div>
                    <div class="panel panel-info" id="comp_details_fields">
                        <div class="panel-heading">
                            Billing and Shipping Information
                        </div>
                        <div class="panel-body">  
                            <div class="col-md-12">
                                <table   class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h4>Billing Address</h4>
                                            </td>
                                            <td style="padding-right: 10px;" align="right">
                                                <h4   >Shipping Address</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
<?php
echo $norderfetch['billing_address']
?>
                                            </td>
                                            <td style="padding-right: 10px;" align="right">
                                                <?php
                                                echo $norderfetch['shipping_address']
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info" id="comp_details_fields">
                        <div class="panel-heading">
                            Product Information
                        </div>
                        <div class="panel-body">  
                            <div class="col-md-12">
                                <table   class="table table-bordered table-striped">
                                    <thead>
                                        <tr>

                                            <th  width="25%" >Product Name</th>
                                            <th  width="15%"  align="right">  Price</th>
                                            <th  width="10%" align="center">  Qty</th>
                                            <th  width="15%"  align="right" > Amount</th>
                                        </tr>           	
                                    </thead>
                               	    <tbody>
<?php
$row1 = $db->prepare("SELECT * FROM  `order` WHERE `Order_id`=?");
$row1->execute(array($norderfetch['oid']));
$row = $row1->fetch();
?>
                                        <tr> 
                                            <td  style="vertical-align:top"><?php echo $row['product_name']; ?></td>
                                            <td     style="vertical-align:top"><?php echo number_format($row['product_price'],2,'.','') ?></td>
                                            <td   align="center" style="vertical-align:top"><?php echo $row['product_qty'] ?></td>
                                            <td align="right" style="vertical-align:top;padding-right: 10px;"> <?php echo number_format($row['product_total_price'],2,'.','') ?></td></tr>
                                        <?php
                                        ?>
                                        
                                        <?php if ($norderfetch['promotional_discount'] != '' && $norderfetch['promotional_discount'] != '0') { ?>
                                            <tr>
                                                <td colspan="2" ></td>
                                                <td align="right"  style="padding-right: 10px;font-size:15px;"> <strong>Discount</strong></td>
                                                <td align="right" style="padding-right: 10px;"><?php echo $norderfetch['discounted_amount']; ?></td>
                                            </tr>
<?php } ?>

                                        <tr>
                                           
                                            

                                        </tr>
                                        <tr>

                                            
                                            <td align="right" colspan="2"style="padding-right: 10px;"><?php echo $norderfetch['shipping_charge']; ?></td>
                                        </tr>
                                        <tr>
                                           
                                            <td   style=" font-size:15px;"><strong>Order status :</strong>  <?php echo $odstatus ?> </td>
                                            
                                            <td  colspan="2" align="right"  style="padding-right: 10px;font-size:21px;"> <strong>Grand Total</strong></td>
                                            <td align="right" style="padding-right: 10px;"><?php echo number_format($norderfetch['over_all_total'],2,'.',''); ?></td>
                                        </tr>  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>





                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo $sitename; ?>master/order">Back to Listings page</a>
                        </div>



</div>
                    </div>
                </div>
            </div>
        </form>
        <!-- /.box -->
    </section><!-- /.content 
</div><!-- /.content-wrapper -->
<?php include ('../../require/footer.php'); ?>
    <script type="text/javascript">

        $('#cid').on('change', function () {
            var ts = $('#cid').val();
            //  alert(ts);
            $.ajax({
                url: "<?php echo $sitename; ?>pages/master/getsubcate.php",
                async: false,
                data: {pid: ts},
                success: function (data) {
                    $('#getsub').html(data);
                }
            });
        });
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

        function imgchktore(a) {

            if (a != '')
            {
                $("#imagenameid").prop('required', true);
                $("#imagealtid").prop('required', true);
                $("#addstar").html('*');
                $("#addstar1").html('*');
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
