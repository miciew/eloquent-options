# eloquent-options
eloquent options

**Usage**

<b><i>use Miciew\Laravel\Option\Traits\Optionable;

class A extends Model
{
    use Optionable;
}</i></b>

<b><i>$model->setOption('name', 'value');
$model->getOptionValue('name', 'default value');
$model->getOption('name')</i></b>
