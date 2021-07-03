import {createWebHistory, createRouter} from "vue-router";

import Home from '../pages/Home';
import About from '../pages/About';
import Register from '../pages/Register';
import Login from '../pages/Login';
import Dashboard from '../pages/Dashboard';
import AddPost from "../pages/AddPost";
import UpdatePost from "../pages/UpdatePost";
import Comments from "../pages/Comments";
import UserInfo from "../pages/UserInfo";
import UserProfile from "../pages/UserProfile";

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'about',
        path: '/about',
        component: About
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },
    {
        name: 'addpost',
        path: '/addpost',
        component: AddPost
    },
    {
        name: 'updatepost',
        path: '/updatepost/:id',
        component: UpdatePost
    },
    {
        name: 'comments',
        path: '/comments/:id',
        component: Comments
    },
    {
        name: 'users',
        path: '/users',
        component: UserInfo
    },
    {
        name: 'userprofile',
        path: '/userprofile/:id',
        component: UserProfile
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
