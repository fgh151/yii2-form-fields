<?php
namespace fgh151\fields\fields;

use yii\helpers\Html;
use yii\web\View;

/**
 * Class Select Отображает select
 */
class SelectOther extends BaseField
{
    /** @var array $selectOptions Массив ключ => значение для селектора */
    public $selectOptions = [];

    protected $htmlType = 'select';

    public $otherText = 'other';

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


        $this->selectOptions['other'] = $this->otherText;

        $this->options['id'] = $this->_inputId;

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
            'style' => 'display: none;'
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
        $view->registerJs(
            '
            cons el = $("#'.$this->_inputId.'");
            
            el.change(function(){
                if (el.val() === \''.$this->otherText.'\') {
                    $("#'.$this->_textId.'").toggle();
                }
            })'
        );
        parent::registerAssets($view);
    }
}
