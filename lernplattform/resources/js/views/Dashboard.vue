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
        <h4>Willkommen zurück, {{username}}!</h4>
        <br>
        <h5 class="dashboard-headline">Wissen testen</h5>
        <router-link to="/spa/quizkategorie">
            <span class="material-icons neumorph buttons_dashboard">sports_esports</span>
        </router-link>
        <router-link to="/spa/Karteikartensets">
            <span class="material-icons neumorph buttons_dashboard spacing-left">description</span>
        </router-link>

        <p class="logout" @click="logout">Logout</p>

        <!-- Nav -->
        <Nav />
    </div>
</template>

<script>
    export default {
        data() {
            return {
                title: "Dashboard",
                username: "",
            }
        },
        mounted(){
            axios.get('/api/authuser').then(response => {
                    this.username = response.data.name;
                });
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

    .buttons_dashboard{
        padding: 8px;
        border-radius: 15px;
        font-size: 2.3em;
    }

    .dashboard-headline{
        text-transform: uppercase;
        font-size: 1.1em;
    }

    .spacing-left{
        margin-left: 10px;
    }

</style>
