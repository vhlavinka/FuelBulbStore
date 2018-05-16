<?php
/* Smarty version 3.1.31, created on 2018-05-04 12:34:31
  from "C:\Users\la_le\OneDrive\Documents\NetBeansProjects\FuelBulbStore\fuel\app\views\layout.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5aec8b97874809_14928805',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f4a77b89a29509ca8e934650f9b88d7f5339ad93' => 
    array (
      0 => 'C:\\Users\\la_le\\OneDrive\\Documents\\NetBeansProjects\\FuelBulbStore\\fuel\\app\\views\\layout.tpl',
      1 => 1525450911,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:links.tpl' => 1,
  ),
),false)) {
function content_5aec8b97874809_14928805 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>  
      <?php ob_start();
echo basename(dirname(Uri::base(array(),$_smarty_tpl)));
$_prefixVariable1=ob_get_clean();
echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? $_prefixVariable1 : $tmp);?>

    </title>
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['asset_css'][0][0]->asset_css(array('refs'=>array("bootstrap.min.css","layout.css")),$_smarty_tpl);?>

    
  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4670699505aec8b97864132_68182210', "localstyle");
?>

</head>
<body>     
  <header>
    <div>
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['asset_img'][0][0]->asset_img(array('refs'=>"header.png",'attrs'=>array('class'=>'img-responsive')),$_smarty_tpl);?>

      <span class='login'><?php echo (($tmp = @$_smarty_tpl->tpl_vars['session']->value->get('login')->name)===null||$tmp==='' ? '' : $tmp);?>
</span>
    </div>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" 
                  class="navbar-toggle collapsed" 
                  data-toggle="collapse" 
                  data-target="#toggleMenu">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_anchor'][0][0]->html_anchor(array('href'=>'/','text'=>'Home','attrs'=>array('class'=>'navbar-brand')),$_smarty_tpl);?>

        </div>

        <div class="collapse navbar-collapse" 
             id="toggleMenu">
          <ul class="nav navbar-nav">
            <?php $_smarty_tpl->_subTemplateRender("file:links.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

          </ul>
        </div>
      </div>
    </nav>
  </header>

  <section class="container-fluid"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10584349875aec8b9786eba4_26319370', "content");
?>
</section>

  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['asset_js'][0][0]->asset_js(array('refs'=>array("jquery.min.js","bootstrap.min.js")),$_smarty_tpl);?>

  <?php echo '<script'; ?>
 type="text/javascript">
    // for Safari browser, deal with back button
    window.onpageshow = function (event) {
      if (event.persisted) {
        window.location.reload();
      }
    };
   <?php echo '</script'; ?>
>
  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1036789505aec8b97873cc0_59320396', "localscript");
?>

</body>
</html>
<?php }
/* {block "localstyle"} */
class Block_4670699505aec8b97864132_68182210 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'localstyle' => 
  array (
    0 => 'Block_4670699505aec8b97864132_68182210',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "localstyle"} */
/* {block "content"} */
class Block_10584349875aec8b9786eba4_26319370 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_10584349875aec8b9786eba4_26319370',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "content"} */
/* {block "localscript"} */
class Block_1036789505aec8b97873cc0_59320396 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'localscript' => 
  array (
    0 => 'Block_1036789505aec8b97873cc0_59320396',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "localscript"} */
}
