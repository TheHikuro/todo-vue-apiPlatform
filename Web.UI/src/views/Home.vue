<script>
import Button from '../components/Button.vue'
export default {
    name: 'listTodo',
    components: {
        Button
    },
    data() {
        return {
            todos: []
        }
    },
    mounted() {
        this.getTrello()
    },
    methods: {
        addTodo() {
            this.todos.push({
                id: this.todos.length + 1,
                title: 'New todo',
                completed: false
            })
        },
        redirect(todoId) {
            this.$router.push('/todo/' + todoId)
        },
        async getTrello() {
            await fetch('https://localhost:443/trellos',
                {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Origin': 'http://localhost:8080',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    this.todos.push(...data['hydra:member'])
                })
        }
    },
}
</script>

<template>
    <div class="w-full h-full flex justify-center items-center">
        <div class="w-4/6 h-4/6 rounded-lg shadow-md bg-white/25 flex flex-col ">
            <div class="h-fit p-2">
                <Button class="text-green-400" text="Nouvelle todo" @click="addTodo(todos)" icon='<lord-icon src="https://cdn.lordicon.com/ttioogfl.json" trigger="morph"
                    colors="primary:#121331,secondary:#ebe6ef,tertiary:#4bb3fd,quaternary:#92140c,quinary:#f9c9c0">
                </lord-icon>' />
            </div>
            <div class="h-full p-2 overflow-scroll">
                <h2>Mes todos</h2>

                <div className="collapse" v-for="todo in todos">
                    <input type="checkbox" className="peer" />
                    <div
                        className="collapse-title rounded-lg mb-2 bg-white text-primary-content peer-checked:bg-green-400 peer-checked:text-black peer-checked:rounded-b-none flex items-center">
                        {{ todo.name }}
                    </div>
                    <div
                        className="collapse-content bg-white peer-checked:bg-green-400 peer-checked:text-black -mt-2 rounded-b-lg peer-checked:mb-2 flex items-center justify-between">
                        {{ todo.id }}
                        <Button class="text-white bg-black hover:bg-black/60" text="Voir" @click="redirect(todo.id)" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

