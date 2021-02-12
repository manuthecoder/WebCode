<?php
$available_id = null;
$servername = "OMMITED";
$username = "OMMITED";
$password = "OMMITED";
$dbname = "OMMITED";
$id = $_GET['id'];
try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = "SELECT MAX(id) FROM products";
    $users = $dbh->query($sql);
    foreach ($users as $row) {
        $available_id = $row['MAX(id)'] + 1;
        //echo "document.querySelector('.CodeMirror').CodeMirror.setValue(".json_encode($row['qty']).")";
    }
    $dbh = null;
}
 catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$servername = "sql104.epizy.com";
$username = "epiz_27081301";
$password = "oGM667NEMc";
$dbname = "epiz_27081301_WEB_CODE_IDE_DO_NOT_DELETE_THIS_EVER_IN_YOUR_LIFE";
$name = str_replace('\'', '\\\'',$_POST['name']);
$qty = str_replace('\'', '\\\'',$_POST['html']);
$price = str_replace('\'', '\\\'',$_POST['css']);
$javascript = str_replace('\'', '\\\'', preg_replace('/\\\\/','\\\\\\\\', $_POST['js']));
$loginId = $_SESSION['id'];
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO products(name, qty, price, login_id, javascript) 
  VALUES('$name','$qty','$price', '$loginId', '$javascript')";
  // use exec() because no results are returned
  $conn->exec($sql);
  header("Location: index.php?id=".$available_id."&new");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
