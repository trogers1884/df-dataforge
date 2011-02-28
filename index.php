<?php
if(file_exists('system/df.class.php')){
	include('system/df.class.php');
	header( 'Location: http://'.$df->web_root.'/df.php') ;
}	else {
	print 'file does not exist';
}
?>
