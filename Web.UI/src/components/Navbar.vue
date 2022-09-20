<script>
export default {
    name: 'Navbar',
    props: {
        user: {
            default: 'Connexion'
        },
    },
    data() {
        return {
            display: true,
        }
    },
    components: {},
}


</script>

<template>
    <nav class="navbar bg-white/5" v-if="!$route.meta.hideNavBar">
        <router-link to="/" class="flex-1 rounded-md py-1 px-3">
            <img class="w-12 h-12 rounded-full" src="../assets/logo.png" alt="logo">
            <span class="normal-case font-bold text-green-400 ml-2 text-3xl">Todo app</span>
        </router-link>
        <div class="flex-none gap-2">
            <!-- <div class="form-control">
                <input type="text" placeholder="Search" class="input input-bordered" />
            </div> -->
            <div class="dropdown dropdown-end" tabindex='0'>
                <div class="flex justify-center items-center hover:bg-white/50 px-2 py-1 rounded-lg">
                    <span class="mr-3 text-lg hover:cursor-pointer">{{ user }}</span>
                    <label class="btn btn-ghost btn-circle avatar flex">
                        <div class="w-10 rounded-full">
                            <img src="https://placeimg.com/80/80/people" />
                        </div>
                    </label>
                </div>
                <ul tabindex="0"
                    class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-white/50 rounded-box w-52">
                    <li class="hover:bg-green-400 rounded-lg">
                        <router-link to="/profile" class="justify-between">
                            Profile
                            <span class="badge">New</span>
                        </router-link>
                    </li>
                    <li class="hover:bg-green-400 rounded-lg">
                        <router-link to="/login">Logout</router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <slot />
</template>