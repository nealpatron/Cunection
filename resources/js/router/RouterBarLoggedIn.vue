<script lang="ts" setup>
import { ref } from "vue";
import axios from "axios";

const activeIndex = ref("1");
const handleSelect = (key: string, keyPath: string[]) => {
    console.log(key, keyPath);
};

const logout = (e) => {
    console.log("ss");
    e.preventDefault();
    axios.get("/sanctum/csrf-cookie").then((response) => {
        axios
            .post("/api/logout")
            .then((response) => {
                if (response.data.success) {
                    window.location.href = "/";
                } else {
                    console.log(response);
                }
            })
            .catch(function (error) {
                console.error(error);
            });
    });
};
</script>

<template>
    <div class="h-6" />
    <el-menu
        :default-active="activeIndex"
        :router="true"
        class="el-menu-demo"
        mode="horizontal"
        background-color="rgb(25, 45, 83)"
        text-color="#fff"
        active-text-color="#7AF9FF"
        :ellipsis="false"
        @select="handleSelect"
    >
        <!-- Home page -->
        <el-menu-item index="/">Home</el-menu-item>

        <!-- Events pages -->
        <el-sub-menu index="events">
            <template #title>Events</template>

            <!-- Events the user follows -->
            <el-sub-menu index="events-follow">
                <template #title>Events I Follow</template>
                <el-menu-item index="events-follow-list">List</el-menu-item>
                <el-menu-item index="events-follow-calendar"
                    >Calendar</el-menu-item
                >
            </el-sub-menu>

            <!-- All events -->
            <el-sub-menu index="events-all">
                <template #title>All Events</template>
                <el-menu-item index="events-all-list">List</el-menu-item>
                <el-menu-item index="events-all-calendar"
                    >Calendar</el-menu-item
                >
            </el-sub-menu>
        </el-sub-menu>

        <!-- Club pages -->
        <el-sub-menu index="clubs">
            <template #title>Clubs</template>
            <el-menu-item index="clubs-search">Search for a Club</el-menu-item>
            <el-menu-item index="clubs-follow">Clubs I Follow</el-menu-item>
            <el-menu-item index="clubs-browse">Browse Clubs</el-menu-item>
        </el-sub-menu>

        <!-- Logout page on the right side of the menu -->
        <div class="flex-grow" />
        <el-menu-item @click="logout" >Logout</el-menu-item>
    </el-menu>
</template>

<style>
.flex-grow {
    flex-grow: 1;
}
</style>
