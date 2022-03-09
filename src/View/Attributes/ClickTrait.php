<?php

namespace TallSaas\View\Attributes;

trait ClickTrait
{
  public $click;

  public function click(string $eventName): void
  {
    $this->click = $eventName;
  }
}