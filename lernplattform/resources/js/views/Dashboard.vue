<template>
    <div>
        <!-- Header [Search] -->
        <div class="header_wrapper">
            <div class="header header--search">
                <div class="header_title">
                    {{title}}
                </div>
                <router-link to="/spa/Suche">
                    <span class="material-icons neumorph header_search">search</span>
                </router-link>
            </div>
        </div>

        <!-- Content -->
        <p class="logout" @click="logout">Logout</p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                title: "Dashboard",
            }
        },
        methods:{
            logout() {
                axios.post('/logoutnormal').then(response => {
                    console.log(response);
                    this.$router.push({ path: '/spa/Login' })
                });
            }
        }
    }
</script>

<style scoped>
    .logout{
        margin-top: 20px;
        color: rgb(212, 13, 13);
        width: 100%;
        text-align: center;
        text-transform: uppercase;
        font-size: 1.1em;
    }

</style>
