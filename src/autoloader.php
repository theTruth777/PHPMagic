<?php

/**
 * Basic Autloader for loading classes from:
 * core/
 * controller/
 * view/
 */

function coreClass($class_name)
{
  $file = 'controller/core/' . $class_name . '.php';
  if(file_exists($file))
  {
    require_once($file);
  }
}

function ControllerClass($class_name)
{
  $file = 'controller/' . $class_name . '.php';
  if(file_exists($file))
  {
    require_once($file);
  }
}


function coreViewClass($class_name)
{
  $file = 'view/core/' . $class_name . '.php';
  if(file_exists($file))
  {
    require_once($file);
  }
}

spl_autoload_register('coreClass');
spl_autoload_register('ControllerClass');
spl_autoload_register('coreViewClass');