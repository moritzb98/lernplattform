<template>
    <div>
        <h1>3</h1>

        <!-- Nav  -->
        <span class="material-icons neumorph" @click="$router.go(-1)">arrow_back</span>
        <span class="material-icons neumorph" @click="$router.push({path: '4'})">arrow_forward</span>
        <router-link to="/spa/dashboard">Produkt-Tour überspringen</router-link>
    </div>
</template>

<style>
</style>

<script>
</script>
