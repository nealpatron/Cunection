<template>
    <v-app>
        <v-app-bar>
            <v-app-bar-nav-icon @click.stop="rail = !rail" />
            <v-app-bar-title>Cunection</v-app-bar-title>
        </v-app-bar>

        <v-navigation-drawer :rail="rail">
            <v-list>
                <!-- for logged-in user-->
                <div v-if="isLoggedIn">
                    <router-link to="/dashboard" class="nav-item nav-link"
                        >Dashboard</router-link
                    >
                    <router-link to="/books" class="nav-item nav-link"
                        >Books</router-link
                    >
                    <router-link to="/gettest" class="nav-item nav-link"
                        >Get Test</router-link
                    >
                    <a
                        class="nav-item nav-link"
                        style="cursor: pointer"
                        @click="logout"
                        >Logout</a
                    >
                </div>
                <!-- for non-logged user-->
                <div v-else>
                    <!--
                    <v-list>
                         Home
                        <v-list-item prepend-icon="mdi-home" title="Home" />

                         Events
                        <template v-slot:activator>
                            <v-list-item
                                prepend-icon="mdi-home"
                                title="All Events"
                            />
                        </template>
                        <v-list-group no-action sub-group value="true">
                            <v-list-item prepend-icon="mdi-home" title="List" />
                            <v-list-item
                                prepend-icon="mdi-home"
                                title="Calendar"
                            />
                        </v-list-group>

                        Clubs
                        <template>
                            <v-list-item
                                prepend-icon="mdi-home"
                                title="Clubs"
                            />
                        </template>
                        <v-list-group no-action sub-group value="true">
                            <v-list-item
                                prepend-icon="mdi-home"
                                title="Search for a Club"
                            />
                            <v-list-item
                                prepend-icon="mdi-home"
                                title="Browse Clubs"
                            />
                        </v-list-group>
                    </v-list>
                -->

                    <v-list>
                        <!-- Home page -->
                        <v-list-item
                            prepend-icon="mdi-home"
                            title="Home"
                        ></v-list-item>

                        <!-- Events pages-->
                        <v-list-group value="Events">
                            <template v-slot:activator="{ props }">
                                <v-list-item
                                    v-bind="props"
                                    prepend-icon="mdi-account-circle"
                                    title="Events"
                                ></v-list-item>
                            </template>
                            <v-list-item
                                prepend-icon="mdi-account-circle"
                                title="List"
                            ></v-list-item
                            ><v-list-item
                                prepend-icon="mdi-account-circle"
                                title="Calendar"
                            ></v-list-item>
                        </v-list-group>

                        <!-- Club pages-->
                        <v-list-group value="Clubs">
                            <template v-slot:activator="{ props }">
                                <v-list-item
                                    v-bind="props"
                                    prepend-icon="mdi-account-circle"
                                    title="Clubs"
                                ></v-list-item>
                            </template>
                            <v-list-item
                                prepend-icon="mdi-account-circle"
                                title="Search"
                            ></v-list-item
                            ><v-list-item
                                prepend-icon="mdi-account-circle"
                                title="Browse"
                            ></v-list-item>
                        </v-list-group>
                    </v-list>

                    <router-link to="/" class="nav-item nav-link"
                        >Home</router-link
                    >
                    <router-link to="/login" class="nav-item nav-link"
                        >login</router-link
                    >
                    <router-link to="/register" class="nav-item nav-link"
                        >Register
                    </router-link>
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
        </v-main>
    </v-app>
</template>

<script>
export default {
    name: "App",
    data() {
        return {
            isLoggedIn: false,
            rail: true,
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
