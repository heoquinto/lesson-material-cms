<template>
  <div>
    <div class="layout-header-container">
      <nav class="navbar bg-light">
        <div class="container-fluid">
          <h2 @click="$router.push({ path: `/`})"> LM-CMS </h2>
          <form class="d-flex" role="search">
            <a href="#" @click="logout">Logout</a>
          </form>
        </div>
      </nav>
    </div>
  </div>
</template>

<style scoped>
.layout-header-title-container {
  margin-left: 50px;
}
</style>

<script>
import axios from "axios";

export default {
  name: "LayoutHeader",

  methods: {
    logout() {
        axios.post('/logout')
            .then(() => location.href = '/')
    }
  },
};
</script>
