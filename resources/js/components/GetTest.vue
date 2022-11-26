<script>
export default {
    data() {
        return {
            info: [],
        };
    },
    methods: {
        getData() {
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .get("/api/books") // change endpoint here 
                    .then((response) => {
                        this.info = response.data;
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
    <div>
        <button @click="getData">Get Data</button>
        <p>{{ info }}</p>
    </div>
</template>
