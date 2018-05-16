<?php
/* Smarty version 3.1.31, created on 2018-05-11 03:20:03
  from "C:\Users\la_le\OneDrive\Documents\NetBeansProjects\FuelBulbStore\fuel\app\views\admin\modifyBulb.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5af54423cad695_90796307',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7bea4ace08566c284a551ea502d25acd32eae921' => 
    array (
      0 => 'C:\\Users\\la_le\\OneDrive\\Documents\\NetBeansProjects\\FuelBulbStore\\fuel\\app\\views\\admin\\modifyBulb.tpl',
      1 => 1526023191,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af54423cad695_90796307 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\Users\\la_le\\OneDrive\\Documents\\NetBeansProjects\\FuelBulbStore\\fuel\\vendor\\smarty\\smarty\\libs\\plugins\\function.html_options.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8976483735af54423c92ca4_63671787', "localstyle");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5554328705af54423c93e41_43313938', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "localstyle"} */
class Block_8976483735af54423c92ca4_63671787 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'localstyle' => 
  array (
    0 => 'Block_8976483735af54423c92ca4_63671787',
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
    textarea {
      resize: vertical;
    }
  </style>
<?php
}
}
/* {/block "localstyle"} */
/* {block "content"} */
class Block_5554328705af54423c93e41_43313938 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_5554328705af54423c93e41_43313938',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <h2>Modify Bulb</h2>

    <?php $_block_plugin1 = isset($_smarty_tpl->smarty->registered_plugins['block']['form'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['form'][0][0] : null;
if (!is_callable(array($_block_plugin1, 'form'))) {
throw new SmartyException('block tag \'form\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('form', array('attrs'=>array('action'=>"/admin/modifyBulb/".((string)$_smarty_tpl->tpl_vars['bulb_id']->value),'method'=>'post')));
$_block_repeat=true;
echo $_block_plugin1->form(array('attrs'=>array('action'=>"/admin/modifyBulb/".((string)$_smarty_tpl->tpl_vars['bulb_id']->value),'method'=>'post')), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();
?>

    <table class="table table-condensed borderless">
      <tr>
        <td>name: </td>
        <td>
          <?php echo (($tmp = @$_smarty_tpl->tpl_vars['name']->value)===null||$tmp==='' ? '' : $tmp);?>

        </td>
      </tr>
      <tr>
        <td>type: </td>
        <td>
            <?php echo (($tmp = @$_smarty_tpl->tpl_vars['type']->value)===null||$tmp==='' ? '' : $tmp);?>

        </td>
      </tr>
      <tr>
        <td>price ($): </td>
        <td>
          <input class="form-control" type="text" name="price" 
                 value="<?php echo number_format((($tmp = @$_smarty_tpl->tpl_vars['price']->value)===null||$tmp==='' ? '' : $tmp),2);?>
" />
          <span class="error"><?php echo $_smarty_tpl->tpl_vars['validator']->value->error_message('price');?>
</span>
        </td>
      </tr>
      <tr>
        <td>in stock: </td>
        <td>
          <input class="form-control" type="text" name="in_stock" 
                 value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['in_stock']->value)===null||$tmp==='' ? '' : $tmp);?>
" />
          <span class="error"><?php echo $_smarty_tpl->tpl_vars['validator']->value->error_message('in_stock');?>
</span>
        </td>
      </tr>
      <tr>
        <td>description: </td>
        <td>
          <textarea class="form-control" name="description"
                    ><?php echo (($tmp = @$_smarty_tpl->tpl_vars['description']->value)===null||$tmp==='' ? '' : $tmp);?>
</textarea>
        </td>
      </tr>
      <tr>
        <td>image: </td>
        <td>
          <select class="form-control" name="image">
            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['images']->value,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['image']->value)===null||$tmp==='' ? '' : $tmp)),$_smarty_tpl);?>

          </select>
        </td>
      </tr>
      <tr>
        <td></td>
        <td>  
          <button type="submit" name="doit">Modify</button>
          <button type="submit" name="cancel">Cancel</button>
        </td>
      </tr>
    </table>

  <?php $_block_repeat=false;
echo $_block_plugin1->form(array('attrs'=>array('action'=>"/admin/modifyBulb/".((string)$_smarty_tpl->tpl_vars['bulb_id']->value),'method'=>'post')), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

        
  <h4 class="message"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['message']->value)===null||$tmp==='' ? '' : $tmp);?>
</h4>
  
  
<?php
}
}
/* {/block "content"} */
}
