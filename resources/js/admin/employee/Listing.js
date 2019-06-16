import AppListing from '../app-components/Listing/AppListing';

Vue.component('employee-listing', {
    mixins: [AppListing],
    computed: {
        window() {
            return window;
        }
    }
});