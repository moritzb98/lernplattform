<template>
    <div>
        <!-- Header + Page Content -->
        <div class="container">
            <router-view> </router-view>
        </div>

        <!-- Navigation -->
        <div class="nav">
            <router-link to="/spa/Dashboard">Dashboard</router-link>
            <router-link to="/spa/Lernmaterial">Lernmaterial</router-link>
            <router-link to="#">Erstellen</router-link>
            <router-link to="/spa/Lerngruppen">Lerngruppen</router-link>
            <router-link to="/spa/Newsfeed">Newsfeed</router-link>
        </div>
    </div>
</template>

<script>
    export default {
    }
</script>
