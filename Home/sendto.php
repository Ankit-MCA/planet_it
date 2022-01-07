<html>
  <body>

    <?php
 

	  	   if(isset($_GET['mobileno'])) 
		   {

//echo $_GET['name'];
//echo $_GET['message'];
//echo $_GET['mobileno'];
	$subject = "enquiry form";    
 $email_to = "devrajpspl@gmail.com";
  	$name = $_GET['name'];
    $mobileno =  $_GET['mobileno'];;
    $message = $_GET['message'];
    $tomail = $_GET['email'];

 $txt = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>



<body style="margin: 0; padding: 0;">
	<table align="center" cellpadding="0" cellspacing="0" width="900">
		<tr>
		    <td align="center" style="padding: 0px 0 0px;">
			<img src="http://planetwebit.com/images/planet.png" alt="Creating Email Magic"  style="display: block; width:564px" />
			</td>
		</tr>
		<tr>
		    <td bgcolor="#ffffff" style="padding: 40px 30px 0px 30px;">
				 <table cellpadding="0" cellspacing="0" width="100%" style="margin:auto;">
					<tr>
					   <td style="text-align: center; font-size: 20px;color:#4a4a4a;font-family:sans-serif;font-weight: 200;">
					   planetwebit.com<br>
					   </td>
					</tr>
				 </table>
			</td>
		</tr>

		<tr>
		    <td bgcolor="#ffffff" style="padding: 0px 30px 30px 30px;">
				<table cellpadding="0" cellspacing="0" width="65%" style="margin:auto;">
					<tr>
						<td align="center" style="padding: 10px 0 10px;">
						 <img src="http://legalinfo.in/LegalinfoDesign/img/partirentals_confirm_tick.png" alt="Creating Email Magic"  style="display: block; width:90px" />
						</td>
					</tr>
					<tr>
					    <td align="left" style="padding: 20px 6px 5px;color: #4a4a4a; line-height: 20px; font-size: 24px; font-family: sans-serif; font-weight: 600;">
					Name : '.$name.' <br/><br/> Mail : '.$tomail .' <br/><br/> MobileNo : '.$mobileno.'
					   </td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
		    <td bgcolor="#ffffff" style="padding: 0px 30px 30px 30px;">
				<table cellpadding="0" cellspacing="0" width="75%" style="margin:auto;">
					<tr>
					    <td style="padding: 5px 6px 15px;color: #9b9b9b; line-height: 20px; font-size: 18px; font-family: sans-serif; font-weight: 500; text-align: center;">
						Enquiry
					   </td>
					</tr>
					<tr>
					    <td align="center" style="padding: 20px 6px 5px;color: #4a4a4a; line-height: 20px; font-size: 24px; font-family: sans-serif; font-weight: 600;">
						 ('.$message.')
					   </td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
		    <td bgcolor="#ffffff" style="padding: 0px 30px 30px 30px;">
				<table cellpadding="0" cellspacing="0" width="75%" style="margin:auto;">
	              <tbody style="width: 700px;margin: 0 auto; position: relative; display: block;" class="main-content2">
	                <tr style="display: block;">
	                  <td valign="top" style="width: 400px;margin: 0 auto;text-align: center;display: block; font-weight:500;font-size:19px;color: #353434; padding-bottom:9px;">
	                    &nbsp;
	                  </td>
	                </tr>
	              </tbody>
	            </table>
			</td>
		</tr>
		<tr>
			<td>
				<table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
				    <tbody class="mcnDividerBlockOuter">
				        <tr>
				            <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 27px 18px 0px;">
				                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
				                    <tbody><tr>
				                        <td>
				                            <span></span>
				                        </td>
				                    </tr>
				                </tbody></table>
				            </td>
				        </tr>
				    </tbody>
				</table>
			</td>
		</tr>
		<tr>
		    <td style="padding:30px ;">
				<table  cellpadding="0" cellspacing="0" width="75%" style="margin:auto;">
					<tr>
						<td style="padding: 5px 6px 15px;color: #9b9b9b; line-height: 25px; font-size: 18px; font-family: sans-serif; font-weight: 500;">
						Questions? We are happy to help!<br>
						<a href="#" target="_blank"><span style="color:#0099ff">Contact Us </span></a><br>
						&nbsp;
					   </td>
					</tr>
					
				</table>
		    </td>
		</tr>
		<tr>
            <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
              	<!--[if mso]>
				<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
				<tr>
				<![endif]-->
			    
				<!--[if mso]>
				<td valign="top" width="600" style="width:600px;">
				<![endif]-->
                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td align="center" valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                        
                            <span style="color:#808080"><span style="font-size:18px">Connect with us :)</span></span>
                        </td>
                    </tr>
                </tbody></table>
				<!--[if mso]>
				</td>
				<![endif]-->
                
				<!--[if mso]>
				</tr>
				</table>
				<![endif]-->
            </td>
        </tr>
	</table>
</body>

</html>';
	

 $headers = "From: 	devraj<devrajpspl@gmail.com>\r\n"; 
$headers.= "MIME-Version: 1.0\r\n"; 
$headers.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$headers.= "X-Priority: 1\r\n"; 
@mail($email_to, $subject, $txt , $headers); 

//header('location:  http://planetwebit.com');
//header("Location: http://planetwebit.com/contact.html"); /* Redirect browser */
exit();
//exit;
//dev();
//echo "Success";
}
else
{echo "Failure";
}

?>

<script type="text/javascript">

function dev(){
    window.location = "http://www.google.com/";
}

</script>
  </body>
</html>