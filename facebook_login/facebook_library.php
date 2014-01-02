<?php /*Facebook Integration in Codeignitor */ ?>
Step 1:
Create an App on the given url: https://developers.facebook.com/apps

After creating app we will get:
App ID: 	
App Secret:	

Step:2
Put the website url here :Website with Facebook Login  
<!--This will work as redirect url,after authorizing the user it will redirect to this url -->

Step:3
Facebook SDK can be downloaded from the given url: https://github.com/facebook/php-sdk/

Step:4
Get the facebook.php and base_facebook.php from src folder and put these files at this location: application/libraries
Rename facebook.php to Facebook.php according to CI nomenculture

Step:5
Create a config file in config folder :facebook.php
Define AppId and AppSecret here.



