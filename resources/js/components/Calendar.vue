<script>
import VueCal from "vue-cal";
import "vue-cal/dist/vuecal.css";

export default {
  name: "Calendar",
  components: {
    VueCal,
  },
};

</script>

<template>
  <vue-cal
  class="vuecal--blue-theme"
    style="height: 700px"
    :time="true"
    :time-from="8 * 60"
    :time-to="24 * 60"
    :time-step="30"
    today-button
    active-view="month"
    :disable-views="['years']"
  />
</template>
