<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

function validarCaptcha($captcha = '')
{
  if(!empty($captcha))
  {
      $secretKey = "6LdjJbEZAAAAAOIq4cq_5Vl6Ym06rRlknG1CYI_e";
      $ip = $_SERVER['REMOTE_ADDR'];
      $ch = curl_init();

      curl_setopt_array($ch, [
          CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
          CURLOPT_POST => true,
          CURLOPT_POSTFIELDS => [
              'secret' => $secretKey,
              'response' => $captcha,
              'remoteip' => $ip
          ],
          CURLOPT_RETURNTRANSFER => true
      ]);

      $output = curl_exec($ch);
      curl_close($ch);

      //Si queremos visualizar la información obtenida de la petición a la api de validación de Google para comprobar el estado de esta lo haremos con la función de PHP var_dump
      //var_dump($output);

      $jsonResponde = json_decode($output);

      if($jsonResponde->success)
      {
        return true;
      }
      else
      {
  	    return false;
      }
  }
  else
  {
    return false;
  }
}

if(validarCaptcha($_POST["g-recaptcha-response"]))
{
  $folio = uniqid();
  $responsible_name	= $_POST['namefs'];
  $datein	    = $_POST['datein'];
  $dateout		= $_POST['dateout'];
  $rfc	      = $_POST['rfc'];
  $pay				= $_POST['pay'];
  $cash		    = $_POST['cash'];
  $payform		= $_POST['payform'];
  $namesocial	= $_POST['namesocial'];
  $home	      = $_POST['home'];
  $homeint		= $_POST['homeint'];
  $homeext		= $_POST['homeext'];
  $colony			= $_POST['colony'];
  $postalcode	= $_POST['postalcode'];
  $state			= $_POST['state'];
  $responsible_email = $_POST['email'];
  $telephone	= $_POST['telephone'];
  $cfdi				= $_POST['cfdi'];


  $asunto = 'Solicitud de Facturación #' . $folio . ' - Real Maestranza Web';
  $asunto2 = '🛄 ¡Gracias! Tu factura sera procesada';
  $html =
  '
  <html>
  <head>
    <title>'.$asunto.'</title>
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
                        <td bgcolor="#ffffff" width="100" align="left"><a href="http://realmaestranzahotel.com/" target="_blank"><img alt="Logo" src="https://i.imgur.com/BAmWsn9.png" width="50" height="78" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #666666; font-size: 16px;" border="0"></a></td>
                        <td bgcolor="#ffffff" width="400" align="right" class="mobile-hide">
                          <table border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="right" style="padding: 0 0 5px 0; font-size: 14px; font-family: Arial, sans-serif; color: #666666; text-decoration: none;"><span style="color: #666666; text-decoration: none;">Real Maestranza Hotel<br>www.realmaestranzahotel.com</span></td>
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
                            <td align="center" style="font-size: 25px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;" class="padding-copy">¡Tienes una reservacion pendiente!</td>
                          </tr>
                          <tr>
                            <td align="center" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">Es importante que te comuniques con el cliente para lograr las metas establecidas, suerte.</td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <!-- COPY -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="center" style="font-size: 25px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;" class="padding-copy">Responsable de la Reservación</td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <!-- BULLETPROOF BUTTON -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">

                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">A Nombre de:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['namefs'] .'</td>
                          </tr>

                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Llegada:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['datein'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Salida:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['dateout'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">RFC:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['rfc'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Método de pago:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['pay'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Monto a facturar:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['cash'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Forma de pago:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['payform'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Razón Social:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['namesocial'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Domicilio:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['home'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Interior:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['homeint'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Exterior:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['homeext'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Colonia:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['colony'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Codigo postal:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['postalcode'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Estado:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['state'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Email:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $responsible_email .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Telefono:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['telephone'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">CFDI:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['cfdi'] .'</td>
                          </tr>
                        </table>
                      </td>
                    </tr>

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

  $html2 =
  '
  <html>
  <head>
    <title>'. $asunto2 .'</title>
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
                        <td bgcolor="#ffffff" width="100" align="left"><a href="http://realmaestranzahotel.com/" target="_blank"><img alt="Logo" src="https://i.imgur.com/BAmWsn9.png" width="50" height="78" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #666666; font-size: 16px;" border="0"></a></td>
                        <td bgcolor="#ffffff" width="400" align="right" class="mobile-hide">
                          <table border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="right" style="padding: 0 0 5px 0; font-size: 14px; font-family: Arial, sans-serif; color: #666666; text-decoration: none;"><span style="color: #666666; text-decoration: none;">Real Maestranza Hotel<br>www.realmaestranzahotel.com</span></td>
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
                                    <td align="center">
                                      <a href="https://realmaestranzahotel.com/" target="_blank"><img src="https://i.imgur.com/YBdyDGJ.png" width="200" height="200" border="0" alt="Can an email really be responsive?" style="display: block; padding: 0; color: #666666; text-decoration: none; font-family: Helvetica, arial, sans-serif; font-size: 16px; width: 200px; height: 200px;" class="img-max"></a>
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
                            <td align="center" style="font-size: 25px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;" class="padding-copy">¡Gracias, '.$responsible_name.'!</td>
                          </tr>
                          <tr>
                            <td align="center" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;" class="padding-copy">Hemos recibido tu solicitud de facturación.</td>
                          </tr>
                        </table>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <!-- BULLETPROOF BUTTON -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">

                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">A Nombre:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['namefs'] .'</td>
                          </tr>

                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Llegada:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['datein'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Salida:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['dateout'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">RFC:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['rfc'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Método de pago:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['pay'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Monto a facturar:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['cash'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Forma de pago:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['payform'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Razón Social:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['namesocial'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Domicilio:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['home'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Interior:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['homeint'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Exterior:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['homeext'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Colonia:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['colony'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Codigo postal:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['postalcode'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Estado:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['state'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Email:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $responsible_email .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">Telefono:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['telephone'] .'</td>
                          </tr>
                          <tr style="height: 32px;">
                            <th align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;">CFDI:</th>
                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;">'. $_POST['cfdi'] .'</td>
                          </tr>
                        </table>
                      </td>
                    </tr>

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

  try {
      //Server settings
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
      $mail->isSMTP();
      $mail->Host       = 'mail.realmaestranzahotel.com';
      $mail->SMTPAuth   = true;
      $mail->Username   = 'web@realmaestranzahotel.com';
      $mail->Password   = 'jfE]GF*k]m([I;r@tU';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
      $mail->Port       = 465;

      # ENVIAR CORREO ELECTRÓNICO A RECEPCIÓN.

      $mail->setFrom('web@realmaestranzahotel.com', 'Real Maestranza Web'); // Establecer desde quién se enviará el mensaje
      $mail->addAddress('reservaciones@realmaestranzahotel.com');     // Establecer a quién se enviará el mensaje
      $mail->addReplyTo($responsible_email, $responsible_name); // Establecer una dirección alternativa de respuesta

      // Content
      $mail->isHTML(true);
      $mail->CharSet = 'UTF-8';
      $mail->Subject = $asunto;
      $mail->Body    = $html;

      $mail->send();

      # ENVIAR CORREO ELECTRÓNICO DE CONFIRMACIÓN AL CLIENTE.

      $mail->setFrom('web@realmaestranzahotel.com', 'Real Maestranza Web'); // Establecer desde quién se enviará el mensaje
      $mail->addAddress($responsible_email, $responsible_name);     // Establecer a quién se enviará el mensaje
      //$mail->addReplyTo('realmaestranza@pcbtroniks.com', 'Real Maestranza Web');

      // Content
      $mail->isHTML(true);
      $mail->CharSet = 'UTF-8';
      $mail->Subject = $asunto2;
      $mail->Body    = $html2;

      $mail->send();

      header("Location: ../success.php?folio=$folio");
  } catch (Exception $e) {
      header('Location: ../fail.html');
  }
}
else
{
  header('Location: ../fail.html'); // No se cumplio el captcha.
}
