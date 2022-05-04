# Scaffold 

**Theme** 

## Overview

There are several tools that I've tried to integrate in this project. It's far from done, but it was never intended to be a finished, production-ready project. This is a sandbox to explore ideas.

Ultimately, after the various bits of functionality are working, I'd like this to be a working theme with simple style and a bit of JS, just to showcase the Tailwind and AlpineJS inclusions.

## Tools

- [bud.js](bud.js.org) from the fantastic [Roots](roots.io) crew as an asset pipeline.
- [twig](twig.symfony.com) as the view layer.
- [alpinejs](alpinejs.dev) for declarative javascript.
- [tailwind](tailwindcss.com) for rapid styling.
- [composer](getcomposer.org) for PHP dependencies and autoloading.

## Concepts

### Laravel Directory Structure

```bash
app/
resources/
public/
```

Taken directly from Laravel. I like the separation of concerns here.

I'm interested in adding some Models as well, to allow for fetching `WP_User` and `WP_Post` objects in a somewhat Eloquent (ha) manner.

### Class-Based PHP

You'll notice that this theme has a very short `functions.php` file, which essentially does nothing but require the `Theme` class.

I prefer to write everything in a class-based, object-oriented manner when possible. Not all things should be classes, but classes are a good way to stay organized in a complicated theme.

The `app/class-theme.php` file serves to initialize all other theme functionality classes. I rely heavily on the Singleton strategy. Any class that is "registering" functionality need only be included once, and therefore uses the `Singleton` trait.

### Custom Router

I'm using Twig for the view layer of this theme, and as such I need to handle routing somehow. 

The plan is to resolve `.twig` files in the same way that WordPress normally resolves `.php` template files. The major difference is that the view layers will be logic-less; a feat enabled by the next topic - Context Providers. 

### Context Providers

This is not done yet, as the entire routing part of the theme is still underway, but the general idea is this:

> Each route will resolve to a single `view` and one or more `models`. Each `model` will be in the `app/context` folder, and will be in charge of exposing data to the view. This allows for a logic-less view layer.

I'm not yet sure how I will implement this, though I'm imagining some sort of Container with which the Context providers will register themselves. The routing handler still needs to be built as well, and its architecture will inform how the Container is built.

## Future Items

- A `blocks` directory in the resources dir which will contain a few simple custom block examples. The main trick here will be setting up the tooling.
- A `patterns` directory in the `resources` dir which will contain example block patterns.
- Additional nifty composer packages, such as `johnbillion/extended-cpts` or `htmlburger/carbon-fields`
