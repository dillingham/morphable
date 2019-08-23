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
        $this->object_type = get_class($model);
        $this->object_id = $model->getKey();

        return $this;
    }
}
