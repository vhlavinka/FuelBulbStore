<?php
/* Smarty version 3.1.31, created on 2018-05-11 01:41:40
  from "C:\Users\la_le\OneDrive\Documents\NetBeansProjects\FuelBulbStore\fuel\app\views\home\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5af52d14af35c4_68340538',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f1b4f711cc250bb07b3b0ad6694b7dca1031279' => 
    array (
      0 => 'C:\\Users\\la_le\\OneDrive\\Documents\\NetBeansProjects\\FuelBulbStore\\fuel\\app\\views\\home\\index.tpl',
      1 => 1526017294,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af52d14af35c4_68340538 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\Users\\la_le\\OneDrive\\Documents\\NetBeansProjects\\FuelBulbStore\\fuel\\vendor\\smarty\\smarty\\libs\\plugins\\function.html_options.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_749005085af52d14ad3412_35417441', "localstyle");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20814691215af52d14ad4685_66723264', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "localstyle"} */
class Block_749005085af52d14ad3412_35417441 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'localstyle' => 
  array (
    0 => 'Block_749005085af52d14ad3412_35417441',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <style type="text/css">
    .top { 
      margin-bottom: 20px; 
    }
    .top h2 { 
      display: inline-block;
      margin: 0 30px 0 0;
      vertical-align: bottom;
    }
    .top form {
      display: inline-block;
      vertical-align: bottom;
    }
    .top .order {
      font-size: 70%;
      font-weight: normal;
    }
  </style>
<?php
}
}
/* {/block "localstyle"} */
/* {block "content"} */
class Block_20814691215af52d14ad4685_66723264 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_20814691215af52d14ad4685_66723264',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <div class='top'>
    <h2>Bulb Selection <span class="order">(by <?php echo Session::get('order');?>
)</span></h2>
    <?php $_block_plugin1 = isset($_smarty_tpl->smarty->registered_plugins['block']['form'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['form'][0][0] : null;
if (!is_callable(array($_block_plugin1, 'form'))) {
throw new SmartyException('block tag \'form\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('form', array('attrs'=>array('action'=>"/home",'method'=>'post')));
$_block_repeat=true;
echo $_block_plugin1->form(array('attrs'=>array('action'=>"/home",'method'=>'post')), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();
?>

      <button type="submit" name="doit">Show by Type:</button>
      <select name = "dd">
          <?php ob_start();
echo Session::get('type_id');
$_prefixVariable1=ob_get_clean();
echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['types']->value,'selected'=>$_prefixVariable1),$_smarty_tpl);?>
}
      </select>
    <?php $_block_repeat=false;
echo $_block_plugin1->form(array('attrs'=>array('action'=>"/home",'method'=>'post')), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

  </div>

  <table class="table table-hover table-condensed">
    <tr>
      <th>
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_anchor'][0][0]->html_anchor(array('href'=>"/home/setOrder/name",'text'=>"name"),$_smarty_tpl);?>

      </th>
      <th class="price">
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_anchor'][0][0]->html_anchor(array('href'=>"/home/setOrder/price",'text'=>"price"),$_smarty_tpl);?>

      </th>
      <th>type</th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bulbs']->value, 'bulb');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['bulb']->value) {
?>
      <tr>
        <td>
          <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_anchor'][0][0]->html_anchor(array('href'=>"/cart/show/".((string)$_smarty_tpl->tpl_vars['bulb']->value->id),'text'=>((string)$_smarty_tpl->tpl_vars['bulb']->value->name)),$_smarty_tpl);?>
            
        </td>
        <td class="price">$<?php echo number_format($_smarty_tpl->tpl_vars['bulb']->value->price,2);?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['bulb']->value->type->name;?>
</td>
      </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

  </table>

<?php
}
}
/* {/block "content"} */
}
