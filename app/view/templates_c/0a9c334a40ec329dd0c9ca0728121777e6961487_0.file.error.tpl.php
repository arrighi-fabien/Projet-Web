<?php
/* Smarty version 4.3.0, created on 2023-03-22 13:32:15
  from 'C:\www\Projet-Web\app\view\templates\error.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_641af54fab0e77_49165011',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a9c334a40ec329dd0c9ca0728121777e6961487' => 
    array (
      0 => 'C:\\www\\Projet-Web\\app\\view\\templates\\error.tpl',
      1 => 1679486843,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_641af54fab0e77_49165011 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<main>
    <img src="/img/background1.webp" alt="" class="background-form background-form--1">
    <img src="/img/background2.webp" alt="" class="background-form background-form--2">

    <div class="error-display">
        <h1><?php echo $_smarty_tpl->tpl_vars['error_type']->value;?>
</h1>
    </div>
</main>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
