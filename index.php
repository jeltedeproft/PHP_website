<html>
<head>
  <title>My first PHP Website</title>
</head>
<body>
  <?php
  require_once 'unirest-php-master/src/Unirest.php';

  echo "To expand my application, I have created this website. <br> It connects to the pokemon go API, collects stats from different pokemon , puts them in an sql database and displays them on the screen <br> The source code can be found on my github : <br> ";

  //step 1 : collect pokemon go info
  include "pokemonAPI.php";

  //step 2 : parse this response into separate arrays, for easier import into SQL
  include "parsePokemons.php";
  //print_r($response);

  //step 3 connect to database
  include "database.php";

  //step 4 inject information into database

  //step 5 diplay information on website
  ?>

  </body>
  </html>