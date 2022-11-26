<script>
export default {
  name: "AllList",
  methods: {
    async getEvents() {
      const response = await this.getRequest();
      console.log("Response: ", response);
    },
    async getRequest() {
      try {
        const response = await fetch(
          "http://localhost:8000/api/clubs"
        );

        if (!response.ok) {
          throw new Error(`Error! status: ${response.status}`);
        }

        const result = await response.json();
        return result;
      } catch (error) {
        console.log("Error:", error);
      }
    },
    async postEvent() {
      try {
        const data = {
          name: "The Awesome Club",
          description: "It's gonna be so great!",
        };
        const url = "http://localhost:8000/api/clubs";

        fetch(url, {
          method: "POST",
          headers: {
            Accept: "application.json",
            "Content-Type": "application/json",
          },
          body: data,
        });

        console.log("Done in postEvent");
      } catch (error) {
        console.log("Error: ", error);
      }
    },
  },
};
</script>

<template>
  <h3>Waiting on some clubs to join...</h3>
  <button @click="getEvents">Get them events</button>
  <button @click="postEvent">Post an event :)</button>
</template>
