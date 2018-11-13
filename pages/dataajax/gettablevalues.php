<?php

include ('../../config/config.inc.php');

//ini_set('display_errors','1');
//error_reporting(E_ALL);
function mres($value) {
    $search = array("\\", "\x00", "\n", "\r", "'", '"', "\x1a");
    $replace = array("\\\\", "\\0", "\\n", "\\r", "\'", '\"', "\\Z");
    return str_replace($search, $replace, $value);
}

/* Declaration table name start here */
if ($_REQUEST['types'] == 'bannertable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('bid', 'title', 'order', 'status');
    $sIndexColumn = "bid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "banner";
}
if ($_REQUEST['types'] == 'quiztable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('qid', 'category', 'order', 'status');
    $sIndexColumn = "qid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editquiz" : "editquiz";
    $sTable = "quiz";
}
if ($_REQUEST['types'] == 'storytable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('stid', 'title', 'image', 'order', 'status');
    $sIndexColumn = "stid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editstories" : "editstories";
    $sTable = "stories";
}
if ($_REQUEST['types'] == 'quizcategorytable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('qcid', 'title', 'image', 'order', 'status');
    $sIndexColumn = "qcid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editquizcategory" : "editquizcategory";
    $sTable = "quizcategory";
}
if ($_REQUEST['types'] == 'blogcategorytable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('blid', 'title', 'image', 'order', 'status');
    $sIndexColumn = "blid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editblogcategorys" : "editblogcategorys";
    $sTable = "blogcategorys";
}
if ($_REQUEST['types'] == 'blogmanagementtable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('bmid', 'category', 'image', 'order', 'status');
    $sIndexColumn = "bmid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editblogmanagement" : "editblogmanagement";
    $sTable = "blogmanagement";
}
if ($_REQUEST['types'] == 'numerologytable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('nid', 'title', 'order', 'status');
    $sIndexColumn = "nid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editnumerology" : "editnumerology";
    $sTable = "numerology";
}
if ($_REQUEST['types'] == 'pujastable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('pujid', 'title', 'order', 'status');
    $sIndexColumn = "pujid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editpujas" : "editpujas";
    $sTable = "pujas";
}
if ($_REQUEST['types'] == 'crystalstable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('crysid', 'title', 'order', 'status');
    $sIndexColumn = "crysid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editcrystals" : "editcrystals";
    $sTable = "crystals";
}
if ($_REQUEST['types'] == 'astrologytable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('aid', 'title', 'order', 'status');
    $sIndexColumn = "aid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editastrology" : "editastrology";
    $sTable = "astrology";
}
if ($_REQUEST['types'] == 'astrologyservicestable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('asid', 'title', 'image', 'order', 'status');
    $sIndexColumn = "asid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editastrologyservices" : "editastrologyservices";
    $sTable = "astrologyservice";
}
if ($_REQUEST['types'] == 'signstable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('sgid', 'name', 'image', 'order', 'status');
    $sIndexColumn = "sgid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editsigns" : "editsigns";
    $sTable = "signs";
}
if ($_REQUEST['types'] == 'gemstonestable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('gemsid', 'name', 'order', 'status');
    $sIndexColumn = "gemsid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editgemstones" : "editgemstones";
    $sTable = "gemstones";
}
if ($_REQUEST['types'] == 'gallerytable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('gaid', 'name', 'order', 'status');
    $sIndexColumn = "gaid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "gallery";
}

if ($_REQUEST['types'] == 'currencytable') {

    $aColumns = array('cuid', 'Currency_Name', 'Currency_Code', 'Order', 'status');
    $sIndexColumn = "cuid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editcurrency" : "editcurrency";
    $sTable = "currency";
}
if ($_REQUEST['types'] == 'testimonialtable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('tid', 'date', 'title', 'order', 'status');
    $sIndexColumn = "tid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "edittestimonial" : "edittestimonial";
    $sTable = "testimonial";
}
if ($_REQUEST['types'] == 'productreviewtable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('prid', 'productname', 'email', 'status', 'order');
    $sIndexColumn = "prid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "edittproductreview" : "editproductreview";
    $sTable = "productreview";
}
if ($_REQUEST['types'] == 'brandtable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('brid', 'bname', 'order', 'status');
    $sIndexColumn = "brid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbrand" : "editbrand";
    $sTable = "brand";
}

