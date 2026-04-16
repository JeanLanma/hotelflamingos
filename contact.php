<?php

	/* ==========================  Define variables ========================== */

	#Your e-mail address
	define("__TO__", "oscarnoe.dev@gmail.com");

	#Message subject
	define("__SUBJECT__", "Mensaje web");

	#Success message
	define('__SUCCESS_MESSAGE__', "Su mensaje fue enviado, Gracias!");

	#Error message
	define('__ERROR_MESSAGE__', "Error, tu mensaje no pudo enviarse :(");

	#Messege when one or more fields are empty
	define('__MESSAGE_EMPTY_FILDS__', "Porfavor llena todos los campos.");

	/* ========================  End Define variables ======================== */

	//Send mail function
	function send_mail($to,$subject,$message,$headers){
		if(@mail($to,$subject,$message,$headers)){
			// echo json_encode(array('info' => 'success', 'msg' => __SUCCESS_MESSAGE__));
      header('Location: http://hospedajeflamingos.com/success.php');
		} else {
			// echo json_encode(array('info' => 'error', 'msg' => __ERROR_MESSAGE__));
      header('Location: http://hospedajeflamingos.com/fail.html');
		}
	}



	//Get post data
	if(isset($_POST['name']) and isset($_POST['email'])){
		$name 	 = $_POST['name'];
		$email  = $_POST['email'];
		$text  = $_POST['text'];

		if($name == '') {
			echo json_encode(array('info' => 'error', 'msg' => "Porfavor introduzca su nombre correctamente."));
			exit();

		} else if($email == ''){
			echo json_encode(array('info' => 'error', 'msg' => "Porfavor introduzca un correo valido."));
			exit();
		} else {
			//Send Mail
			$to = __TO__;
			$subject = __SUBJECT__;
			$message = '
			<html>
			<head>
			  <title>Mail from '. $name .'</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <style type="text/css">
            /* CLIENT-SPECIFIC STYLES */
            #outlook a{padding:0;} /* Force Outlook to provide a "view in browser" message */
            .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */
            .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing */
            body, table, td, a{-webkit-text-size-adjust:100%; -ms-text-size-adjust:100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
            table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;} /* Remove spacing between tables in Outlook 2007 and up */
            img{-ms-interpolation-mode:bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

            /* RESET STYLES */
            body{margin:0; padding:0;}
            img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}
            table{border-collapse:collapse !important;}
            body{height:100% !important; margin:0; padding:0; width:100% !important;}

            /* iOS BLUE LINKS */
            .appleBody a {color:#68440a; text-decoration: none;}
            .appleFooter a {color:#999999; text-decoration: none;}

            /* MOBILE STYLES */
            @media screen and (max-width: 525px) {

                /* ALLOWS FOR FLUID TABLES */
                table[class="wrapper"]{
                  width:100% !important;
                }

                /* ADJUSTS LAYOUT OF LOGO IMAGE */
                td[class="logo"]{
                  text-align: left;
                  padding: 20px 0 20px 0 !important;
                }

                td[class="logo"] img{
                  margin:0 auto!important;
                }

                /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
                td[class="mobile-hide"]{
                  display:none;}

                img[class="mobile-hide"]{
                  display: none !important;
                }

                img[class="img-max"]{
                  max-width: 100% !important;
                  height:auto !important;
                }

                /* FULL-WIDTH TABLES */
                table[class="responsive-table"]{
                  width:100%!important;
                }

                /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
                td[class="padding"]{
                  padding: 10px 5% 15px 5% !important;
                }

                td[class="padding-copy"]{
                  padding: 10px 5% 10px 5% !important;
                  text-align: center;
                }

                td[class="padding-meta"]{
                  padding: 30px 5% 0px 5% !important;
                  text-align: center;
                }

                td[class="no-pad"]{
                  padding: 0 0 20px 0 !important;
                }

                td[class="no-padding"]{
                  padding: 0 !important;
                }

                td[class="section-padding"]{
                  padding: 50px 15px 50px 15px !important;
                }

                td[class="section-padding-bottom-image"]{
                  padding: 50px 15px 0 15px !important;
                }

                /* ADJUST BUTTONS ON MOBILE */
                td[class="mobile-wrapper"]{
                    padding: 10px 5% 15px 5% !important;
                }

                table[class="mobile-button-container"]{
                    margin:0 auto;
                    width:100% !important;
                }

                a[class="mobile-button"]{
                    width:80% !important;
                    padding: 15px !important;
                    border: 0 !important;
                    font-size: 16px !important;
                }

            }
        </style>
        </head>
        <body style="margin: 0; padding: 0;">

        <!-- HEADER -->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
            <tr>
                <td bgcolor="#ffffff">
                    <div align="center" style="padding: 0px 15px 0px 15px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="500" class="wrapper">
                            <!-- LOGO/PREHEADER TEXT -->
                            <tr>
                                <td style="padding: 20px 0px 30px 0px;" class="logo">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td bgcolor="#ffffff" width="100" align="left"><a href="http://hospedajeflamingos.com/" target="_blank"><img alt="Logo" src="https://i.imgur.com/BAmWsn9.png" width="50" height="78" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #666666; font-size: 16px;" border="0"></a></td>
                                            <td bgcolor="#ffffff" width="400" align="right" class="mobile-hide">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td align="right" style="padding: 0 0 5px 0; font-size: 14px; font-family: Arial, sans-serif; color: #666666; text-decoration: none;"><span style="color: #666666; text-decoration: none;">Hotel Flamingos<br>www.hospedajeflamingos.com</span></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>

        <!-- ONE COLUMN SECTION -->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
            <tr>
                <td bgcolor="#ffffff" align="center" style="padding: 70px 15px 70px 15px;" class="section-padding">
                    <table border="0" cellpadding="0" cellspacing="0" width="500" class="responsive-table">
                        <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td>
                                            <!-- HERO IMAGE -->
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                     <tr>
                                                          <td class="padding-copy">
                                                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                  <tr>
                                                                      <td>
                                                                          <a href="http://alistapart.com/article/can-email-be-responsive/" target="_blank"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/48935/responsive-email.jpg" width="500" height="200" border="0" alt="Can an email really be responsive?" style="display: block; padding: 0; color: #666666; text-decoration: none; font-family: Helvetica, arial, sans-serif; font-size: 16px; width: 500px; height: 200px;" class="img-max"></a>
                                                                      </td>
                                                                    </tr>
                                                                </table>
                                                          </td>
                                                      </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!-- COPY -->
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td align="center" style="font-size: 25px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;" class="padding-copy">Tienes una reservacion pendiente!</td>
                                                </tr>
                                                <tr>
                                                    <td align="center" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">Es importante que te comuniques con el cliente para lograr las metas establecidas, suerte.</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!-- BULLETPROOF BUTTON -->
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">

                                                <tr style="height: 32px;">
                                                  <th align="center" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Nombre:</th>
                                                  <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $name .'</td>
                                                </tr>
                                                <tr style="height: 32px;">
                                                  <th align="center" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Email:</th>
                                                  <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $email .'</td>
                                                </tr>
                                                <tr style="height: 32px;">
                                                  <th align="center" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Mensaje:</th>
                                                  <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $text .'</td>
                                                </tr>

                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>




        <!-- FOOTER -->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
            <tr>
                <td bgcolor="#ffffff" align="center">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                        <tr>
                            <td style="padding: 20px 0px 20px 0px;">
                                <!-- UNSUBSCRIBE COPY -->
                                <table width="500" border="0" cellspacing="0" cellpadding="0" align="center" class="responsive-table">
                                    <tr>
                                        <td align="center" valign="middle" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;">
                                            <span class="appleFooter" style="color:#666666;">Calle Francisco I Madero #161 Zona Centro C.P. 44100 Gdl. Jal.</span><br><a class="original-only" style="color: #666666; text-decoration: none;">Privacidad</a><span class="original-only" style="font-family: Arial, sans-serif; font-size: 12px; color: #444444;">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span><a style="color: #666666; text-decoration: none;">Este mail es de caracter confidencial</a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        </body>
        </html>
			';

			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

			send_mail($to,$subject,$message,$headers);
		}
	} else {
		echo json_encode(array('info' => 'error', 'msg' => __MESSAGE_EMPTY_FILDS__));
	}
 ?>
