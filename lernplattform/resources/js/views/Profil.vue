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
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Willkommen zurück, {{username}}!</h3>
                </div>
            </div>
            <hr>
            <div class="row mt-4">
                <div class="col-12">
                <h4>Dein Profil</h4>
                </div>
                <div class="col-6 mt-3">
                    <small>Alter</small>
                    <h5>{{age}}</h5>
                </div>
                <hr>
                <div class="col-6 mt-3">
                    <small>Tätigkeit</small>
                    <h5>{{job}}</h5>
                </div>
                <hr>
                <div class="col-12 mt-2">
                    <small>E-Mail Adresse</small>
                    <h5>{{email}}</h5>
                </div>
            </div>
            <hr>
            <div class="row mt-5" >
                <div class="col-12 justify-content-center text-center mb-2">
                    <router-link class="linkText" to="/spa/Impressum">
                        Impressum
                    </router-link>
                </div>
                <div class="col-12 justify-content-center text-center mb-4">
                    <router-link class="linkText" to="/spa/Datenschutz">
                        Datenschutz
                    </router-link>
                </div>
            </div>
        </div>

        <!-- <br>
        <h5 class="dashboard-headline">Wissen testen</h5>
        <router-link to="/spa/quizkategorie">
            <span class="material-icons neumorph buttons_dashboard">quiz</span>
        </router-link>
        <router-link to="/spa/Karteikartensets">
            <span class="material-icons neumorph buttons_dashboard spacing-left">description</span>
        </router-link> -->

        <p class="logout" @click="logout">Logout</p>

        <!-- Nav -->
        <Nav />
    </div>
</template>

<script>
    export default {
        data() {
            return {
                title: "Dein Profil",
                username: "",
                age: "",
                email: "",
                job: "",
            }
        },
        mounted(){
            axios.get('/api/authuser').then(response => {
                    this.username = response.data.name;
                    this.job = response.data.job;
                    this.email = response.data.email;
                    this.age = response.data.age;
                    console.log(response)
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
