import AppForm from '../app-components/Form/AppForm';

Vue.component('device-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                ip:  '' ,
                mac:  '' ,
                hostname:  '' ,
                employee_id:  '' ,
                
            }
        }
    }

});