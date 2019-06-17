import AppForm from '../app-components/Form/AppForm';

Vue.component('employee-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                is_at_work:  false ,
                last_seen_at:  '' ,
                is_published: false
                
            },
            mediaCollections: ['avatar']
        }
    }

});