<?php
/* Smarty version 4.3.4, created on 2023-11-30 04:39:24
  from 'C:\Apache24\htdocs\TEST\public_html\confirm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_656811fc335ba2_56728746',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1693950c0d3c2da257fdc1b1c78553320dbea0ab' => 
    array (
      0 => 'C:\\Apache24\\htdocs\\TEST\\public_html\\confirm.tpl',
      1 => 1701305411,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_656811fc335ba2_56728746 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
                    <p>氏名 : <?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
</p>
                    <p>性別 : <?php echo $_smarty_tpl->tpl_vars['gender']->value;?>
</p>
                    <p>郵便番号 : <?php echo $_smarty_tpl->tpl_vars['postal1']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['postal2']->value;?>
</p>
                    <p>都道府県 : <?php echo $_smarty_tpl->tpl_vars['pref']->value['name'];?>
</p>
                    <p>市区町村 : <?php echo $_smarty_tpl->tpl_vars['municipalities']->value;?>
</p>
                    <p>町名番地 : <?php echo $_smarty_tpl->tpl_vars['branch']->value;?>
</p>
                    <p>生年月日 : <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['day']->value;?>
</p>
                    <p>備考 : <?php echo $_smarty_tpl->tpl_vars['remark']->value;?>
</p>
                </div>
                <div class="col-3">
                    <!-- このブロックは Smarty の条件ステートメントです。
                    変数 $photo が設定されており、空の文字列と等しくないかどうかを確認します。 -->
                    <?php if ((isset($_smarty_tpl->tpl_vars['photo']->value)) && $_smarty_tpl->tpl_vars['photo']->value != '') {?>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['photo']->value;?>
" class="img-fluid" alt="Photo" width="150">
                    <?php }?>
                </div>
                <input type="hidden" name="user_name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
" required>


                <input class="form-check-input" type="radio" name="gender" value="男" <?php if ($_smarty_tpl->tpl_vars['gender']->value === '男') {?>checked<?php }?>
                    hidden>

                <input class="form-check-input" type="radio" name="gender" value="女" <?php if ($_smarty_tpl->tpl_vars['gender']->value === '女') {?> checked<?php }?>
                    hidden>

                <input class="form-check-input" type="radio" name="gender" value="その他" <?php if ($_smarty_tpl->tpl_vars['gender']->value === 'その他') {?>
                    checked<?php }?> hidden>

                <input type="hidden" name="postal1" size="3" value="<?php echo $_smarty_tpl->tpl_vars['postal1']->value;?>
" required><input type="hidden"
                    name="postal2" size="4" value="<?php echo $_smarty_tpl->tpl_vars['postal2']->value;?>
" required>

                <select class="form-select" name="prefecture" id="prefecture" hidden>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['prefectures']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                        <?php $_smarty_tpl->_assignInScope('Id', $_smarty_tpl->tpl_vars['row']->value['id']);?>
                        <?php $_smarty_tpl->_assignInScope('name', $_smarty_tpl->tpl_vars['row']->value['name']);?>
                        <?php $_smarty_tpl->_assignInScope('selected', $_smarty_tpl->tpl_vars['prefecture']->value == $_smarty_tpl->tpl_vars['row']->value['id'] ? 'selected' : '');?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['Id']->value;?>
" <?php echo $_smarty_tpl->tpl_vars['selected']->value;?>
><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>

                <input type="hidden" name="municipalities" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['municipalities']->value;?>
" required>

                <input type="hidden" name="branch" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['branch']->value;?>
" required>

                <input type="hidden" name="year" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
" required>

                <input type="hidden" name="month" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
" required>

                <input type="hidden" name="day" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['day']->value;?>
" required>

                <input type="hidden" name="remark" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['remark']->value;?>
" required>

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

</html><?php }
}
