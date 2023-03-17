import './bootstrap';

import {createApp} from "vue/dist/vue.esm-bundler";
import App from "../views/vue-components/App.vue"
import router from './router'

const app = createApp(App)

app.use(router)

app.mount('#app')
