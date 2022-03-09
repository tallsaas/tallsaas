<?php

namespace TallSaas\View\Attributes;

trait ClassTrait
{
  public $class;

  public function classCollect(ClassName|array|string $class = null): ClassName
  {
    if ($class) :
      $this->class->merge(
        is_string($class) ? explode(' ', $class) : $class
      );
    endif;

    return $this->class;
  }
}