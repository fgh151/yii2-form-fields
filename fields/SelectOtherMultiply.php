<?php
namespace fgh151\fields\fields;

use yii\helpers\Html;
use yii\web\View;

/**
 * Class Select Отображает select
 */
class SelectOtherMultiply extends BaseField
{
    /** @var array $selectOptions Массив ключ => значение для селектора */
    public $selectOptions = [];

    protected $htmlType = 'select';

    public $otherText = 'Other';
    public $otherValue = 'other';

    private $_inputId;
    private $_textId;

    /**
     * Initialize ids
     */
    public function init()
    {
        $this->_inputId = $this->id.'-other';
        $this->_textId = $this->_inputId.'-text';
        parent::init();
    }
    /**
     * @inheritdoc
     */
    public function render()
    {
        $label = Html::label($this->label, $this->attribute);

        $this->selectOptions[$this->otherValue] = $this->otherText;

        $this->options['id'] = $this->_inputId;
        $this->options['multiple'] = 'multiple';

        $input = Html::dropDownList($this->name, '', $this->selectOptions, $this->options);

        $return = Html::tag('div', $label . "\n" . $input . "\n", [
            'class' => 'upload-item',
            'style' => $this->style
        ]);

        $otherText = BaseField::create('text', [
            'label' => $this->otherText,
            'value' => $this->otherText,
            'name' => $this->name,
            'id' => $this->_textId,
            'style' => 'display: none;',
            'options' => [
                'disabled' => true,
            ]
        ]);
        $return .=  $otherText->render();

        return $return;
    }

    /**
     * Register js handlers
     * @param View $view
     */
    public function registerAssets($view)
    {
        $postfix = uniqid();
        $view->registerJs(
            '
            const el_'.$postfix.' = $("#'.$this->_inputId.'");
            const input_'.$postfix.' = $("#'.$this->_textId.'");
            
            el_'.$postfix.'.change(function(){
                if (el_'.$postfix.'.val() === \''.$this->otherValue.'\') {
                    input_'.$postfix.'.parent().show();
                    input_'.$postfix.'.prop(\'disabled\', false);
                } else {
                    input_'.$postfix.'.parent().hide();
                    input_'.$postfix.'.prop(\'disabled\', true);
                }
            })'
        );
        parent::registerAssets($view);
    }
}
