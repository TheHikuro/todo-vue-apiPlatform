<script>
import { whenPatternMatches } from '../helpers';
export default {
    name: 'Navbar',
    props: {
        user: {
            default: 'Connexion'
        }
    },
    data() {
        return {
            display: true
        }
    },
    watch: {
        $route() {
            // this.display = this.checkPattern();
        }
    },
    methods: {
        // checkPattern() {
        //     return whenPatternMatches(this.$route.path, [
        //         [/^\/login\/?$/], this.display = false
        //         [/^\/register\/?$/], this.display = false
        //     ]);
        // }
    },
    components: {},
}


</script>

<template>
    <div class="w-full h-16 bg-white/5 flex justify-between items-center" v-if="display">
        <router-link to="/" class="ml-12 flex items-center justify-center">
            <img class="w-12 h-12" src="../assets/logo.png" alt="logo">
            <span class="text-3xl ml-2 font-bold text-green-400">Todo app</span>
        </router-link>
        <router-link to="/login"
            class="bg-white/10 hover:bg-white hover:text-green-500 mr-12 cursor-pointer p-2 rounded-lg text-green-400">
            {{ user }}
        </router-link>
    </div>
</template>