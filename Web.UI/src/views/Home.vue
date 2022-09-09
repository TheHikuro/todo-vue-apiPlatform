<script>
export default {
    name: 'listTodo',
    data() {
        return {
            todos: [
                {
                    id: 1,
                    title: 'Learn Vue',
                    completed: false
                },
                {
                    id: 2,
                    title: 'Learn Vue 3',
                    completed: true
                },
                {
                    id: 3,
                    title: 'Learn Vue 3 Composition API',
                    completed: false
                }
            ],
        }
    },
    methods: {
        addTodo() {
            this.todos.push({
                id: this.todos.length + 1,
                title: 'New todo',
                completed: false
            })
        },
    }
}
</script>
<script setup>
import Button from '../components/Button.vue';
</script>

<template>
    <div class="w-full h-screen flex justify-center items-center">
        <div class="w-4/6 h-4/6 rounded-lg shadow-md bg-white/25 flex flex-col ">
            <div class="h-fit p-2">
                <Button class="text-white" text="Nouvelle Todo" @click="addTodo(todos)" />
            </div>
            <div class="h-full p-2 overflow-scroll">
                <h2>Mes todos</h2>
                <v-router-link
                    class="rounded-md p-3 m-2 hover:cursor-pointer hover:bg-green-400 bg-white w-fit flex text-black"
                    v-for="todo in todos" :key="todo.id" :to="{ name: 'todo', params: { id: todo.id } }">
                    {{ todo.title }}
                </v-router-link>
            </div>
        </div>
    </div>
</template>