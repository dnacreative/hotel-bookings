<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<?php //echo form_open($this->uri->uri_string()); ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
    <head>
	
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="content-style-type" content="text/css" />
        <meta http-equiv="content-script-type" content="text/javascript" />
        
        <title>Log in · Biniarroca Admin</title>
        
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/black.css" media="screen, projection, tv" />  
        <!--[if lte IE 7.0]><link rel="stylesheet" type="text/css" href="<?=base_url()?>css/ie.css" media="screen, projection, tv" /><![endif]-->
		<!--[if IE 8.0]>
			<style type="text/css">
				form.fields fieldset {margin-top: -10px;}
			</style>
		<![endif]-->
		
		<script type="text/javascript" src="<?=base_url()?>js/jquery-1.3.2.min.js"></script>
		<!-- Adding support for transparent PNGs in IE6: -->
		<!--[if lte IE 6]>
			<script type="text/javascript" src="<?=base_url()?>js/ddpng.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('h3 img');
			</script>
		<![endif]-->
		
    </head>
    <body id="loginn">

		<div class="box box-50 altbox">
			<div class="boxin">
				<div class="header">
					<h3><img src="<?=base_url()?>css/img/black/logo.png" alt="Boxie Admin" /></h3>
					<ul>
						<li><a href="#" class="active">login</a></li><!-- .active for active tab -->
						
					</ul>
				</div>
				<div class="inner-form">

					<form action="<?=base_url()?>index.php/auth/login" method="post" accept-charset="utf-8">
						<div class="msg msg-info">
							<p>Please enter your <strong>Log in</strong> details.</p>
						</div>
						<table cellspacing="0">
							<tr>
								<th><label for="some1">Username:</label></th>
								<td><input class="txt" type="text" id="login" name="login"></td>
							</tr>
							<tr>
								<th><label for="some3">Password:</label></th>
								<td><input class="txt pwd" type="password" id="password" name="password" /></td><!-- class error for wrong filled inputs -->
							</tr>
							<tr>
								<th></th>
								<td class="tr proceed">
									<input class="button" type="submit" value="Log in" />
								</td>
							</tr>
						</table>

					</form>
					</div>
				
			</div>
		</div>

    </body>
</html>