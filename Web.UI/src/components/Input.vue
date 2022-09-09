<script>
export const name = 'Input'
export default {
    name,
    props: {
        placeholder: {
            type: String,
            default: 'Placeholder'
        },
        value: {
            type: String,
            default: ''
        }
    },
    emits: ['update:value'],
    methods: {
        updateValue(event) {
            this.$emit('update:value', event.target.value)
        }
    }
}
</script>
<template>
    <input :value="value" @input="updateValue" :placeholder="placeholder"
        class="border-2 border-gray-300 bg-white text-black h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" />
</template>