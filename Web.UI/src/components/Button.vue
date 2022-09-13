<script>
export const name = 'Button'
export default {
    name,
    props: {
        text: {
            type: String,
            default: 'Button'
        },
        icon: {
            type: String,
            default: ''
        }
    }
}
</script>

<template>
    <button
        class="text-white p-3 h-12 flex justify-center items-center rounded-lg bg-white/20 shadow-md hover:shadow-lg hover:bg-green-400 hover:text-white">
        <span v-if="icon" v-html="icon" class="w-fit -ml-1 h-fit flex justify-center items-center" />
        {{ text }}</button>
</template>