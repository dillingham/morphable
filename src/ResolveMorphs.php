<?php

namespace Dillingham\Morphable;

use Illuminate\Support\Str;

trait ResolveMorphs
{
    public $morphable = [];

    public function resolveMorphModel()
    {
        foreach ($this->morphable as $morphable) {
            if (request('type') == Str::slug(class_basename($morphable))) {
                return app($morphable)->findOrFail(request('id'));
            }
        }

        abort(500, request('type') . ' is an invalid morph type');
    }
}
