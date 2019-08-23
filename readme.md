# Morphable
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