<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country = $_GET['country'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$city= $conn->query("SELECT cities.name, cities.district, cities.population FROM countries join cities on cities.country_code = countries.code WHERE countries.name LIKE '%$country'"); 

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$cities= $city->fetchAll(PDO::FETCH_ASSOC);

?>
<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Continent</th>
      <th>Independence</th>
      <th>Head of State</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($results as $row): ?>
    <tr>
      <td><?= $row['name']; ?></td>
      <td><?= $row['continent']; ?></td>
      <td><?= $row['independence_year']; ?></td>
      <td><?= $row['head_of_state']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
// if ($_SERVER['REQUEST_METHOD'] == 'GET') {
//   $country = filter_input(INPUT_GET, 'country', FILTER_SANITIZE_STRING);

  if($_GET['lookup'] == 'countries') {
    if(empty($country)) {
      foreach ($results as $result) {
        echo $result['name']; 
      }
    }
  }

  if($_GET['lookup']== "cities"){

        foreach ($cities as $row):
          echo "<table><tr><th>Name</th><th>District</th><th>Population</th></tr>";
        foreach($cities as $row):
          echo "<tr><td>".$row["name"]."</td><td>".$row["district"]."</td><td>".$row["population"]."</td></tr>";
        endforeach;
        echo "</table>";

  }
?>
