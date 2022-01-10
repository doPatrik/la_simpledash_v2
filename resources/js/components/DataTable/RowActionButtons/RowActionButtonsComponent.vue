<template>
    <div class="absolute bg-gray-700 flex flex-col rounded-2xl row-action-wrapper overflow-hidden" :class="animationClass">
        <slot></slot>
    </div>
</template>

<script>
    export default {
        name: "RowActionButtonsComponent",
        props: {
            is_open: {
                type: Boolean,
                default: false
            }
        },
        computed: {
            animationClass() {
                return (this.is_open) ? 'open' : '';
            }
        }
    }
</script>

<style scoped>
    .row-action-wrapper {
        width: 0;
        bottom: 20px;
        right: 22px;
    }

    .row-action-wrapper.open {
        animation: dialog .3s ease-in-out forwards;
    }

    @keyframes dialog {
        from{
            width: 0;
            opacity: 0;
        }
        to{
            width: 48px;
            opacity: 1;
        }
    }
</style>
