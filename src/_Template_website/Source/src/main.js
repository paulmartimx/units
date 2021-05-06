
// Import default Vue... works well for SPAs
// import Vue from 'vue'

// Import vue pre-compiled for allowing use the app on-premise (Laravel and others)
import Vue from 'vue/dist/vue.esm';

import Vuex from 'vuex';
import {
  Autocomplete,
  Button,
  Carousel,
  Checkbox,
  Clockpicker,
  Collapse,
  Datepicker,
  Datetimepicker,
  Dialog,
  Dropdown,
  Field,
  Icon,
  Image,
  Input,
  Loading,
  Menu,
  Message,
  Modal,
  Navbar,
  Notification,
  Numberinput,
  Pagination,
  Progress,
  Radio,
  Rate,
  Select,
  Skeleton,
  Sidebar,
  Slider,
  Snackbar,
  Steps,
  Switch,
  Table,
  Tabs,
  Tag,
  Taginput,
  Timepicker,
  Toast,
  Tooltip,
  Upload
} from 'buefy'
import 'lazysizes';
import App from './App.vue'
import store from './store/store'
import i18n from './i18n'
import '@/assets/styles.scss';

Vue.config.productionTip = false

Vue.use(Vuex)

Vue.use(Autocomplete)
Vue.use(Button)
Vue.use(Carousel)
Vue.use(Checkbox)
Vue.use(Clockpicker)
Vue.use(Collapse)
Vue.use(Datepicker)
Vue.use(Datetimepicker)
Vue.use(Dialog)
Vue.use(Dropdown)
Vue.use(Field)
Vue.use(Icon)
Vue.use(Image)
Vue.use(Input)
Vue.use(Loading)
Vue.use(Menu)
Vue.use(Message)
Vue.use(Modal)
Vue.use(Navbar)
Vue.use(Notification)
Vue.use(Numberinput)
Vue.use(Pagination)
Vue.use(Progress)
Vue.use(Radio)
Vue.use(Rate)
Vue.use(Select)
Vue.use(Skeleton)
Vue.use(Sidebar)
Vue.use(Slider)
Vue.use(Snackbar)
Vue.use(Steps)
Vue.use(Switch)
Vue.use(Table)
Vue.use(Tabs)
Vue.use(Tag)
Vue.use(Taginput)
Vue.use(Timepicker)
Vue.use(Toast)
Vue.use(Tooltip)
Vue.use(Upload)

const app = new Vue({
  render: (h) => h(App),
  store: new Vuex.Store(store),
  i18n,
  el: "#app"
})

// app.mount('#app')
