# Morphable

[![Latest Version on Github](https://img.shields.io/github/release/dillingham/morphable.svg?style=flat-square)](https://packagist.org/packages/dillingham/morphable)
[![Total Downloads](https://img.shields.io/packagist/dt/dillingham/morphable.svg?style=flat-square)](https://packagist.org/packages/dillingham/morphable) [![Twitter Follow](https://img.shields.io/twitter/follow/dillinghammm?color=%231da1f1&label=Twitter&logo=%231da1f1&logoColor=%231da1f1&style=flat-square)](https://twitter.com/dillinghammm)

```
composer require dillingham/morphable
```
- Add `Morphable` to a model
- Add `ResolveMorphs` to your base controller
- Fill `$morphable` on a controller with model classes
- Submit `type` and `id` to a controller
- adds `->forMorph($model)` to fill object_type, object_id
```php
<?php

class CommentController extends Controller
{
    use ResolveMorphs;
    
    public $morphable = [
        \App\Post::class
    ];

    public function store()
    {
        $model = $this->resolveMorph();

        $comment = new Comment;
        $comment->forMorph($model);
        $comment->save();
    }
}
```
