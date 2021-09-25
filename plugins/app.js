import Vue from 'vue';
import VueSweetalert2 from 'vue-sweetalert2';
import Notifications from 'vue-notification'
import BackToTop from 'vue-backtotop'
import VueAnimateOnScroll from 'vue-animate-onscroll'
import 'sweetalert2/dist/sweetalert2.min.css';
import Vue2TouchEvents from 'vue2-touch-events'
import Flutterwave from 'vue-flutterwave'

window.gateway={
  'sk_live':'sk_live_1ab3d992f5df0f7355e86766f60bb72041684276',
  'pk_live':'pk_live_89ce6dfc22e046f858e6fb72fd58a452825ba274',
  'sk_test':'sk_test_ecccf866a6b1424fae755f68a84b8bf1c122c3ab',
  'pk_test':'pk_test_14b72f454b21c79682934eec607d9058f596e244'
}
Vue.use(Flutterwave, { publicKey: gateway.pk_live})
Vue.use(Notifications)
Vue.use(BackToTop)
Vue.use(VueAnimateOnScroll)
Vue.use(VueSweetalert2);
Vue.use(Vue2TouchEvents)
require("bootstrap");

window.baseurl="https://paddipay.xyz/api";
window.hosturl="https://paddipay.xyz";
window.axios = require('axios');
