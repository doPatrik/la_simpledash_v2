<template>
    <div v-if="form_title">
        <h1 class="border-b-8 border-blue-900 inline-block mb-8 text-xl">{{form_title}}</h1>
    </div>
    <form method="post" @submit.prevent="submit">
        <div class="flex flex-wrap -mx-3 mb-6" v-for="(row, key) in form_inputs" :key="key">
            <div :class="input.class" v-for="(input, name) in row" :key="name">
                <BaseInputComponent v-if="input.component === 'base'"
                                    v-model="form[name]"
                                    :label="input.label"
                                    :type="input.type"
                                    :name="name">
                </BaseInputComponent>
                <SelectInputComponent v-else-if="input.component === 'select'"
                                    v-model="form[name]"
                                    :label="input.label"
                                    :name="name"
                                    :options="input.options">
                </SelectInputComponent>
            </div>
        </div>
        <div>
            <div class="py-4 flex justify-end">
                <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-auto">
                    Vissza
                </button>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Mentés
                </button>
            </div>
        </div>
    </form>
</template>

<script>
    import SelectInputComponent from "./Inputs/SelectInputComponent";
    import axios from 'axios';
    export default {
        name: "FormBuilderComponent",
        components: {SelectInputComponent},
        props: {
            form_inputs: Object,
            form_title: String,
        },
        data: function () {
            return {
                form: []
            }
        },
        methods: {
            submit(event) {
                let data = new FormData(event.target);
                axios.post('/test-data', data)
                  .then(res => {
                        console.log('siker')
                  })
                  .catch(err => {
                      if (err.response.status === 422) {
                          console.log(err.response.data.errors);
                      } else {
                          console.log('Hiba történt. Probálja meg később.');
                      }
                  });
            }
        },
    }
</script>
