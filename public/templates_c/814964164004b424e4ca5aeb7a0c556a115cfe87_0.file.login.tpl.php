<?php
/* Smarty version 4.3.0, created on 2023-03-21 17:30:32
  from 'C:\Users\fabar\Desktop\CESI\CPI A2\BLOC 4 Web\Projet\Projet-Web\app\view\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6419e9b8c6fa18_85219854',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '814964164004b424e4ca5aeb7a0c556a115cfe87' => 
    array (
      0 => 'C:\\Users\\fabar\\Desktop\\CESI\\CPI A2\\BLOC 4 Web\\Projet\\Projet-Web\\app\\view\\templates\\login.tpl',
      1 => 1679418806,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6419e9b8c6fa18_85219854 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="login-form card-background p-2 m-5-auto ">
        <h2>Se connecter</h2>
        <form action="/login/connect" method="post" class="login-form__content">
            <div class="login-form__content__input">
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" placeholder="Email...">
            </div>
            <div class="login-form__content__input">
                <div class="login-form__content__input__pwd-label">
                    <label for="password">Mot de passe :</label>
                    <a href="#" class="link-effect small-text">Mot de passe oublié ?</a>
                </div>
                <input type="password" name="password" id="password" placeholder="Mot de passe...">
            </div>
            <div class="login-form__content__checkbox">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Se souvenir de moi</label>
            </div>
            <input type="submit" value="Se connecter" class="btn btn--primary">
        </form>
    </div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
