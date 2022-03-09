<?php

namespace TallSaas\View\Attributes;

trait ClassNameTrait
{
  public ClassName $className;

  public function className(ClassName|array|string $className = null): ClassName
  {
    if ($className) :
      $this->className->merge(
        is_string($className) ? explode(' ', $className) : $className
      );
    endif;

    return $this->className;
  }
}