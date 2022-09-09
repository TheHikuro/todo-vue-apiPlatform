import './style.css'
import App from './App.vue'
import router from './router'
import * as Vue from 'vue'

const app = Vue.createApp(App)
app.use(router)
app.mount('#app')


