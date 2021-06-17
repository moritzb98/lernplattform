<template>
    <div>
        <div class="container" style="margin-top: -20px;">
            <div class="row">
                <div class="col">
                    <h2>Willkommen bei Skillwire!</h2>
                    <h4>Ich führe dich nun durch unser Produkt.</h4>
                    <!-- <h1>Produkttour</h1> -->
                    Du kannst auch<router-link to="/spa/dashboard"> überspringen</router-link>.
                </div>
            </div>
            <hr>
        </div>

        <!-- Producttour Nav  -->

        <!-- <div class="arrow-btn" style="left: 10px;" @click="$router.go(-1)" >
            <span class="material-icons" >arrow_back</span>
            <p style="display: inline; position: absolute; transform: translate(5px, 10px);">zurück</p>
        </div> -->

        <div class="arrow-btn" style="right: 10px;" @click="$router.push({path: '2'})">
            <p style="display: inline; position: absolute; left: -88px; top: 10px;">weiter</p>
            <span class="material-icons arrow-btn" style="right: 10px;">arrow_forward</span>
        </div>


        <!-- <div class="producttour-card_wrapper">
            <div class="progress-indicator_wrapper">
                <div class="progress-indicator">
                    <span style="background-color: #888;"></span>
                    <span class=""></span>
                    <span class=""></span>
                    <span class=""></span>
                    <span class=""></span>
                </div>
            </div>
            <div class="producttour-card">
                <h3>Dein Profil</h3>
                <p>Hier findst du alle Einstellungen zu deinem Profil.</p>
                <span style="position: absolute; left: 21px; bottom: -15px; width: 30px; height: 30px; background-color: white; transform: rotate(45deg);"></span>
            </div>
        </div> -->

        <!-- Nav  -->
        <div class="nav_wrapper">

            <div class="progress-indicator_wrapper">
                <div class="progress-indicator">
                    <span style="background-color: #888;"></span>
                    <span class=""></span>
                    <span class=""></span>
                    <span class=""></span>
                    <span class=""></span>
                </div>
            </div>
            <div class="producttour-card_wrapper">
                <div style="background-color: white;
        min-height: 100px;">
                    <h3>Dein Profil</h3>
                    <p>Hier findst du alle Einstellungen zu deinem Profil.</p>
                    <span style="position: absolute; left: 21px; bottom: -15px; width: 30px; height: 30px; background-color: white; transform: rotate(45deg);"></span>

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
    .arrow-btn {
        position: fixed;
        top: 47%;
    }
    .arrow-btn span {
        font-size: 40px;
    }

    .producttour-card_wrapper {
        position: absolute;
        display: flex;
        max-width: 450px;
        width: 90%;
        background-color: white;
        top: -160px;
        padding: 25px 15px;
        margin: 0 5%;

        /* display: flex;
        justify-content: center;
        position: absolute;
        display: relative;
        width: 100%;
        /* bottom: 110px; */
    }
    .producttour-card {
        width: 90%;
        max-width: 450px;
        margin: 0 auto;
        background-color: white;
        padding: 20px;
    }
    .progress-indicator_wrapper {
        width: 90%;
        position: absolute;
        bottom: 285px;
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
