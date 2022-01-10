<?php


namespace App\Http\Components\DataTableBuilder;


use App\Http\Components\FormBuilder\FormBuilder;
use Illuminate\Support\Collection;

class RowActionButtonBuilder
{
    protected const TYPE_VIEW = 'view';
    protected const TYPE_DELETE = 'delete';
    protected const TYPE_EDIT = 'edit';

    protected string $type;
    protected string $label;
    protected string $iconClass;
    protected string $route;

    public function __construct(string $type, string $iconClass, string $route, string $label)
    {
        $this->setType($type);
        $this->setIconClass($iconClass);
        $this->setLabel($label);
        $this->setRoute($route);
    }

    public static function viewButton(string $route = '', string $iconClass = 'fas fa-eye', string $label = '')
    {
        if (!empty($route)) {
            $route .= '/index';
        }
        return new static(self::TYPE_VIEW, $iconClass, $route, $label);
    }

    public static function editButton(string $route = '', string $iconClass = 'fas fa-edit', string $label = '')
    {
        if (!empty($route)) {
            $route .= '/edit';
        }
        return new static(self::TYPE_EDIT, $iconClass, $route, $label);
    }

    public static function deleteButton(string $route = '', string $iconClass = 'fas fa-trash', string $label = '')
    {
        if (!empty($route)) {
            $route .= '/delete';
        }
        return new static(self::TYPE_DELETE, $iconClass, $route, $label);
    }

    /**
     * @return string
     */
    public function getRoute(): string
    {
        return $this->route;
    }

    /**
     * @param string $route
     */
    public function setRoute(string $route): void
    {
        $this->route = $route;
    }

    public function setType(string $type)
    {
        $this->type = $type;
        return $this;
    }

    public function setIconClass(string $class)
    {
        $this->iconClass = $class;
    }

    public function getIconClass()
    {
        return $this->iconClass;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setLabel(string $label)
    {
        $this->label = $label;
    }

    public function getLabel()
    {
        return $this->label;
    }
}
