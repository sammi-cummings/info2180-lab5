<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

//Filtering and sanitizing input
$country = filter_input(INPUT_GET, 'country', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$country = $country ? trim('country') : '';

$stmt= $conn->prepare("SELECT * FROM countries WHERE name LIKE :country");
$stmt->execute(['country' => "%$country%"]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


//Outputs the country from the search input if not empty
echo '<table border= 1>;
        <thead>
           <tr>
              <th>Country Name</th>
              <th>Continent</th>
              <th>Independence Year</th>
              <th>Head of State</th>
           </tr>
        </thead>

        <tbody>';

if (count($results) > 0){
  echo '<tr>';
  foreach ($results as $row){
    echo '<td>'. htmlspecialchars($row['name']). '</td>
          <td>'. htmlspecialchars($row['continent']). '</td>
          <td>'. htmlspecialchars($row['independence_year']). '</td>
          <td>'. htmlspecialchars($row['head_of_state']). '</td>';
  }
  echo'</tr>';
}

else {
  echo '<h1>No Countries Found</h1>';
}

echo'</tbody>
</table>';
?>
