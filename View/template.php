<!DOCTYPE html>
<html>
<head>
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <title><?php echo $titre; ?></title>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width"/>
  <meta name="robots" content="noindex"/>
  <link rel="shortcut icon" type="image/x-icon" href="View/img/favicon.ico"/>
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <!-- Bootstrap css cdn -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
        integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel="stylesheet" href="View/css/style.css"/>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
          integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
          crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
          integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
          crossorigin="anonymous"></script>
  <!-- start cookies consent-->
  <link rel="stylesheet" type="text/css"
        href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css"/>
  <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
  <script>
    window.addEventListener("load", function () {
      window.cookieconsent.initialise({
        "palette": {
          "popup": {
            "background": "#237afc"
          },
          "button": {
            "background": "#fff",
            "text": "#237afc"
          }
        },
        "theme": "classic",
        "content": {
          "message": "Ce site utilise des cookies pour vous proposer la meilleure expérience.",
          "dismiss": "J'accepte",
          "link": "En savoir plus",
          "href": "http://www.anthonydelgado.fr/index.php?action=credits"
        }
      })
    });
  </script>
  <!-- end cookies consent-->
</head>
<body>
<!-- script google analytics -->
<script>
  (function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function () {
      (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
      m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
  })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

  ga('create', 'UA-40930967-1', 'anthonydelgado.fr');
  ga('send', 'pageview');

</script>
<!-- fin script google analytics -->
<?php include("menu.php"); ?>
<div class="corps container">
  <?php echo $contenu; ?>
</div>
<?php include("pied_de_page.php"); ?>
</body>
</html>
