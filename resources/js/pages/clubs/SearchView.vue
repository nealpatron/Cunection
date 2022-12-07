<script>
export default {
    name: "Search",
    data() {
        return {
            input: "",
            clubs: [],
        };
    },
    mounted() {
        this.getAllClubs;
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
        Looking for a Club?
    </h1>
    <!-- :items doesn't work -->
    <v-col cols="5">
        <v-combobox class="mt-10 mx-9" clearable label="Search..." :items="clubs" />
    </v-col>
</template>
