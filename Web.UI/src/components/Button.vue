<script>
export const name = 'Button'
export default {
    name,
    props: {
        text: {
            type: String,
            default: 'Button'
        },
    }
}
</script>

<template>
    <button class="text-white p-3 h-12 rounded-lg bg-white/20 shadow-md hover:shadow-lg">
        {{ text }}</button>
</template>