<?php
 
return [
  'extensions' => [
    'smarty' => ['class' => 'View_Smarty', 'extension' => 'tpl'],
  ],
  'View_Smarty' => [
    'extensions' => [
      'MyExtensions',
    ],
  ],
];
