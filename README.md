# eloquent-options

# Описание

Пакет решает проблему хранения кастомных параметров для отдельных моделей. Таким образом, можно не добавлять миграции для создания дополнительных полей таблицы.
Сохранять можно данные разных типов, от числа до объектов.

Например, нужно добавить параметр, позволяющий забанить статью.
Вместо того, чтобы добавлять поле `ban` в таблицу `articles`, можно
в модели Article объявить методы

```php
public function ban()
{
    $this->setOption('ban', true);
    return $this;
}

public function unBan()
{
    $this->setOption('ban', false);
    return $this;
}

public function isBan()
{
    $default = false;
    return $this->getOptionValue('ban', $default);
}
```


# Установка

```
composer require miciew/eloquent-options
```

**Публикация пакета**

```
php artisan vendor:publish --provider="Miciew\Laravel\Option\Providers\OptionServiceProvider"
```

```
php artisan migrate
```

**Использование**


```php
use Miciew\Laravel\Option\Traits\HasOptions;


class Article
{
    use HasOptions;
}
```

***Методы***:

```php
public function options(): morphMany;
public function setOption($name, $value = null): null|Option;
public function getOption($name, $default = null): null|Option;
public function getOptionValue($name, $default = null): mix;

```