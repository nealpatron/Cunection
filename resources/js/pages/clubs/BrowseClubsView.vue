<script>
export default {
    name: "BrowseClubs",
    data() {
        return {
            items: [],
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
    <p class="text-h3 ml-7 mt-5 text-decoration-underline">
        Available Clubs on Campus
    </p>
    <div class="d-flex align-center mx-10 mt-12 flex-column">
        <v-row class="justify-space-between">
            <v-card
                v-for="item in items"
                :key="item.id"
                :title="item.name"
                :text="item.description"
                color="#C8C8C8"
                theme="light"
                class="my-2 elevation-3"
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
