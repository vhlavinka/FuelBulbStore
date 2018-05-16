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
  </style>
{/block}

{block name="content"}
    <h2>Create Login/Account</h2>
    {form attrs=['action' => "signup/submit"]}    
    <table class="table table-condensed borderless">
      <tr>
        <th>name: </th>
        <td>
            <input class="form-control" type="text" name="name"
                   value='{$name|default}'/>
            <span class="error">{$validator->error_message('name')}</span>
        </td>
      </tr>
      <tr>
        <th>email: </th>
        <td>
            <input class="form-control" type="text" name="email"
                   value='{$email|default}'/>
            <span class="error">{$validator->error_message('email')}</span>
        </td>
      </tr>
      <tr>
        <th>password: </th>
        <td>
            <input class ="form-control" type="password" name="password"/>
            <span class="error">{$validator->error_message('password')}</span>
        </td>
      </tr>
      <tr>
        <th>confirm password: </th>
        <td>
            <input class ="form-control" type="password" name="confirm"/>
            <span class="error">{$validator->error_message('confirm')}</span>
             <h4 class='message'>{$message|default}</h4>
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
    {/form}
    
{/block}