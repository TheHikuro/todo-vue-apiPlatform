<script>
import Input from '../components/Input.vue';
import Button from '../components/Button.vue';
import Leaf from '../assets/leaf.png';
export default {
    name: 'Login',
    components: {
        Input,
        Button,
    },
    methods: {
        login(data) {
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
                <div class="w-1/3 flex flex-col justify-center items-center px-2">
                    <div class="h-1/6 w-full flex flex-col items-center justify-center mt-10">
                        <img class="w-20 h-20" src="../assets/logo.png" alt="logo">
                        <span class="text-3xl font-bold mt-2">Todo: Connexion</span>
                    </div>
                    <FormKit type="form" form-class="w-full flex justify-center  flex-col h-4/6" @submit="login"
                        submit-label="Connexion">
                        <FormKit type="text" name="email" label="Email" placeholder="exemple@email.here"
                            validation="required|email" />
                        <FormKit type="password" name="password" label="Password" placeholder="Mot de passe"
                            validation="required|password" />
                    </FormKit>
                    <div class="h-1/6 w-full mt-10" />
                </div>
                <div class="w-1/3 flex flex-col justify-end items-end">
                    <div class="p-3 rounded-lg bg-green-400 mb-10 -mr-7 hover:cursor-pointer hover:bg-green-500">
                        Créer un compte
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>