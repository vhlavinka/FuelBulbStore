{*
Valerie Hlavinka
417 - User Interfaces
Program 3
*}

{extends file="layout.tpl"}

{block name="localstyle"}
  <style type="text/css">
    td:first-child {
      width: 10px;
    }
  </style>
{/block}

{block name="content"}
<h2>My Bags</h2>
  <table class="table table-hover table-condensed">
    {foreach $bags as $bag}  
      <tr>
          <th><a href="/default/FuelBulbStore/public/bags/show/{$bag->id}">BagID #{$bag->id}</a></th>
        <th>ordered: {$bag->made_on} </th>
      </tr> 
    {/foreach}  
  </table>

{/block}