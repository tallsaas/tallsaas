<?php

namespace TallSaas\View\Tailwind;

class Classes
{
  public function merge()
  {
    // If h-10 is passed to component 
    // but h-2 is already in it's ->class collection
    // then replace h-2 with h-10 in class list

    // Do the same for all pseudos: 'hover:', 'sm:', 'md:', 'lg:', etc.
    // e.g. if sm:h-10 passed to component it should replace any default sm:h-* classes
  }
}