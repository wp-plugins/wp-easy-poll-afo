<?php
class message_class {
	function add_message($msg,$class = 'updated'){
		$_SESSION['msg'] = $msg;
		$_SESSION['msg_class'] = $class;
	}
	function view_message(){
		if(isset($_SESSION['msg']) and $_SESSION['msg']){
			echo '<div class="'.$_SESSION['msg_class'].'"><p>'.$_SESSION['msg'].'</p></div>';
			unset($_SESSION['msg']);
			unset($_SESSION['msg_class']);
		}
	}
}
?>