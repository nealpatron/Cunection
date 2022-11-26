import { createWebHistory, createRouter } from "vue-router";

export const routes = [
    {
        name: "home",
        path: "/",
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
        name: "dashboard",
        path: "/dashboard",
        component: () => import("../pages/Dashboard.vue"),
    },
    {
        name: "books",
        path: "/books",
        component: () => import("../components/Books.vue"),
    },
    {
        name: "addbook",
        path: "/books/add",
        component: () => import("../components/AddBook.vue"),
    },
    {
        name: "editbook",
        path: "/books/edit/:id",
        component: () => import("../components/EditBook.vue"),
    },
    {
        name: "gettest",

        path: "/gettest",
        component: () => import("../components/Gettest.vue"),
    },
    /*
    {
        path: "/events-follow-list",
        name: "events-follow-list",
        component: () => import("../views/events/FollowListView.vue"),
      },
      {
        path: "/events-follow-calendar",
        name: "events-follow-calendar",
        component: () => import("../views/events/FollowCalendarView.vue"),
      },
      {
        path: "/events-all-list",
        name: "events-all-list",
        component: () => import("../views/events/AllListView.vue"),
      },
      {
        path: "/events-all-calendar",
        name: "events-all-calendar",
        component: () => import("../views/events/AllCalendarView.vue"),
      },
      {
        path: "/clubs-search",
        name: "search",
        component: () => import("../views/clubs/SearchView.vue"),
      },
      {
        path: "/clubs-follow",
        name: "clubs-follow",
        component: () => import("../views/clubs/FollowedClubsView.vue"),
      },
      {
        path: "/clubs-browse",
        name: "clubs-browse",
        component: () => import("../views/clubs/BrowseClubsView.vue"),
      },
      */
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
