<?php
  $enlace = mysqli_connect("127.0.0.1", "realmaes_8n7n2t3", "TDAVbvuzuL#awckJ2gRD", "realmaes_h12b7fg7");
  mysqli_set_charset($enlace, 'utf8');
  date_default_timezone_set('America/Mexico_City');

  // ReCaptcha V2

  $captcha = $_POST["g-recaptcha-response"];

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
  	    //entrará aquí cuando todo sea correcto
      }
      else
      {
        //Google ha detectado que se trata de un proceso no humano
  	    header('Location: fail.html');
      }
  }
  else
  {
    header('Location: fail.html');
  }

  // End ReCaptcha V2

  if(isset($_POST['date-in']) && isset($_POST['date-out']) && isset($_POST['adults']) && isset($_POST['kids'])):

    $form = array(
      'date-in' => $_POST['date-in'],
      'date-out' => $_POST['date-out'],
      'adults' => intval($_POST['adults']),
      'kids' => intval($_POST['kids']),
      //'discount' => intval($_POST['promocode'])
    );

    $date_in = new DateTime($_POST['date-in']);
    $date_out = new DateTime($_POST['date-out']);
    $diff = $date_in->diff($date_out);
    $nights = $diff->days;
    $rooms = ($form['adults'] > 4) ? (ceil($form['adults'] / 4)) : 1;

    $taxes_charges = 0;

    $consulta = 'SELECT * FROM rooms WHERE availability > 0';

    # Mostrar la habitación doble y añadir cargos.
    if($form['adults'] > 2 || $form['kids'] > 2)
    {
      $consulta = "SELECT * FROM rooms WHERE availability > 0 AND room_id = 2";
    }

  endif;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Hotel en el centro de guadalajara, la mejor ubicacion en la ciudad">
    <meta name="keywords" content="Gudadalajara, Centro, zmg, barato, exclusivo, comodo, tranquilo">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Real Maestranza Hotel - Hotel en el centro de guadalajara</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- icon -->
    <link rel="apple-touch-icon" sizes="60x60" href="img/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="img/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin MOBIL-->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
        <div class="header-configure-area">
            <div class="language-option">
                <img src="img/flag-mx.png" alt="">
                <span>ES <i class="fa fa-angle-down"></i></span>
                <div class="flag-dropdown">
                    <ul>
                        <li><a href="#">EN</a></li>
                    </ul>
                </div>
            </div>
            <a href="https://api.whatsapp.com/send?phone=+5213330370522&text=Hola%20tengo%20inter%C3%A9s%20en%20reservar%20una%20habitaci%C3%B3n,%20me%20podr%C3%ADan%20dar%20m%C3%A1s%20informaci%C3%B3n?" class="bk-btn">Reserva <i class="fa fa-whatsapp"></i></a>
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li><a href="./index.html">Inicio</a></li>
                <li><a href="./rooms.html">Instalaciones</a>
                    <ul class="dropdown">
                        <li><a href="./rooms-mtz.html">Habitaciones</a></li>
                        <li><a href="./rooms-hall.html">Salones</a></li>
                        <li><a href="./rooms-restaurante.html">Restaurante/Bar</a></li>
                    </ul>
                </li>
                <li><a href="./about-us.html">Nosotros</a></li>
                <li><a href="./visitgdl.html">Visita Guadalajara</a></li>
                <li><a href="./contact.html">Contacto</a></li>
                <li><a href="./invoice.html">Facturación</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="top-social">
          <a href="https://www.facebook.com/realmaestranzahotel/" target="_blank"><i class="fa fa-facebook"></i></a>
          <a href="https://api.whatsapp.com/send?phone=+5213330370522&text=Hola%20tengo%20inter%C3%A9s%20en%20reservar%20una%20habitaci%C3%B3n,%20me%20podr%C3%ADan%20dar%20m%C3%A1s%20informaci%C3%B3n?" target="_blank">
            <i class="fa fa-whatsapp"></i></a>
          <a href="https://www.instagram.com/realmaestranzahotel/" target="_blank"><i class="fa fa-instagram"></i></a>
        </div>
        <ul class="top-widget">
            <li><i class="fa fa-phone"></i> (33) 3613 6101</li>
            <li><i class="fa fa-envelope"></i> reservaciones@realmaestranzahotel.com</li>
        </ul>
    </div>
    <!-- Offcanvas Menu Section End MOBIL-->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="tn-left">
                            <a href="tel:3331097801"><li><i class="fa fa-phone"></i> (33) 3613 6101</li></a>
                            <li><i class="fa fa-envelope"></i> reservaciones@realmaestranzahotel.com</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="tn-right">
                          <div class="top-social">
                            <a href="https://www.facebook.com/realmaestranzahotel/" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://api.whatsapp.com/send?phone=+5213330370522&text=Hola%20tengo%20inter%C3%A9s%20en%20reservar%20una%20habitaci%C3%B3n,%20me%20podr%C3%ADan%20dar%20m%C3%A1s%20informaci%C3%B3n?" target="_blank">
                              <i class="fa fa-whatsapp"></i></a>
                            <a href="https://www.instagram.com/realmaestranzahotel/" target="_blank"><i class="fa fa-instagram"></i></a>
                          </div>
                            <a href="https://api.whatsapp.com/send?phone=+5213330370522&text=Hola%20tengo%20inter%C3%A9s%20en%20reservar%20una%20habitaci%C3%B3n,%20me%20podr%C3%ADan%20dar%20m%C3%A1s%20informaci%C3%B3n?" class="bk-btn">Reserva Ahora <i class="fa fa-whatsapp"></i></a>
                            <div class="language-option">
                                <img src="img/flag-mx.png" alt="hotel-mexicano-lujoso">
                                <span>ES <i class="fa fa-angle-down"></i></span>
                                <div class="flag-dropdown">
                                    <ul>
                                        <li><a href="#">EN</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="img/Logo-maestranza-web.png" alt="real-maestranza-hotel-en-el-centro-de-guadalajara">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li><a href="./index.html">Inicio</a></li>
                                    <li><a href="./rooms.html">Instalaciones</a>
                                        <ul class="dropdown">
                                            <li><a href="./rooms-mtz.html">Habitaciones</a></li>
                                            <li><a href="./rooms-hall.html">Salones</a></li>
                                            <li><a href="./rooms-restaurante.html">Restaurante/Bar</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="./about-us.html">Nosotros</a></li>
                                    <li><a href="./visitgdl.html">Visita Guadalajara</a></li>
                                    <li><a href="./contact.html">Contacto</a></li>
                                    <li><a href="./invoice.html">Facturación</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Recomendado para <?=  $form['adults']; ?> adultos</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">

              <?php
              if ($resultado = mysqli_query($enlace, $consulta))
              {

                  while ($row = mysqli_fetch_assoc($resultado)): /* obtener array asociativo */

                  $price = $row['price']; // Precio por noche.
                  $additionals_guests = ($form['adults'] > 2 && $rooms < 2) ? $form['adults'] - 2 : 0; // Adultos adicionales
                  $nights = ($nights < 1) ? 1 : $nights;

                  $subtotal = (($price * $rooms) * $nights + ($additionals_guests * 200.00));
                  
                  $iva = 0.16;
                  $impuesto_municipal = 0.03;
                  $taxes = ( $subtotal * ($iva + $impuesto_municipal) );

                  $total = $subtotal + $taxes;

                  ?>

                  <div class="col-md-6">
                    <div class="room-item">
                        <img src="<?= $row['image_cover'] ?>" alt="">
                        <div class="ri-text">
                            <h4><?= $row['name'] ?></h4>
                            <p><span class="btn btn-info"><b>Noches:</b> <?= $nights; ?></span> <span class="btn btn-info"><b>Habitaciones:</b> <?= $rooms; ?></span></p>
                            <p><b>Check-in: </b><?= $form['date-in']; ?> / <b>Check-out: </b><?= $form['date-out']; ?></p>
                            <p><b>Ocupación: </b><?= $form['adults'].' Adulto(s), ' . $additionals_guests . ' Adulto(s) extra y '. $form['kids']; ?> Niño(s).</p>
                            <p><?= $row['description'] ?></p>
                            <p><b>Costo por adulto adicional:</b> MXN 200.00</p>
                            <p><b>Costo por noche(s): </b> MXN <?php echo number_format($row['price'], 2, '.', ','); ?></p>

                            <p class="h4">MXN <?php echo number_format($subtotal, 2, '.', ','); ?></p>
                            <p><small class="text-muted">+ MXN <?php echo number_format($taxes, 2, '.', ','); ?> de impuestos y cargos.</small></p>

                            <form action="finalreserva.php" method="post">
                              <input type="hidden" name="image_cover" value='<?= $row['image_cover'] ?>'>
                              <input type="hidden" name="name_room" value="<?= $row['name'] ?>">
                              <input type="hidden" name="price" value="<?php echo number_format($row['price'], 2, '.', ','); ?>">
                              <input type="hidden" name="nights" value="<?= $nights; ?>">
                              <input type="hidden" name="rooms" value="<?= $rooms; ?>">
                              <input type="hidden" name="date-in" value="<?= $form['date-in']; ?>">
                              <input type="hidden" name="date-out" value="<?= $form['date-out']; ?>">
                              <input type="hidden" name="adults" value="<?= $form['adults']; ?>">
                              <input type="hidden" name="kids" value="<?= $form['kids']; ?>">
                              <input type="hidden" name="additionals_guests" value="<?= $additionals_guests; ?>">
                              <input type="hidden" name="description" value='<?= $row['description'] ?>'>
                              <input type="hidden" name="subtotal" value="<?php echo number_format($subtotal, 2, '.', ','); ?>">
                              <input type="hidden" name="taxes" value="<?php echo number_format($taxes, 2, '.', ','); ?>">
                              <input type="hidden" name="total" value="<?php echo number_format($total, 2, '.', ','); ?>">

                              <a class="primary-btn" href="#" onclick="$(this).closest('form').submit();">Reservar ahora</a>

                            </form>
                        </div>
                    </div>
                  </div>

                  <?php
                  endwhile;

                  mysqli_free_result($resultado); /* liberar el conjunto de resultados */
              }

              /* cerrar la conexión */
              mysqli_close($link);
              ?>

              </div><!-- s -->
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ft-about">
                            <div class="logo">
                                <a href="#">
                                    <img src="img/footer-logo.png" alt="">
                                </a>
                            </div>
                            <!-- <p>We inspire and reach millions of travelers<br /> across 90 local websites</p> -->
                            <div class="fa-social">
                                <a href="https://www.facebook.com/realmaestranzahotel/" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="https://api.whatsapp.com/send?phone=+5213330370522&text=Hola%20tengo%20inter%C3%A9s%20en%20reservar%20una%20habitaci%C3%B3n,%20me%20podr%C3%ADan%20dar%20m%C3%A1s%20informaci%C3%B3n?" target="_blank">
                                  <i class="fa fa-whatsapp"></i></a>
                                <a href="https://www.instagram.com/realmaestranzahotel/" target="_blank"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-contact">
                            <h6>Contáctanos</h6>
                            <ul>
                                <li>(33) 3613 6101</li>
                                <li>reservaciones@realmaestranzahotel.com</li>
                                <li>Calle Francisco I Madero #161
                                  Zona Centro C.P. 44100 Gdl. Jal.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                      <div id="cont_6c94ab2ad96cbf66a1eec0f091e3534b">
                        <script type="text/javascript" async src="https://www.theweather.com/wid_loader/6c94ab2ad96cbf66a1eec0f091e3534b"></script>
                      </div>
                        <!-- <div class="ft-newslatter">
                            <h6>New latest</h6>
                            <p>Get the latest updates and offers.</p>
                            <form action="#" class="fn-form">
                                <input type="text" placeholder="Email">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <ul>
                          <li><a href="./contact.html">Contacto</a></li>
                          <li><a href="./terminos.html">Terminos de reserva</a></li>
                          <li><a href="./terminos.html">Privacidad</a></li>
                          <li><a href="./covid-19.html">COVID-19</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-5">
                        <div class="co-text"><p>
                          Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                          Powered by <a href="https://www.pcbtroniks.com/" target="_blank">PCBTRONIKS</a> and
                          <a href="http://polenavenue.com/" target="_blank">Polen Avenue.</a>
                        </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->


    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <script>
    $(document).ready(function(){
      $("a.submit").click(function(){
        document.getElementById("myForm").submit();
      });
    });
    </script>
  </body>

</html>
