import { createApp } from "vue";

import "./bootstrap";
import App from "./App.vue";
import axios from "axios";
import router from "./router";

import ElementPlus from "element-plus";
import "element-plus/dist/index.css";
import * as ElementPlusIconsVue from "@element-plus/icons-vue";

const app = createApp(App);

for (const [key, component] of Object.entries(ElementPlusIconsVue)) {
    app.component(key, component);
}

app.config.globalProperties.$axios = axios;

app.use(router).use(ElementPlus).mount("#app");
    