<?php

// Smarty 設定をセットアップするために Smarty 構成ファイルをインクルードします。
require_once '../config/smarty.config.php';

// Smarty クラスを PHP スクリプトにインポートします
require_once '../vendor/smarty/smarty/libs/Smarty.class.php';

//データベース接続設定(Database connection settings)
$host = 'localhost';     // PostgreSQL server host
$port = '5432';          // PostgreSQL port (default is 5432)
$dbname = 'address';  // PostgreSQL database name
$user = 'postgres';      // PostgreSQL username
$password = 'phwaythitsarkyaw';  // PostgreSQL password

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// 接続が成功したかどうかを確認する
if (!$conn) {
    echo "Error: Unable to connect to PostgreSQL database.\n";
    exit;
}

    // URLのクエリ文字列から値を取得します(retrieve values from the query string of a URL)
    $userId = isset($_GET['userID']) ? $_GET['userID'] : null;

if (!$userId) {

    // ユーザーIDが設定されていない場合の対処 (Handle the case where user ID is not set)
    echo "User ID not provided.";
    exit();
    }

//ユーザーテーブルからユーザーの全データを取得し、都道府県テーブルから都道府県名を取得します(Get all user data from user table and get prefecture name from prefecture table)
$query = "SELECT users.*,prefectures.name
        FROM users LEFT JOIN prefectures ON  
        users.prefecture = prefectures.id WHERE 
        users.id = $1";

// pg_prepareを使用してSQLステートメントを準備し、pg_executeを使用してパラメータをバインドします。
// Prepare the SQL statement using pg_prepare, and bind parameters using pg_execute
$stmt = pg_prepare($conn, "get_user", $query);
$result = pg_execute($conn, "get_user", array($userId));

// fetching a single row data from the result
// フェッチされたデータから1行取得
$row = pg_fetch_assoc($result);

// フェッチが成功したかどうかを確認します (false ではない)
if($row !== false)
{

// $row にはデータベースから取得したデータが含まれていると仮定します
$smarty->assign('row', $row);

// Smarty テンプレートを表示します
$smarty->display('detail.tpl');

exit();

}
 else {
    echo "Error: " . pg_last_error($conn);
    }

//接続を閉じる
pg_close($conn);

?>


