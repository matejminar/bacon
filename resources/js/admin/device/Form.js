import AppForm from '../app-components/Form/AppForm';

Vue.component('device-form', {
    mixins: [AppForm],
    props: {
        employees: {
            type: Array,
            required: false
        }
    },
    data: function() {
        return {
            form: {
                ip:  '' ,
                mac:  '' ,
                hostname:  '' ,
                employee_id:  '' ,
                
            }
        }
    },
    computed: {
        employee: {
            get () {
                return this.employees.find(employee => employee.id === this.form.employee_id)
            },
            set (v) {
                this.form.employee_id = v.id
            },
        },
    }

});