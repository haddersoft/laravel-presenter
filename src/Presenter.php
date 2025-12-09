<?php

namespace Hadder\LaravelPresenter;

abstract class Presenter
{

    /**
     * @var mixed
     */
    protected $entity;

    public $strpad_lenght = 3;

    /**
     * @param $entity
     */
    function __construct($entity)
    {
        $this->entity = $entity;
    }

    /**
     * Allow for property-style retrieval
     *
     * @param $property
     * @return mixed
     */
    public function __get($property)
    {
        if (method_exists($this, $property)) {
            return $this->{$property}();
        }

        return $this->entity->{$property};
    }

    public function id()
    {
        return str_pad($this->entity->id, $this->strpad_lenght, 0, STR_PAD_LEFT);
    }

    public function created_at()
    {
        return $this->entity->created_at->format('d/m/Y H:i:s');
    }

    public function created_at_as()
    {
        return $this->entity->created_at->format('d/m/Y \à\s H:i:s');
    }

    public function created_at_date()
    {
        return $this->entity->created_at->format('d/m/Y');
    }

    public function created_at_hour()
    {
        return $this->entity->created_at->format('H:i:s');
    }

    public function updated_at()
    {
        return $this->entity->updated_at->format('d/m/Y H:i:s');
    }
    public function updated_at_as()
    {
        return $this->entity->updated_at->format('d/m/Y \à\s H:i:s');
    }

    public function updated_at_date()
    {
        return $this->entity->updated_at->format('d/m/Y');
    }

    public function updated_at_hour()
    {
        return $this->entity->updated_at->format('H:i:s');
    }

}
