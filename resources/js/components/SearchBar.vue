<!--
<script lang="ts" setup>
import { onMounted, ref } from "vue";

const state = ref("");

interface LinkItem {
  value: string;
  link: string;
}

const links = ref<LinkItem[]>([]);

const loadAll = () => {
  return [
    { value: "vue", link: "https://github.com/vuejs/vue" },
    { value: "element", link: "https://github.com/ElemeFE/element" },
    { value: "cooking", link: "https://github.com/ElemeFE/cooking" },
    { value: "mint-ui", link: "https://github.com/ElemeFE/mint-ui" },
    { value: "vuex", link: "https://github.com/vuejs/vuex" },
    { value: "vue-router", link: "https://github.com/vuejs/vue-router" },
    { value: "babel", link: "https://github.com/babel/babel" },
  ];
};

const querySearchAsync = (queryString: string, cb: (arg: any) => void) => {
  const results = queryString
    ? links.value.filter(createFilter(queryString))
    : links.value;
};

const createFilter = (queryString: string) => {
  return (restaurant: LinkItem) => {
    return (
      restaurant.value.toLowerCase().indexOf(queryString.toLowerCase()) === 0
    );
  };
};

const handleSelect = (item: LinkItem) => {
  console.log(item);
};

onMounted(() => {
  links.value = loadAll();
});
</script>

<template>
  <el-autocomplete
    v-model="state"
    :fetch-suggestions="querySearchAsync"
    :trigger-on-focus="false"
    clearable
    class="inline-input w-50"
    placeholder="Search for clubs..."
    @select="handleSelect"
  />
</template>
-->

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
  <div class="demo-input-suffix">
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
