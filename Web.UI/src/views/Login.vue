<script>
import Input from '../components/Input.vue';
import Button from '../components/Button.vue';
import Leaf from '../assets/leaf.png';
export default {
    name: 'Login',
    components: {
        Input,
        Button
    },
    methods: {
        login(e) {
            e.preventDefault();
            const data = {
                username: e.target.email.value,
                password: e.target.password.value
            };
            console.log(data);
        }
    },
    data() {
        return {
            Leaf
        };
    }
}
</script>
<template>
    <div>
        <div class="flex justify-center items-center h-screen">
            <div class="w-2/3 h-4/6 rounded-3xl shadow-md bg-white/30 flex">
                <div class="w-1/3 flex flex-col justify-start items-start -ml-0.5">
                    <img :src="Leaf" alt="todo-login-img">
                </div>
                <form class="w-1/3 flex flex-col justify-center items-center">
                    <h1 class="text-4xl text-white">Connexion</h1>
                    <div class="flex flex-col h-32 justify-evenly mb-5 w-full">
                        <Input placeholder="Email" roundedFull name="email" />
                        <Input placeholder="Mot de passe" roundedFull type="password" name="password" />
                    </div>
                    <div class="flex justify-center items-center">
                        <Button text="Connexion" @click="login(e)" />
                    </div>
                </form>
                <div class="w-1/3 flex flex-col justify-end items-end">
                    <div class="p-3 rounded-lg bg-green-400 mb-10 -mr-7 hover:cursor-pointer hover:bg-green-500">
                        Créer un compte
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>