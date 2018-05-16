<?php
/* Smarty version 3.1.31, created on 2018-05-10 18:15:31
  from "C:\Users\la_le\OneDrive\Documents\NetBeansProjects\FuelBulbStore\fuel\app\views\links.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5af4c483884eb7_81988248',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31325e2baf0dbed283906ae771326605fd7feed4' => 
    array (
      0 => 'C:\\Users\\la_le\\OneDrive\\Documents\\NetBeansProjects\\FuelBulbStore\\fuel\\app\\views\\links.tpl',
      1 => 1525990527,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af4c483884eb7_81988248 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['session']->value->get('login') && $_smarty_tpl->tpl_vars['session']->value->get('login')->is_admin) {?>
    <li><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_anchor'][0][0]->html_anchor(array('href'=>'/admin/allBags','text'=>'All Bags'),$_smarty_tpl);?>
</li>
    <li><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_anchor'][0][0]->html_anchor(array('href'=>'/admin/addBulbInitial','text'=>'Add Bulb'),$_smarty_tpl);?>
</li>
    <li><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_anchor'][0][0]->html_anchor(array('href'=>'/admin/addTypeInitial','text'=>'Add Type'),$_smarty_tpl);?>
</li>    
<?php } else { ?>    
    <li><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_anchor'][0][0]->html_anchor(array('href'=>'/cart','text'=>'Cart'),$_smarty_tpl);?>
</li>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['session']->value->get('login') && !($_smarty_tpl->tpl_vars['session']->value->get('login')->is_admin)) {?>
  <li><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_anchor'][0][0]->html_anchor(array('href'=>'/bags','text'=>'My Bags'),$_smarty_tpl);?>
</li>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['session']->value->get('login')) {?>
  <li><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_anchor'][0][0]->html_anchor(array('href'=>'/authenticate/logout','text'=>'Logout'),$_smarty_tpl);?>
</li>
<?php } else { ?>
  <li><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_anchor'][0][0]->html_anchor(array('href'=>'/authenticate/login','text'=>'Login'),$_smarty_tpl);?>
</li>
<?php }?>

<?php if (!$_smarty_tpl->tpl_vars['session']->value->get('login')) {?>
  <li><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_anchor'][0][0]->html_anchor(array('href'=>'/signup','text'=>'Create Login'),$_smarty_tpl);?>
</li>
<?php }
}
}
