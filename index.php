<html>
<head>
  <title>My first PHP Website</title>

  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!--===============================================================================================-->
  <style>
  body {
      background-color: #cccccc;
  }
  </style>
</head>


<body>
  <?php
  require_once 'unirest-php-master/src/Unirest.php';

  echo "To expand my application, I have created this website. <br>
  It connects to the pokemon go API, collects stats from different pokemon , puts them in an sql database and displays them on the screen <br>
  The source code can be found on my github : <a href= 'https://github.com/jeltedeproft/PHP_website'> My GitHub</a> <br> ";

  //initialize variables
  $attacks = [];
  $defenses = [];
  $staminas = [];
  $names = [];
  $ids = [];

  //step 1 : collect pokemon go info
  include "pokemonAPI.php";

  //step 2 : parse this response into separate arrays, for easier import into SQL
  include "parsePokemons.php";

  //step 3 connect to database and inject information
  include "database.php";

  //step 4 diplay information on website
  include "display.php";
  ?>



  <!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script>
  $('.js-pscroll').each(function(){
    var ps = new PerfectScrollbar(this);

    $(window).on('resize', function(){
      ps.update();
    })
  });


  </script>
  <!--===============================================================================================-->
  <script src="js/main.js"></script>

</body>
</html>
