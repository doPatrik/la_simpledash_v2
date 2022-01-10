<?php

namespace App\Http\Controllers\Test;

use App\Http\Components\DataTableBuilder\DataTableBuilder;
use App\Http\Components\DataTableBuilder\DataTableFieldBuilder;
use App\Http\Components\DataTableBuilder\RowActionButtonBuilder;
use App\Http\Components\FormBuilder\FormBuilder;
use App\Http\Components\FormBuilder\FormInputBuilder;
use App\Http\Components\FormBuilder\SelectInputBuilder;
use App\Http\Controllers\BaseController;
use App\Models\User;
use App\Models\UserAddress;

class TestController extends BaseController
{
    public function __construct(UserAddress $model)
    {
        $this->model = $model;
        $this->baseUrl = route('test.data');
    }

    protected function formBuilder($model)
    {
        $users = User::all()->pluck('name', 'id');

        $form = FormBuilder::make('address', $model, [
            FormInputBuilder::textInput('zip_code', 'Irányítószám')
                ->setRow(1),
            FormInputBuilder::textInput('city', 'Város')
                ->setRow(1),
            FormInputBuilder::textInput('address', 'Lakcím')
                ->setRow(3),
            FormInputBuilder::textInput('street_number', 'Házszám')
                ->setRow(3),
            SelectInputBuilder::make('id_user', 'Felhasználók', $users)
                ->setRow(4),
        ])->setTitle('Lakcím hozzáadása');

        return $form;
    }

    protected function dataTableBuilder()
    {
        $form = $this->formBuilder($this->model)->setIsModal(true);

        $dataTable = DataTableBuilder::make('user_address', $this->model->getKeyName(), 'Lakcímek', [
            DataTableFieldBuilder::make('id_address', '#'),
            DataTableFieldBuilder::make('zip_code', 'Irányítószám')
                ->setSearchable()
                ->setOrderable(),
            DataTableFieldBuilder::make('city', 'Város')
                ->setSearchable(),
            DataTableFieldBuilder::make('address', 'Lakcím'),
            DataTableFieldBuilder::make('street_number', 'Házszám'),
        ])->setTitle('Lakcímek')->setBulkAction()->addRowActionButtons(
            [
                RowActionButtonBuilder::viewButton($this->baseUrl),
                RowActionButtonBuilder::editButton($this->baseUrl),
                RowActionButtonBuilder::deleteButton($this->baseUrl),
            ]
        );

        return $dataTable;
    }

    protected function getDataTableData()
    {
        return UserAddress::all();
    }
}
