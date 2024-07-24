window._ = require("lodash");

import Vue from "vue";
import InstantSearch from "vue-instantsearch";
import VModal from "vue-js-modal";

window.$ = window.jQuery = require("jquery");

/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = require("vue");

Vue.use(InstantSearch);
Vue.use(VModal);

let authorizations = require("./authorizations");

Vue.prototype.authorize = function(...params) {
  if (!window.App.signedIn) return false;

  if (typeof params[0] === "string") {
    return authorizations[params[0]](params[1]);
  }

  return params[0](window.App.user);
};

Vue.prototype.signedIn = window.App.signedIn;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require("axios");

window.axios.defaults.headers.common = {
  "X-CSRF-TOKEN": window.App.csrfToken,
  "X-Requested-With": "XMLHttpRequest",
};

window.events = new Vue();

window.flash = function(message, level = "success") {
  window.events.$emit("flash", { message, level });
};
