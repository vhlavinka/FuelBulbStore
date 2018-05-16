<?php
/* Smarty version 3.1.31, created on 2018-05-11 02:37:50
  from "C:\Users\la_le\OneDrive\Documents\NetBeansProjects\FuelBulbStore\fuel\app\views\home\showBulb.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5af53a3e125435_60659959',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d902acc894be069e9407dfcdd7b6486661a95a8' => 
    array (
      0 => 'C:\\Users\\la_le\\OneDrive\\Documents\\NetBeansProjects\\FuelBulbStore\\fuel\\app\\views\\home\\showBulb.tpl',
      1 => 1526020665,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af53a3e125435_60659959 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12468359995af53a3e0b4b50_69564555', "localstyle");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4031721925af53a3e0b5e83_00385624', "localscript");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16350406235af53a3e0b6bc5_33373587', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "localstyle"} */
class Block_12468359995af53a3e0b4b50_69564555 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'localstyle' => 
  array (
    0 => 'Block_12468359995af53a3e0b4b50_69564555',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <style type="text/css">
    .content {
      padding: 0 3px;
    }
    button {
      white-space: nowrap;
    }
    img {
      max-height: 250px;
      max-width: 250px;
    }
    input[name=amount] {
      width: 50px;
    }
    #err_msg {
      color: red;
    }
  </style>
<?php
}
}
/* {/block "localstyle"} */
/* {block "localscript"} */
class Block_4031721925af53a3e0b5e83_00385624 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'localscript' => 
  array (
    0 => 'Block_4031721925af53a3e0b5e83_00385624',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <?php echo '<script'; ?>
  type="text/javascript">
    $(function() {
      $("input[name='amount']").keypress(function (e) {
        //if key is not backspace, not an arrow, or not a digit, ignore it
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
          $("#err_msg").html("(digits only)").show().fadeOut(2000);
          return false;
        }
      });
    });
  <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "localscript"} */
/* {block "content"} */
class Block_16350406235af53a3e0b6bc5_33373587 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_16350406235af53a3e0b6bc5_33373587',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <div class="content">
    <p>
      <b><?php echo $_smarty_tpl->tpl_vars['bulb']->value->name;?>
 (#<?php echo $_smarty_tpl->tpl_vars['bulb']->value->id;?>
)</b>
      <br />
      price: $<?php echo number_format($_smarty_tpl->tpl_vars['bulb']->value->price,2);?>
      
      <br />
      type: <?php echo $_smarty_tpl->tpl_vars['bulb']->value->type->name;?>
      
    </p>

    <p>
      <?php echo $_smarty_tpl->tpl_vars['bulb']->value->description;?>
  
    </p>
  </div>

  <table class='table table-condensed borderless'>
    <tr>
      <td>  
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['asset_img'][0][0]->asset_img(array('refs'=>"bulbs/".((string)$_smarty_tpl->tpl_vars['bulb']->value->image->name),'attrs'=>array('class'=>'img-responsive')),$_smarty_tpl);?>

      </td>
      <td>
        <?php if ($_smarty_tpl->tpl_vars['session']->value->get('login') && $_smarty_tpl->tpl_vars['session']->value->get('login')->is_admin) {?>
          <?php $_block_plugin1 = isset($_smarty_tpl->smarty->registered_plugins['block']['form'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['form'][0][0] : null;
if (!is_callable(array($_block_plugin1, 'form'))) {
throw new SmartyException('block tag \'form\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('form', array('attrs'=>array('action'=>"/admin/modifyBulbInitial/".((string)$_smarty_tpl->tpl_vars['bulb']->value->id))));
$_block_repeat=true;
echo $_block_plugin1->form(array('attrs'=>array('action'=>"/admin/modifyBulbInitial/".((string)$_smarty_tpl->tpl_vars['bulb']->value->id))), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();
?>

            <button type="submit">Modify Bulb</button> 
          <?php $_block_repeat=false;
echo $_block_plugin1->form(array('attrs'=>array('action'=>"/admin/modifyBulbInitial/".((string)$_smarty_tpl->tpl_vars['bulb']->value->id))), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

        <?php } else { ?>  
          <?php $_block_plugin2 = isset($_smarty_tpl->smarty->registered_plugins['block']['form'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['form'][0][0] : null;
if (!is_callable(array($_block_plugin2, 'form'))) {
throw new SmartyException('block tag \'form\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('form', array('attrs'=>array('action'=>"cart/changeAmount",'method'=>"get")));
$_block_repeat=true;
echo $_block_plugin2->form(array('attrs'=>array('action'=>"cart/changeAmount",'method'=>"get")), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();
?>

            <b>Amount</b> <span id="err_msg"></span>
            <br />
            <input type='hidden' name='bulb_id' value="<?php echo $_smarty_tpl->tpl_vars['bulb']->value->id;?>
" />
            <input type="text" name="amount" value="<?php echo $_smarty_tpl->tpl_vars['amount']->value;?>
"/>
            <button type="submit">Change Amount</button>
          <?php $_block_repeat=false;
echo $_block_plugin2->form(array('attrs'=>array('action'=>"cart/changeAmount",'method'=>"get")), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

        <?php }?>
      </td>
    </tr>
  </table>

<?php
}
}
/* {/block "content"} */
}
