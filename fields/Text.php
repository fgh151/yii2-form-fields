<?php
namespace fgh151\fields\fields;
use yii\helpers\BaseHtml;
use yii\helpers\Html;

/**
 * Class Text Отображает text area
 */
class Text extends BaseField
{
    protected $htmlType = 'text';

    /**
     * @inheritdoc
     */
    protected $fieldSelectName = 'поле для ввода текста';

    /**
     * @inheritdoc
     */
    public function render()
    {

        $content = '';
        $label = Html::label($this->label, $this->attribute);
        $textInput = Html::input(
            $this->htmlType,
            $this->name,
            $this->value,
            ['class' => 'form-control ' . $this->class]
        );

        if ($this->comment) {
            $content = Html::tag('div', ['class' => 'comment'], $this->comment);
        }

        return Html::tag('div',$label . "\n" . $textInput . "\n" . $content, ['class' => 'upload-item']);
    }
}
