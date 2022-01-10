<template>
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
            {{label}}
        </label>
        <div class="relative">
            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-state"
                    :value="modelValue"
                    :name="name"
                    @input="$emit('update:modelValue', $event.target.value)">
                <option value="">--Válassz--</option>
                <option v-for="(value, key) in options" :key="key" :value=key :selected="value === selectedValue">{{value}}</option>
            </select>

        </div>
</template>

<script>
    export default {
        name: "SelectInputComponent",
        props: {
            label: {
                type: String,
                default: ''
            },
            options: {
                type: Object,
            },
            modelValue: {
                type: [String, Number],
                default: ''
            },
            selectedValue: {
                type: [String, Number],
                default: ''
            },
            name: {
                type: String
            }
        }
    }
</script>

<style scoped>

</style>
