<?php
  include('../../../../library/MySql.php');
  include('../../../../library/DataManipulation.php');
  include('../../../../library/Utils.php');

  $data = new DataManipulation();
  $util = new Utils();

  $sql = "SELECT * FROM sge_imagem";
  $imagem = $data->find('dynamic', $sql);

  $tempo = count($imagem)*8;
?>

<html lang="pt-BR">
  <head>
    <!-- head -->
    <meta charset="utf-8">
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
      Imagens
    </title>

    <!-- Stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,400italic,300italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../assets/css/docs.theme.min.css">

    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="../assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/owlcarousel/assets/owl.theme.default.min.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- javascript -->
    <script src="../assets/vendors/jquery.min.js"></script>
    <script src="../assets/owlcarousel/owl.carousel.js"></script>
  </head>
  <body>
    <!--  Demos -->
    <section id="demos">
      <div>
        <div class="large-12 columns">
          <div class="owl-carousel owl-theme" style="margin:0;">
            <?php
              for ($i=0; $i < count($imagem); $i++) { 
                echo '
                    
                      <img src="/sge/'.$imagem[$i]['img_caminho'].'" />
                    ';
              }
            ?>
          </div>
          <script>
            $(document).ready(function() {
              var owl = $(".owl-carousel");
              owl.owlCarousel({
                items: 1,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 8000,
                autoplayHoverPause: true
              });
              $(".play").on("click", function() {
                owl.trigger("play.owl.autoplay", [1000])
              })
              $(".stop").on("click", function() {
                owl.trigger("stop.owl.autoplay")
              })
            })
          </script>
        </div>
      </div>
    </section>
    <!-- vendors -->
    <script src="../assets/vendors/highlight.js"></script>
    <script src="../assets/js/app.js"></script>

    <meta http-equiv='Refresh' CONTENT='<?php echo $tempo; ?>;URL=http://sitecbr.com.br/sge/application/relatorios/view/graficos/relatoriotv.php'>
  </body>
</html>