<?php

namespace TallSaas\View\Attributes;

trait VisibilityTrait
{
  public $showIf;

  public function show(string $variableOrLogic): void
  {
    $this->showIf = $variableOrLogic;
  }
}