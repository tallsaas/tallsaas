<?php

namespace TallSaas\View\Attributes;

use Obsidian\Exceptions\Web\Components\Attributes\TagNameException;

use Illuminate\Support\Collection;

enum TagName 
{
  public static function get(string $find): self
  {
    $tagNames = self::cases();
    $tagNames = new Collection($tagNames);

    if ($tagName = $tagNames->where('name', $find)->first()) :
      return $tagName;
    endif;

    throw new TagNameException("{$find} is not a valid HTML5 tag name");
  }

  case a;          //	Specifies an anchor
  case abbr;       //	Specifies an abbreviation
  case acronym;    //	Deprecated:Specifies an acronym
  case address;    //	Specifies an address element
  case applet;     //	Deprecated: Specifies an applet
  case area;       //	Specifies an area inside an image map
  case article;    //	New Tag: Specifies an independent piece of content of a document, such as a blog entry or newspaper article
  case aside;      //	New Tag:Specifies a piece of content that is only slightly related to the rest of the page.
  case audio;      //	New Tag:Specifies an audio file.
  case base;       //	Specifies a base URL for all the links in a page
  case basefont;   //	Deprecated: Specifies a base font
  case bdo;        //	Specifies the direction of text display
  case bgsound;    //	Specifies the background music
  case blink;      //	Specifies a text which blinks
  case blockquote; //	Specifies a long quotation
  case body;       //	Specifies the body element
  case br;         //	Inserts a single line break
  case button;     //	Specifies a push button
  case canvas;     //	New Tag:This is used for rendering dynamic bitmap graphics on the fly, such as graphs or games.
  case caption;    //	Specifies a table caption
  case center;     //	Deprecated: Specifies centered text
  case col;        //	Specifies attributes for table columns 
  case colgroup;   //	Specifies groups of table columns
  case command;    //	New Tag:Specifies a command the user can invoke.
  case comment;    //	Puts a comment in the document
  case datalist;   //	New Tag:Together with the a new list attribute for input can be used to make comboboxes
  case dd;         //	Specifies a definition description
  case del;        //	Specifies deleted text
  case details;    //	New Tag:Specifies additional information or controls which the user can obtain on demand.
  case dir;        //	Deprecated: Specifies a directory list
  case div;        //	Specifies a section in a document
  case dl;         //	Specifies a definition list
  case dt;         //	Specifies a definition term
  case embed;    //	New Tag:Defines external interactive content or plugin.
  case fieldset;    //	Specifies a fieldset
  case figure;    //	New Tag:Specifies a piece of self-contained flow content, typically referenced as a single unit from the main flow of the document.
  case b;    //	Specifies bold text
  case big;    //	Deprecated:Specifies big text
  case i;    //	Specifies italic text
  case small;    //	Specifies small text
  case tt;    //	Deprecated:Specifies teletype text
  case font;    //	Deprecated: Specifies text font, size, and color
  case footer;    //	New Tag:Specifies a footer for a section and can contain information about the author, copyright information, et cetera.
  case form;    //	Specifies a form 
  case frame;    //	Deprecated:Specifies a sub window (a frame)
  case frameset;    //	Deprecated:Specifies a set of frames
  case head;    //	Specifies information about the document
  case header;    //	New Tag:Specifies a group of introductory or navigational aids.
  case hgroup;    //	New Tag:Specifies the header of a section.
  case h1;      // to case <h6>	specifies header 1 to header 6
  case h2;    
  case h3;    
  case h4;    
  case h5;    
  case h6;    
  case hr;    //	Specifies a horizontal rule
  case html;    //	Specifies an html document
  case isindex;    //	Deprecated: Specifies a single-line input field
  case iframe;    //	Specifies an inline sub window (frame)
  case ilayer;    //	Specifies an inline layer
  case img;    //	Specifies an image
  case input;    //	Specifies an input field
  case ins;    //	Specifies inserted text
  case keygen;    //	New Tag:Specifies control for key pair generation. Generate key information in a form.
  case label;    //	Specifies a label for a form control
  case layer;    //	Specifies a layer
  case legend;    //	Specifies a title in a fieldset
  case li;    //	Specifies a list item
  case link;    //	Specifies a resource reference
  case map;    //	Specifies an image map 
  case mark;    //	New Tag:Specifies a run of text in one document marked or highlighted for reference purposes, due to its relevance in another context.
  case marquee;    //	Create a scrolling-text marquee
  case menu;    //	Deprecated: Specifies a menu list
  case meta;    //	Specifies meta information
  case meter;    //	New Tag:Specifies a measurement, such as disk usage.
  case multicol;    //	Specifies a multicolumn text flow
  case nav;    //	New Tag:Specifies a section of the document intended for navigation.
  case nobr;    //	No breaks allowed in the enclosed text
  case noembed;    //	Specifies content to be presented by browsers that do not support the case embed;    //tag
  case noframes;    //	Deprecated:Specifies a noframe section
  case noscript;    //	Specifies a noscript section
  case object;    //	Specifies an embedded object
  case ol;    //	Specifies an ordered list
  case optgroup;    //	Specifies an option group
  case option;    //	Specifies an option in a drop-down list
  case output;    //	New Tag:Specifies some type of output, such as from a calculation done through scripting.
  case p;    //	Specifies a paragraph
  case param;    //	Specifies a parameter for an object
  case cite;    //	Specifies a citation
  case code;    //	Specifies computer code text
  case dfn;    //	Specifies a definition term
  case em;    //	Specifies emphasized text 
  case kbd;    //	Specifies keyboard text
  case samp;    //	Specifies sample computer code
  case strong;    //	Specifies strong text
  case var;    //	Specifies a variable
  case plaintext;    //	Deprecated: Render the raminder of the document as preformatted plain text
  case pre;    //	Specifies preformatted text
  case progress;    //	New Tag:Specifies a completion of a task, such as downloading or when performing a series of expensive operations.
  case q;    //	Specifies a short quotation
  case ruby;    //	New Tag:Together with case <rt> and case <rp> allow for marking up ruby annotations.
  case script;    //	Specifies a script
  case section;    //	New Tag:Represents a generic document or application section.
  case select;    //	Specifies a selectable list
  case spacer;    //	Specifies a white space
  case span;    //	Specifies a section in a document
  case s;    //	Deprecated: Specifies strikethrough text
  case strike;    //	Deprecated: Specifies strikethrough text
  case style;    //	Specifies a style definition
  case sub;    //	Specifies subscripted text
  case sup;    //	Specifies superscripted text
  case table;    //	Specifies a table
  case tbody;    //	Specifies a table body
  case td;    //	Specifies a table cell
  case textarea;    //	Specifies a text area
  case tfoot;    //	Specifies a table footer
  case th;    //	Specifies a table header
  case thead;    //	Specifies a table header
  case time;    //	New Tag:Specifies a date and/or time.
  case title;    //	Specifies the document title
  case tr;    //	Specifies a table row
  case u;    //	Deprecated: Specifies underlined text
  case ul;    //	Specifies an unordered list
  case video;    //	New Tag:Specifies a video file.
  case wbr;    //	New Tag:Specifies a line break opportunity. Indicate a potential word break point within a case <nobr> section
  case xmp;    //	Deprecated: Specifies preformatted text
}