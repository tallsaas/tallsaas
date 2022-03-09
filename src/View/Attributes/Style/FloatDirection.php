<?php

namespace TallSaas\View\Attributes\Style;

 /** 
  *  "Float" is reserved class
  */

enum FloatDirection
{
  case left;    // The element floats to the left of its container
  case right;   // The element floats to the right of its container
  case none;    // The element does not float (will be displayed just where it occurs in the text). This is default
  case inherit; // The element inherits the float value of its parent
}