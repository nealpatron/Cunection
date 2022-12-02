<script>
export default {
    name: "BrowseClubs",
    data() {
        return {
            clubs: [],
            isFollowing: false,
        };
    },
    mounted() {
        this.getAllClubs();
    },
    methods: {
        getAllClubs() {
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .get("/api/clubs")
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
    <h1 class="mx-12 mt-5">
        Available Clubs on Campus
    </h1>
    <div class="d-flex align-center mx-10 mt-12 flex-column">
        <v-row class="justify-space-between">
            <v-card
                v-for="club in clubs"
                :key="club.id"
                :title="club.name"
                :text="club.description"
                color="#C8C8C8"
                theme="light"
                class="my-2 mx-10 elevation-3"
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
