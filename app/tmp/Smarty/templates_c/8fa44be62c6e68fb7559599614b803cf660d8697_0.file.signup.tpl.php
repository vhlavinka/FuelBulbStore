<?php
/* Smarty version 3.1.31, created on 2018-05-11 03:03:56
  from "C:\Users\la_le\OneDrive\Documents\NetBeansProjects\FuelBulbStore\fuel\app\views\home\signup.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5af5405c8d2968_40304803',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8fa44be62c6e68fb7559599614b803cf660d8697' => 
    array (
      0 => 'C:\\Users\\la_le\\OneDrive\\Documents\\NetBeansProjects\\FuelBulbStore\\fuel\\app\\views\\home\\signup.tpl',
      1 => 1526022231,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af5405c8d2968_40304803 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15106452795af5405c8c06b7_40706075', "localstyle");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19476466775af5405c8c1541_73363655', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "localstyle"} */
class Block_15106452795af5405c8c06b7_40706075 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'localstyle' => 
  array (
    0 => 'Block_15106452795af5405c8c06b7_40706075',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<style type="text/css">
    td:first-child {
      width: 10px;
    }
    td {
      border: none ! important;
    }
  </style>
<?php
}
}
/* {/block "localstyle"} */
/* {block "content"} */
class Block_19476466775af5405c8c1541_73363655 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_19476466775af5405c8c1541_73363655',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h2>Create Login/Account</h2>
    <?php $_block_plugin1 = isset($_smarty_tpl->smarty->registered_plugins['block']['form'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['form'][0][0] : null;
if (!is_callable(array($_block_plugin1, 'form'))) {
throw new SmartyException('block tag \'form\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('form', array('attrs'=>array('action'=>"signup/submit")));
$_block_repeat=true;
echo $_block_plugin1->form(array('attrs'=>array('action'=>"signup/submit")), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();
?>
    
    <table class="table table-condensed borderless">
      <tr>
        <th>name: </th>
        <td>
            <input class="form-control" type="text" name="name"
                   value='<?php echo (($tmp = @$_smarty_tpl->tpl_vars['name']->value)===null||$tmp==='' ? '' : $tmp);?>
'/>
            <span class="error"><?php echo $_smarty_tpl->tpl_vars['validator']->value->error_message('name');?>
</span>
        </td>
      </tr>
      <tr>
        <th>email: </th>
        <td>
            <input class="form-control" type="text" name="email"
                   value='<?php echo (($tmp = @$_smarty_tpl->tpl_vars['email']->value)===null||$tmp==='' ? '' : $tmp);?>
'/>
            <span class="error"><?php echo $_smarty_tpl->tpl_vars['validator']->value->error_message('email');?>
</span>
        </td>
      </tr>
      <tr>
        <th>password: </th>
        <td>
            <input class ="form-control" type="password" name="password"/>
            <span class="error"><?php echo $_smarty_tpl->tpl_vars['validator']->value->error_message('password');?>
</span>
        </td>
      </tr>
      <tr>
        <th>confirm password: </th>
        <td>
            <input class ="form-control" type="password" name="confirm"/>
            <span class="error"><?php echo $_smarty_tpl->tpl_vars['validator']->value->error_message('confirm');?>
</span>
             <h4 class='message'><?php echo (($tmp = @$_smarty_tpl->tpl_vars['message']->value)===null||$tmp==='' ? '' : $tmp);?>
</h4>
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <button type="submit" name="doit">Create</button>
          <button type="submit" name="cancel">Cancel</button>            
        </td>
      </tr>      
    </table>  
    <?php $_block_repeat=false;
echo $_block_plugin1->form(array('attrs'=>array('action'=>"signup/submit")), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

    
<?php
}
}
/* {/block "content"} */
}
