<?php


namespace App\Http\Components\DataTableBuilder;


use Illuminate\Support\Collection;

class DataTableBuilder
{
    protected string $title = '';

    protected string $baseTemplate;

    protected Collection $fieldList;

    protected string $name;

    protected bool $bulkAction;

    private string $key;

    protected Collection $rowActionButtons;

    public function __construct(string $name, string $title)
    {
        $this->name = $name;
        $this->fieldList = new Collection();
        $this->bulkAction = false;
        $this->baseTemplate = 'DataTable.data_table';
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

    public function setBulkAction(bool $bulkAction = true)
    {
        $this->bulkAction = $bulkAction;
        return $this;
    }

    public function getBulkAction()
    {
        return $this->bulkAction;
    }

    public static function make(string $name, string $keyName, string $title = '', iterable $fields = [])
    {
        $dataTable = new static($name, $title);
        $dataTable->key = $keyName;
        $dataTable->addFields($fields);
        return $dataTable;
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

    public function addFields(iterable $fields)
    {
        foreach ($fields as $field)
        {
            $this->addField($field);
        }
    }

    public function addField(DataTableFieldBuilder $field)
    {
        $this->fieldList->put($field->getName(), $field);
        return $this;
    }

    public function addRowActionButtons(iterable $actionButtons)
    {
        $this->rowActionButtons = new Collection();
        foreach ($actionButtons as $button) {
            $this->addRowActionButton($button);
        }

        return $this;
    }

    protected function addRowActionButton(RowActionButtonBuilder $button)
    {
        $this->rowActionButtons->put($button->getType(), $button);
    }

    public function getDataTableFields()
    {
        $fieldAttributes = [];

        foreach ($this->fieldList as $name => $field) {
            $fieldAttributes[$name] = $field->getFieldAttributes();
        }

        return collect($fieldAttributes);
    }

    public function getSearchableFields()
    {
        $searchableFields = [];

        foreach ($this->fieldList as $name => $field) {
            if ($field->getSearchable()) {
                $searchableFields[] = $name;
            }
        }

        return $searchableFields;
    }

    private function getKeyName()
    {
        return $this->key;
    }

    private function collectRowActionButtons()
    {
        $actionButtons = [];
        foreach ($this->rowActionButtons as $index => $button) {
            $actionButtons[$index] =
                [
                    'type' => $button->getType(),
                    'iconClass' => $button->getIconClass()
                ];

            $route = $button->getRoute();
            if ($route) {
                $actionButtons[$index]['route'] = $route;
            }
        }

        return $actionButtons;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTableAttributes()
    {
        $attributes = [
            'bulkAction' => $this->getBulkAction(),
            'title' => $this->getTitle(),
            'key' => $this->getKeyName(),
            'name' => $this->getName(),
        ];

        if (!empty($this->rowActionButtons)) {
            $attributes['rowActionButtons'] = $this->collectRowActionButtons();
        }

        return collect($attributes);
    }
}
