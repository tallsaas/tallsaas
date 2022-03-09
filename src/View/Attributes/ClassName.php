<?php

namespace TallSaas\View\Attributes;

use TallSaas\View\Attributes\Style\Properties;

use Illuminate\Support\Collection;

class ClassName extends Collection 
{
  public function string()
  {
    return $this->implode(' ');
  }

  public function createCssClassFiles(): void
  {
    $properties = Properties::cases();

    foreach($properties as $property) :
      $this->createCssClassFile($property->name);
    endforeach;
  }

  public function createCssClassFile(string $className)
  {
    $className = ucfirst($property->name);

    $classFile = fopen("Style/{$className}.php", "w");

    $txt = "<?php\n\nnamespace TallSaas\View\Attributes;\n\nclass {$className}\n{\n\n  //\n\n}";

    fwrite($classFile, $txt);
  }
}