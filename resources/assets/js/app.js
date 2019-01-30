require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';


Vue.use(VueAxios, axios);
import App from './App.vue';
import HomeComponent from './components/HomeComponent.vue';
import CreateClassRoomComponent from './components/class_rooms/CreateClassRoomComponent.vue';
import IndexClassRoomComponent from './components/class_rooms/IndexClassRoomComponent.vue';
import EditClassRoomComponent from './components/class_rooms/EditClassRoomComponent.vue';
import CreateTeacherComponent from './components/teaches/CreateTeacherComponent.vue';
import IndexTeacherComponent from './components/teaches/IndexTeacherComponent.vue';
import EditTeacherComponent from './components/teaches/EditTeacherComponent.vue';
import CreateStudentComponent from './components/student/CreateStudentComponent.vue';
import EditStudentComponent from './components/student/EditStudentComponent.vue';


const routes = [
    {
        name: 'home',
        path: '/',
        component: HomeComponent
    },
    {
        name: 'create_class_room',
        path: '/create_class_room',
        component: CreateClassRoomComponent
    },
    {
        name: 'create_teacher',
        path: '/create_teacher',
        component: CreateTeacherComponent
    },
    {
        name: 'create_student',
        path: '/create_student',
        component: CreateStudentComponent
    },
    {
        name: 'class_rooms',
        path: '/class_rooms',
        component: IndexClassRoomComponent
    },
    {
        name: 'teachers',
        path: '/teachers',
        component: IndexTeacherComponent
    },
    {
        name: 'edit_class_room',
        path: '/class_room/edit/:id',
        component: EditClassRoomComponent
    },
    {
        name: 'edit_teacher',
        path: '/teacher/edit/:id',
        component: EditTeacherComponent
    },
    {
        name: 'edit_student',
        path: '/student/edit/:id',
        component: EditStudentComponent
    }
];

const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');