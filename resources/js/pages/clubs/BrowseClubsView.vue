<script>
export default {
    name: "BrowseClubs",
    data() {
        return {
            items: [],
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
    <v-list lines="two">
        <v-list-item
            v-for="item in items"
            :key="item.id"
            :title="item.name"
            :subtitle="item.description"
        ></v-list-item>
    </v-list>
</template>

<style scoped></style>
