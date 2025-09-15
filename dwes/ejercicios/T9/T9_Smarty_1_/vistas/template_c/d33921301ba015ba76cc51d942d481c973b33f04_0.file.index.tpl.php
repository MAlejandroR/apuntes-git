<?php
/* Smarty version 3.1.33, created on 2019-04-15 13:27:16
  from '/home/manuel/web_old/manuel.infenlaces.com/public_html/distancia/ejercicios/T9_Smarty_1/vistas/template/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb46a94dd2253_16392767',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd33921301ba015ba76cc51d942d481c973b33f04' => 
    array (
      0 => '/home/manuel/web_old/manuel.infenlaces.com/public_html/distancia/ejercicios/T9_Smarty_1/vistas/template/index.tpl',
      1 => 1555327412,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb46a94dd2253_16392767 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo.css">
    <title>Document</title>
</head>
<body>
<h2>Fecha actual <strong style="color:coral"><?php echo date("d-m-y H:i:s");?>
</strong></h2>
<hr>

<h3>Primer ejemplo de smarty. Valor de usuareio pasado por controlador <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
</span></h3>
    <table>
        <caption>Listado de productos</caption>
        <th>Código</th>        <th>Nombre</th>        <th>Precio</th>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productos']->value, 'producto');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
?>
        <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['producto']->value->get_codigo();?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['producto']->value->get_nombre_corto();?>
</td>
        <td>precio <?php echo $_smarty_tpl->tpl_vars['producto']->value->get_PVP();?>
</td>
        </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>

</body>
</html><?php }
}
