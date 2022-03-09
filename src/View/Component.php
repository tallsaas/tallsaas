<?php

namespace TallSaas\View;

use TallSaas\View\Attributes\Tag;
use TallSaas\View\Attributes\TagTrait;
use TallSaas\View\Attributes\ClassCollection;
use TallSaas\View\Attributes\ClassTrait;
use TallSaas\View\Attributes\Style;
use TallSaas\View\Attributes\StyleTrait;
use TallSaas\View\Attributes\ForTrait;
use TallSaas\View\Attributes\IfUnlessTrait;
use TallSaas\View\Attributes\ClickTrait;
use TallSaas\View\AttributeCollection;

use Illuminate\Support\Str;

use Illuminate\View\Component as LaravelViewComponent;

class Component extends LaravelViewComponent
{
  use StyleTrait, ClassTrait, TagTrait, ForTrait, IfUnlessTrait, ClickTrait;

  public function render()
  {
    $componentName = Str::lower(class_basename($this::class));
    return view("components.{$componentName}");
  }

  public function __construct(
    string $tag = null, 
    array|string $class = null, 
    array|string $style = null
  )
  {
    if ($tag) :
      $this->tag($tag);
    endif;

    if ($class) :
      $this->classCollect($class);
    else :
      $this->class = new ClassCollection;
    endif;

    if ($style) :
      $this->style($style);
    else :
      $this->style = new Style;
    endif;
  }

  public function attributes()
  {
    return new AttributeCollection([
      'class'  => $this->class->string(),
      'style'  => $this->style->string(),

      // Alpine & Livewire
      'x-show' => $this->showIf ? "obsidianBool({$this->showIf})" : ($this->hideIf ?  "!obsidianBool({$this->hideIf})" : null),
      '@click' => "obsidian({$this->click})",

      //...
    ]);
  }
}