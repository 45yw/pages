<?php
//PHP プリメアドステートメント ログイン
$server = "localhost";
$name = "root";
$pwd = "root";
$dbname = "nw_exp";

$input_user = (string)filter_input(INPUT_POST, 'user');
$input_password = (string)filter_input(INPUT_POST, 'password');

try{
  $pdo = new PDO($server, $name, $pwd)
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

  //nw_expデータベースもloginテーブルもuser, passwordフィールドも作ってない
  $stmt = $pdo->prepare("SELECT * FROM login WHERE user = ? AND pass = ?");
  $stmt->bindValue(1, $input_user);
  $stmt->bindValue(2, $input_password);
  $stmt->execute();

  if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo $row['user']."is login.";
  }else{
    echo "no user or no password.";
  }
}

catch(PDOException $e){
  echo "Connection failed.".$e->getMessage();
}
?>
