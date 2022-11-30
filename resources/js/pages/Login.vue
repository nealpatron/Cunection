<template>
    <div style="margin-top: 100px">
        <v-card class="mx-auto px-5 py-10" max-width="344">
            <v-form @submit.prevent="handleSubmit">
                <v-text-field
                    v-model="email"
                    class="mb-2"
                    clearable
                    label="Email"
                    required
                ></v-text-field>

                <v-text-field
                    v-model="password"
                    type="password"
                    clearable
                    label="Password"
                    placeholder="Enter your password"
                    required
                ></v-text-field>

                <br />

                <v-btn
                    block
                    color="success"
                    size="large"
                    type="submit"
                    variant="elevated"
                >
                    Login
                </v-btn>
                <p class="font-weight-thin mt-5">
                    Not registered? <a href="/register">Sign up now!</a>
                </p>
            </v-form>
        </v-card>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: "",
            password: "",
            error: null,
        };
    },
    methods: {
        handleSubmit(e) {
            e.preventDefault();
            if (this.password.length > 0) {
                this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                    this.$axios
                        .post("api/login", {
                            email: this.email,
                            password: this.password,
                        })
                        .then((response) => {
                            console.log(response.data);
                            if (response.data.success) {
                                this.$router.go("/home");
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
