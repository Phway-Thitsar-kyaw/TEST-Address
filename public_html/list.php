<?php

// Smarty 設定をセットアップするために Smarty 構成ファイルをインクルードします。
require_once '../config/smarty.config.php';

// Smarty クラスを PHP スクリプトにインポートします
require_once '../vendor/smarty/smarty/libs/Smarty.class.php';


//データベース接続設定(Database connection settings)
$host = '192.168.18.1';     // PostgreSQL server host
$port = '5432';          // PostgreSQL port (default is 5432)
$dbname = 'address';  // PostgreSQL database name
$user = 'exs';      // PostgreSQL username
$password = 'phwaythitsarkyaw';  // PostgreSQL password


$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// 接続が成功したかどうかを確認する
if (!$conn) {
    echo "Error: Unable to connect to PostgreSQL database.\n";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST'){

// フォーム送信から「search_query」を取得します(Retrieve the 'search_query' from the form submission)
if(isset($_POST['search_query']))
{
    $search_query = $_POST['search_query'];
}

// 1 つ以上の文字が一致するテーブル内のデータを検索する(Search data from table where one or more character match)
$query = "SELECT users.*, prefectures.name FROM users LEFT JOIN prefectures 
              ON  users.prefecture = prefectures.id WHERE
              users.user_name ILIKE $1 OR 
              users.gender ILIKE $1 OR 
              users.postal1 ILIKE $1 OR 
              users.postal2 ILIKE $1 OR 
              prefectures.name ILIKE $1 OR 
              users.municipalities ILIKE $1 OR 
              users.branch ILIKE $1 
              ORDER BY users.id DESC";

    // SQL クエリを実行する前に、:search_query パラメータを % ワイルドカード文字を含む値にバインドします。
    // Before running the SQL query, bind the :search_query parameter to a value that contains the % wildcard character.
    $result = pg_query_params($conn, $query, ['%' . $search_query . '%']);

    // SQL クエリの実行後、結果セットがフェッチされ、連想配列の配列として $results 変数に保存されます
    // After executing the SQL query, the result set is fetched and stored as an array of associative arrays in the $results variable
    $results = pg_fetch_all($result);

    // フェッチが成功したかどうかを確認します (false ではない)
    if($results !== false)
    {
    
    //$results 配列を Smarty テンプレートに割り当てます
    $smarty->assign('results', $results);

    
    // Smarty テンプレートを表示します
    $smarty->display('list.tpl');

    exit();
    
    } else {
    echo "Error: " . pg_last_error($conn);
    }
    //接続を閉じる
    pg_close($conn);

    }

?>

