'use strict';


export default {
    created () {
        this.$notification = {
            success: (message, options) => this.initializeToastr(message, options, 'SUCCESS!', 'success')
        };
    },

    methods: {
        initializeToastr (message, options = {}, title, type) {
            title = typeof options === 'string' ? options : (options.title || title);
            this.$toastr.Add({...options, title, type, msg: message});
        }
    }
}
