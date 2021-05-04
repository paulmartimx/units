import { name, version } from '@/../package.json';
import { osName, osVersion, isAndroid, isIOS, isMacOs, isWindows, isBrowser, isMobileOnly } from 'mobile-device-detect'
import createPersistedState from 'vuex-persistedstate';

export default {
  state: {
    version: version,
    env: process.env.NODE_ENV,    
    loading: 0,    
    device: {
      os: {
        name: osName,
        version: osVersion,
      },
      isBrowser: isBrowser,
      isAndroid: isAndroid,
      isIOS: isIOS,
      isMacOs: isMacOs,
      isWindows: isWindows,
      isMobileOnly: isMobileOnly
    },
    app_components: {},
  },

  plugins: [
    createPersistedState({
      key: name,
      reducer: (state) => {
        let reducer = Object.assign({}, state);

        delete reducer.env;
        delete reducer.loading;
        delete reducer.updateReady;
        delete reducer.registration;
        delete reducer.app_components;

        return reducer;
      },
    }),
  ],

  getters: {
    production: (state) => state.env === 'production',    
    isLoading: (state) => state.loading > 0,
    appVersion: (state) => state.version,    
    device: (state) => state.device,
    app_components: (state) => state.app_components,
  },

  mutations: {
    setAppVersion(state, value) {
      state.version = value;
    },

    resetLoading(state) {
      state.loading = 0;
    },

    loadingUp(state) {
      state.loading++;
    },

    loadingDown(state) {
      state.loading--;
    },    

    registerAppComponent(state, component_name) {
      state.app_components[component_name] = {
        isMounted: false,
      };

      if (state.env === 'dev')
        console.log('[APP] Component ' + component_name + ' registered.');
    },

    mountAppComponent(state, component_name) {
      state.app_components[component_name].isMounted = true;

      if (state.env === 'dev')
        console.log('[APP] Component ' + component_name + ' is mounted.');
    },
  },
};
