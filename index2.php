<?php
  require 'includes/databaseinfo.php';

  session_start();

  $dbName = $_SESSION["dbName"];
  $conn = mysqli_connect($servername, $username, $password, $dbName);
  // $result = mysqli_query($conn,$sql);
  $record_per_page = 25;
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }
  else {
    $page = 1;
  }
  $offset = ($page-1)*$record_per_page;
  $sql = "SELECT * FROM csv LIMIT $offset, $record_per_page";
  $result = mysqli_query($conn, $sql);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
      table{
        border-collapse: collapse;
      }
      a{
        text-decoration:none;
      }

    </style>
  </head>
  <body>
    <div align="center">
      <table border="2">
        <thead>
          <tr>
            <th>Client</th>
            <th>deal</th>
            <th>hour</th>
            <th>accepted</th>
            <th>refused</th>
          </tr>
        </thead>

        <tbody>
          <?php
          while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
              <td><?php echo $row["client"]; ?></td>
              <td><?php echo $row["deal"]; ?></td>
              <td><?php echo $row["hour"]; ?></td>
              <td><?php echo $row["accepted"]; ?></td>
              <td><?php echo $row["refused"]; ?></td>
            </tr>
            <?php
          };
          ?>
        </tbody>
      </table>
      <?php
      $sql = "SELECT COUNT(*) FROM csv";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_row($result);
      $total_records = $row[0];

      echo "<br>";

      $total_pages = ceil($total_records/$record_per_page);
      if($page>=2){
        echo "<a href='index2.php?&page=".($page-1)."'> < </a>";
      }
        echo "---";
      if ($page<$total_pages) {
        echo "<a href='index2.php?&page=".($page+1)."'> > </a>";
      }

      ?>
      <form  action="includes/deleter.php" method="post">
        <button type="submit" name="reset">Reset all</button>
      </form>

    </div>
  </body>
</html>
