<script>
import Navbar from './components/Navbar.vue';

export default {
    name: 'App',
    components: {
        Navbar,
    },
};
</script>

<template>
    <div class="w-full max-h-screen h-screen">
        <Navbar>
            <router-view />
        </Navbar>
    </div>
</template>