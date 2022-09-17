<script>
import { useRoute } from 'vue-router';
export default {
    name: 'Todo',
    data() {
        return {
            todoId: useRoute().params.todoId
        }
    },
    mounted() {
        this.getTodo()
    },
    methods: {
        async getTodo() {
            await fetch('https://localhost:443/todos/' + this.todoId,
                {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Origin': 'http://localhost:8080',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    this.todo = data
                })
        },
        async updateTodo() {
            await fetch('https://localhost:443/todos/' + this.todoId,
                {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Origin': 'http://localhost:8080',
                    },
                    body: JSON.stringify(this.todo)
                })
                .then(response => response.json())
                .then(data => {
                    this.todo = data
                })
        },
        async deleteTodo() {
            await fetch('https://localhost:443/todos/' + this.todoId,
                {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'Origin': 'http://localhost:8080',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    this.todo = data
                })
        },
    },
}
</script>

<template>
    <div class="text-white">
        Bienvenue sur la todo {{ this.todoId }}
    </div>
</template>