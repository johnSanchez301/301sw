<?php
/*
 * PLEASE USE THE TEMPLATE EDITOR INSIDE THE PLUGIN ADMINISTRATIVE PANEL, THIS FILE WILL BE SHORTLY DEPRECATED.
 * 
 * NEVER EDIT THIS FILE OR COPY IT SOMEWHERE ELSE!
 *
 * See the email-alternative.php to customized the confirmation and welcome
 * emails layout.
 *
 */

// Check for an alternative email builder.
if (is_file(WP_CONTENT_DIR . '/extensions/newsletter/subscription/email.php')) {
  include WP_CONTENT_DIR . '/extensions/newsletter/subscription/email.php';
  return;
}

?><!DOCTYPE html>
<html>
<head>
<title>mailing-301</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    a {
        color: #079ab7 !important;
        font-weight: lighter !important;
    }
    @media screen and (max-width:700px){
        table {
            width: 100% !important;
        }
        
        img{
            width: 100% !important;
            height: auto !important;
        }
        
        p {
            font-size: 1rem !important;
            line-height: 1.2rem !important;
        }
    }
    
</style>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- Save for Web Slices (mailing-301.psd) -->
<table id="Table_01" width="700" border="0" cellpadding="0" cellspacing="0" align="center">
	<tr style="font-size:0; margin:0; padding:0">
		<td colspan="9" style="font-size:0; margin:0; padding:0">
            <a href="http://www.301creativastudio.com/" style="display:block; border:none; font-size:0"><img src="http://www.301creativastudio.com/wp-content/plugins/newsletter/subscription/images/mailing-301_01.jpg" width="700" height="178" alt="" style="display:block; border:none"></a></td>
	</tr>
	<tr style="font-size:0; margin:0; padding:0">
		<td colspan="9" style="font-size:0; margin:0; padding:0">
        <div style="margin:20px 60px; font-family:helvetica, arial; font-size:17px; color:#3e3e3e; font-weight: lighter; letter-spacing:2px; text-align:left; line-height:1.5rem">
            <?php echo $message; ?>
        </div></td>
	</tr>
	<t style="font-size:0; margin:0; padding:0"r>
		<td colspan="9" style="font-size:0; margin:0; padding:0">
			<img src="http://www.301creativastudio.com/wp-content/plugins/newsletter/subscription/images/mailing-301_03.jpg" width="700" height="49" alt="" style="display:block; border:none"></td>
	</tr>
	<tr style="font-size:0; margin:0; padding:0">
		<td style="font-size:0; margin:0; padding:0">
			<img src="http://www.301creativastudio.com/wp-content/plugins/newsletter/subscription/images/mailing-301_04.jpg" width="493" height="24" alt="" style="display:block; border:none"></td>
		<td style="font-size:0; margin:0; padding:0">
			<a href="https://www.facebook.com/301CreativaStudio" style="display:block; border:none; font-size:0"><img src="http://www.301creativastudio.com/wp-content/plugins/newsletter/subscription/images/mailing-301_05.jpg" width="24" height="24" alt="" style="display:block; border:none"></a></td>
		<td style="font-size:0; margin:0; padding:0">
			<img src="http://www.301creativastudio.com/wp-content/plugins/newsletter/subscription/images/mailing-301_06.jpg" width="16" height="24" alt="" style="display:block; border:none"></td>
		<td style="font-size:0; margin:0; padding:0">
			<a href="https://www.instagram.com/301creativastudio/" style="display:block; border:none; font-size:0"><img src="http://www.301creativastudio.com/wp-content/plugins/newsletter/subscription/images/mailing-301_07.jpg" width="25" height="24" alt="" style="display:block; border:none"></a></td>
		<td style="font-size:0; margin:0; padding:0">
			<img src="http://www.301creativastudio.com/wp-content/plugins/newsletter/subscription/images/mailing-301_08.jpg" width="15" height="24" alt="" style="display:block; border:none"></td>
		<td style="font-size:0; margin:0; padding:0">
			<a href="https://twitter.com/301creativa" style="display:block; border:none; font-size:0"><img src="http://www.301creativastudio.com/wp-content/plugins/newsletter/subscription/images/mailing-301_09.jpg" width="23" height="24" alt="" style="display:block; border:none"></a></td>
		<td style="font-size:0; margin:0; padding:0">
			<img src="http://www.301creativastudio.com/wp-content/plugins/newsletter/subscription/images/mailing-301_10.jpg" width="18" height="24" alt="" style="display:block; border:none"></td>
		<td style="font-size:0; margin:0; padding:0">
			<a href="https://www.youtube.com/channel/UCpvvyuqzprintadjbt2Rwgg" style="display:block; border:none; font-size:0"><img src="http://www.301creativastudio.com/wp-content/plugins/newsletter/subscription/images/mailing-301_11.jpg" width="27" height="24" alt="" style="display:block; border:none"></a></td>
		<td style="font-size:0; margin:0; padding:0">
			<img src="http://www.301creativastudio.com/wp-content/plugins/newsletter/subscription/images/mailing-301_12.jpg" width="59" height="24" alt="" style="display:block; border:none"></td>
	</tr>
	<tr style="font-size:0; margin:0; padding:0">
		<td colspan="9" style="font-size:0; margin:0; padding:0">
			<img src="http://www.301creativastudio.com/wp-content/plugins/newsletter/subscription/images/mailing-301_13.jpg" width="700" height="171" alt="" style="display:block; border:none"></td>
	</tr>
</table>
<!-- End Save for Web Slices -->
</body>
</html>