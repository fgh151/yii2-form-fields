<?php
namespace fgh151\fields\fields;

use yii\helpers\Html;

/**
 * Class Select Отображает select
 */
class SelectMultiply extends BaseField
{
    /** @var array $selectOptions Массив ключ => значение для селектора */
    public $selectOptions = [];

    protected $htmlType = 'select';

    /**
     * @inheritdoc
     */
    public function render()
    {
        $this->options['multiple'] = 'multiple';

        $label = Html::label($this->label, $this->attribute);
        $input = Html::dropDownList($this->name, '', $this->selectOptions, $this->options);

        return Html::tag('div', $label . "\n" . $input . "\n", [
            'class' => 'upload-item',
            'style' => $this->style
        ]);
    }
}
