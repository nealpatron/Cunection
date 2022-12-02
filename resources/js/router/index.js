import { createWebHistory, createRouter } from "vue-router";

export const routes = [
    {
        path: "/",
        redirect: "/events-all-list",
    },
    {
        name: "home",
        path: "/home",
        component: () => import("../pages/Home.vue"),
    },
    {
        name: "register",
        path: "/register",
        component: () => import("../pages/Register.vue"),
    },
    {
        name: "login",
        path: "/login",
        component: () => import("../pages/Login.vue"),
    },
    {
        path: "/events-follow-list",
        name: "events-follow-list",
        component: () => import("../pages/events/FollowListView.vue"),
    },
    {
        path: "/events-follow-calendar",
        name: "events-follow-calendar",
        component: () => import("../pages/events/FollowCalendarView.vue"),
    },
    {
        path: "/events-all-list",
        name: "events-all-list",
        component: () => import("../pages/events/AllListView.vue"),
    },
    {
        path: "/events-all-calendar",
        name: "events-all-calendar",
        component: () => import("../pages/events/AllCalendarView.vue"),
    },
    {
        path: "/clubs-search",
        name: "search",
        component: () => import("../pages/clubs/SearchView.vue"),
    },
    {
        path: "/clubs-follow",
        name: "clubs-follow",
        component: () => import("../pages/clubs/FollowedClubsView.vue"),
    },
    {
        path: "/clubs-browse",
        name: "clubs-browse",
        component: () => import("../pages/clubs/BrowseClubsView.vue"),
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
