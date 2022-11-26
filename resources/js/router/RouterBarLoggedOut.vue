<script lang="ts" setup>
import { ref } from "vue";

const activeIndex = ref("1");
const handleSelect = (key: string, keyPath: string[]) => {
    console.log(key, keyPath);
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
            <el-menu-item index="clubs-browse">Browse Clubs</el-menu-item>
        </el-sub-menu>

        <!-- Login page on the right side of the menu -->
        <div class="flex-grow" />
        <el-menu-item index="login">Login</el-menu-item>
    </el-menu>
</template>

<style>
.flex-grow {
    flex-grow: 1;
}
</style>
