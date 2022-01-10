<?php


namespace App\Http\Components\DataTableBuilder;


class DataTableFieldBuilder
{
    protected string $name;

    protected string $title;

    protected bool $isSearchable;

    protected bool $isOrderable;

    public function __construct($name, $title)
    {
        $this->setName($name);
        $this->setTitle($title);
        $this->isSearchable = false;
        $this->isOrderable = false;
    }

    public static function make($name, $title)
    {
        return new static($name, $title);
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

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setSearchable(bool $isSearchable = true)
    {
        $this->isSearchable = $isSearchable;
        return $this;
    }

    public function getSearchable()
    {
        return $this->isSearchable;
    }

    public function setOrderable(bool $isOrderable = true)
    {
        $this->isOrderable = $isOrderable;
        return $this;
    }

    public function getOrderable()
    {
        return $this->isOrderable;
    }

    public function getFieldAttributes()
    {
        $attributes = [
            'name' => $this->getName(),
            'title' => $this->getTitle(),
            'isSearchable' => $this->getSearchable(),
            'isOrderable' => $this->getOrderable(),
        ];

        return $attributes;
    }
}