if ($_REQUEST['types'] == 'categorytable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('cid', 'category', 'menu', 'home_page', 'order', 'status',);
    $sIndexColumn = "cid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editcategory" : "editcategory";
    $sTable = "category";
}
if ($_REQUEST['types'] == 'subcategorytable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('sid', 'cid', 'subcategory', 'order', 'status',);
    $sIndexColumn = "sid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editsubcategory" : "editsubcategory";
    $sTable = "subcategory";
}
if ($_REQUEST['types'] == 'innercategorytable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('innerid', 'cid', 'subcategory', 'innername', 'order', 'status');
    $sIndexColumn = "innerid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editinnercategory" : "editinnercategory";
    $sTable = "innercategory";
}
if ($_REQUEST['types'] == 'attritable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('id', 'name');
    $sIndexColumn = "id";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editattribute" : "editattribute";
    $sTable = "attribute";
}

if ($_REQUEST['types'] == 'taxtable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('tid', 'taxname', 'taxpercentage', 'Order', 'Status');
    $sIndexColumn = "tid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "tax";
}

if ($_REQUEST['types'] == 'attrigrptable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('id', 'name', 'attribute', 'status');
    $sIndexColumn = "id";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editattrigrp" : "editattrigrp";
    $sTable = "attribute_group";
}
if ($_REQUEST['types'] == 'producttable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('pid', 'productname', 'status', 'order');

    /* Indexed column (used for fast and accurate table cardinality) */
    $sIndexColumn = "pid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editproduct" : "editproduct";
    $sTable = "product";
}


if ($_REQUEST['types'] == 'ordertable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('oid', 'datetime', 'oid', 'CusID', 'over_all_total', 'order_status');

    /* Indexed column (used for fast and accurate table cardinality) */
    $sIndexColumn = "oid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "vieworder" : "vieworder";
    $sTable = "norder";
}
if ($_REQUEST['types'] == 'coupontable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('did', 'promotion_code', 'from_date', 'to_date');

    /* Indexed column (used for fast and accurate table cardinality) */
    $sIndexColumn = "did";
    // $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editcontactus" : "editcontactus";
    $sTable = "discount";
}
if ($_REQUEST['types'] == 'contactustable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('id', 'name', 'phone', 'email');

    /* Indexed column (used for fast and accurate table cardinality) */
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editcontactus" : "editcontactus";
    $sTable = "contact";
}
if ($_REQUEST['types'] == 'newslettertable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('id', 'email', 'ip', 'datetime', 'status');

    /* Indexed column (used for fast and accurate table cardinality) */
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editcontactus" : "editcontactus";
    $sTable = "newsletter";
}
if ($_REQUEST['types'] == 'faqtable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('id', 'faqquestion', 'order', 'status');

    /* Indexed column (used for fast and accurate table cardinality) */
    $sIndexColumn = "id";
    // $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editcontactus" : "editcontactus";
    $sTable = "faq";
}
if ($_REQUEST['types'] == 'videotable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('vid', 'title', 'order', 'status');

    /* Indexed column (used for fast and accurate table cardinality) */
    $sIndexColumn = "vid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editvideo" : "editvideo";
    $sTable = "video";
}
if ($_REQUEST['types'] == 'statictable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('sid', 'title');

    /* Indexed column (used for fast and accurate table cardinality) */
    $sIndexColumn = "sid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "editstatic" : "editstati";
    $sTable = "static_pages";
}
if ($_REQUEST['types'] == 'customertable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('CusID', 'FirstName', 'Mobile', 'E-mail', 'Status');

    /* Indexed column (used for fast and accurate table cardinality) */
    $sIndexColumn = "CusID";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "edit" : "editstati";
    $sTable = "customer";
}

if ($_REQUEST['types'] == 'usertable') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('id', 'user_name', 'email_id', 'security_group', 'status');

    /* Indexed column (used for fast and accurate table cardinality) */
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "edit" : "editstati";
    $sTable = "users";
}
if ($_REQUEST['types'] == 'socialmedia') {
    // $aColumns = array('id', 'Category Name', 'Sub Category', 'Product', 'Order', 'status');
    $aColumns = array('sid', 'sname', 'order', 'status');

    /* Indexed column (used for fast and accurate table cardinality) */
    $sIndexColumn = "sid";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "edit" : "editstati";
    $sTable = "socialmedia";
}
if ($_REQUEST['types'] == 'homebannerstable') {
    $aColumns = array('hbid', 'title', 'image', 'order', 'status');
    $sIndexColumn = "hbid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "edithomebanners" : "edithomebanners";
    $sTable = "homebanners";
}
if ($_REQUEST['types'] == 'contacttable') {
    $aColumns = array('coid', 'date', 'firstname', 'emailid', 'phoneno', 'status');
    $sIndexColumn = "coid";
    $editpage = ($_REQUEST['db_table_for'] == 'live') ? "edithomebanners" : "edithomebanners";
    $sTable = "contact_form";
}
if ($_REQUEST['types'] == 'printtrmplist') {
    $aColumns = array('id', 'name');
    $sIndexColumn = "id";
    // $editpage = ($_REQUEST['db_table_for'] == 'live') ? "edittax" : "edittax";
    $sTable = "print_template";
}

