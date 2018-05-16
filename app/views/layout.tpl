<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>  
      {$page_title|default:{base_url|dirname|basename}}
    </title>
    {asset_css refs=["bootstrap.min.css","layout.css"]}
    
  {block name="localstyle"}{/block}
</head>
<body>     
  <header>
    <div>
      {asset_img refs="header.png" attrs=['class'=>'img-responsive']}
      <span class='login'>{$session->get('login')->name|default}</span>
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
          {html_anchor href='/' text='Home' attrs=['class' => 'navbar-brand']}
        </div>

        <div class="collapse navbar-collapse" 
             id="toggleMenu">
          <ul class="nav navbar-nav">
            {include file="links.tpl"}
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <section class="container-fluid">{block name="content"}{/block}</section>

  {asset_js refs=["jquery.min.js","bootstrap.min.js"]}
  <script type="text/javascript">
    // for Safari browser, deal with back button
    window.onpageshow = function (event) {
      if (event.persisted) {
        window.location.reload();
      }
    };
   </script>
  {block name="localscript"}{/block}
</body>
</html>
