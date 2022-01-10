<?php


namespace App\Http\Components\FormBuilder;


use App\Http\Components\HtmlFormat\VueAttributesHtmlString;
use Illuminate\Support\HtmlString;

class FormInputBuilder extends FormFieldBuilder
{
    protected $placeholder;

    protected const COMPONENT_TYPE = 'base';

    public const TYPE_TEXT = 'text';

    public function __construct($name, $type, $label = '')
    {
        parent::__construct($name, $label);
        $this->setType($type);
    }

    public static function textInput(string $name, string $label)
    {
        return new static($name, self::TYPE_TEXT, $label);
    }

    public function setPlaceholder(string $placeholder)
    {
        $this->placeholder = $placeholder;
        return $this;
    }

    public function getPlaceholder()
    {
        return $this->placeholder;
    }

    public function getFieldAttributes()
    {
        $attributes = [
            'type' => $this->getType(),
            'name' => $this->getName(),
            'component' => self::COMPONENT_TYPE,
        ];

        if(!empty($this->placeholder)) {
            $attributes['placeholder'] = $this->getPlaceholder();
        }

        return array_merge(parent::getFieldAttributes(), $attributes);
    }
}
