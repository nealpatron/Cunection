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
    <p class="text-h3 ml-7 mt-5 text-decoration-underline">
        Looking for a Club?
    </p>
    <!-- Doesn't work -->
    <v-col cols="5">
        <v-combobox class="mt-10" clearable label="Search..." :items="clubs" />
    </v-col>
</template>
