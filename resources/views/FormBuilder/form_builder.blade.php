<x-app-layout>
    <div class="m-10 p-10 shadow-2xl rounded-2xl">
        <form-builder-component :form_inputs="{{$form->getFormFields()}}" form_title="{{$form->getTitle()}}">

        </form-builder-component>
    </div>
</x-app-layout>
