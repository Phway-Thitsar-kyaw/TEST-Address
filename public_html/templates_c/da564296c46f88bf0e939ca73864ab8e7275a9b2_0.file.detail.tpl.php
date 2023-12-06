<?php
/* Smarty version 4.3.4, created on 2023-11-30 04:36:17
  from 'C:\Apache24\htdocs\TEST\public_html\detail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65681141f36bb0_21772581',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da564296c46f88bf0e939ca73864ab8e7275a9b2' => 
    array (
      0 => 'C:\\Apache24\\htdocs\\TEST\\public_html\\detail.tpl',
      1 => 1701318026,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65681141f36bb0_21772581 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Apache24\\htdocs\\TEST\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.regex_replace.php','function'=>'smarty_modifier_regex_replace',),));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.min.css">
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.4.min.js"><?php echo '</script'; ?>
>
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
            <?php if ($_smarty_tpl->tpl_vars['row']->value) {?>
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0 fw-semibold">氏 名:</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-muted mb-0">
                                        <?php echo $_smarty_tpl->tpl_vars['row']->value['user_name'];?>

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
                                        <?php echo $_smarty_tpl->tpl_vars['row']->value['gender'];?>

                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0 fw-semibold">郵便番号:</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-muted mb-0">〒 <?php echo $_smarty_tpl->tpl_vars['row']->value['postal1'];?>
- <?php echo $_smarty_tpl->tpl_vars['row']->value['postal2'];?>

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
                                        <?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>

                                    </p>
                                    <p class="text-muted mb-0">
                                        <?php echo $_smarty_tpl->tpl_vars['row']->value['municipalities'];?>

                                    </p>
                                    <p class="text-muted mb-0">
                                        <?php echo $_smarty_tpl->tpl_vars['row']->value['branch'];?>

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
                                        <?php echo $_smarty_tpl->tpl_vars['row']->value['date_of_birth'];?>

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
                                        <?php echo $_smarty_tpl->tpl_vars['row']->value['remark'];?>

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
                            <?php if (!empty($_smarty_tpl->tpl_vars['row']->value['photo_path'])) {?>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['photo_path'];?>
" class="rounded mx-auto d-block" alt="Photo" />
                            <?php } else { ?>
                                Image not found.

                            <?php }?>
                        </div>
                    </div>

                </div>

            <?php }?>
        </div>
    </div>
    <footer class="footer text-center text-white py-3" style="background-color:#9ba6a5">
        © 2023 Copyright: <a href="#" class="text-reset fw-bold">EXCS Co.Ltd</a>
    </footer>
    <?php echo '<script'; ?>
>
        function showGoogleMaps() {
            <?php $_smarty_tpl->_assignInScope('customerAddress', ((string)$_smarty_tpl->tpl_vars['row']->value['name']).((string)$_smarty_tpl->tpl_vars['row']->value['municipalities']).((string)$_smarty_tpl->tpl_vars['row']->value['branch']));?>

            // 「+」とスペースの両方を空の文字列に置き換えます
            // Replace both '+' and spaces with empty string
            <?php $_smarty_tpl->_assignInScope('cleanedAddress', smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['customerAddress']->value,'/[ +]/',''));?>

            var mapUrl = "https://www.google.com/maps/search/?api=1&query=<?php echo $_smarty_tpl->tpl_vars['cleanedAddress']->value;?>
";

            // 新しいタブでGoogleマップを開く
            // Open Google Maps in a new tab
            window.open(mapUrl, '_blank');
        }
    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
