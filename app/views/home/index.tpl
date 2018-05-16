{*
Valerie Hlavinka
417 - User Interfaces
Program 3
*}

{extends file="layout.tpl"}

{block name="localstyle"}
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
{/block}

{block name="content"}

  <div class='top'>
    <h2>Bulb Selection <span class="order">(by {Session::get('order')})</span></h2>
    {form attrs=['action' => "/home",
    'method'=>'post']}
      <button type="submit" name="doit">Show by Type:</button>
      <select name = "dd">
          {html_options options=$types selected={Session::get('type_id')}}}
      </select>
    {/form}
  </div>

  <table class="table table-hover table-condensed">
    <tr>
      <th>
        {html_anchor href="/home/setOrder/name" text="name"}
      </th>
      <th class="price">
        {html_anchor href="/home/setOrder/price" text="price"}
      </th>
      <th>type</th>
    </tr>
    {foreach $bulbs as $bulb}
      <tr>
        <td>
          {html_anchor href="/cart/show/{$bulb->id}" text="{$bulb->name}"}            
        </td>
        <td class="price">${number_format($bulb->price,2)}</td>
        <td>{$bulb->type->name}</td>
      </tr>
    {/foreach}
  </table>

{/block}
