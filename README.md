# eloquent-options
eloquent options

**Usage**

_use Miciew\Laravel\Option\Traits\Optionable;

class A extends Model
{
    use Optionable;
}_

_**$model->setOption('name', 'value');
$model->getOptionValue('name', 'default value');
$model->getOption('name')_**
