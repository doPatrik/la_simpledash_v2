<?php


namespace App\Http\Components\FormBuilder;


class SelectInputBuilder extends FormFieldBuilder
{
    protected const COMPONENT_TYPE = 'select';

    protected $options;

    protected $selectedValue;

    public function __construct(string $name, string $label, $options, $selectedValue)
    {
        parent::__construct($name, $label);
        $this->addOptions($options);
        $this->setSelectedValue($selectedValue);
    }

    public static function make(string $name, $label = '', $options = [], $selectedValue = null ) {
        return new static($name, $label, $options, $selectedValue);
    }

    public function addOptions($options)
    {
        foreach ($options as $value => $name) {
            $this->options[$value] = $name;
        }

        return $this;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function setSelectedValue($name)
    {
        $this->selectedValue = $name;
        return $this;
    }

    public function getSelectedValue()
    {
        return $this->selectedValue;
    }

    public function getFieldAttributes()
    {
        $attributes = [
            'name' => $this->getName(),
            'component' => self::COMPONENT_TYPE,
            'options' => $this->options,
            'selected' => $this->selectedValue,
        ];

        return array_merge(parent::getFieldAttributes(), $attributes);
    }
}
