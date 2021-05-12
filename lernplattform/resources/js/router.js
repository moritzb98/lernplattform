import testview from './views/testview.vue';
import auth from './views/Auth.vue';
import styleguide from './views/styleguide.vue'
import documents from './views/Documents.vue';
import uploads from './components/FileUploadComponent.vue';

import container from './views/Chat/container.vue';

//
// Page Views Nav
//
import Dashboard from './views/Dashboard.vue'
import Lernmaterial from './views/Lernmaterial.vue'

import CreateKurs from './views/CreateKurs.vue'
import CreateKarteikarten from './views/CreateKarteikarten.vue'
import CreateQuiz from './views/CreateQuiz.vue'
import CreateSkript from './views/CreateSkript.vue'
import CreateSammlung from './views/CreateSammlung.vue'
import CollectionDetail from './views/CollectionDetail.vue'

//Lerngruppe
import MeineLerngruppen from './views/Lerngruppe/MeineLerngruppen.vue'
import AlleLerngruppen from './views/Lerngruppe/AlleLerngruppen.vue'
import CreateLerngruppe from './views/Lerngruppe/CreateLerngruppe.vue'
import EditLerngruppe from './views/Lerngruppe/EditLerngruppe.vue'
import ChatLerngruppe from './views/Lerngruppe/ChatLerngruppe.vue'

import Newsfeed from './views/Newsfeed.vue'
import Login from './views/Login.vue'
import Registrierung from './views/Registrierung.vue'
import UploadDetail from './views/UploadDetail.vue'

//Search
import Suche from './views/Suche.vue'
import SearchUpload from './views/SearchUpload.vue'


export const routes = [

    {
        name: 'Suche',
        path: '/spa/Suche',
        component: Suche
    },
    // Geändert in Drop-Up Nav?
    {
        name: 'Login',
        path: '/spa/Login',
        component: Login
    },
    {
        name: 'Registrierung',
        path: '/spa/Registrierung',
        component: Registrierung
    },
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
        name: 'CreateKurs',
        path: '/spa/Kurs-erstellen',
        component: CreateKurs
    },
    {
        name: 'CreateKarteikarten',
        path: '/spa/Karteikarten-erstellen',
        component: CreateKarteikarten
    },
    {
        name: 'CreateQuiz',
        path: '/spa/Quiz-erstellen',
        component: CreateQuiz
    },
    {
        name: 'CreateSkript',
        path: '/spa/Skript-erstellen',
        component: CreateSkript
    },
    {
        name: 'CreateSammlung',
        path: '/spa/Sammlung-erstellen',
        component: CreateSammlung
    },
    {
        name: 'CollectionDetail',
        path: '/spa/Collection-detail/:id',
        component: CollectionDetail
    },


    // Lerngruppen
    {
        name: 'MeineLerngruppen',
        path: '/spa/Lerngruppen/Eigene',
        component: MeineLerngruppen
    },
    {
        name: 'AlleLerngruppen',
        path: '/spa/Lerngruppen/Finden',
        component: AlleLerngruppen
    },
    {
        name: 'EditLerngruppe',
        path: '/spa/Lerngruppen/:id/Bearbeiten',
        component: EditLerngruppe
    },
    {
        name: 'CreateLerngruppe',
        path: '/spa/Lerngruppen/Erstellen',
        component: CreateLerngruppe
    },
    {
        name: 'ChatLerngruppe',
        path: '/spa/Lerngruppen/:id/Chat',
        component: ChatLerngruppe
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
        path: '/spa/upload',
        component: uploads
    },

    {
        name: 'chat',
        path: '/spa/chat',
        component: container
    },

    {
        name: 'UploadDetail',
        path: '/spa/documents/:id',
        component: UploadDetail
    },

    {
        name: 'SearchUpload',
        path: '/spa/search/upload',
        component: SearchUpload
    }



];
