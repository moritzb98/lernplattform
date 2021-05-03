import testview from './views/testview.vue';
import auth from './views/Auth.vue';
import styleguide from './views/styleguide.vue'
import documents from './views/Documents.vue';
import uploads from './components/FileUploadComponent.vue';
import container from './views/Chat/container.vue';
 
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
        name: 'styleguide',
        path: '/spa/style',
        component: styleguide
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

    {
        name: 'chat',
        path: '/spa/chat',
        component: container
    }

];
