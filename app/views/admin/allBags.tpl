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
<h2>All Bags</h2>
  <table class="table table-hover table-condensed">
    {foreach $bags as $bag}  
      <tr>
        <th>{html_anchor href="/bags/show/{$bag->id}" text="BagID #{$bag->id}"}
        <th>ordered: {$bag->made_on} </th>
      </tr> 
    {/foreach}  
  </table>
 <h4 id="message">{session_get_flash var='message'}</h4>
{/block}