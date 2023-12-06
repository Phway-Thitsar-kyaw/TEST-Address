<?php
/* Smarty version 4.3.4, created on 2023-11-28 07:58:36
  from 'C:\Apache24\htdocs\TEST\public_html\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65659dac7822b6_39858634',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f0e1d0eceea718249fd030fcb3b7e4145612f8c' => 
    array (
      0 => 'C:\\Apache24\\htdocs\\TEST\\public_html\\list.tpl',
      1 => 1701158309,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65659dac7822b6_39858634 (Smarty_Internal_Template $_smarty_tpl) {
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
        <?php if (!empty($_smarty_tpl->tpl_vars['results']->value)) {?>
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

                        <?php $_smarty_tpl->_assignInScope('number', 1);?>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['results']->value, 'result');
$_smarty_tpl->tpl_vars['result']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
$_smarty_tpl->tpl_vars['result']->do_else = false;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['number']->value;?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['result']->value['user_name'];?>
</td>
                                <td>〒<?php echo $_smarty_tpl->tpl_vars['result']->value['postal1'];?>
-<?php echo $_smarty_tpl->tpl_vars['result']->value['postal2'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['result']->value['name'];
echo $_smarty_tpl->tpl_vars['result']->value['municipalities'];
echo $_smarty_tpl->tpl_vars['result']->value['branch'];?>
</td>
                                <td><a href="detail.php?userID=<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
" class="btn btn-secondary btn-md col-md-6">詳細</td>
                            </tr>
                            <?php $_smarty_tpl->_assignInScope('number', $_smarty_tpl->tpl_vars['number']->value+1);?>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>

        <?php } else { ?>
            <p class="h6"><mark>一致する結果が見つかりませんでした。</mark></p>
        <?php }?>
    </div>
    <footer class="footer text-center text-white py-3" style="background-color:#9ba6a5">
        © 2023 Copyright: <a href="#" class="text-reset fw-bold">EXCS Co.Ltd</a>
    </footer>
</body>

</html><?php }
}
