<template>
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
        {{ label }}
    </label>
    <input :type="type"
           :value="modelValue"
           @input="$emit('update:modelValue', $event.target.value)"
           :name="name"
           class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
           id="city"
           placeholder="Budapest">
</template>

<script>
    export default {
        name: "BaseInputComponent",
        props: {
            label: {
                type: String,
                default: ''
            },
            type: {
                type: String,
                default: 'text'
            },
            modelValue: {
                type: [String, Number],
                default: ''
            },
            name: {
                type: String
            }
        },
    }
</script>

<style scoped>

</style>
