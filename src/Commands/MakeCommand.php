<?php

namespace Hadder\LaravelPresenter\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeCommand extends GeneratorCommand
{
    protected $signature = 'presenter:make
                            {name : Nome da classe.}';

    protected $description = 'Cria uma classe presenter';

    protected $type = 'Presenters';

    /**
     * Substitui o nome da classe para o stub fornecido.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        $stub = parent::replaceClass($stub, $name);
        return str_replace('DummyClass', $this->argument('name'), $stub);
    }

    /**
     * Obtém o arquivo stub para o gerador.
     *
     * @return string
     */
    protected function getStub()
    {
        $stub = 'presenter.stub';
        return __DIR__ . "/stubs/{$stub}";
    }

    /**
     * Obtém o namespace padrão para a classe.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Presenters';
    }

}
