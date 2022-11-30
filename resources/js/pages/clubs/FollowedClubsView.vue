<script>
export default {
    name: "FollowedClubs",
    data() {
        return {
            items: [],
        };
    },
    mounted() {
        this.getAllClubs();
    },
    methods: {
        getFollowedClubs() {
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .get("/api/users/me/following")
                    .then((response) => {
                        this.items = response.data;
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            });
        },
    },
};
</script>

<template>
    <v-list lines="two">
        <v-list-item
            v-for="item in items"
            :key="item.id"
            :title="item.name"
            :subtitle="item.description"
        ></v-list-item>
    </v-list>
</template>
