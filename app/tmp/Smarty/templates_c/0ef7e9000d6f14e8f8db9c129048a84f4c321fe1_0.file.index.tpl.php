<?php
/* Smarty version 3.1.31, created on 2018-05-10 19:58:19
  from "C:\Users\la_le\OneDrive\Documents\NetBeansProjects\FuelBulbStore\fuel\app\views\cart\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5af4dc9bb5f642_24899563',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ef7e9000d6f14e8f8db9c129048a84f4c321fe1' => 
    array (
      0 => 'C:\\Users\\la_le\\OneDrive\\Documents\\NetBeansProjects\\FuelBulbStore\\fuel\\app\\views\\cart\\index.tpl',
      1 => 1525996697,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af4dc9bb5f642_24899563 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17070971685af4dc9bb46799_26624261', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "content"} */
class Block_17070971685af4dc9bb46799_26624261 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_17070971685af4dc9bb46799_26624261',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <h2>My Cart</h2>
  
  <table class="table table-hover table-condensed">
       <tr> 
        <th>name</th>
        <th>id</th>
        <th>type</th>
        <th>price</th>
        <th>amount</th>
        <th>sub-total</th>
      </tr>
    
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cart_info']->value, 'ci');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ci']->value) {
?>
    <tr>
        <td>
          <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_anchor'][0][0]->html_anchor(array('href'=>"/cart/show/".((string)$_smarty_tpl->tpl_vars['ci']->value['bulb_id']),'text'=>((string)$_smarty_tpl->tpl_vars['ci']->value['name'])),$_smarty_tpl);?>

        </td>
        <td><?php echo $_smarty_tpl->tpl_vars['ci']->value['bulb_id'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['ci']->value['type'];?>
</td>
        <td>$<?php echo number_format($_smarty_tpl->tpl_vars['ci']->value['price'],2);?>
</td>
        <td>
          <?php echo $_smarty_tpl->tpl_vars['ci']->value['amount'];?>

        </td>
        <td>$<?php echo number_format($_smarty_tpl->tpl_vars['ci']->value['sub_total'],2);?>
</td>       
    </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <tr>  
        <th>Total:</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th>$<?php echo number_format($_smarty_tpl->tpl_vars['total_price']->value,2);?>
</th>
    </tr>
  <?php if ($_smarty_tpl->tpl_vars['session']->value->get('login') && !($_smarty_tpl->tpl_vars['empty_cart']->value)) {?>
    <?php $_block_plugin1 = isset($_smarty_tpl->smarty->registered_plugins['block']['form'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['form'][0][0] : null;
if (!is_callable(array($_block_plugin1, 'form'))) {
throw new SmartyException('block tag \'form\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('form', array('attrs'=>array('action'=>"cart/makeBag",'method'=>"post")));
$_block_repeat=true;
echo $_block_plugin1->form(array('attrs'=>array('action'=>"cart/makeBag",'method'=>"post")), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();
?>

      <table>   
        <button type="submit">Make a Bag from Cart</button> 
       </table>
     <?php $_block_repeat=false;
echo $_block_plugin1->form(array('attrs'=>array('action'=>"cart/makeBag",'method'=>"post")), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

   <?php }?>

<?php
}
}
/* {/block "content"} */
}
