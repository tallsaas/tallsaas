<?php

namespace TallSaas\View\Attributes;

use TallSaas\View\AttributeCollection;
use TallSaas\View\ComponentCollection;

use Obsidian\Exceptions\Web\Components\Attributes\TagNameException;

trait TagNameTrait
{
  public TagName $tagName = TagName::div;

  private array $voidElements = [
    'area',
    'base',
    'br',
    'col',
    'embed',
    'hr',
    'img',
    'input',
    'link',
    'meta',
    'param',
    'source',
    'track',
    'wbr',

    // Obsolete
    'command',
    'keygen',
    'menuitem',
  ];

  public function tagName(TagName|string $tagName): void
  {
    $this->tagName = $tagName::class === TagName::class ? $tagName : TagName::get($tagName);
  }

  public function htmlTag(AttributeCollection $attributes, string $content, ComponentCollection $children = null): string
  {
    $tagName = $this->tagName->name;
    $hasChildren = $children && $children->count();

    $html = "<{$tagName}";

    if ($attributes->count()) :
      $html.= $attributes->html();
    endif;

    if ($this->voidElement()) :
      if ($content || $hasChildren) :
        $component = class_basename($this);
        throw new TagNameException(
          "You cannot put child elements or text inside of this <{$component}> component because it has a \"{$tagName}\" tag name."
        );
      endif;

      return $html.= '/>';
    endif;

    $html.= ">";

    if ($content) :
      $html.= $content;
    endif;

    if ($hasChildren) :
      $html.= $children->map(function($component){
        return $component->print();
      })->implode('');
    endif;

    $html.= "</{$tagName}>";

    return $html;
  }

  public function voidElement(): bool
  {
    return in_array($this->tagName, $this->voidElements);
  }
}