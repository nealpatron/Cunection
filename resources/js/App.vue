<template>
    <v-app class="myFont">
        <v-app-bar color="#192C53" theme="dark">
            <v-app-bar-title class="ml-7">Cunection</v-app-bar-title>
        </v-app-bar>

        <v-navigation-drawer app v-model="drawer" :rail="false" permanent>
            <v-list nav>
                <!-- for logged-in user -->
                <div v-if="isLoggedIn">
                    <v-list>
                        <!-- Home page -->
                        <v-list-item
                            prepend-icon="mdi-home"
                            title="Home"
                            to="/home"
                        >
                        </v-list-item>

                        <v-divider />

                        <!-- Events pages -->
                        <v-list-group value="Events">
                            <template v-slot:activator="{ props }">
                                <v-list-item
                                    v-bind="props"
                                    prepend-icon="mdi-calendar-multiple-check"
                                    title="Events"
                                ></v-list-item>
                            </template>

                            <!-- Events the User Follows-->
                            <v-list-group>
                                <template v-slot:activator="{ props }">
                                    <v-list-item
                                        v-bind="props"
                                        title="Following"
                                    ></v-list-item>
                                </template>
                                <v-list-item
                                    title="List"
                                    to="/events-follow-list"
                                ></v-list-item
                                ><v-list-item
                                    title="Calendar"
                                    to="/events-follow-calendar"
                                ></v-list-item>
                            </v-list-group>

                            <!-- All Events -->
                            <v-list-group>
                                <template v-slot:activator="{ props }">
                                    <v-list-item
                                        v-bind="props"
                                        title="All"
                                    ></v-list-item>
                                </template>
                                <v-list-item
                                    title="List"
                                    to="/events-all-list"
                                ></v-list-item
                                ><v-list-item
                                    title="Calendar"
                                    to="/events-all-calendar"
                                ></v-list-item>
                            </v-list-group>
                        </v-list-group>

                        <v-divider />

                        <!-- Club pages -->
                        <v-list-group value="Clubs">
                            <template v-slot:activator="{ props }">
                                <v-list-item
                                    v-bind="props"
                                    prepend-icon="mdi-account-group"
                                    title="Clubs"
                                ></v-list-item>
                            </template>

                            <v-list-item
                                title="Following"
                                to="/clubs-follow"
                            ></v-list-item>

                            <v-list-item
                                title="Browse"
                                to="/clubs-browse"
                            ></v-list-item>

                            <v-list-item
                                title="Search"
                                to="/clubs-search"
                            ></v-list-item>
                        </v-list-group>

                        <v-divider />

                        <!-- Logout Page -->
                        <v-list-item
                            prepend-icon="mdi-logout"
                            title="Logout"
                            @click="logout"
                        >
                        </v-list-item>
                    </v-list>
                </div>

                <!-- for non-logged user -->
                <div v-else>
                    <v-list>
                        <!-- Events pages -->
                        <v-list-group value="Events">
                            <template v-slot:activator="{ props }">
                                <v-list-item
                                    v-bind="props"
                                    prepend-icon="mdi-calendar-multiple-check"
                                    title="Events"
                                ></v-list-item>
                            </template>
                            <v-list-item
                                title="List"
                                to="/events-all-list"
                            ></v-list-item
                            ><v-list-item
                                title="Calendar"
                                to="/events-all-calendar"
                            ></v-list-item>
                        </v-list-group>

                        <v-divider />

                        <!-- Club pages -->
                        <v-list-group value="Clubs">
                            <template v-slot:activator="{ props }">
                                <v-list-item
                                    v-bind="props"
                                    prepend-icon="mdi-account-group"
                                    title="Clubs"
                                ></v-list-item>
                            </template>
                            <v-list-item
                                title="Browse"
                                to="/clubs-browse"
                            ></v-list-item>

                            <v-list-item
                                title="Search"
                                to="/clubs-search"
                            ></v-list-item>
                        </v-list-group>

                        <v-divider />

                        <!-- Login Page -->
                        <v-list-item
                            prepend-icon="mdi-login"
                            title="Login"
                            to="/login"
                        >
                        </v-list-item>
                    </v-list>
                </div>
                <template v-slot:append>
                    <div class="pa-2">
                        <v-btn block> Logout </v-btn>
                    </div>
                </template>
            </v-list>
        </v-navigation-drawer>
        <v-main>
            <router-view />
            <div class="mt-5">
                <v-footer class="justify-center" inset app>
                    <p class="x-small">
                        Created by Faith Brown and Neal Patron -
                        {{ new Date().getFullYear() }}
                    </p>
                </v-footer>
            </div>
        </v-main>
    </v-app>
</template>

<script>
export default {
    name: "App",
    data() {
        return {
            isLoggedIn: false,
            drawer: true,
        };
    },
    created() {
        if (window.Laravel.isLoggedin) {
            this.isLoggedIn = true;
        }
    },
    methods: {
        logout(e) {
            console.log("ss");
            e.preventDefault();
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .post("/api/logout")
                    .then((response) => {
                        if (response.data.success) {
                            window.location.href = "/";
                        } else {
                            console.log(response);
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            });
        },
    },
};
</script>

<style>
.myFont {
    font-family: Georgia, serif;
}
</style>
