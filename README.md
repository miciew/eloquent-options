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
use Miciew\Laravel\Option\Traits\Optionable;


class Article
{
    use Optionable;
}
```

***Методы***:

```php
public function options(): morphMany;
public function setOption($name, $value = null): null|Option;
public function getOption($name, $default = null): null|Option;
public function getOptionValue($name, $default = null): mix;

```

Надеюсь, пакет принесет вам пользу!

конфиг в провайдере лучше таки мержить (см. mergeConfigFrom()). Отсутствие копии конфига в проекте не должно влиять на работоспособность пакета.
твой пакет зависит как минимум от illuminate/support и illuminate/database, что никак не отражено в композере.
ну и по семантике немного.. =) "Optionable" несет в себе несколько другой смысл. Модель, при добавлении твоего трейта не становится "опциональной" (не обязательной). Тут, скорее должно быть что-то типа "HasOptions".