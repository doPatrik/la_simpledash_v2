<?php


namespace App\Http\Components\FormBuilder;


class FormFieldBuilder
{
    protected $label;

    protected $name;

    protected $required;

    protected $readonly;

    protected $fieldId;

    protected $classes;

    protected $type;

    protected $clientValidationRules;

    protected $row;

    public function __construct($name, $label = '')
    {
        $this->setName($name);
        $this->setFieldId($this->name);
        $this->setLabel($label);
        $this->addClass('w-full md:w-1/2 px-3');
    }

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setFieldId(string $id)
    {
        $this->fieldId = $id;
        return $this;
    }

    public function getFieldId() :string
    {
        return $this->fieldId;
    }

    public function setLabel(string $label)
    {
        $this->label = $label;
        return $this;
    }

    public function getLabel() :string
    {
        return $this->label;
    }

    public function addClass(string $class)
    {
        $this->classes = $class;
        return $this;
    }

    public function getClass()
    {
        return $this->classes;
    }

    public function setType(string $type)
    {
        $this->type = $type;
        return $this;
    }

    public function getType() :string
    {
        return $this->type;
    }

    public function setClientValidation(string $rules)
    {
        $this->clientValidationRules = $rules;
        return $this;
    }

    public function setRow(int $row)
    {
        $this->row = $row;
        return $this;
    }

    public function getRow()
    {
        return $this->row;
    }

    protected function getFieldAttributes()
    {
        $attributes['id'] = $this->getFieldId();
        $attributes['class'] = $this->getClass();
        $attributes['name'] = $this->getName();
        $attributes['label'] = $this->getLabel();
        $attributes['row'] = $this->getRow();

        return $attributes;
    }
}