if ($_REQUEST['types'] == 'emailTemplateTable') {
    $aColumns = array('id', 'name');
    $sIndexColumn = "id";
    // $editpage = ($_REQUEST['db_table_for'] == 'live') ? "edittax" : "edittax";
    $sTable = "email_template";
}

/* Declaration table name is item and salary pending.. */

/* Declaration table name end here */
$aColumns1 = $aColumns;

function fatal_error($sErrorMessage = '') {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    die($sErrorMessage);
}

$sLimit = "";

if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
    $sLimit = "LIMIT " . intval($_GET['iDisplayStart']) . ", " . intval($_GET['iDisplayLength']);
}

$sOrder = "";

if (isset($_GET['iSortCol_0'])) {
    $sOrder = "ORDER BY  ";
    for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
        if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
            if (in_array("Order", $aColumns)) {
                $sOrder .= "`Order` " . ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
            } else {
                $sOrder .= "`" . $aColumns[intval($_GET['iSortCol_' . $i])] . "` " . ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
            }
        }
    }
    $sOrder = substr_replace($sOrder, "", -2);

    if ($sOrder == "ORDER BY") {
        $sOrder = " ";
    }
}

$sWhere = "";
if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
    $sWhere .= " AND (";
    for ($i = 0; $i < count($aColumns); $i++) {
        if ($aColumns[$i] == 'Status') {
            if (strtolower($_GET['sSearch']) == 'active') {
                $sWhere .= " `Status`='1' OR ";
            } elseif (strtolower($_GET['sSearch']) == 'inactive') {
                $sWhere .= " `Status`='0' OR ";
            } else {
                $sWhere .= "";
            }
        } else {
            $sWhere .= "`" . $aColumns[$i] . "` LIKE '%" . mres($_GET['sSearch']) . "%' OR ";
        }
    }
    $sWhere = substr_replace($sWhere, "", -3);
    $sWhere .= ')';
}

if (in_array("status", $aColumns)) {
    $sWhere .= " AND `status`!='2'";
}

if ($sWhere != '') {
    $sWhere = "WHERE `$sIndexColumn`!='' $sWhere";
}
/* Individual column filtering */

$sQuery = "
        SELECT SQL_CALC_FOUND_ROWS `" . str_replace(",", "`,`", implode(",", $aColumns)) . "`
        FROM $sTable
        $sWhere
        $sOrder          
        $sLimit
    ";
//echo $sQuery;//exit;
$rResult = $db->prepare($sQuery);
$rResult->execute();

$sQuery = "
        SELECT FOUND_ROWS()
    ";
$rResultFilterTotal = $db->prepare($sQuery);
$rResultFilterTotal->execute();
$aResultFilterTotal = $rResultFilterTotal->fetch();
$iFilteredTotal = $aResultFilterTotal[0];

$sQuery = "
        SELECT COUNT(" . $sIndexColumn . ")
        FROM   $sTable
    ";
$rResultTotal = $db->prepare($sQuery);
$rResultTotal->execute();
$aResultTotal = $rResultTotal->fetch();
$iTotal = $aResultTotal[0];

$output = array(
    "sEcho" => intval($_GET['sEcho']),
    "iTotalRecords" => $iTotal,
    "iTotalDisplayRecords" => $iFilteredTotal,
    "aaData" => array()
);
$ij = 1;
$k = $_GET['iDisplayStart'];

