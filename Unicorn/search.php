<style>
  body {
    background: #121;
  }

  h1 {
    text-transform: capitalize;
    text-align: center;
    margin-bottom: 40px;
    margin-top: 120px;
    font-family: "Anta", sans-serif;
    color: white;

  }

  table {
    /* text-align: center; */
    font-family: "Anta", sans-serif;
    margin: auto;
    width: 60%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  th,
  td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
    color: white;
  }

  th {
    background-color: black;
  }

  tr:hover {
    background-color: #f5f5f5;
  }
</style>

<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  // include("connect.php");
  require_once('db.php');
  $search = $_POST['search'];
  $query = "select * from unicorn_data where company like '%$search%'";
  $result = mysqli_query($con, $query);

  if ($result) {
    if (mysqli_num_rows($result) > 0) {
      echo "<table>";
      echo "<tr>
      <th >Company</th>
      <th >Date Joined</th>
      <th >Industry</th>
      <th >Country</th>
      <th >Funding</th>
      <th >Investers</th>
      <th >Current Valuation</th></tr>";
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<h1>$search Details</h1> ";
        echo "<tr>";
        echo "<td>" . $row['Company'] . "</td>";
        echo "<td>" . $row['Date Joined'] . "</td>";
        echo "<td>" . $row['Industry'] . "</td>";
        echo "<td>" . $row['Country'] . "</td>";
        echo "<td>" . $row['Funding'] . "</td>";
        echo "<td>" . $row['Select Investors'] . "</td>";
        echo "<td>" . $row['Valuation'] . "</td>";
        echo "</tr>";
      }
      echo "</table>";
    } else {
      echo "No results found.";
    }
  }
}
?>