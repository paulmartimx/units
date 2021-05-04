
import API from '@/api/api'

const SessionApi = {

  mixins: [API],
  data() {
    return {      
      endpoints: {

        // Session
        get_session: {
          type: 'http_get',
          appends: 'session/get'
        },
      }
    }
  },
};

export default SessionApi;