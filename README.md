# eloquent-options

# Описание

Данный пакет предоставляет возможность добавлять кастоомные параметры для объектов модели.

Пакет решает проблему хранения кастомных параметров для отдельных моделей. Таким образом, можно не добавлять миграции для создания дополнительных полей таблицы.

Например, параметр для статьи "BAN". Вместо того, чтобы добавлять поле ban в таблицы articles, можно
в модели Article обавить метод

```php
public function setBan($flag = true)
{
    $this->setOption('ban', $flag);
    return $this;
}

public function isBan()
{
    $default = false;
    return $this->getOptionValue('ban', $default);
}
```

**Использование**

Для начала нужно опубликовать пакет

```
php artisan vendor:publish --provider="Miciew\Laravel\Option\Providers\OptionServiceProvider"
```

нужно подключить в модели трейт

```php
use Miciew\Laravel\Option\Traits\Optionable;
```


```php
class Article
{
    use Optionable;
}
```

Для объекта модели доступны методы:

```php
$model->setOption('name', 'value');
$model->getOptionValue('name', 'default value');
$model->getOption('name');
```

Надеюсь, пакет принесет вам пользу!