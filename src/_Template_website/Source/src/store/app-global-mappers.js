import { mapState, mapGetters, mapMutations } from 'vuex';

const appState = ['version', 'env'];

const appGetters = [
  'production',  
  'isLoading',
  'appVersion',  
  'device',
];

const appMutations = [
  'setAppVersion', 
  'resetLoading',
  'loadingUp',
  'loadingDown',
];

export default {
  methods: {
    ...mapMutations(appMutations),    
  },
  computed: {
    ...mapState(appState),
    ...mapGetters(appGetters),
  },
};
