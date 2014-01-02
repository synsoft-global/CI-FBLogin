<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Facebook login</title>
	<script src="<?php echo base_url('js')?>/jquery-1.9.1.js"></script>
</head>
<body>
<div>
<div style="float:left;width:500px">	
<h4>Login Form </h4>
<?php echo validation_errors(); ?>
<?php echo form_open('login/index',array('class'=>'fblogin', 'id'=>'userlogin')); ?>
	<h5>Username</h5>
	<input type="text" name="username" value="" size="50" />

	<h5>Password</h5>
	<input type="password" name="password" value="" size="50" />

	<div><input type="submit" value="Submit" /></div>
<?php echo form_close(); ?>
</div>
<div style="margin-top:100px;float:right">
<a href="javascript:void(0)" id="fblogin" ><img src="<?php echo base_url('upload').'/signup_facebook_btn.png'?>"></a>	
</div>
</div>
<!--This code to be included in header portion of the website -->
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=576533559059741";//add appId here obtained from Facebook Devlop
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<!-- /////////////-->
<!--This code is to be added where facebook login button exits -->
<script type="text/javascript">
  window.fbAsyncInit = function() {
	FB.init({
	   appId:'<?php echo $this->config->item('appID'); ?>', cookie:true,
	   status:true, xfbml:true,oauth : true
	});
   };
   (function(d){
           var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
           if (d.getElementById(id)) {return;}
           js = d.createElement('script'); js.id = id; js.async = true;
           js.src = "//connect.facebook.net/en_US/all.js";
           ref.parentNode.insertBefore(js, ref);
        }(document));
		
$('#fblogin').click(function(e) {
    FB.login(function(response) {
		if(response.authResponse) {
          parent.location ='<?php echo site_url(); ?>/login/fbLogin';//get facebook response on this path
		}
	},{scope: 'email,read_stream,publish_stream,user_birthday,user_location,user_work_history,user_hometown,user_photos'});
	//define scope here(what to obtain from user's facebook profile)
});
</script>
<!-- /////////////-->
</html>