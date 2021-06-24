<template>
    <div>
        <div class="container" style="margin-top: -20px;">
            <div class="row">
                <div class="col">
                    <!-- <h2>Willkommen</h2><h4>- zu deiner persönlichen Produkttour!</h4> -->
                    <h1>Produkttour</h1>
<<<<<<< Updated upstream
                    Du kannst sie auch<router-link to="/spa/Profil"> überspringen</router-link>.
=======
                    Du kannst sie auch<router-link to="/spa/dashboard"> überspringen</router-link>.
>>>>>>> Stashed changes
                </div>
            </div>
        </div>

        <!-- Producttour Nav  -->

        <div class="arrow-btn" style="left: 10px;" @click="$router.go(-1)" >
            <span class="material-icons" >arrow_back</span>
            <p style="display: inline; position: absolute; transform: translate(5px, 10px);">zurück</p>
        </div>

        <div class="arrow-btn" style="right: 10px;" @click="$router.push({path: '5'})">
            <p style="display: inline; position: absolute; left: -88px; top: 10px;">weiter</p>
            <span class="material-icons arrow-btn" style="right: 10px;">arrow_forward</span>
        </div>


        <!-- Nav  -->
        <div class="nav_wrapper">

        <div class="progress-indicator_wrapper">
            <div class="progress-indicator">
                <span class=""></span>
                <span class=""></span>
                <span class=""></span>
                <span style="background-color: #888;"></span>
                <span class=""></span>
            </div>
        </div>
            <div class="producttour-card_wrapper">
                <div style="background-color: white;
        min-height: 100px;">
                    <h3>Lerngruppen</h3>
                    <p>Hier findest du Gruppen zu Themen aller Art.</p>
<<<<<<< Updated upstream
                    <span style="position: absolute; right: 25%; bottom: -15px; width: 30px; height: 30px; background-color: white; transform: rotate(45deg);"></span>
=======
                    <span style="position: absolute; left: 229px; bottom: -15px; width: 30px; height: 30px; background-color: white; transform: rotate(45deg);"></span>
>>>>>>> Stashed changes

                </div>
            </div>
            <div class="nav">
                <router-link to="#" class="router-link-exact-active router-link-active">
                    <div class="nav_item neumorph">
                        <span class="material-icons">person</span>
                    </div>
                </router-link>
                <router-link to="#">
                    <div class="nav_item neumorph">
                        <span class="material-icons">school</span>
                    </div>
                </router-link>
                <router-link to="#">
                    <div class="nav_item neumorph">
                        <span class="material-icons">add</span>
                    </div>
                </router-link>
                <router-link to="#">
                    <div class="nav_item neumorph">
                        <span class="material-icons">people</span>
                    </div>
                </router-link>
                <router-link to="#">
                    <div class="nav_item neumorph">
                        <span class="material-icons">quiz</span>
                    </div>
                </router-link>

            </div>
        </div>
    </div>
</template>

<style>
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
    .arrow-btn {
        position: fixed;
        top: 47%;
    }
    .arrow-btn span {
        font-size: 40px;
    }
<<<<<<< Updated upstream

    .producttour-card_wrapper {
        position: absolute;
        display: flex;
        max-width: 450px;
        width: 90%;
        background-color: white;
        top: -180px !important;
        padding: 25px 15px;
        margin: 0 5%;
        height: 165px;
    }
    .producttour-card {
        width: 90%;
        max-width: 450px;
        margin: 0 auto;
        background-color: white;
        padding: 20px;
=======
    .producttour-card {
        /* width: 100%; */
        /* min-height: 200px; */
        background-color: white;
        /* box-shadow: 0px 5px 12px #999; */
        padding: 20px;
        position: absolute;
        display: relative;
        bottom: 100px;
        z-index: 10000;
        margin-right: 15px;
>>>>>>> Stashed changes
    }
    .progress-indicator_wrapper {
        width: 90%;
        position: absolute;
<<<<<<< Updated upstream
        bottom: 300px !important;
=======
        bottom: 285px;
>>>>>>> Stashed changes
    }
    .progress-indicator {
        width: 80%;
        display: flex;
        justify-content: space-between;
        margin: 0 auto;
    }
    .progress-indicator span{
        background-color: #ccc;
        width: 20px;
        height: 20px;
        border-radius: 10px;
    }
</style>

<script>
</script>

