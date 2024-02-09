<?php

// Smarty 設定をセットアップするために Smarty 構成ファイルをインクルードします。
require_once '../config/smarty.config.php';

//データベース接続設定(Database connection settings)
$host = 'localhost';     // PostgreSQL server host
$port = '5432';          // PostgreSQL port (default is 5432)
$dbname = 'address';  // PostgreSQL database name
$user = 'postgres';      // PostgreSQL username
$password = 'phwaythitsarkyaw';  // PostgreSQL password

session_start();

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");


// 接続が成功したかどうかを確認する
if (!$conn) {
    echo "Error: Unable to connect to PostgreSQL database.\n";
    exit;
}

    //半角文字を全角文字に変換する
    function convertHalfWidthToFullWidthCharacters($input) {
    return mb_convert_kana($input, "KV");
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
   
    // データベースのユーザーテーブルにデータを挿入します。(Insert the data into the database user table)

    $sql = "INSERT INTO users (user_name,gender,postal1,postal2,prefecture,municipalities,branch,date_of_birth,remark,photo_path,created_at,updated_at)
            VALUES($1,$2,$3,$4,$5,$6,$7,$8,$9,$10,NOW(),NOW())";

     //pg_prepareを使用してSQL文を準備します。
     $stmt = pg_prepare($conn, "insert_user", $sql);

     //フォームからデータを取得する(Retrieve data from the form)
     $name = $_POST['user_name'];
     $gender = $_POST['gender'];
     $postal1 = $_POST['postal1'];
     $postal2 = $_POST['postal2'];
     $prefecture = $_POST['prefecture'];
     $municipalities = $_POST['municipalities'];
     $branch = $_POST['branch'];
     $birthday = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];
     $remark = $_POST['remark'];
     $image = $_SESSION['photo'];

    // 名前、市区町村、支店に文字変換機能を適用(Apply the character conversion function to name, municipalities and branch)
    $name = convertHalfWidthToFullWidthCharacters($name);
    $municipalities = convertHalfWidthToFullWidthCharacters($municipalities);
    $branch = convertHalfWidthToFullWidthCharacters($branch);

    // 全角数字の変換を処理する(Handle full-width  numbers conversion)
    $postal1 = preg_replace_callback('/[０-９]/u', function($matches) {
        return mb_convert_kana($matches[0], "n");
    }, $postal1);

    $postal2 = preg_replace_callback('/[０-９]/u', function($matches) {
        return mb_convert_kana($matches[0], "n");
    }, $postal2);

    //バインドパラメータ
    $params = array($name, $gender, $postal1, $postal2, $prefecture, $municipalities, $branch, $birthday, $remark, $image);
    $result = pg_execute($conn, "insert_user", $params);

    // パラメータバインディングを使用して準備された SQL ステートメントを実行します(Execute the prepared SQL statement using parameter binding)
    if($result){
        
        header("Location:index.html");

        //データベースへの挿入後にセッション データをクリアします
        session_unset();

        exit();
    
    } else {
         echo "Error inserting data: " . pg_last_error($conn);
    }  
  
  //接続を閉じる
    pg_close($conn);
}

?>
