<?php

namespace Miciew\Laravel\Option\Traits;


namespace Miciew\Laravel\Option;

trait Optionable
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function options()
    {
        return $this->morphMany(Option::class, 'optionable');
    }

    /**
     * @param $name
     * @return null|Option
     */
    public function getOption($name, $default = null)
    {
        $option = $this->options()->byName($name)->first();

        if( is_null($option) )
        {
            $option = $this->setOption($name, $default)
                ->getOption($name);
        }

        return  $option ;
    }

    /**
     * @param $name
     * @param mixed $default
     * @return null|string|\stdClass
     */
    public function getOptionValue($name, $default = null)
    {
        $option = $this->options()->byName($name)->first();

        if( is_null($option) )
        {
            $option = $this->setOption($name, $default)
                ->getOption($name);
        }

        return  $option->value;
    }

    public function setOption($name, $value = null)
    {
        $this->options()->updateOrCreate(
            [ 'name' => $name ],
            [ 'name' => $name, 'value' => $value]
        );

        return $this;
    }
}