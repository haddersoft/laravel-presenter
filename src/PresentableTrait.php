<?php

namespace Hadder\LaravelPresenter;

use Hadder\LaravelPresenter\Exceptions\PresenterException;

trait PresentableTrait
{

    /**
     * View presenter instance
     *
     * @var mixed
     */
    protected $presenterInstance;

    /**
     * Classe presenter
     *
     * @var mixed
     */
    public $presenter;

//    protected $presenter;

    /**
     * Prepare a new or cached presenter instance
     *
     * @return mixed
     * @throws PresenterException
     */
    public function present()
    {
        if (!class_exists($this->presenter)) {
            throw new PresenterException('Please set the $presenter property to your presenter path.');
        }

        if (!$this->presenterInstance) {
            $this->presenterInstance = new $this->presenter($this);
        }

        return $this->presenterInstance;
    }

}
