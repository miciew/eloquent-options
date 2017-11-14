<?php

namespace Miciew\Laravel\Option;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $fillable = [ 'name', 'value' ];

    public function optionable()
    {
        return $this->morphTo();
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function setValue($value)
    {
        $this->name = $value;

        return $this;
    }

    public function setValueAttribute($value)
    {
        $this->attributes['value'] = serialize($value);
    }

    public function getValueAttribute($value)
    {
        return unserialize($value);
    }

    public function scopeByName($builder, $name)
    {
        return $builder->where('name', $name);
    }
}

