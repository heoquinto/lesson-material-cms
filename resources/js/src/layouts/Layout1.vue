<template>
  <div>
    <layout-header />
    <slot />
  </div>
</template>

<script>
import LayoutHeader from "./LayoutHeader";

export default {
  name: "App",

  components: {
    LayoutHeader,
  },
};
</script>
