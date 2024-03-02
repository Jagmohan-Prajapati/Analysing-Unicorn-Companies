<?php

require_once('db.php');
$query = "select * from ex";
$result = mysqli_query($con, $query);

?>
<html>

<head>
  <style>
    body {
      font-family: "Anta", sans-serif;
      background: #121;
    }

    h1 {
      color: white;
      margin: 20px 800px;
    }

    /* table, th, td {
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
    } */

    table {
      /* text-align: center; */
      font-family: "Anta", sans-serif;
      margin: auto;
      width: 95%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    tr {
      background-color: whitesmoke;
    }

    tr:hover {
      transition: ease-in 0.2s;
      background-color: grey;

    }
  </style>
</head>

<body>
  <h1>Analyzed Data</h1>
  <table>
    <thead>
      <tr>
        <th >Sno</th>
        <th >Company</th>
        <th >Date Joined</th>
        <th >Industry</th>
        <!-- <th>City</th> -->
        <th >Country</th>
        <!-- <th>Continent</th> -->
        <!-- <th>Year Founded</th> -->
        <th >Funding</th>
        <th >Investers</th>
        <th >Time_to_reach Uncorn Status</th>
        <th >Current Valuation</th>
        <th >Estimated Evaluation</th>
        <th >Initial Evaluation</th>
      </tr>
    </thead>
    <tbody id="data">
      <?php
      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['Sno'] . "</td>";
          echo "<td>" . $row['Company'] . "</td>";
          echo "<td>" . $row['Date Joined'] . "</td>";
          echo "<td>" . $row['Industry'] . "</td>";
          echo "<td>" . $row['Country'] . "</td>";
          echo "<td>" . $row['Funding'] . "</td>";
          echo "<td>" . $row['Select Investors'] . "</td>";
          echo "<td>" . $row['Time'] . "</td>";
          echo "<td>" . $row['Valuation'] . "</td>";
          echo "<td>" . $row['Estimated Evaluation'] . "</td>";
          echo "<td>" . $row['Initial Evaluation'] . "</td>";
          echo "</tr>";
        }
      }
      ?>
    </tbody>
  </table>
</body>

</html>