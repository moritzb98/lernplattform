import testview from './views/testview.vue';
import auth from './views/Auth.vue';
import styleguide from './views/styleguide.vue'
import documents from './views/Documents.vue';
import uploads from './components/FileUploadComponent.vue';

// Page Views Nav
import Dashboard from './views/Dashboard.vue'
import Lernmaterial from './views/Lernmaterial.vue'
import Lerngruppen from './views/Lerngruppen.vue'
import Newsfeed from './views/Newsfeed.vue'



export const routes = [

    // Geändert in Drop-Up Nav?
    {
        name: 'Dashboard',
        path: '/spa/Dashboard',
        component: Dashboard
    },
    {
        name: 'Lernmaterial',
        path: '/spa/Lernmaterial',
        component: Lernmaterial
    },
    {
        name: 'Lerngruppen',
        path: '/spa/Lerngruppen',
        component: Lerngruppen
    },
    {
        name: 'Newsfeed',
        path: '/spa/Newsfeed',
        component: Newsfeed
    },

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

];
