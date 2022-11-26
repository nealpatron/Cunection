<script>
import SearchBar from "../../components/SearchBar.vue";

export default {
  name: "Search",
  components: {
    SearchBar,
  },
};
</script>

<template>
  <div class="container">
    <h1>Search</h1>
    <SearchBar />
  </div>
</template>

<style>
.container{
    margin: 20px;
}
</style>