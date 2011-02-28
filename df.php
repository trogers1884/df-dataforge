<?php
session_start();
include('system/streamwrapper.class.php');
include('system/df.class.php');

// Following code is for IMDT compatibility
// Moving to class based session handler

$_SESSION['pk_user'] = isset($_SESSION['pk_user'])?$_SESSION['pk_user']:0;
$_SESSION['netid'] = isset($_SESSION['netid'])?$_SESSION['netid']:'';
$_SESSION['cid_user'] = isset($_SESSION['cid_user'])?$_SESSION['cid_user']:0;
$_SESSION['xuid'] = isset($_SESSION['xuid'])?$_SESSION['xuid']:0;
$_SESSION['ipaddress'] = $_SERVER['REMOTE_ADDR'];

$frmOperation = isset($_REQUEST['frmOperation'])?$_REQUEST['frmOperation']:'';
$x = isset($_REQUEST['x'])?$_REQUEST['x']:0;
$y = isset($_REQUEST['y'])?$_REQUEST['y']:'';
$basepage = 'lst_application.php';

//print $df->web_root;

if($_SESSION['pk_user'] == 0){
	$logon_msg = "Please Logon to system";
	$pgtitle = 'ANESiT Logon Form';
	include('page_layout/001.html.v5.php');
	include('page_layout/100.head.php');
	include('page_layout/110.jquery.php');
	include('page_layout/120.fluid.php');
	include('ajax/logon.js');
	include('page_layout/199.head.php');
	include('fluid/tmpl.baselogon.php');
	include('page_layout/999.html.php');
}	else {
	if($x == 0){
		include('system/page.class.php');
		$ipage = new ipage(false,$df,$x);
		$pgtitle = 'ANESiT';
		include('page_layout/001.html.v5.php');
		include('page_layout/100.head.php');
		include('page_layout/110.jquery.php');
		include('page_layout/120.fluid.php');
		include('fluid/tmpl.baselist.php');
		include('page_layout/999.html.php');
	} 	else {
		include('system/page.class.php');
		$ipage = new ipage(false,$df,$x);
		$pgtitle = $ipage->apptitle;
		include('page_layout/001.html.v5.php');
		include('page_layout/100.head.php');
		include('page_layout/110.jquery.php');
		include('page_layout/120.fluid.php');
		print PHP_EOL.'<link rel="stylesheet" type="text/css" href="css/dfi.css" media="screen" />'.PHP_EOL;
		include('fluid/tmpl.basepage.php');
		include('page_layout/999.html.php');
	}	



}





?>