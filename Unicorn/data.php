<?php

require_once('db.php');
$query="select * from unicorn_data";
$result=mysqli_query($con,$query);

?>
<html>
<head>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');
    body{
      background: #121;
      
    }
    h1{
      margin: 50px 800px;
      color: white;
      font-family: 'Ubuntu', sans-serif;
    }
    /* table, th, td {
      text-align: center;
      color: white;
      /* font-family: 'Ubuntu', sans-serif; */
    }
    /* th{
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
      width: 80 %;
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
      font-family: "Anta", sans-serif;

      background-color: #f2f2f2;
    }

    tr {
      font-family: "Anta", sans-serif;

      background-color: whitesmoke;
    }

    tr:hover {
      transition: ease-in 0.2s;
      background-color: grey;

    }
  </style>
</head>
<body>
  <h1>Unicorn Data</h1>
  <table>
    <thead>
      <tr>
        <th>Sno</th>
        <th>Company</th>
        <th>Valuation</th>
        <th>Date Joined</th>
        <th>Industry</th>
        <th>City</th>
        <th>Country</th>
        <th>Continent</th>
        <th>Year Founded</th>
        <th>Funding</th>
        <th>Investers</th>
      </tr>
    </thead>
    <tbody id="data">
      <?php
        if ($result) {
          while($row=mysqli_fetch_assoc($result))
          {
            echo "<tr>";
            echo "<td>".$row['Sno']."</td>";
            echo "<td>".$row['Company']."</td>";
            echo "<td>".$row['Valuation']."</td>";
            echo "<td>".$row['Date Joined']."</td>";
            echo "<td>".$row['Industry']."</td>";
            echo "<td>".$row['City']."</td>";
            echo "<td>".$row['Country']."</td>";
            echo "<td>".$row['Continent']."</td>";
            echo "<td>".$row['Year Founded']."</td>";
            echo "<td>".$row['Funding']."</td>";
            echo "<td>".$row['Select Investors']."</td>";
            echo "</tr>";
          }
        }
      ?>
    </tbody>
  </table>
</body>
</html>



