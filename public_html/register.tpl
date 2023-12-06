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
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg p-3">
        <div class="container-fluid">
            <h1 class="navbar-brand" style="font-size: 30px">住所録テストサイト 住所詳細</h1>
            <a href="index.html" class="btn custom-button">戻る</a>
        </div>
    </nav>
    <div class="container justify-content-center mt-5 mb-5">
        <form action="confirm.php" method="post" enctype="multipart/form-data">
            <div class="d-flex justify-content-end mb-4 form-group">
                <div class="btn btn-rounded custom-button">
                    <label class="form-label text-white m-1" for="photo">画像選択</label>
                    <input type="file" class="form-control d-none" name="photo" id="photo" accept="image/*" required>
                </div>
            </div>
            <div class="row mb-4 form-group">
                <div class="col-3">
                    <label class="form-label fw-bolder">氏 名</label>
                </div>
                <div class="col-8">
                    <input type="text" name="user_name" class="form-control" placeholder="氏名..." required>
                </div>
            </div>
            <div class="row mb-4 form-group">
                <div class="col-3">
                    <label class="form-label fw-bolder">性 別</label>
                </div>
                <div class="col-8">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="男" checked>
                        <label class="form-check-label" for="flexRadioDefault1">男</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="女">
                        <label class="form-check-label" for="flexRadioDefault2">女</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="その他">
                        <label class="form-check-label" for="flexRadioDefault3">その他</label>
                    </div>
                </div>
            </div>
            <div class="row mb-4 form-group">
                <div class="col-3">
                    <label class="form-label fw-bolder">郵便番号</label>
                </div>
                <div class="col-8">
                    <input type="text" name="postal1" size="3" maxlength="3" required>-<input type="text" name="postal2"
                        size="4" maxlength="4" required>
                </div>
            </div>
            <div class="row mb-4 form-group">
                <div class="col-3">
                    <label class="form-label fw-bolder">都道府県</label>
                </div>
                <div class="col-8">
                    <select class="form-select" name="prefecture" id="prefecture" required>
                        <option hidden>都道府県を選択してください</option>
                        {foreach $prefecture as $row}
                            <option value="{$row.id}">{$row.name|trim}</option>
                        {/foreach}
                    </select>
                </div>
            </div>
            <div class="row mb-4 form-group">
                <div class="col-3">
                    <label class="form-label fw-bolder">市区町村</label>
                </div>
                <div class="col-8">
                    <input type="text" name="municipalities" class="form-control" placeholder="市区町村..." required>
                </div>
            </div>
            <div class="row mb-4 form-group">
                <div class="col-3">
                    <label class="form-label fw-bolder">町名番地</label>
                </div>
                <div class="col-8">
                    <input type="text" name="branch" class="form-control" placeholder="町名番地..." required>
                </div>
            </div>
            <div class="row mb-4 form-group">
                <div class="col-3">
                    <label class="form-label fw-bolder">生年月日</label>
                </div>
                <div class="col-8 form-group">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="year">年</label>
                            <input type="number" class="form-control" id="year" name="year" placeholder="YYYY"
                                min="1900" max="2023" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="month">月</label>
                            <select class="form-control" id="month" name="month" required>
                                <option value="" disabled selected>MM</option>
                                {foreach from=range(1, 12) item=month}
                                    <option value="{$month}">{$month}</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="day">日</label>
                            <select class="form-control" id="day" name="day" required>
                                <option value="" disabled selected>DD</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4 form-group">
                <div class="col-3">
                    <label class="form-label fw-bolder">備 考</label>
                </div>
                <div class="col-8">
                    <textarea rows="5" name="remark" class="form-control"></textarea>
                </div>
            </div>
            <div class="d-flex justify-content-end mb-2">
                <button class="btn custom-button" type="submit">確認</button>
            </div>
        </form>
    </div>
    <footer class="footer text-center text-white py-3" style="background-color:#9ba6a5">
        © 2023 Copyright: <a href="#" class="text-reset fw-bold">EXCS Co.Ltd</a>
    </footer>

    <script>
        // 選択した月に基づいて動的に日付を更新し、閏年を処理するための JavaScript
        // JavaScript to dynamically update the days based on the selected month and handle leap years
        document.getElementById('month').addEventListener('change', updateDays);
        document.getElementById('year').addEventListener('input', updateDays);

        function updateDays() {
            var monthSelect = document.getElementById('month');
            var daySelect = document.getElementById('day');
            var yearInput = document.getElementById('year');

            var selectedMonth = parseInt(monthSelect.value, 10);
            var selectedYear = parseInt(yearInput.value, 10);
            var daysInMonth = new Date(selectedYear, selectedMonth, 0).getDate();

            // Clear existing options
            daySelect.innerHTML = '<option value="" disabled selected>DD</option>';

            // Populate days
            for (var i = 1; i <= daysInMonth; i++) {
                var option = document.createElement('option');
                option.value = i < 10 ? '0' + i : '' + i; //必要に応じて先頭のゼロを追加します(Add leading zero if needed)
                option.text = i;
                daySelect.add(option);
            }
        }
    </script>

</body>

</html>