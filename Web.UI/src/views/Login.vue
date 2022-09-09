<script setup>
import Input from '../components/Input.vue';
import Button from '../components/Button.vue';
</script>
<template>
    <div>
        <div class="flex justify-center items-center h-screen">
            <div class="w-1/3 h-1/2 rounded-md shadow-md bg-white/20 flex justify-center items-center flex-col">
                <div class="flex flex-col h-32 justify-evenly mb-5">
                    <Input placeholder="Email" />
                    <Input placeholder="Mot de passe" />
                </div>
                <div class="flex justify-center items-center">
                    <Button text="Connexion" />
                </div>
            </div>
        </div>
    </div>
</template>