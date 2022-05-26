'use strict';

import PageEdit from 'src/components/modules/page/PageEdit';

const ROUTES = [
    {
        path: '/page/edit/:pageId',
        component: {
            ...PageEdit,
        },
        name: 'PageEdit'
    }
];

export default ROUTES;
