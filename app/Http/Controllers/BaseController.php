<?php


namespace App\Http\Controllers;

use App\Http\Components\DataTableBuilder\DataTableBuilder;
use App\Http\Components\FormBuilder\FormBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

abstract class BaseController extends Controller
{
    protected $model;

    protected $baseUrl;

    public function index(Request $request)
    {
        if ($request->ajax())
        {
            return dd('ajax');
        }
        /**
         * @var FormBuilder $form
         */
        $form = $this->formBuilder($this->model);

        return view($form->getBaseTemplate(), compact('form'));
    }

    public function test(Request $request)
    {
        if ($request->ajax())
        {
            $sortedField = request('sort_field', 'created_at');
            $sortDirection = request('sort_direction', 'desc');

            if(!in_array($sortDirection, ['asc', 'desc'])) {
                $sortDirection = 'desc';
            }

            /**
             * @var DataTableBuilder $dataTable
             */
            $dataTable = $this->dataTableBuilder();
            $fields = array_filter($request->only($dataTable->getSearchableFields()));

            $data = $this->model::when(count($fields) > 0, function ($query) use ($fields) {
                foreach ($fields as $field => $value) {
                    $query->where($field, 'LIKE', '%' . $value . '%');
                }
            })->orderBy($sortedField, $sortDirection)->get();

            return $data;
        }
        /**
         * @var DataTableBuilder $dataTable
         */
        $dataTable = $this->dataTableBuilder();
        $data = $this->getDataTableData();

        return view($dataTable->getBaseTemplate(), compact(['dataTable', 'data']));
    }

    public function create(Request $request)
    {
        $data = $this->getValidatedData($request->all());
        $this->model->create($data);
        return response()->make('OK', '200');
    }

    public function update(Request $request, $id)
    {

    }

    public function delete($id)
    {
        $this->model->findOrFail($id)->delete();

        return response()->json('OK');
    }

    public function loadTableData()
    {
        $data = $this->getDataTableData();
    }

    protected function getValidatedData($data)
    {
        $validator = Validator::make($data, $this->model->getValidationRules());
        $validator->validate();

        return $validator->validated();
    }

    protected abstract function formBuilder($model);

    protected abstract function dataTableBuilder();

    protected abstract function getDataTableData();
}
