<?php

namespace TallSaas\View;

use TallSaas\View\Attributes\TagName;
use TallSaas\View\Attributes\ClassName;
use TallSaas\View\Attributes\ClassNameTrait;
use TallSaas\View\Attributes\Style;
use TallSaas\View\Attributes\StyleTrait;
use TallSaas\View\Attributes\TagNameTrait;
use TallSaas\View\Attributes\ForTrait;
use TallSaas\View\Attributes\IfUnlessTrait;
use TallSaas\View\Attributes\ClickTrait;
use TallSaas\View\ComponentCollection;
use TallSaas\View\AttributeCollection;

use Illuminate\View\Component as LaravelViewComponent;

class Component extends LaravelViewComponent
{
  use StyleTrait, ClassNameTrait, TagNameTrait, ForTrait, IfUnlessTrait, ClickTrait;

  public string $viewPath;

  public function render()
  {
    //
  }

  public function __construct(
    TagName|string $tagName = null, 
    ClassName|array|string $className = null, 
    Style|array|string $style = null
  )
  {
    if ($tagName) :
      $this->tagName($tagName);
    endif;

    if ($className) :
      $this->className($className);
    else :
      $this->className = new ClassName;
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
      'class'  => $this->className->string(),
      'style'  => $this->style->string(),

      // Alpine & Livewire
      'x-show' => $this->showIf ? "obsidianBool({$this->showIf})" : ($this->hideIf ?  "!obsidianBool({$this->hideIf})" : null),
      '@click' => "obsidian({$this->click})",

      //...
    ]);
  }

  // Could pass child elements to this one
  // and print together
  public function printWithChildren(...$params): string
  {
    if (count($params)) :
      new ComponentCollection($params);
    endif;

    return $html;
  }

  public function print(): string 
  {
    if ($this->for->count()) :
      $component = $this;
      $componentType = $this::class;

      $html.= $this->for->map(function($item) use ($component) {
        $forComponent = $component;
        $forComponent->data = $item;

        return $forComponent->print();
      });
    endif;

    return $this->htmlTag(
      $this->attributes(),
      $content = '',
      $children = null
    );
  }

}