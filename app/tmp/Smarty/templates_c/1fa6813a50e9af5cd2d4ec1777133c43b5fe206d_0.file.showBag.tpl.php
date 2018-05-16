<?php
/* Smarty version 3.1.31, created on 2018-05-09 23:16:36
  from "C:\Users\la_le\OneDrive\Documents\NetBeansProjects\FuelBulbStore\fuel\app\views\bags\showBag.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5af3b99485fcd8_72775615',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1fa6813a50e9af5cd2d4ec1777133c43b5fe206d' => 
    array (
      0 => 'C:\\Users\\la_le\\OneDrive\\Documents\\NetBeansProjects\\FuelBulbStore\\fuel\\app\\views\\bags\\showBag.tpl',
      1 => 1525922189,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af3b99485fcd8_72775615 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12013607355af3b99483b6e4_93872791', "content");
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "content"} */
class Block_12013607355af3b99483b6e4_93872791 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_12013607355af3b99483b6e4_93872791',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h2>Bag #<?php echo $_smarty_tpl->tpl_vars['bag']->value->id;?>
</h2>

  <?php if ($_smarty_tpl->tpl_vars['session']->value->get('login') && $_smarty_tpl->tpl_vars['session']->value->get('login')->is_admin) {?>
    User: <?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>

    <br/>
    Email: <?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>

  <?php }?>
  
   <table class="table table-hover table-condensed">
    <tr> 
        <th>name</th>
        <th>id</th>
        <th>type</th>
        <th>price</th>
        <th>amount</th>
        <?php if ($_smarty_tpl->tpl_vars['session']->value->get('login') && $_smarty_tpl->tpl_vars['session']->value->get('login')->is_admin) {?>
          <th>stock</th>
        <?php }?>
        <th>sub-total</th>
    </tr>   
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
    <tr> 
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value->bulb->name;?>
</a></td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value->bulb_id;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value->bulb->type->name;?>
</td>
        <td>$<?php echo number_format($_smarty_tpl->tpl_vars['item']->value->bulb->price,2);?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value->amount;?>
</td>
        <?php if ($_smarty_tpl->tpl_vars['session']->value->get('login') && $_smarty_tpl->tpl_vars['session']->value->get('login')->is_admin) {?>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->bulb->in_stock;?>
</td>
        <?php }?>
        <td>$<?php echo number_format($_smarty_tpl->tpl_vars['item']->value->amount*$_smarty_tpl->tpl_vars['item']->value->bulb->price,2);?>
</td>       
    </tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>


    <tr>
        <th>Total:</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <?php if ($_smarty_tpl->tpl_vars['session']->value->get('login') && $_smarty_tpl->tpl_vars['session']->value->get('login')->is_admin) {?>
          <th></th>
        <?php }?>
        <th>$<?php echo number_format($_smarty_tpl->tpl_vars['total']->value,2);?>
</th>
    </tr>
  </table>
  <br/>
  
  <?php if ($_smarty_tpl->tpl_vars['session']->value->get('login') && $_smarty_tpl->tpl_vars['session']->value->get('login')->is_admin) {?>
    <?php $_block_plugin1 = isset($_smarty_tpl->smarty->registered_plugins['block']['form'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['form'][0][0] : null;
if (!is_callable(array($_block_plugin1, 'form'))) {
throw new SmartyException('block tag \'form\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('form', array('attrs'=>array('action'=>"admin/processBag",'method'=>"get")));
$_block_repeat=true;
echo $_block_plugin1->form(array('attrs'=>array('action'=>"admin/processBag",'method'=>"get")), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();
?>

      <input type='hidden' name='bag_id' value="<?php echo $_smarty_tpl->tpl_vars['bag_id']->value;?>
" />
      <button type="submit"><?php ob_start();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['session_get_flash'][0][0]->session_get_flash(array('var'=>'button_title'),$_smarty_tpl);
$_prefixVariable1=ob_get_clean();
echo (($tmp = @$_prefixVariable1)===null||$tmp==='' ? 'Process' : $tmp);?>
</button>
      <input type='hidden' name='confirm' 
        value='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['session_get_flash'][0][0]->session_get_flash(array('var'=>'confirm'),$_smarty_tpl);?>
' />
    <?php $_block_repeat=false;
echo $_block_plugin1->form(array('attrs'=>array('action'=>"admin/processBag",'method'=>"get")), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

  <?php }?>
  <h4 id="message"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['session_get_flash'][0][0]->session_get_flash(array('var'=>'message'),$_smarty_tpl);?>
</h4>

<?php
}
}
/* {/block "content"} */
}
