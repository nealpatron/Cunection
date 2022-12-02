<script>
export default {
    name: "FollowedClubs",
    data() {
        return {
            clubs: [],
            isFollowing: true,
        };
    },
    mounted() {
        this.getFollowedClubs();
    },
    methods: {
        getFollowedClubs() {
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .get("/api/users/me/following")
                    .then((response) => {
                        this.clubs = response.data;
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
    <h1 class="mx-12 mt-5">Clubs You're Following</h1>
    <div class="d-flex align-center mt-12 flex-column">
        <v-row>
            <v-card
                v-for="club in clubs"
                :key="club.id"
                :title="club.name"
                :text="club.description"
                color="#C8C8C8"
                theme="light"
                class="my-2 mx-12 elevation-3"
                width="400"
            >
                <v-card-actions>
                    <div v-if="isFollowing">
                        <v-btn
                            color="#646464"
                            theme="dark"
                            variant="flat"
                            size="small"
                            >Unfollow</v-btn
                        >
                    </div>
                    <div v-else>
                        <v-btn
                            color="#5A9DBF"
                            theme="dark"
                            variant="flat"
                            size="small"
                            >Follow</v-btn
                        >
                    </div>
                </v-card-actions>
            </v-card>
        </v-row>
    </div>
</template>
