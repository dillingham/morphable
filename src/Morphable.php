<?php

namespace Dillingham\Morphable;

use Illuminate\Support\Str;

trait Morphable
{
    public function initializeMorphable()
    {
        $this->append(['morph_type']);
    }

    public function getMorphTypeAttribute()
    {
        return Str::slug((class_basename($this)));
    }

    public function forMorph($model)
    {
        return $this->forceFill([
            'object_type' => get_class($model),
            'object_id' => $model->getKey(),
        ]);
    }
}
