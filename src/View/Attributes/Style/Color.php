<?php

namespace TallSaas\View\Attributes\Style;

use Illuminate\Support\Collection;

use ReflectionClass;
use ReflectionMethod;

class Color
{
  public string $name;
  public string $rgb;
  public string $hex;

  public function __construct(string $name = null, string $hex = null, string $rgb = null)
  {
    if (!is_null($name)) :
      $this->color($name);
    endif;

    $this->hex = $hex;
    $this->rgb = $rgb;
  }

  public function __get(string $name)
  {
    return self::__color($name);
  }

  public static function __callStatic(string $method, array $args)
  {
    $staticMethods = (new ReflectionClass(__CLASS__))->getMethods(ReflectionMethod::IS_STATIC);
    $staticMethods = (new Collection($staticMethods))->pluck('name')->all();

    if (!in_array($method, $staticMethods)) :
      return self::__color(name: $method);
    endif;
  }

  private function color(string $name): self
  {
    if (!$color = self::__colors()[$name] ?? null) :
      throw new Exception("Whoops...\"{$name}\" is not a valid CSS color name");
    endif;

    $this->name = $name;
    $this->hex = $color['hex'];
    $this->rgb = $color['rgb'];

    return $this;
  }

  private static function __color(string $name): Color
  {
    if (!$color = self::__colors()[$name] ?? null) :
      throw new Exception("Whoops...\"{$name}\" is not a valid CSS color name");
    endif;

    return new Color(
      name: $name
    );
  }

  private static function __colors(string $find = null): array
  {
    $colors = (new ReflectionClass(__CLASS__))->getConstants();

    if (!$find) return $colors;

    if ($color = $colors[$name] ?? null) :
      return $color;
    endif;

    throw new Exception("Whoops...\"{$find}\" is not a valid CSS color name");
  }

