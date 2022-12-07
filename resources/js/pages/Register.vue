<template>
    <h1 class="d-flex justify-center mt-5">Register</h1>
    <div style="margin-top: 100px">
        <v-card class="mx-auto px-5 py-10" max-width="344">
            <v-form @submit.prevent="handleSubmit">
                <v-text-field
                    v-model="name"
                    class="mb-2"
                    clearable
                    label="Name"
                    required
                ></v-text-field>

                <v-text-field
                    v-model="email"
                    class="mb-2"
                    clearable
                    label="Email Address"
                    required
                ></v-text-field>

                <v-text-field
                    v-model="password"
                    clearable
                    label="Password"
                    placeholder="Password"
                    required
                    type="password"
                ></v-text-field>

                <br />

                <v-btn
                    block
                    color="error"
                    size="large"
                    type="submit"
                    variant="elevated"
                >
                    Register
                </v-btn>
            </v-form>
        </v-card>
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: "",
            email: "",
            password: "",
            error: null,
        };
    },
    methods: {
        handleSubmit(e) {
            e.preventDefault();
            if (this.password.length > 0) {
                axios.get("/sanctum/csrf-cookie").then((response) => {
                    axios
                        .post("api/register", {
                            name: this.name,
                            email: this.email,
                            password: this.password,
                        })
                        .then((response) => {
                            if (response.data.success) {
                                window.location.href = "/login";
                            } else {
                                this.error = response.data.message;
                            }
                        })
                        .catch(function (error) {
                            console.error(error);
                        });
                });
            }
        },
    },
    beforeRouteEnter(to, from, next) {
        if (window.Laravel.isLoggedin) {
            return next("home");
        }
        next();
    },
};
</script>
