<?php

namespace TallSaas\View\Attributes;

use TallSaas\View\AttributeCollection;
use TallSaas\View\ComponentCollection;

trait TagTrait
{
  public Tag $tag = Tag::div;

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

  public function tag(Tag|string $tag): void
  {
    $this->tag = $tag::class === Tag::class ? $tag : Tag::get($tag);
  }

  public function voidElement(): bool
  {
    return in_array($this->tag, $this->voidElements);
  }
}