  public const aliceblue = ['name' => 'aliceblue', 'hex' => '#f0f8ff', 'rgb' => '240,248,255'];
  public const antiquewhite = ['name' => 'antiquewhite', 'hex' => '#faebd7', 'rgb' => '250,235,215'];
  public const aqua = ['name' => 'aqua', 'hex' => '#00ffff', 'rgb' => '0,255,255'];
  public const aquamarine = ['name' => 'aquamarine', 'hex' => '#7fffd4', 'rgb' => '127,255,212'];
  public const azure = ['name' => 'azure', 'hex' => '#f0ffff', 'rgb' => '240,255,255'];
  public const beige = ['name' => 'beige', 'hex' => '#f5f5dc', 'rgb' => '245,245,220'];
  public const bisque = ['name' => 'bisque', 'hex' => '#ffe4c4', 'rgb' => '255,228,196'];
  public const black = ['name' => 'black', 'hex' => '#000000', 'rgb' => '0,0,0'];
  public const blanchedalmond = ['name' => 'blanchedalmond', 'hex' => '#ffebcd', 'rgb' => '255,235,205'];
  public const blue = ['name' => 'blue', 'hex' => '#0000ff', 'rgb' => '0,0,255'];
  public const blueviolet = ['name' => 'blueviolet', 'hex' => '#8a2be2', 'rgb' => '138,43,226'];
  public const brown = ['name' => 'brown', 'hex' => '#a52a2a', 'rgb' => '165,42,42'];
  public const burlywood = ['name' => 'burlywood', 'hex' => '#deb887', 'rgb' => '222,184,135'];
  public const cadetblue = ['name' => 'cadetblue', 'hex' => '#5f9ea0', 'rgb' => '95,158,160'];
  public const chartreuse = ['name' => 'chartreuse', 'hex' => '#7fff00', 'rgb' => '127,255,0'];
  public const chocolate = ['name' => 'chocolate', 'hex' => '#d2691e', 'rgb' => '210,105,30'];
  public const coral = ['name' => 'coral', 'hex' => '#ff7f50', 'rgb' => '255,127,80'];
  public const cornflowerblue = ['name' => 'cornflowerblue', 'hex' => '#6495ed', 'rgb' => '100,149,237'];
  public const cornsilk = ['name' => 'cornsilk', 'hex' => '#fff8dc', 'rgb' => '255,248,220'];
  public const crimson = ['name' => 'crimson', 'hex' => '#dc143c', 'rgb' => '220,20,60'];
  public const cyan = ['name' => 'cyan', 'hex' => '#00ffff', 'rgb' => '0,255,255'];
  public const darkblue = ['name' => 'darkblue', 'hex' => '#00008b', 'rgb' => '0,0,139'];
  public const darkcyan = ['name' => 'darkcyan', 'hex' => '#008b8b', 'rgb' => '0,139,139'];
  public const darkgoldenrod = ['name' => 'darkgoldenrod', 'hex' => '#b8860b', 'rgb' => '184,134,11'];
  public const darkgray = ['name' => 'darkgray', 'hex' => '#a9a9a9', 'rgb' => '169,169,169'];
  public const darkgreen = ['name' => 'darkgreen', 'hex' => '#006400', 'rgb' => '0,100,0'];
  public const darkgrey = ['name' => 'darkgrey', 'hex' => '#a9a9a9', 'rgb' => '169,169,169'];
  public const darkkhaki = ['name' => 'darkkhaki', 'hex' => '#bdb76b', 'rgb' => '189,183,107'];
  public const darkmagenta = ['name' => 'darkmagenta', 'hex' => '#8b008b', 'rgb' => '139,0,139'];
  public const darkolivegreen = ['name' => 'darkolivegreen', 'hex' => '#556b2f', 'rgb' => '85,107,47'];
  public const darkorange = ['name' => 'darkorange', 'hex' => '#ff8c00', 'rgb' => '255,140,0'];
  public const darkorchid = ['name' => 'darkorchid', 'hex' => '#9932cc', 'rgb' => '153,50,204'];
  public const darkred = ['name' => 'darkred', 'hex' => '#8b0000', 'rgb' => '139,0,0'];
  public const darksalmon = ['name' => 'darksalmon', 'hex' => '#e9967a', 'rgb' => '233,150,122'];
  public const darkseagreen = ['name' => 'darkseagreen', 'hex' => '#8fbc8f', 'rgb' => '143,188,143'];
  public const darkslateblue = ['name' => 'darkslateblue', 'hex' => '#483d8b', 'rgb' => '72,61,139'];
  public const darkslategray = ['name' => 'darkslategray', 'hex' => '#2f4f4f', 'rgb' => '47,79,79'];
  public const darkslategrey = ['name' => 'darkslategrey', 'hex' => '#2f4f4f', 'rgb' => '47,79,79'];
  public const darkturquoise = ['name' => 'darkturquoise', 'hex' => '#00ced1', 'rgb' => '0,206,209'];
  public const darkviolet = ['name' => 'darkviolet', 'hex' => '#9400d3', 'rgb' => '148,0,211'];
  public const deeppink = ['name' => 'deeppink', 'hex' => '#ff1493', 'rgb' => '255,20,147'];
  public const deepskyblue = ['name' => 'deepskyblue', 'hex' => '#00bfff', 'rgb' => '0,191,255'];
  public const dimgray = ['name' => 'dimgray', 'hex' => '#696969', 'rgb' => '105,105,105'];
  public const dimgrey = ['name' => 'dimgrey', 'hex' => '#696969', 'rgb' => '105,105,105'];
  public const dodgerblue = ['name' => 'dodgerblue', 'hex' => '#1e90ff', 'rgb' => '30,144,255'];
  public const firebrick = ['name' => 'firebrick', 'hex' => '#b22222', 'rgb' => '178,34,34'];
  public const floralwhite = ['name' => 'floralwhite', 'hex' => '#fffaf0', 'rgb' => '255,250,240'];
  public const forestgreen = ['name' => 'forestgreen', 'hex' => '#228b22', 'rgb' => '34,139,34'];
  public const fuchsia = ['name' => 'fuchsia', 'hex' => '#ff00ff', 'rgb' => '255,0,255'];
  public const gainsboro = ['name' => 'gainsboro', 'hex' => '#dcdcdc', 'rgb' => '220,220,220'];
  public const ghostwhite = ['name' => 'ghostwhite', 'hex' => '#f8f8ff', 'rgb' => '248,248,255'];
  public const gold = ['name' => 'gold', 'hex' => '#ffd700', 'rgb' => '255,215,0'];
  public const goldenrod = ['name' => 'goldenrod', 'hex' => '#daa520', 'rgb' => '218,165,32'];
  public const gray = ['name' => 'gray', 'hex' => '#808080', 'rgb' => '128,128,128'];
  public const green = ['name' => 'green', 'hex' => '#008000', 'rgb' => '0,128,0'];
  public const greenyellow = ['name' => 'greenyellow', 'hex' => '#adff2f', 'rgb' => '173,255,47'];
  public const grey = ['name' => 'grey', 'hex' => '#808080', 'rgb' => '128,128,128'];
  public const honeydew = ['name' => 'honeydew', 'hex' => '#f0fff0', 'rgb' => '240,255,240'];
  public const hotpink = ['name' => 'hotpink', 'hex' => '#ff69b4', 'rgb' => '255,105,180'];
  public const indianred = ['name' => 'indianred', 'hex' => '#cd5c5c', 'rgb' => '205,92,92'];
  public const indigo = ['name' => 'indigo', 'hex' => '#4b0082', 'rgb' => '75,0,130'];
  public const ivory = ['name' => 'ivory', 'hex' => '#fffff0', 'rgb' => '255,255,240'];
  public const khaki = ['name' => 'khaki', 'hex' => '#f0e68c', 'rgb' => '240,230,140'];
  public const lavender = ['name' => 'lavender', 'hex' => '#e6e6fa', 'rgb' => '230,230,250'];
  public const lavenderblush = ['name' => 'lavenderblush', 'hex' => '#fff0f5', 'rgb' => '255,240,245'];
  public const lawngreen = ['name' => 'lawngreen', 'hex' => '#7cfc00', 'rgb' => '124,252,0'];
  public const lemonchiffon = ['name' => 'lemonchiffon', 'hex' => '#fffacd', 'rgb' => '255,250,205'];
  public const lightblue = ['name' => 'lightblue', 'hex' => '#add8e6', 'rgb' => '173,216,230'];
  public const lightcoral = ['name' => 'lightcoral', 'hex' => '#f08080', 'rgb' => '240,128,128'];
  public const lightcyan = ['name' => 'lightcyan', 'hex' => '#e0ffff', 'rgb' => '224,255,255'];
  public const lightgoldenrodyellow = ['name' => 'lightgoldenrodyellow', 'hex' => '#fafad2', 'rgb' => '250,250,210'];
  public const lightgray = ['name' => 'lightgray', 'hex' => '#d3d3d3', 'rgb' => '211,211,211'];
  public const lightgreen = ['name' => 'lightgreen', 'hex' => '#90ee90', 'rgb' => '144,238,144'];
  public const lightgrey = ['name' => 'lightgrey', 'hex' => '#d3d3d3', 'rgb' => '211,211,211'];
  public const lightpink = ['name' => 'lightpink', 'hex' => '#ffb6c1', 'rgb' => '255,182,193'];
  public const lightsalmon = ['name' => 'lightsalmon', 'hex' => '#ffa07a', 'rgb' => '255,160,122'];
  public const lightseagreen = ['name' => 'lightseagreen', 'hex' => '#20b2aa', 'rgb' => '32,178,170'];
  public const lightskyblue = ['name' => 'lightskyblue', 'hex' => '#87cefa', 'rgb' => '135,206,250'];
  public const lightslategray = ['name' => 'lightslategray', 'hex' => '#778899', 'rgb' => '119,136,153'];
  public const lightslategrey = ['name' => 'lightslategrey', 'hex' => '#778899', 'rgb' => '119,136,153'];
  public const lightsteelblue = ['name' => 'lightsteelblue', 'hex' => '#b0c4de', 'rgb' => '176,196,222'];
  public const lightyellow = ['name' => 'lightyellow', 'hex' => '#ffffe0', 'rgb' => '255,255,224'];
  public const lime = ['name' => 'lime', 'hex' => '#00ff00', 'rgb' => '0,255,0'];
  public const limegreen = ['name' => 'limegreen', 'hex' => '#32cd32', 'rgb' => '50,205,50'];
  public const linen = ['name' => 'linen', 'hex' => '#faf0e6', 'rgb' => '250,240,230'];
  public const magenta = ['name' => 'magenta', 'hex' => '#ff00ff', 'rgb' => '255,0,255'];
  public const maroon = ['name' => 'maroon', 'hex' => '#800000', 'rgb' => '128,0,0'];
  public const mediumaquamarine = ['name' => 'mediumaquamarine', 'hex' => '#66cdaa', 'rgb' => '102,205,170'];
  public const mediumblue = ['name' => 'mediumblue', 'hex' => '#0000cd', 'rgb' => '0,0,205'];
  public const mediumorchid = ['name' => 'mediumorchid', 'hex' => '#ba55d3', 'rgb' => '186,85,211'];
  public const mediumpurple = ['name' => 'mediumpurple', 'hex' => '#9370db', 'rgb' => '147,112,219'];
  public const mediumseagreen = ['name' => 'mediumseagreen', 'hex' => '#3cb371', 'rgb' => '60,179,113'];
  public const mediumslateblue = ['name' => 'mediumslateblue', 'hex' => '#7b68ee', 'rgb' => '123,104,238'];
  public const mediumspringgreen = ['name' => 'mediumspringgreen', 'hex' => '#00fa9a', 'rgb' => '0,250,154'];
  public const mediumturquoise = ['name' => 'mediumturquoise', 'hex' => '#48d1cc', 'rgb' => '72,209,204'];
  public const mediumvioletred = ['name' => 'mediumvioletred', 'hex' => '#c71585', 'rgb' => '199,21,133'];
  public const midnightblue = ['name' => 'midnightblue', 'hex' => '#191970', 'rgb' => '25,25,112'];
  public const mintcream = ['name' => 'mintcream', 'hex' => '#f5fffa', 'rgb' => '245,255,250'];
  public const mistyrose = ['name' => 'mistyrose', 'hex' => '#ffe4e1', 'rgb' => '255,228,225'];
  public const moccasin = ['name' => 'moccasin', 'hex' => '#ffe4b5', 'rgb' => '255,228,181'];
  public const navajowhite = ['name' => 'navajowhite', 'hex' => '#ffdead', 'rgb' => '255,222,173'];
  public const navy = ['name' => 'navy', 'hex' => '#000080', 'rgb' => '0,0,128'];
  public const oldlace = ['name' => 'oldlace', 'hex' => '#fdf5e6', 'rgb' => '253,245,230'];
  public const olive = ['name' => 'olive', 'hex' => '#808000', 'rgb' => '128,128,0'];
  public const olivedrab = ['name' => 'olivedrab', 'hex' => '#6b8e23', 'rgb' => '107,142,35'];
  public const orange = ['name' => 'orange', 'hex' => '#ffa500', 'rgb' => '255,165,0'];
  public const orangered = ['name' => 'orangered', 'hex' => '#ff4500', 'rgb' => '255,69,0'];
  public const orchid = ['name' => 'orchid', 'hex' => '#da70d6', 'rgb' => '218,112,214'];
  public const palegoldenrod = ['name' => 'palegoldenrod', 'hex' => '#eee8aa', 'rgb' => '238,232,170'];
  public const palegreen = ['name' => 'palegreen', 'hex' => '#98fb98', 'rgb' => '152,251,152'];
  public const paleturquoise = ['name' => 'paleturquoise', 'hex' => '#afeeee', 'rgb' => '175,238,238'];
  public const palevioletred = ['name' => 'palevioletred', 'hex' => '#db7093', 'rgb' => '219,112,147'];
  public const papayawhip = ['name' => 'papayawhip', 'hex' => '#ffefd5', 'rgb' => '255,239,213'];
  public const peachpuff = ['name' => 'peachpuff', 'hex' => '#ffdab9', 'rgb' => '255,218,185'];
  public const peru = ['name' => 'peru', 'hex' => '#cd853f', 'rgb' => '205,133,63'];
  public const pink = ['name' => 'pink', 'hex' => '#ffc0cb', 'rgb' => '255,192,203'];
  public const plum = ['name' => 'plum', 'hex' => '#dda0dd', 'rgb' => '221,160,221'];
  public const powderblue = ['name' => 'powderblue', 'hex' => '#b0e0e6', 'rgb' => '176,224,230'];
  public const purple = ['name' => 'purple', 'hex' => '#800080', 'rgb' => '128,0,128'];
  public const red = ['name' => 'red', 'hex' => '#ff0000', 'rgb' => '255,0,0'];
  public const rosybrown = ['name' => 'rosybrown', 'hex' => '#bc8f8f', 'rgb' => '188,143,143'];
  public const royalblue = ['name' => 'royalblue', 'hex' => '#4169e1', 'rgb' => '65,105,225'];
  public const saddlebrown = ['name' => 'saddlebrown', 'hex' => '#8b4513', 'rgb' => '139,69,19'];
  public const salmon = ['name' => 'salmon', 'hex' => '#fa8072', 'rgb' => '250,128,114'];
  public const sandybrown = ['name' => 'sandybrown', 'hex' => '#f4a460', 'rgb' => '244,164,96'];
  public const seagreen = ['name' => 'seagreen', 'hex' => '#2e8b57', 'rgb' => '46,139,87'];
  public const seashell = ['name' => 'seashell', 'hex' => '#fff5ee', 'rgb' => '255,245,238'];
  public const sienna = ['name' => 'sienna', 'hex' => '#a0522d', 'rgb' => '160,82,45'];
  public const silver = ['name' => 'silver', 'hex' => '#c0c0c0', 'rgb' => '192,192,192'];
  public const skyblue = ['name' => 'skyblue', 'hex' => '#87ceeb', 'rgb' => '135,206,235'];
  public const slateblue = ['name' => 'slateblue', 'hex' => '#6a5acd', 'rgb' => '106,90,205'];
  public const slategray = ['name' => 'slategray', 'hex' => '#708090', 'rgb' => '112,128,144'];
  public const slategrey = ['name' => 'slategrey', 'hex' => '#708090', 'rgb' => '112,128,144'];
  public const snow = ['name' => 'snow', 'hex' => '#fffafa', 'rgb' => '255,250,250'];
  public const springgreen = ['name' => 'springgreen', 'hex' => '#00ff7f', 'rgb' => '0,255,127'];
  public const steelblue = ['name' => 'steelblue', 'hex' => '#4682b4', 'rgb' => '70,130,180'];
  public const tan = ['name' => 'tan', 'hex' => '#d2b48c', 'rgb' => '210,180,140'];
  public const teal = ['name' => 'teal', 'hex' => '#008080', 'rgb' => '0,128,128'];
  public const thistle = ['name' => 'thistle', 'hex' => '#d8bfd8', 'rgb' => '216,191,216'];
  public const tomato = ['name' => 'tomato', 'hex' => '#ff6347', 'rgb' => '255,99,71'];
  public const turquoise = ['name' => 'turquoise', 'hex' => '#40e0d0', 'rgb' => '64,224,208'];
  public const violet = ['name' => 'violet', 'hex' => '#ee82ee', 'rgb' => '238,130,238'];
  public const wheat = ['name' => 'wheat', 'hex' => '#f5deb3', 'rgb' => '245,222,179'];
  public const white = ['name' => 'white', 'hex' => '#ffffff', 'rgb' => '255,255,255'];
  public const whitesmoke = ['name' => 'whitesmoke', 'hex' => '#f5f5f5', 'rgb' => '245,245,245'];
  public const yellow = ['name' => 'yellow', 'hex' => '#ffff00', 'rgb' => '255,255,0'];
  public const yellowgreen = ['name' => 'yellowgreen', 'hex' => '#9acd32', 'rgb' => '154,205,50'];

}