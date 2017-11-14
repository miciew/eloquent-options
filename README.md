# eloquent-options
eloquent options

**Usage**


<code>use Miciew\Laravel\Option\Traits\Optionable; <br></code>

<code>class A extends Model <br>
{<br>
    use Optionable;<br>
}</code>

<code> $model->setOption('name', 'value'); </code>
<code>$model->getOptionValue('name', 'default value');</code>
</code>$model->getOption('name');</code>
