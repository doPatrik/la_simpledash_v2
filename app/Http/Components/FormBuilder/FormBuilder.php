<?php


namespace App\Http\Components\FormBuilder;

use App\Http\Components\DataTableBuilder\DataTableBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class FormBuilder
{
    protected string $name;

    protected Model $model;

    protected Collection $fieldList;

    protected string $method;

    protected string $title = '';

    protected string $baseTemplate;

    protected bool $isModal;

    public function __construct($name, $model = null)
    {
        $this->name = $name;
        $this->method = "POST";
        $this->baseTemplate = 'FormBuilder.form_builder';
        $this->fieldList = new Collection();
        $this->isModal = false;
    }

    public function getBaseTemplate(): string
    {
        return $this->baseTemplate;
    }

    public function setBaseTemplate(string $baseTemplate)
    {
        $this->baseTemplate = $baseTemplate;
        return $this;
    }

    public static function make($name, $model, iterable $fields = [])
    {
        $formBuilder = new static($name, $model);
        $formBuilder->addFields($fields);
        return $formBuilder;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return bool
     */
    public function isModal(): bool
    {
        return $this->isModal;
    }

    public function setIsModal(bool $isModal)
    {
        $this->isModal = $isModal;
        return $this;
    }

    public function addFields(iterable $fields)
    {
        /**
         * @var $field FormFieldBuilder
         */
        foreach ($fields as $field) {
            $this->addField($field);
        }
    }

    public function addField(FormFieldBuilder $field)
    {
        $this->fieldList->put($field->getName(), $field);
        return $this;
    }

    public function getFormFields()
    {
        $fieldAttributes = [];

        foreach ($this->fieldList as $fieldName => $field) {
            $index = $field->getRow() ? $field->getRow() : count($fieldAttributes) + 1;
            $fieldAttributes[$index][$fieldName] = $field->getFieldAttributes();
        }

        return collect($fieldAttributes);
    }
}
