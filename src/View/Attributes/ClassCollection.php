<?php

namespace TallSaas\View\Attributes;

use Illuminate\Support\Collection;

class ClassCollection extends Collection 
{
  public function __construct()
  {
    //
  }

  public function string()
  {
    return $this->implode(' ');
  }

  public function useable()
  {
    //
  }
}