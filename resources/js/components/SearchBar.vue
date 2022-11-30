<script>
export default {
  name: "SearchBar",
  data() {
    return {
      input: "",
    };
  },
};
</script>

<template>
  <div>
    <el-input
      v-model="input"
      placeholder="Search for a Club..."
      class="search-input"
      clearable
    >
      <template #prefix>
        <el-icon class="el-input__icon"><search /></el-icon> </template
    ></el-input>
  </div>
</template>

<style>
.search-input {
  width: 400px;
}
</style>
