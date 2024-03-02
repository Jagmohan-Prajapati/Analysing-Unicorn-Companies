<?php

require_once('db.php');
$search = $_POST['search'];
$query = "select * from unicorn_data where company == '%$search%'";
$result = mysqli_query($con, $query);

?>
<html>
<head>
  <style>
    body{
      background: #121;
    }
    h1{
      color: white;
      margin: 20px 800px;
    }
    table, th, td {
      text-align: center;
      color: white;
    }
    .color{
      color: #white;
    }
    th{
      padding: 7px;
      font-size: 25px;
    }
    td{
      font-size: 20px;
    }
  </style>
</head>
<body>
  <h1>Result from your search</h1>
  <table>
    <thead>
      <tr>
        <th class="color">Sno</th>
        <th class="color">Company</th>
        <th class="color">Date Joined</th>
        <th class="color">Industry</th>
        <th class="color">Country</th>
        <th class="color">Funding</th>
        <th class="color">Investers</th>
        <th class="color">Time_to_reach Uncorn Status</th>
        <th class="color">Current Valuation</th>
        <th class="color">Estimated Evaluation</th>
        <th class="color">Initial Evaluation</th>
      </tr>
    </thead>
    <tbody id="data">
      <?php
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
            echo "<tr>";
            echo "<td>".$row['Sno']."</td>";
            echo "<td>".$row['Company']."</td>";
            echo "<td>".$row['Date Joined']."</td>";
            echo "<td>".$row['Industry']."</td>";
            echo "<td>".$row['Country']."</td>";
            echo "<td>".$row['Funding']."</td>";
            echo "<td>".$row['Select Investors']."</td>";
            echo "<td>".$row['Time']."</td>";
            echo "<td>".$row['Valuation']."</td>";
            echo "</tr>";
          }else {
            echo "No results found.";
          }
        }
      ?>
    </tbody>
  </table>
</body>
</html>



