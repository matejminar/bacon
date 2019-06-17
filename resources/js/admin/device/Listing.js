import AppListing from '../app-components/Listing/AppListing';

Vue.component('device-listing', {
    mixins: [AppListing],
    computed: {
        window() {
            return window;
        }
    }
});