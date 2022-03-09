<?php

namespace TallSaas\View\Attributes;

trait IfUnlessTrait
{
  public $showIf;
  public $hideIf;

  public function if(string $variableName): void
  {
    $this->showIf = $variableName;
  }

  public function unless(string $variableName): void
  {
    $this->hideIf = $variableName;
  }
}