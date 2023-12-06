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

        h1 {
            letter-spacing: 2px;
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

        .custom-button,
        .custom-button:hover {
            background-color: #346473;
            color: #f7f7f2;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg p-3">
        <div class="container-fluid">
            <h1 class="navbar-brand" style="font-size: 30px">住所録テストサイト 住所一覧</h1>
            <a href="index.html" class="btn custom-button">戻る</a>
        </div>
    </nav>

    <div class="container justify-content center mt-4 mb-5">
        {if !empty($results)}
            <div class="row p-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">氏名</th>
                            <th scope="col">性別</th>
                            <th scope="col">住所</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        {assign var='number' value=1}

                        {foreach $results as $result}
                            <tr>
                                <td>{$number}</td>
                                <td>{$result.user_name}</td>
                                <td>〒{$result.postal1}-{$result.postal2}</td>
                                <td>{$result.name}{$result.municipalities}{$result.branch}</td>
                                <td><a href="detail.php?userID={$result.id}" class="btn btn-secondary btn-md col-md-6">詳細</td>
                            </tr>
                            {assign var='number' value=$number+1}
                        {/foreach}
                    </tbody>
                </table>
            </div>

        {else}
            <p class="h6"><mark>一致する結果が見つかりませんでした。</mark></p>
        {/if}
    </div>
    <footer class="footer text-center text-white py-3" style="background-color:#9ba6a5">
        © 2023 Copyright: <a href="#" class="text-reset fw-bold">EXCS Co.Ltd</a>
    </footer>
</body>

</html>