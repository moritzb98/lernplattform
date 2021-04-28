import testview from './views/testview.vue';
import auth from './views/Auth.vue';
import documents from './views/Documents.vue';
import uploads from './components/FileUploadComponent.vue';

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

    {
        name: 'documentmanagement',
        path: '/spa/documents',
        component: documents
    },

    {
        name: 'uploads',
        path: '/spa/uploads',
        component: uploads
    },

];
