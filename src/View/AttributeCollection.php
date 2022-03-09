<?php

namespace TallSaas\View;

use Illuminate\Support\Collection;

class AttributeCollection extends Collection
{
  public function html()
  {
    return $this->map(function ($value, $key) {
      return $value ? " {$key}=\"{$value}\"" : null;
    })->implode('');
  }
}