<?php

$db_host='pdb39.awardspace.net';
$db_name='3107837_testphpdatabase';
$db_user='3107837_testphpdatabase';
$db_pass='deproft0511';

//CONNECTION
$mysqli_connection = new MySQLi($db_host, $db_user, $db_pass, $db_name);

//TEST ERROR
if ($mysqli_connection->connect_error) {
  echo "Could not connect to $db_user, error: " . $mysqli_connection->connect_error;
} else {
  //echo "Connected to $db_user! <hr> <br />";
}

$sql = "SELECT * FROM Pokemon"; //You don't need a ; like you do in SQL
$result = $mysqli_connection->query($sql);

echo "<div class='table100 ver3 m-b-110'>
  <div class='table100-head'>
    <table>
      <thead>
        <tr class='row100 head'>
          <th class='cell100 column1'>Attack</th>
          <th class='cell100 column2'>Defense</th>
          <th class='cell100 column3'>Stamina</th>
          <th class='cell100 column4'>Name</th>
          <th class='cell100 column5'>Id</th>
        </tr>
      </thead>
    </table>
  </div>

  <div class='table100-body js-pscroll'>
    <table>
      <tbody>";

while($row = $result->fetch_array (MYSQLI_NUM) ){   //Creates a loop to loop through results
  echo "<tr><td>"
  . $row['0'] . "</td><td>"
  . $row['1'] . "</td><td>"
  . $row['2'] . "</td><td>"
  . $row['3'] . "</td><td>"
  . $row['4'] .
  "</td></tr>" ;  //$row['index'] the index here is a field name
}

echo "</tbody>
</table>
</div>
</div>"; //Close the table in HTML


//CLOSE
$mysqli_connection->close();
//echo "<hr> mysqli_connection closed!";

?>
