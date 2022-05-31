'use strict';

import * as svgConstants from 'src/grapesjs/config/svg-constants';

export default {
    created () {
        this.$notification = {
            success: (message, position, options) => this.initializeToastr(message, position, options, 'SUCCESS!', 'success')
        };

        this.svg = svgConstants;
    },

    methods: {
        initializeToastr (message, position, options = {}, title, type) {
            title = typeof options === 'string' && options !== null ? options : (options.title || title);
            position = position ? position : 'toast-top-right';
            this.$toastr.Add({...options, title, type, msg: message, position: position});
        }
    }
}
