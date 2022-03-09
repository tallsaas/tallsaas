<?php

namespace TallSaas\TallSaas\Providers;

use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;

class TallSaasServiceProvider extends ServiceProvider 
{
  private $base_path = __DIR__ . '/../../';
  private $src_path = __DIR__ . '/../';
  
  public function boot()
  {
    //
  }
}