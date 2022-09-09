<script>
export default {
    name: 'Navbar',
    props: {
        user: {
            type: String,
            default: 'Connexion'
        }
    }
}
</script>

<template>
    <div class="bg-white w-full h-12 flex justify-end items-center">
        <router-link to="/login" class="text-black mr-12 cursor-pointer hover:text-green-400">{{ user }}</router-link>
    </div>
</template>