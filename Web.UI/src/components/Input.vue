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
        },
        roundedFull: {
            type: Boolean,
            default: false
        },
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
        class="border-2 border-gray-300 w-full bg-white text-black h-10 px-5 text-sm focus:outline-none"
        :class="roundedFull ? 'rounded-full' : 'rounded-lg'" />
</template>