<x-app-layout>
        <data-table-component
            :table_fields="{{$dataTable->getDataTableFields()}}"
            :data="{{$data}}"
            :table_attributes="{{$dataTable->getTableAttributes()}}"></data-table-component>
</x-app-layout>
