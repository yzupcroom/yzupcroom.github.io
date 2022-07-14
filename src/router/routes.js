// layout
import MainLayout from 'layouts/MainLayout'
// page

import check from 'pages/check.vue';
import calculate from 'pages/calculate.vue';
import query from 'pages/query.vue';



import { Platform } from 'quasar'
const routes = [{
    path: '/',
    component: MainLayout,
    redirect: (to) => '/check',
},
{
    path: '/check',
    component: MainLayout,
    children: [{
        path: '',
        name: 'check',
        component: check,
    },
    ]
},
{
    path: '/query',
    component: MainLayout,
    children: [
        {
            path: '',
            name: 'query',
            component: query,
        },
    ]
},
{
    path: '/calculate',
    component: MainLayout,
    meta: { needAuth : true },
    children: [
        {
            path: '',
            name: 'calculate',
            component: calculate,
        },

    ]
},

// Always leave this as last one,
// but you can also remove it
{
    path: '*',
    component: () =>
        import('pages/Error404.vue')
}
]

export default routes
