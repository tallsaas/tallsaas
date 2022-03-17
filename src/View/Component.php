<?php

namespace TallSaas\View;

use TallSaas\View\Attributes\Tag;
use TallSaas\View\Attributes\TagTrait;
use TallSaas\View\Attributes\ClassCollection;
use TallSaas\View\Attributes\ClassTrait;
use TallSaas\View\Attributes\Style;
use TallSaas\View\Attributes\StyleTrait;
use TallSaas\View\Attributes\ForTrait;
use TallSaas\View\Attributes\VisibilityTrait;
use TallSaas\View\Attributes\ClickTrait;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\View\Component as LaravelViewComponent;

class Component extends LaravelViewComponent
{
  use StyleTrait, ClassTrait, TagTrait, ForTrait, VisibilityTrait, ClickTrait;

  public $defaultAttributes = [];

  public function __construct(
    string $tag = null, 
    array|string $class = null, 
    array|string $style = null,
    string $xShow = null,
    string $xIf = null,
    Collection|array $for = null
  )
  {
    if ($tag) :
      $this->tag($tag);
    endif;

    if ($class) :
      $this->classCollect($class);
    endif;

    if ($style) :
      $this->style($style);
    endif;

    if ($showVariable = $xShow ?: $xIf) :
      $this->show($showVariable);
    endif;

    if ($for) :
      $this->for($for);
    endif;
  }

  public function render()
  {
    $viewsPath = base_path() . '/resources/views';
    $path = Str::lower(Str::replace('\\', '/', Str::remove('App\\View\\', 
      $this::class
    )));

    if (File::exists("{$viewsPath}/{$path}.blade.php")) :

      return view($path);

    else :

      $voidElement = $this->voidElement();

      return function (array $data) use ($voidElement) {

        $html = "<{$data['tag']} {$data['attributes']->merge($data['defaultAttributes'])}";
        
        if (!$voidElement) :
          $content = $data['text'] ?: $data['slot'] ?: '';
          $html.= ">{$content}</{$data['tag']}>";
        else :
          $html.= "/>";
        endif;

        return $html;
      };

    endif;
  }

  private function voidElement(): bool
  {
    return in_array($this->tag, $this->voidElements);
  }
}