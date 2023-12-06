<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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

        a {
            text-decoration: none;
        }

        .custom-button,
        .custom-button:hover {
            background-color: #346473;
            color: #f7f7f2;
        }

        img {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0.0.2);

            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light p-3">
        <div class="container-fluid">
            <h1 class="navbar-brand" style="font-size: 30px">住所録テストサイト 住所詳細</h1>
            <input class="btn custom-button" type='button' value='戻る' onclick='history.back()'>
        </div>
    </nav>
    <div class="container justify-content center mt-4 mb-5">
        <div class="row pt-3">
            {if $row}
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0 fw-semibold">氏 名:</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-muted mb-0">
                                        {$row.user_name}
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="fw-semibold mb-0">性 別:</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-muted mb-0">
                                        {$row.gender}
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0 fw-semibold">郵便番号:</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-muted mb-0">〒 {$row.postal1}- {$row.postal2}
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0 fw-semibold">住 所:</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-muted mb-0">
                                        {$row.name}
                                    </p>
                                    <p class="text-muted mb-0">
                                        {$row.municipalities}
                                    </p>
                                    <p class="text-muted mb-0">
                                        {$row.branch}
                                    </p>
                                </div>
                                <div class="col-sm-3 mt-5">
                                    <button onclick="showGoogleMaps()" class="btn custom-button"
                                        style="font-size:13px;">地図を見る</button>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0 fw-semibold">生年月日:</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-muted mb-0">
                                        {$row.date_of_birth}
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0 fw-semibold">備 考:</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-muted mb-0">
                                        {$row.remark}
                                    </p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-4">
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            {if !empty($row.photo_path)}
                                <img src="{$row.photo_path}" class="rounded mx-auto d-block" alt="Photo" />
                            {else}
                                Image not found.

                            {/if}
                        </div>
                    </div>

                </div>

            {/if}
        </div>
    </div>
    <footer class="footer text-center text-white py-3" style="background-color:#9ba6a5">
        © 2023 Copyright: <a href="#" class="text-reset fw-bold">EXCS Co.Ltd</a>
    </footer>
    <script>
        function showGoogleMaps() {
            {assign var="customerAddress" value="{$row.name}{$row.municipalities}{$row.branch}"}

            // 「+」とスペースの両方を空の文字列に置き換えます
            // Replace both '+' and spaces with empty string
            {assign var="cleanedAddress" value=$customerAddress|regex_replace:'/[ +]/':''}

            var mapUrl = "https://www.google.com/maps/search/?api=1&query={$cleanedAddress}";

            // 新しいタブでGoogleマップを開く
            // Open Google Maps in a new tab
            window.open(mapUrl, '_blank');
        }
    </script>
</body>

</html>