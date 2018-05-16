<?php
/* Smarty version 3.1.31, created on 2018-05-11 01:57:49
  from "C:\Users\la_le\OneDrive\Documents\NetBeansProjects\FuelBulbStore\fuel\app\views\admin\allBags.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5af530dd0a5557_99278202',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e5f774fb13b45bb8d5e3dbbe7436bb1d2f09daf3' => 
    array (
      0 => 'C:\\Users\\la_le\\OneDrive\\Documents\\NetBeansProjects\\FuelBulbStore\\fuel\\app\\views\\admin\\allBags.tpl',
      1 => 1526018261,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af530dd0a5557_99278202 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12070090295af530dd0943b5_67672098', "localstyle");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8576631045af530dd095365_27591520', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "localstyle"} */
class Block_12070090295af530dd0943b5_67672098 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'localstyle' => 
  array (
    0 => 'Block_12070090295af530dd0943b5_67672098',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <style type="text/css">
    td:first-child {
      width: 10px;
    }
  </style>
<?php
}
}
/* {/block "localstyle"} */
/* {block "content"} */
class Block_8576631045af530dd095365_27591520 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_8576631045af530dd095365_27591520',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h2>All Bags</h2>
  <table class="table table-hover table-condensed">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bags']->value, 'bag');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['bag']->value) {
?>  
      <tr>
        <th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_anchor'][0][0]->html_anchor(array('href'=>"/bags/show/".((string)$_smarty_tpl->tpl_vars['bag']->value->id),'text'=>"BagID #".((string)$_smarty_tpl->tpl_vars['bag']->value->id)),$_smarty_tpl);?>

        <th>ordered: <?php echo $_smarty_tpl->tpl_vars['bag']->value->made_on;?>
 </th>
      </tr> 
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
  
  </table>
 <h4 id="message"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['session_get_flash'][0][0]->session_get_flash(array('var'=>'message'),$_smarty_tpl);?>
</h4>
<?php
}
}
/* {/block "content"} */
}
