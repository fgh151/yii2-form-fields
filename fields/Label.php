<?php
namespace fgh151\fields\fields;

use yii\helpers\Html;

/**
 * Class Label Отображает label
 */
class Label extends BaseField
{
    protected $htmlType = 'label';

    /**
     * @inheritdoc
     */
    public function render()
    {
        $content = '';
        $label = Html::label($this->label, $this->attribute);

        if ($this->comment) {
            $content = Html::tag('div', ['class' => 'comment'], $this->comment);
        }

        return Html::tag('div',$label . "\n" . $content, [
            'class' => 'upload-item',
            'style' => $this->style
        ]);
    }
}
