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
import CreateQuiz from './views/CreateQuiz.vue'
import CreateSkript from './views/CreateSkript.vue'
import CreateSammlung from './views/CreateSammlung.vue'
import CollectionDetail from './views/CollectionDetail.vue'

// Karteikarten
import CreateKarteikartenset from './views/Karteikarten/Create.vue'
import ListingKarteikartensets from './views/Karteikarten/Listing.vue'
import DetailKarteikartenset from './views/Karteikarten/Detail.vue'

//Lerngruppe
import MeineLerngruppen from './views/Lerngruppe/MeineLerngruppen.vue'
import AlleLerngruppen from './views/Lerngruppe/AlleLerngruppen.vue'
import CreateLerngruppe from './views/Lerngruppe/CreateLerngruppe.vue'
import EditLerngruppe from './views/Lerngruppe/EditLerngruppe.vue'
import ChatLerngruppe from './views/Lerngruppe/ChatLerngruppe.vue'
import VideochatLerngruppe from './views/Lerngruppe/VideochatLerngruppe.vue'

import Newsfeed from './views/Newsfeed.vue'
import Login from './views/Login.vue'
import Registrierung from './views/Registrierung.vue'
import UploadDetail from './views/UploadDetail.vue'

//Search
import Suche from './views/Suche.vue'
import SearchUpload from './views/SearchUpload.vue'

//Quiz
import QuizKategorie from './views/QuizKategorie.vue'
import QuizDetail from './views/QuizDetail.vue'
import Quiz from './views/Quiz.vue'
import Auszeichnungen from './views/Auszeichnungen.vue'

// NotFoundPage
import NotFoundPage from './views/NotFoundPage.vue'


export const routes = [

    {
        path: '*',
        component: NotFoundPage,
        name: 'NotFoundPage'    },

    {
        name: 'Suche',
        path: '/spa/Suche',
        component: Suche,
        meta: {
            requiresAuth: true
          }
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
        component: Dashboard,
        meta: {
            requiresAuth: true
          }
    },
    {
        name: 'Lernmaterial',
        path: '/spa/Lernmaterial',
        component: Lernmaterial,
        meta: {
            requiresAuth: true
          }
    },

    {
        name: 'CreateKurs',
        path: '/spa/Kurs-erstellen',
        component: CreateKurs,
        meta: {
            requiresAuth: true
          }
    },
    {
        name: 'CreateSkript',
        path: '/spa/Skript-erstellen',
        component: CreateSkript,
        meta: {
            requiresAuth: true
          }
    },
    {
        name: 'CreateSammlung',
        path: '/spa/Sammlung-erstellen',
        component: CreateSammlung,
        meta: {
            requiresAuth: true
          }
    },
    {
        name: 'CollectionDetail',
        path: '/spa/Collection-detail/:id',
        component: CollectionDetail,
        meta: {
            requiresAuth: true
          }
    },


    // Lerngruppen
    {
        name: 'MeineLerngruppen',
        path: '/spa/Lerngruppen/Eigene',
        component: MeineLerngruppen,
        meta: {
            requiresAuth: true
          }
    },
    {
        name: 'AlleLerngruppen',
        path: '/spa/Lerngruppen/Finden',
        component: AlleLerngruppen,
        meta: {
            requiresAuth: true
          }
    },
    {
        name: 'EditLerngruppe',
        path: '/spa/Lerngruppen/:id/Bearbeiten',
        component: EditLerngruppe,
        meta: {
            requiresAuth: true
          }
    },
    {
        name: 'CreateLerngruppe',
        path: '/spa/Lerngruppen/Erstellen',
        component: CreateLerngruppe,
        meta: {
            requiresAuth: true
          }
    },
    {
        name: 'ChatLerngruppe',
        path: '/spa/Lerngruppen/:id/Chat',
        component: ChatLerngruppe,
        meta: {
            requiresAuth: true
          }
    },
    {
        name: 'VideochatLerngruppe',
        path: '/spa/Lerngruppen/:id/Chat/Konferenz',
        component: VideochatLerngruppe,
        meta: {
            requiresAuth: true
          }
    },

    // Karteikartensets
    {
        name: 'CreateKarteikartenset',
        path: '/spa/Karteikartenset/Erstellen',
        component: CreateKarteikartenset,
        meta: {
            requiresAuth: true
          }
    },
    {
        name: 'ListingKarteikartensets',
        path: '/spa/Karteikartensets',
        component: ListingKarteikartensets,
        meta: {
            requiresAuth: true
          }
    },
    {
        name: 'DetailKarteikartenset',
        path: '/spa/Karteikartenset/:id',
        component: DetailKarteikartenset,
        meta: {
            requiresAuth: true
          }
    },

    {
        name: 'Newsfeed',
        path: '/spa/Newsfeed',
        component: Newsfeed,
        meta: {
            requiresAuth: true
          }
    },

    {
        name: 'test',
        path: '/spa/test',
        component: testview,
        meta: {
            requiresAuth: true
          }
    },
    {
        name: 'auth',
        path: '/spa/auth',
        component: auth
    },
    {
        name: 'styleguide',
        path: '/spa/style',
        component: styleguide,
        meta: {
            requiresAuth: true
          }
    },
    {
        name: 'documentmanagement',
        path: '/spa/documents',
        component: documents,
        meta: {
            requiresAuth: true
          }
    },
    {
        name: 'uploads',
        path: '/spa/upload',
        component: uploads,
        meta: {
            requiresAuth: true
          }
    },

    {
        name: 'chat',
        path: '/spa/chat',
        component: container,
        meta: {
            requiresAuth: true
          }
    },

    {
        name: 'UploadDetail',
        path: '/spa/documents/:id',
        component: UploadDetail,
        meta: {
            requiresAuth: true
          }
    },

    {
        name: 'SearchUpload',
        path: '/spa/search/upload',
        component: SearchUpload,
        meta: {
            requiresAuth: true
          }
    },

    //Quiz
    {
        name: 'QuizKategorie',
        path: '/spa/quizkategorie',
        component: QuizKategorie,
        meta: {
            requiresAuth: true
          }
    },
    {
        name: 'QuizDetail',
        path: '/spa/quiz/:category',
        component: QuizDetail,
        meta: {
            requiresAuth: true
          }
    },
    {
        name: 'QuizDetail',
        path: '/spa/quiz/:category/:quizid',
        component: Quiz,
        meta: {
            requiresAuth: true
          }
    },
    {
        name: 'Auszeichnungen',
        path: '/spa/Auszeichnungen',
        component: Auszeichnungen,
        meta: {
            requiresAuth: true
          }
    },
    {
        name: 'CreateQuiz',
        path: '/spa/Quiz-erstellen',
        component: CreateQuiz,
        meta: {
            requiresAuth: true
          }
    },



];
