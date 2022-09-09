<script setup>
import { useRoute } from 'vue-router';
const { todoId } = useRoute().params;
</script>

<template>
    <div class="text-white">
        Bienvenue sur la todo {{ todoId }}
    </div>
</template>