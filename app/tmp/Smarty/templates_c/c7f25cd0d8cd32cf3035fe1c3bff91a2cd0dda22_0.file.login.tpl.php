<?php
/* Smarty version 3.1.31, created on 2018-05-10 19:26:31
  from "C:\Users\la_le\OneDrive\Documents\NetBeansProjects\FuelBulbStore\fuel\app\views\authenticate\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5af4d52798e791_07769683',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c7f25cd0d8cd32cf3035fe1c3bff91a2cd0dda22' => 
    array (
      0 => 'C:\\Users\\la_le\\OneDrive\\Documents\\NetBeansProjects\\FuelBulbStore\\fuel\\app\\views\\authenticate\\login.tpl',
      1 => 1525994788,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af4d52798e791_07769683 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12395253255af4d527982275_63566266', "localstyle");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21449478375af4d527983053_05708174', "content");
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "localstyle"} */
class Block_12395253255af4d527982275_63566266 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'localstyle' => 
  array (
    0 => 'Block_12395253255af4d527982275_63566266',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <style type='text/css'>
    td:first-child {
      width: 10px;
    }
  </style>
<?php
}
}
/* {/block "localstyle"} */
/* {block "content"} */
class Block_21449478375af4d527983053_05708174 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_21449478375af4d527983053_05708174',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <h2>Login</h2>

  <p>Please enter access information</p>
  <?php $_block_plugin1 = isset($_smarty_tpl->smarty->registered_plugins['block']['form'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['form'][0][0] : null;
if (!is_callable(array($_block_plugin1, 'form'))) {
throw new SmartyException('block tag \'form\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('form', array('attrs'=>array('action'=>'/authenticate/validate')));
$_block_repeat=true;
echo $_block_plugin1->form(array('attrs'=>array('action'=>'/authenticate/validate')), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();
?>

  <table class="table table-condensed borderless">
    <tr>
      <td>user:</td>
      <td><input class="form-control" type="text" name="username" 
                 value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" /></td>
    </tr>
    <tr>
      <td>password:</td>
      <td><input class="form-control" type="password" name="password" /></td>
    </tr>
    <tr>
      <td></td>
      <td><button type="submit">Access</button></td>
    </tr>
  </table>  
  <?php $_block_repeat=false;
echo $_block_plugin1->form(array('attrs'=>array('action'=>'/authenticate/validate')), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>


  <h4 class="message"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['session_get_flash'][0][0]->session_get_flash(array('var'=>'message'),$_smarty_tpl);?>
</h4>
<?php
}
}
/* {/block "content"} */
}
