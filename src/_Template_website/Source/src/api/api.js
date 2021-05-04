import { mapState, mapGetters, mapMutations } from 'vuex';
import config from '@/../theme/config';

const API = {
  data() {
    return {
      endpoints: {
        dev: config.endpoints.dev,
        production: config.endpoints.production,
      },
    };
  },

  created() {
    if (!this.production)
      console.log('[API] running in ' + process.env.NODE_ENV + ' mode');
  },

  computed: {
    base_endpoint() {
      return this.endpoints[process.env.NODE_ENV];
    },

    ...mapGetters(['production', 'auth']),
  },

  methods: {
    ...mapMutations(['setApiToken', 'setApiUsername', 'setUser']),

    api_get(endpoint, callback) {
      if (Object.keys(this.endpoints).includes(endpoint))
        return this[this.endpoints[endpoint].type](this.endpoints[endpoint].appends, callback);
    },
    
    api_filtered(endpoint, filters, callback) {
      if (Object.keys(this.endpoints).includes(endpoint))
        return this[this.endpoints[endpoint].type](this.endpoints[endpoint].appends, filters, callback);
    },

    api_post(endpoint, data, callback) {
      if (Object.keys(this.endpoints).includes(endpoint))
        return this[this.endpoints[endpoint].type](this.endpoints[endpoint].appends, data, callback);
    },

    api_update(endpoint, id, data, callback) {
      if (Object.keys(this.endpoints).includes(endpoint))
        return this[this.endpoints[endpoint].type](this.endpoints[endpoint].appends, id, data, callback);
    },

    api_find(endpoint, id, callback) {
      if (Object.keys(this.endpoints).includes(endpoint))
        return this[this.endpoints[endpoint].type](this.endpoints[endpoint].appends, id, callback);
    },

    api_update_upload(endpoint, id, data, callback) {
      if (Object.keys(this.endpoints).includes(endpoint))
        return this[this.endpoints[endpoint].type](this.endpoints[endpoint].appends + '/' + id, data, callback);
    },

    http_get(endpoint, callback) {

      this.$store.commit('loadingUp');
      let resource = `${this.base_endpoint}${endpoint}`;

      if (!this.production)
        console.log('[API] ' + resource);

      return this.$http.post(
        resource,
        null,
        (response) => {
          this.$store.commit('loadingDown');
          return callback(response.data);
        }
      );
    },
    
    http_filtered(endpoint, filters, callback) {

      this.$store.commit('loadingUp');
      let resource = `${this.base_endpoint}${endpoint}`;

      if (!this.production)
        console.log('[API] ' + resource);

      return this.$http.post(
        resource,
        filters,
        (response) => {
          this.$store.commit('loadingDown');
          return callback(response.data);
        }
      );
    },

    http_post(endpoint, data, callback) {

      this.$store.commit('loadingUp');
      let resource = `${this.base_endpoint}${endpoint}`;

      if (!this.production)
        console.log('[API] ' + resource);

      return this.$http.post(
        resource,
        data,
        (response) => {
          this.$store.commit('loadingDown');
          return callback(response.data);
        }
      );
    },


    http_update(endpoint, id, data, callback) {

      this.$store.commit('loadingUp');
      let resource = `${this.base_endpoint}${endpoint}/${id}`;

      if (!this.production)
        console.log('[API] ' + resource);

      return this.$http.post(
        resource,
        data,
        (response) => {
          this.$store.commit('loadingDown');
          return callback(response.data);
        }
      );
    },


    http_find(endpoint, id, callback) {

      this.$store.commit('loadingUp');
      let resource = `${this.base_endpoint}${endpoint}/${id}`;

      if (!this.production)
        console.log('[API] ' + resource);

      return this.$http.post(
        resource,
        null,
        (response) => {
          this.$store.commit('loadingDown');
          return callback(response.data);
        }
      );
    },


    http_upload(endpoint, data, callback) {

      this.$store.commit('loadingUp');
      let resource = `${this.base_endpoint}${endpoint}`;

      if (!this.production)
        console.log('[API] ' + resource);

      return this.$http.upload(
        resource,
        data,
        (response) => {
          this.$store.commit('loadingDown');
          return callback(response.data);
        }
      );
    },
    
    http_upload(endpoint, data, callback) {

      this.$store.commit('loadingUp');
      let resource = `${this.base_endpoint}${endpoint}`;

      if (!this.production)
        console.log('[API] ' + resource);

      return this.$http.upload(
        resource,
        data,
        (response) => {
          this.$store.commit('loadingDown');
          return callback(response.data);
        }
      );
    },
    
  }
};

export default API;
