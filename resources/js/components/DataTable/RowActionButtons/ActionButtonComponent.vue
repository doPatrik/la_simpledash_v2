<template>
    <div class="bg-gray-600 border-4 flex h-8 w-8 items-center justify-center m-2 p-2 rounded-full hover:bg-gray-800" :class="typeClass">
        <button>
            <span><i :class="iconClass"></i></span>
        </button>
    </div>
</template>

<script>
    export default {
        name: "ActionButtonComponent",
        props: {
            type: {
                type: String,
                default: 'view'
            },
            iconClass: {
                type: String,
                default: 'fas fa-eye'
            }
        },
        computed: {
            typeClass() {
                let typeClass = '';

                switch (this.type) {
                    case 'view':
                        typeClass = 'text-green-500 border-green-500';
                        break;
                    case 'edit':
                        typeClass = 'text-yellow-500 border-yellow-500';
                        break;
                    case 'delete':
                        typeClass = 'text-red-500 border-red-500';
                        break;
                }

                return typeClass;
            }
        }
    }
</script>

<style scoped>

</style>