while ($aRow = $rResult->fetch(PDO::FETCH_ASSOC)) {
    $k++;
    $row = array();

    for ($i = 0; $i < count($aColumns1); $i++) {
        if ($_REQUEST['types'] == 'categorytable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'menu') {
                $row[] = $aRow[$aColumns1[$i]] ? "Yes" : "No";
            } elseif ($aColumns1[$i] == 'home_page') {
                $row[] = $aRow[$aColumns1[$i]] ? "Yes" : "No";
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'subcategorytable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'cid') {
                $cate = explode(',', $aRow[$aColumns1[$i]]);
                foreach ($cate as $c) {
                    $data .= getcategory('category', $c);
                    $data .= ',';
                }
                $row[] = substr($data, 0, -1);
                $data = '';
                //$row[] =getcategory('category', $aRow[$aColumns1[$i]]);
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'innercategorytable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'cid') {
                $cate = explode(',', $aRow[$aColumns1[$i]]);
                foreach ($cate as $c) {
                    $data .= getcategory('category', $c);
                    $data .= ',';
                }
                $row[] = substr($data, 0, -1);
                $data = '';
            } elseif ($aColumns1[$i] == 'subcategory') {
                $cate1 = explode(',', $aRow[$aColumns1[$i]]);
                foreach ($cate1 as $c1) {
                    $data1 .= getsubcategory('subcategory', $c1);
                    $data1 .= ',';
                }
                $row[] = substr($data1, 0, -1);
                $data1 = '';
                // $row[] = getsubcategory('subcategory', $aRow[$aColumns1[$i]]);
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'producttable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } elseif ($aColumns1[$i] == 'availability') {
                $row[] = $aRow[$aColumns1[$i]] ? "In Stock" : "Out of Stock";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'attrigrptable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'attribute') {

                $getarr = explode(',', $aRow[$aColumns1[$i]]);
                $finalstr = "";
                foreach ($getarr as $tempid) {
                    $finalstr .= "," . getattribute('name', $tempid);
                }
                $row[] = ltrim($finalstr, ',');
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'ordertable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'order_status') {
                if ($aRow[$aColumns1[$i]] == '0')
                    $row[] = "Unpaid/Incomplete Order";
                if ($aRow[$aColumns1[$i]] == '1')
                    $row[] = "Processing";
                if ($aRow[$aColumns1[$i]] == '2')
                    $row[] = "Success";
                if ($aRow[$aColumns1[$i]] == '3')
                    $row[] = "Cancelled";
            }elseif ($aColumns1[$i] == 'over_all_total') {
                $row[] = '<i class="fa fa-usd" aria-hidden="true"></i>&nbsp' . $aRow[$aColumns1[$i]];
                //$row[] = $aRow[$aColumns1[$i]] ? "Guest" : "Registered";
            } elseif ($aColumns1[$i] == 'CusID') {
                $row[] = getcustomer('FirstName', $aRow[$aColumns1[$i]]);
            } //elseif ($aColumns1[$i] == 'oid') {
            // $row[] = '#ORD' . str_pad($aRow[$aColumns1[$i]], 6, 0, STR_PAD_LEFT);
            elseif ($aColumns1[$i] == 'datetime') {
                $row[] = date("d-m-Y h:i:s a", strtotime($aRow[$aColumns1[$i]]));
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'bannertable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'image') {
                $row[] = '<img src="' . $fsitename . 'images/banner/' . $aRow[$aColumns1[$i]] . '" style="padding-bottom:10px;" height="100" />';
                //$row[] = $aRow[$aColumns1[$i]] ? "Guest" : "Registered";
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'quizcategorytable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'image') {
                $row[] = '<img src="' . $fsitename . 'images/quiz/' . $aRow[$aColumns1[$i]] . '" style="padding-bottom:10px;" height="100" />';
                //$row[] = $aRow[$aColumns1[$i]] ? "Guest" : "Registered";
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'blogmanagementtable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'category') {
                $row[] = getblogcategory('title', $aRow[$aColumns1[$i]]);
                //$row[] = $aRow[$aColumns1[$i]] ? "Guest" : "Registered";
            } elseif ($aColumns1[$i] == 'image') {
                $row[] = '<img src="' . $fsitename . 'images/blogmanage/' . $aRow[$aColumns1[$i]] . '" style="padding-bottom:10px;" height="100" />';
                //$row[] = $aRow[$aColumns1[$i]] ? "Guest" : "Registered";
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'pujastable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'image') {
                $row[] = '<img src="' . $fsitename . 'images/pujas/' . $aRow[$aColumns1[$i]] . '" style="padding-bottom:10px;" height="100" />';
                //$row[] = $aRow[$aColumns1[$i]] ? "Guest" : "Registered";
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'blogcategorytable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'image') {
                $row[] = '<img src="' . $fsitename . 'images/blog/' . $aRow[$aColumns1[$i]] . '" style="padding-bottom:10px;" height="100" />';
                //$row[] = $aRow[$aColumns1[$i]] ? "Guest" : "Registered";
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'numerologytable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'image') {
                $row[] = '<img src="' . $fsitename . 'images/numerology/' . $aRow[$aColumns1[$i]] . '" style="padding-bottom:10px;" height="100" />';
                //$row[] = $aRow[$aColumns1[$i]] ? "Guest" : "Registered";
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'crystalstable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'image') {
                $row[] = '<img src="' . $fsitename . 'images/crystals/' . $aRow[$aColumns1[$i]] . '" style="padding-bottom:10px;" height="100" />';
                //$row[] = $aRow[$aColumns1[$i]] ? "Guest" : "Registered";
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'astrologytable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'image') {
                $row[] = '<img src="' . $fsitename . 'images/astrology/' . $aRow[$aColumns1[$i]] . '" style="padding-bottom:10px;" height="100" />';
                //$row[] = $aRow[$aColumns1[$i]] ? "Guest" : "Registered";
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'signstable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'image') {
                $row[] = '<img src="' . $fsitename . 'images/signs/' . $aRow[$aColumns1[$i]] . '" style="padding-bottom:10px;" height="100" />';
                //$row[] = $aRow[$aColumns1[$i]] ? "Guest" : "Registered";
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'gemstonestable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'image') {
                $row[] = '<img src="' . $fsitename . 'images/gemstones/' . $aRow[$aColumns1[$i]] . '" style="padding-bottom:10px;" height="100" />';
                //$row[] = $aRow[$aColumns1[$i]] ? "Guest" : "Registered";
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'homebannerstable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'image') {
                $row[] = '<img src="' . $sitename . 'images/homebanner/' . $aRow[$aColumns1[$i]] . '" style="padding-bottom:10px;" height="100" />';
                //$row[] = $aRow[$aColumns1[$i]] ? "Guest" : "Registered";
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'usertable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'socialmedia') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'faqtable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;

                //$row[] = $aRow[$aColumns1[$i]] ? "Guest" : "Registered";
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'brandtable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'testimonialtable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'currencytable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'storytable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'image') {
                $row[] = '<img src="' . $fsitename . 'images/story/' . $aRow[$aColumns1[$i]] . '" style="padding-bottom:10px;" height="100" />';
                //$row[] = $aRow[$aColumns1[$i]] ? "Guest" : "Registered";
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'astrologyservicestable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'image') {
                $row[] = '<img src="' . $fsitename . 'images/astrologys/' . $aRow[$aColumns1[$i]] . '" style="padding-bottom:10px;" height="100" />';
                //$row[] = $aRow[$aColumns1[$i]] ? "Guest" : "Registered";
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'productreviewtable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'productname') {
                $row[] = getproduct('productname', $aRow[$aColumns1[$i]]);
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'gallerytable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'newslettertable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'status') {
                
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'contacttable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'status') {
                
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'customertable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'Status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else if ($_REQUEST['types'] == 'quiztable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'category') {
                $row[] = getquizcategory('title', $aRow[$aColumns1[$i]]);
                //$row[] = $aRow[$aColumns1[$i]] ? "Guest" : "Registered";
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        } else {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'Status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
    }
    /* Edit page  change start here */

    if ($_REQUEST['types'] == 'producttable') {
        $row[] = "<i class='fa fa-edit' onclick='javascript:editthis(" . $aRow[$sIndexColumn] . ");' style='cursor:pointer;'></i>";
    } elseif (($_REQUEST['types'] != 'newslettertable') && ($_REQUEST['types'] != 'ordertable' && ($_REQUEST['types'] != 'customertable') && ($_REQUEST['types'] != 'contactustable'))) {
        $row[] = "<i class='fa fa-edit' onclick='javascript:editthis(" . $aRow[$sIndexColumn] . ");' style='cursor:pointer;'> Edit</i>";
    }
    if ($_REQUEST['types'] == 'ordertable') {
        $row[] = "<i class='fa fa-eye' onclick='javascript:editthis(" . $aRow[$sIndexColumn] . ");' style='cursor:pointer;'></i> ";
    } else if ($_REQUEST['types'] == 'customertable') {
        $row[] = "<i class='fa fa-eye' onclick='javascript:editthis(" . $aRow[$sIndexColumn] . ");' style='cursor:pointer;'></i>";
    } else if ($_REQUEST['types'] == 'contactustable') {
        $row[] = "<i class='fa fa-eye' onclick='javascript:editthis(" . $aRow[$sIndexColumn] . ");' style='cursor:pointer;'></i> Edit";
    }
    $row[] = '<input type="checkbox"  name="chk[]" id="chk[]" value="' . $aRow[$sIndexColumn] . '" />';



    $output['aaData'][] = $row;
    $ij++;
}



echo json_encode($output);
?>
 
