<?php
class poll_settings {

	function __construct() {
		$this->load_settings();
	}
	
	function easy_poll_afo_options_save_settings(){
		if($_POST['option'] == "easy_poll_afo_options_save_settings"){
			update_option( 'poll_result_after_it_ends', $_POST['poll_result_after_it_ends'] );
		}
	}
	
	function  easy_poll_settings_afo_options () {
	global $wpdb;
	$poll_result_after_it_ends = get_option('poll_result_after_it_ends');
	$this->wp_easy_poll_pro_add();
	?>
	<form name="f" method="post" action="">
	<input type="hidden" name="option" value="easy_poll_afo_options_save_settings" />
	<table width="100%" border="0" style="background:#FFFFFF; border:1px solid #CCCCCC; width:98%; margin-top:10px;">
	  <tr>
		<td width="30%"><h1><?php _e('Poll Settings','epa');?></h1></td>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td valign="top"><strong><?php _e('View Poll Result After Poll Ends','epa');?></strong></td>
		<td><input type="checkbox" name="poll_result_after_it_ends" value="Yes" <?php echo $poll_result_after_it_ends == 'Yes'?'checked="checked"':'';?> /><p><?php _e('Check this so that users can view the poll results only after the poll ends.','epa');?></p></td>
	  </tr>
	  <tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="submit" value="Save" class="button button-primary button-large" /></td>
	  </tr>
	</table>
	</form>
	<?php }
	
	function wp_easy_poll_pro_add(){ ?>
	<table border="0" style="width:98%;background-color:#FFFFD2; border:1px solid #E6DB55; padding:0px 0px 0px 10px; margin:10px 0px 10px 0px;">
  <tr>
    <td><p>The <strong>PRO</strong> version of this plugin has additional features. <strong>1)</strong> Export/ Email voting results to your users. <strong>2)</strong> Let users create polls from front end. <strong>3)</strong> Choose color for the voting result bar as per your liking. Get it <a href="http://aviplugins.com/wp-easy-poll-pro/" target="_blank">here</a> in <strong>USD 2.00</strong> </p></td>
  </tr>
</table>
	<?php }
	
	
	
	function easy_poll_scripts() {
		wp_enqueue_script( 'jquery' );	  
		wp_enqueue_script( 'jquery-ui-timepicker-addon', plugins_url('jquery-ui-timepicker-addon.js', __FILE__), array('jquery-ui-core' ,'jquery-ui-datepicker', 'jquery-ui-slider') );
		wp_enqueue_script( 'easy-poll-js', plugins_url('easy-poll-js.js', __FILE__));
		wp_enqueue_style( 'jquery-ui', plugins_url('jquery-ui.css', __FILE__) );
	}

	function wp_easy_poll_text_domain(){
		load_plugin_textdomain('epa', FALSE, basename( dirname( __FILE__ ) ) .'/languages');
	}
	
	function easy_polls_afo_options(){
		$pc = new poll_class();
		$pc->display_list();
	}
	
	function easy_poll_afo_menu () {
		add_options_page( 'Easy Poll', 'Easy Poll Settings', 1, 'easy_poll_afo', array( $this,'easy_poll_settings_afo_options' ));
		add_menu_page( 'Polls', 'Polls', 'activate_plugins', 'easy_polls', array( $this,'easy_polls_afo_options' ) );	
	}
	
	function load_settings(){
		add_action( 'admin_menu' , array( $this, 'easy_poll_afo_menu' ) );
		add_action( 'admin_init', array( $this, 'easy_poll_afo_options_save_settings' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'easy_poll_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'easy_poll_scripts' ) );
		add_action( 'plugins_loaded',  array( $this, 'wp_easy_poll_text_domain' ) );
		register_activation_hook(__FILE__, array( $this, 'plug_install_easy_poll' ) );
	}

}
new poll_settings;