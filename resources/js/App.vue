<template>
    <layout>
       <router-view :key="$route.path"/>
    </layout>
</template>

<script>
'use strict';

export default {
    name: "App",
};
</script>
