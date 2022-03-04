# tallsaas/tallsaas
A TALL Stack template for lighting-fast SaaS prototyping.

## Setup

1. Get a brand new install going for Laravel on [maxOS](https://laravel.com/docs/9.x/installation#getting-started-on-macos), [Windows](https://laravel.com/docs/9.x/installation#getting-started-on-windows), or [Linux](https://laravel.com/docs/9.x/installation#getting-started-on-linux)

2. Install tallsaas!

`composer require (coming soon...)`

3. Run `composer tallsaas`

4. Move into your new office via `cd _tallsaas` - this is where the magic happens


## Workflow

PHP, and it's lovely developers, have received a lot of guff over the years. We don't need to describe it too much here (if you know, you know).

But, the main cause for critique comes from opening up an old index.php file to see a huge mess of PHP, jQuery, HTML, CSS, some crums, a few coffee stains, and heavens knows what else.

That's not neccessarily PHP's fault though right? Just those messy devs!! That happens in every language, right!? RIGHT??

Right!

...but also not. 

For way too long there has been far too much leeway for writing sloppy, untested, unreadable code.

Until now! With tallsaas, we've taken the tools that all TALL SaaS devs love to use (TailwindCSS, AlpineJS, Livewire, and Laravel) and designed a workflow that strictly (but seamlessly) encorporates best practices from other cool (but not as cool as PHP) languages and frameworks.

Because "build fast" should extrapolate to "build [production-ready features] fast [with little-to-no tech debt so we can test our hypothesis about the market, and - if we're wrong - iterate, or - if we're right - easily scale what we've started without having to rebuild or educate newly-hired devs on how to use our "uniquely-written" code base].

That's enough jibber jabber. Still interested? Then let's get into it...

- Separation Of Concerns
- tallsaas:make commands
- Auto-generated (required) Tests
- Features vs Units
