<?php

// Smarty 設定をセットアップするために Smarty 構成ファイルをインクルードします。
require_once '../config/smarty.config.php';

//データベース接続設定(Database connection settings)
$host = '192.168.18.1';     // PostgreSQL server host
$port = '5432';          // PostgreSQL port (default is 5432)
$dbname = 'address';  // PostgreSQL database name
$user = 'exs';      // PostgreSQL username
$password = 'phwaythitsarkyaw';  // PostgreSQL password

session_start();

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// 接続が成功したかどうかを確認する
if (!$conn) {
    echo "Error: Unable to connect to PostgreSQL database.\n";
    exit;
}

    // 都道府県テーブルから全データを選択(select all data from prefectures table)
    $query = "SELECT * FROM prefectures";

    // SQLクエリを準備して実行します(Prepare to run the SQL query)
    $result = pg_query($conn, $query);

    // クエリからすべてのデータを取得します (Fetch all data from the query)
    $prefectures = pg_fetch_all($result);

    $smarty->assign('prefectures', $prefectures); // 取得したデータを Smarty 変数に代入する (Assign the fetched data to a Smarty variable)

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //フォームからデータを取得する(Retrieve data from the form)

        $user_name = $_POST['user_name'];
        $gender = $_POST["gender"];
        $postal1 = $_POST['postal1'];
        $postal2 = $_POST['postal2'];
        $municipalities = $_POST['municipalities'];
        $prefecture = $_POST['prefecture'];
        $branch = $_POST['branch'];
        $year = $_POST['year'];
        $month = $_POST['month'];
        $day = $_POST['day'];
        $remark = $_POST['remark'];
    
    }

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {

        $targetDir = "imgUpload/";

        // ファイルの詳細を抽出する  (Extract file details)
        $image = $_FILES['photo']['name'];
        $tmp = $_FILES['photo']['tmp_name'];
        $targetFilePath = $targetDir . $image; 
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
      
    }

    // 特定のファイル形式を許可する (Allow certain file formats) 
    $allowTypes = array('jpg','png','jpeg'); 

    
    // 許可されたタイプの事前定義された配列に基づいて、ファイル タイプ (拡張子) が許可されているかどうかを確認します
    if(in_array($fileType, $allowTypes)) {

    // Move the uploaded file to the target directory
    // アップロードしたファイルをターゲットディレクトリに移動します
    move_uploaded_file($tmp,$targetFilePath);

    // ファイル パスを「photo」という名前のセッション変数に保存します
    $_SESSION['photo'] = $targetFilePath;

    }

    
    //都道府県テーブルから都道府県名を取得 ユーザーテーブルを結合
    $psql = "SELECT prefectures.name
        FROM prefectures LEFT JOIN users ON  
        prefectures.id = users.prefecture WHERE 
        prefectures.id =  $1";
        
    // クエリのパラメータ値を含む配列を作成します。
    $parameterValues = array($prefecture);

    // pg_query_params を使用してパラメータ化されたクエリを実行します。
    $results = pg_query_params($conn, $psql, $parameterValues);

    
    // 結果を連想配列として取得する
    $pref = pg_fetch_assoc($results);

    // フェッチが成功したかどうかを確認します (false ではない)
    if($pref !== false)
    {

    // Pass variables to the Smarty template
    // 変数を Smarty テンプレートに渡す
    $smarty->assign('user_name', $user_name);
    $smarty->assign('gender', $gender);
    $smarty->assign('postal1', $postal1);
    $smarty->assign('postal2', $postal2);
    $smarty->assign('municipalities', $municipalities);
    $smarty->assign('branch', $branch);
    $smarty->assign('year', $year);
    $smarty->assign('month', $month);
    $smarty->assign('day',$day);
    $smarty->assign('remark', $remark);
    $smarty->assign('prefecture', $prefecture);
    $smarty->assign('pref',$pref);
    $smarty->assign('photo',$_SESSION['photo']);

    $smarty->display('confirm.tpl'); // Smarty テンプレートを表示する (Display the Smarty template)
    
    exit();

    } else {
    echo "Error: " . pg_last_error($conn);
    }

    //接続を閉じる
    pg_close($conn);
    ?>

   


