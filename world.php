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
if (count($results) > 0){
  echo '<ul>';
  foreach ($results as $row){
    echo '<li>';
    echo htmlspecialchars($row['name']) . ' is ruled by ' . htmlspecialchars($row['head_of_state']);
    echo '</li>';
  }
    echo'</ul>';
}

else{
  echo '<h1> No Countries Found</h1>';
}
?>
