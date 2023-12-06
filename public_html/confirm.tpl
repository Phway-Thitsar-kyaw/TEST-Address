<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .navbar {
            background-color: #71a0a5;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        body {
            background-image: url("photo/78786.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        a {
            text-decoration: none;
        }

        .custom-button,
        .custom-button:hover {
            background-color: #346473;
            color: #f7f7f2;
        }

        form {
            max-width: 700px;
            margin: 20px auto;
            margin-top: 50px;
            background-color: #aeccc6;
            opacity: 0.8;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: black;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #9ba6a5;
            color: white;
            text-align: center;
            padding-top: 20px;
            padding-bottom: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg p-3">
        <div class="container-fluid">
            <h1 class="navbar-brand" style="font-size: 30px">住所録テストサイト 住所詳細</h1>
            <a href="register.php" class="btn custom-button">戻る</a>
        </div>
    </nav>

    <div class="container justify-content-center mt-3">

        <form action="create.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-8">
                    <p>氏名 : {$user_name}</p>
                    <p>性別 : {$gender}</p>
                    <p>郵便番号 : {$postal1}-{$postal2}</p>
                    <p>都道府県 : {$pref.name}</p>
                    <p>市区町村 : {$municipalities}</p>
                    <p>町名番地 : {$branch}</p>
                    <p>生年月日 : {$year}-{$month}-{$day}</p>
                    <p>備考 : {$remark}</p>
                </div>
                <div class="col-3">
                    <!-- このブロックは Smarty の条件ステートメントです。
                    変数 $photo が設定されており、空の文字列と等しくないかどうかを確認します。 -->
                    {if isset($photo) && $photo neq ''}
                        <img src="{$photo}" class="img-fluid" alt="Photo" width="150">
                    {/if}
                </div>
                <input type="hidden" name="user_name" class="form-control" value="{$user_name}" required>


                <input class="form-check-input" type="radio" name="gender" value="男" {if $gender === '男'}checked{/if}
                    hidden>

                <input class="form-check-input" type="radio" name="gender" value="女" {if $gender === '女'} checked{/if}
                    hidden>

                <input class="form-check-input" type="radio" name="gender" value="その他" {if $gender === 'その他'}
                    checked{/if} hidden>

                <input type="hidden" name="postal1" size="3" value="{$postal1}" required><input type="hidden"
                    name="postal2" size="4" value="{$postal2}" required>

                <select class="form-select" name="prefecture" id="prefecture" hidden>
                    {foreach $prefectures as $row}
                        {assign var=Id value=$row.id}
                        {assign var=name value=$row.name}
                        {assign var=selected value=($prefecture == $row.id) ? 'selected' : ''}
                        <option value="{$Id}" {$selected}>{$name}</option>
                    {/foreach}
                </select>

                <input type="hidden" name="municipalities" class="form-control" value="{$municipalities}" required>

                <input type="hidden" name="branch" class="form-control" value="{$branch}" required>

                <input type="hidden" name="year" class="form-control" value="{$year}" required>

                <input type="hidden" name="month" class="form-control" value="{$month}" required>

                <input type="hidden" name="day" class="form-control" value="{$day}" required>

                <input type="hidden" name="remark" class="form-control" value="{$remark}" required>

                <div class="d-flex justify-content-end mb-2">
                    <button class="btn custom-button" style="margin-right:20px;" type="submit">確認</button>
                    <input class="btn custom-button" type='button' value='キャンセル' onclick='history.back()'>

        </form>
    </div>
    </div>
    <footer class="footer text-center text-white py-3" style="background-color:#9ba6a5">
        © 2023 Copyright: <a href="#" class="text-reset fw-bold">EXCS Co.Ltd</a>
    </footer>
</body>

</html>