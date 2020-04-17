# Laravel Presenter

Fork com modificações do pacote [laracasts/presenter](https://github.com/laracasts/Presenter) (Jeffrey [https://laracasts.com](https://laracasts.com))

Em alguns casos é necessário executar alguma lógica antes de apresentar algum dado ou simplismente alguma formatação se faz necessária.

- Esta lógica deve ser feita na view? **Não**.
- Deve ser feita no model? **NÃO!**

Para isto usamos "presenters". Este pacote tem esta finalidade.

## Instalação
Composer
```$shell
composer require hadder/laravel-presenter
```

## Uso

O primeiro passo é armazenar seus apresentadores em algum lugar - em qualquer lugar. Esses serão objetos simples que não fazem nada além de formatar dados, conforme necessário.

```php
use Hadder\LaravelPresenter\Presenter;

class UserPresenter extends Presenter {

    public function nomeCompleto()
    {
        return $this->nome . ' ' . $this->sobrenome;
    }

}
```
Ou utilize o comando `php artisan presenter:make UserPresenter`

Em seguida no seu model utilize o trait `Hadder\LaravelPresenter\PresentableTrait`.

Exemplo:

```php
<?php

use Hadder\LaravelPresenter\PresentableTrait;

class User extends \Eloquent {

    use PresentableTrait;

    protected $presenter = \App\Presenters\UserPresenter::class;

}
```

Feitooooooooooo! Agora você pode fazer:

```php
    <h1>Olá, {{ $user->present()->nomeCompleto }}</h1>
```
## Observações
Por padrão alguns presenters de formatação de data já estãos etados como `created_at` e `updated_at` no formato `d/m/Y H:i:s`, ou seja todo model recuperado já tem `$model->present()->created_at`.
