import testview from './views/testview.vue';
import auth from './views/Auth.vue';

export const routes = [
    {
        name: 'test',
        path: '/spa/test',
        component: testview
    },
    {
        name: 'auth',
        path: '/spa/auth',
        component: auth
    },

];
