import './style.css'
import App from './App.vue'
import router from './router'
import * as Vue from 'vue'
import { plugin, defaultConfig } from '@formkit/vue'
import { generateClasses } from '@formkit/themes'
import { createAutoAnimatePlugin } from '@formkit/addons'
import theme from './helpers/formkit/theme'

const app = Vue.createApp(App)
app.use(router)
app.use(plugin, defaultConfig({
    config: {
        classes: generateClasses(theme)
    },
    plugins: [
        createAutoAnimatePlugin()
    ]
}))
app.mount('#app')


