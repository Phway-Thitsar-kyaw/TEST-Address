<?php

// Smarty 設定をセットアップするために Smarty 構成ファイルをインクルードします。
require_once '../config/smarty.config.php';

//データベース接続設定(Database connection settings)
$host = '192.168.18.1';     // PostgreSQL server host
$port = '5432';          // PostgreSQL port (default is 5432)
$dbname = 'address';  // PostgreSQL database name
$user = 'exs';      // PostgreSQL username
$password = 'phwaythitsarkyaw';  // PostgreSQL password

// 接続が成功したかどうかを確認する
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    echo "Error: Unable to connect to PostgreSQL database.\n";
    exit;
}

$smarty = new Smarty();

// カスタム トリム モディファイアを登録します
$smarty->registerPlugin('modifier', 'trim', 'smarty_modifier_trim');

// 「trim」という名前の Smarty モディファイアを定義します。
// Smarty 修飾子は、テンプレート変数に適用できる関数です。
function smarty_modifier_trim($string) {

// 'trim' 関数は、文字列の先頭と末尾から空白 (または他の文字) を削除します。
return trim($string);
}

    // 都道府県テーブルから全データを選択(select all data from prefectures table)
    $query = "SELECT * FROM prefectures";

    // SQLクエリを準備して実行します(Prepare to run the SQL query)
    $result = pg_query($conn, $query);

    // クエリからすべてのデータを取得します (Fetch all data from the query)
    $prefecture = pg_fetch_all($result);

   // フェッチが成功したかどうかを確認します (false ではない)
   if ($prefecture !== false) {

    $smarty->assign('prefecture', $prefecture); // 取得したデータを Smarty 変数に代入します
    $smarty->display('register.tpl'); // Smarty テンプレートを表示します

    exit();
    
    } else {
    echo "Error: " . pg_last_error($conn);
    }
    
    //接続を閉じる
    pg_close($conn);

?>
