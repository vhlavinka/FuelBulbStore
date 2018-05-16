{*
Valerie Hlavinka
417 - User Interfaces
Program 3
*}

{extends file="layout.tpl"}

{block name="content"}

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
    
    {foreach $cart_info as $ci}
    <tr>
        <td>
          {html_anchor href="/cart/show/{$ci['bulb_id']}" text="{$ci['name']}"}
        </td>
        <td>{$ci['bulb_id']}</td>
        <td>{$ci['type']}</td>
        <td>${number_format($ci['price'],2)}</td>
        <td>
          {$ci['amount']}
        </td>
        <td>${number_format($ci['sub_total'],2)}</td>       
    </tr>
    {/foreach}
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
        <th>${number_format($total_price,2)}</th>
    </tr>
  {if $session->get('login') && !($empty_cart)}
    {form attrs=[action=>"cart/makeBag", method=>"post"]}
      <table>   
        <button type="submit">Make a Bag from Cart</button> 
       </table>
     {/form}
   {/if}

{/block}
