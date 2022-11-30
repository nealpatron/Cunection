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
    <p class="text-h3 ml-7 mt-5 text-decoration-underline">
        Clubs You're Following
    </p>
    <div class="d-flex align-center mt-12 flex-column">
        <v-row>
            <v-card
                v-for="club in clubs"
                :key="club.id"
                :title="club.name"
                :text="club.description"
                color="#C8C8C8"
                theme="light"
                class="my-2 mx-10 elevation-3"
                width="500"
            >
                <v-card-actions>
                    <div v-if="isFollowing">
                        <v-btn color="#646464" theme="dark" variant="flat" size="small"
                            >Unfollow</v-btn
                        >
                    </div>
                    <div v-else>
                        <v-btn color="#5A9DBF" theme="dark" variant="flat" size="small"
                            >Follow</v-btn
                        >
                    </div>
                </v-card-actions>
            </v-card>
        </v-row>
    </div>
</template>
