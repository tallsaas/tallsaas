<?php

namespace TallSaas\Alpine;

class Transition
{
  private $enter, $enterStart, $enterEnd, $leave, $leaveStart, $leaveEnd;

  public const fadeDown = [
    'enter'      => 'transition ease-out duration-200',
    'enterStart' => 'transform opacity-0 scale-95',
    'enterEnd'   => 'transform opacity-100 scale-100',
    'leave'      => 'transition ease-in duration-75',
    'leaveStart' => 'transform opacity-100 scale-100',
    'leaveEnd'   => 'transform opacity-0 scale-95',
  ];

  public function fadeDown()
  {
    return (new Transition(Transition::fadeDown))->attributes();
  }

  private function __construct(array $transition)
  {
    $this->enter      = $transition['enter'];
    $this->enterStart = $transition['enterStart'];
    $this->enterEnd   = $transition['enterEnd'];
    $this->leave      = $transition['leave'];
    $this->leaveStart = $transition['leaveStart'];
    $this->leaveEnd   = $transition['leaveEnd'];
  }
  
  private function attributes()
  {
    return join(' ', [
      'x-transition:enter="{$this->enter}"',
      'x-transition:enter-start="{$this->enterStart}"',
      'x-transition:enter-end="{$this->enterEnd}"',
      'x-transition:leave="{$this->leave}"',
      'x-transition:leave-start="{$this->leaveStart}"',
      'x-transition:leave-end="{$this->leaveEnd}"',
    ]);
  }
}