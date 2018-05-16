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
    td {
      border: none ! important;
    }
    textarea {
      resize: vertical;
    }
</style>
{/block}

{block name="content"}
  <h2>Add Bulb Type</h2>
  <b>Existing types:</b> <br/>
    {foreach $types as $type}     
      {$type}, 
    {/foreach}  
 
  {form attrs=['action' => '/admin/addType']}
    <table class="table table-condensed borderless">
      <tr>
        <td>name: </td>
        <td>
          <input class="form-control" type="text" name="name" 
                 value="{$name|default}" />
          <span class="error">{$validator->error_message('name')}</span>
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <button type="submit" name="doit">Add</button>
          <button type="submit" name="cancel">Cancel</button>
        </td>
      </tr>
    </table>

  {/form}
        
  <h4 class="message">{$message|default}</h4>

{/block}
