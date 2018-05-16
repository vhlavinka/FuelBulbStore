{if $session->get('login') && $session->get('login')->is_admin}
    <li>{html_anchor href='/admin/allBags' text='All Bags'}</li>
    <li>{html_anchor href='/admin/addBulbInitial' text='Add Bulb'}</li>
    <li>{html_anchor href='/admin/addTypeInitial' text='Add Type'}</li>    
{else}    
    <li>{html_anchor href='/cart' text='Cart'}</li>
{/if}

{if $session->get('login') && !($session->get('login')->is_admin)}
  <li>{html_anchor href='/bags' text='My Bags'}</li>
{/if}

{if $session->get('login')}
  <li>{html_anchor href='/authenticate/logout' text='Logout'}</li>
{else}
  <li>{html_anchor href='/authenticate/login' text='Login'}</li>
{/if}

{if !$session->get('login')}
  <li>{html_anchor href='/signup' text ='Create Login'}</li>
{/if}
