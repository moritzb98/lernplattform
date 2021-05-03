<template>
    <div>

        <!-- Header noch auslagern und dynamisch machen -->
        <!-- Header -->
        <div class="header_wrapper">
            <div class="header">
                <div class="header_title">
                    Page Title
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="container l_page-content">
            <router-view> </router-view>
        </div>

        <!-- Navigation -->
        <div class="nav_wrapper">
            <div class="nav">
                <router-link to="/spa/Dashboard">
                    <div class="nav_item neumorph">
                        <span class="material-icons">dashboard</span>
                    </div>
                </router-link>
                <router-link to="/spa/Lernmaterial">
                    <div class="nav_item neumorph">
                        <span class="material-icons">school</span>
                    </div>
                </router-link>
                <router-link to="#">
                    <div class="nav_item neumorph" v-on:click="showNavDropUp">
                        <span class="material-icons">add</span>
                    </div>
                </router-link>
                <router-link to="/spa/Lerngruppen">
                    <div class="nav_item neumorph">
                        <span class="material-icons">people</span>
                    </div>
                </router-link>
                <router-link to="/spa/Newsfeed">
                    <div class="nav_item neumorph">
                        <span class="material-icons">description</span>
                    </div>
                </router-link>

                <!-- Navigation Drop Up-->
                <div id="js__nav_drop-up" class="nav_drop-up_wrapper">
                    <div class="nav_drop-up neumorph">
                        <div class="container">
                            <div class="row">
                                <div class="col col-6 col-sm-4 mt-3">
                                    <router-link to="/spa/Sammlung-erstellen">
                                        <div class="card neumorph" v-on:click="showNavDropUp">
                                            <img class="card_img" src="" alt="" />
                                            <div class="card_title">Sammlung</div>
                                        </div>
                                    </router-link>
                                </div>
                                <div class="col col-6 col-sm-4 mt-3">
                                    <router-link to="/spa/Karteikarten-erstellen">
                                        <div class="card neumorph" v-on:click="showNavDropUp">
                                            <img class="card_img" src="" alt="" />
                                            <div class="card_title">Karteikarten</div>
                                        </div>
                                    </router-link>
                                </div>
                                <div class="col col-6 col-sm-4 mt-3">
                                    <router-link to="/spa/Skript-erstellen">
                                        <div class="card neumorph" v-on:click="showNavDropUp">
                                            <img class="card_img" src="" alt="" />
                                            <div class="card_title">Skript</div>
                                        </div>
                                    </router-link>
                                </div>
                                <div class="col col-6 col-sm-4 mt-3">
                                    <router-link to="/spa/Kurs-erstellen">
                                        <div class="card neumorph" v-on:click="showNavDropUp">
                                            <img class="card_img" src="" alt="" />
                                            <div class="card_title">Kurs</div>
                                        </div>
                                    </router-link>
                                </div>
                                <div class="col col-6 col-sm-4 mt-3">
                                    <router-link to="/spa/Quiz-erstellen">
                                        <div class="card neumorph" v-on:click="showNavDropUp">
                                            <img class="card_img" src="" alt="" />
                                            <div class="card_title">Quiz</div>
                                        </div>
                                    </router-link>
                                </div>
                                <div class="col col-6 col-sm-4 mt-3">
                                    <router-link to="/spa/Lerngruppe-erstellen">
                                        <div class="card neumorph" v-on:click="showNavDropUp">
                                            <img class="card_img" src="" alt="" />
                                            <div class="card_title">Lerngruppe</div>
                                        </div>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>


/*
    ██████   █████  ███████ ██  ██████ 
    ██   ██ ██   ██ ██      ██ ██      
    ██████  ███████ ███████ ██ ██ 
    ██   ██ ██   ██      ██ ██ ██ 
    ██████  ██   ██ ███████ ██  ██████  */


    html {
        font-family: 'Open Sans', sans-serif;
    }

    body {
        background-color: #F1F1F1;
    }


    /* Basic Neumorph Styles for elements  */

    .neumorph {
        background: linear-gradient(to bottom right,white, #F1F1F1);
        border-radius: 20px;
        box-shadow:
            -5px -5px 13px #fff,
            -1px -1px 6px #fff,
            5px 5px 13px #0e0e0e40,
            1px 1px 6px #0e0e0e40,
            /* inset -1px -1px 6px #ffffffA0; */
            inset 3px 3px 6px #0e0e0e11;
    }

    .neumorph--border {
        border: double 1px transparent;
        background-image: radial-gradient(white, white), radial-gradient(circle at top left,white,#777);
        background-origin: border-box;
        background-clip: content-box, border-box;
    }

    .neumorph--pressed {
        background: linear-gradient(to bottom right, #F1F1F1, white);
        box-shadow:
            /* inset -5px -5px 13px #0e0e0e40, */
            inset -2px -2px 8px #fff,
            /* inset 5px 5px 13px #fff, */
            inset 2px 2px 8px #0e0e0e40,
            2px 2px 8px #0e0e0e11;
    }

    .neumorph--pressed--border {
        border: double 2px transparent;
        background-image: radial-gradient(white, white), radial-gradient(circle at top left,white,#777);
        background-origin: border-box;
        background-clip: content-box, border-box;
        transition: .3s;
    }

    .l_page-content {
        padding-top: 62px;
        min-height: 100vh;
    }


    /* Utilities  */

    .br--10 {
        border-radius: 10px;
    }

    .br--20 {
        border-radius: 20px;
    }

    .br--30 {
        border-radius: 30px;
    }


/*
████████ ██    ██ ██████   ██████ 
   ██     ██  ██  ██   ██ ██    ██ 
   ██      ████   ██████  ██    ██ 
   ██       ██    ██      ██    ██ 
   ██       ██    ██       ██████  
   */







/*
██ ███    ██ ██████  ██    ██ ████████ ███████ 
██ ████   ██ ██   ██ ██    ██    ██    ██      
██ ██ ██  ██ ██████  ██    ██    ██    ███████ 
██ ██  ██ ██ ██      ██    ██    ██         ██ 
██ ██   ████ ██       ██████     ██    ███████ 
*/

    .input {
        border-radius: 30px;
        height: 50px;
        outline: none;
        padding-left: 5px;
    }

    .input:focus {
        transition: .3s;
        background-image: radial-gradient(white, white), radial-gradient(circle at top left,white,#222);
    }










/*
██████  ██    ██ ████████ ████████  ██████  ███    ██ ███████ 
██   ██ ██    ██    ██       ██    ██    ██ ████   ██ ██      
██████  ██    ██    ██       ██    ██    ██ ██ ██  ██ ███████ 
██   ██ ██    ██    ██       ██    ██    ██ ██  ██ ██      ██ 
██████   ██████     ██       ██     ██████  ██   ████ ███████

*/

    .btn {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        padding: 12px 19px;
        border-radius: 30px;
    }

    .btn:hover {
        background: linear-gradient(to bottom right, #F1F1F1, white);
        box-shadow:
            inset -2px -2px 8px #fff,
            inset 2px 2px 8px #0e0e0e40,
            2px 2px 8px #0e0e0e11;
    }


    .btn_icon {
        margin-left: 10px;
        font-size: 20px;
    }

    .btn_text {
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 15px;
        margin: 0;
    }

    .btn--small {

    }

    .btn--big {
    }







/*
 ██████  ██████  ███    ███ ██████   ██████  ███    ██ ███████ ███    ██ ████████ ███████ 
██      ██    ██ ████  ████ ██   ██ ██    ██ ████   ██ ██      ████   ██    ██    ██      
██      ██    ██ ██ ████ ██ ██████  ██    ██ ██ ██  ██ █████   ██ ██  ██    ██    ███████ 
██      ██    ██ ██  ██  ██ ██      ██    ██ ██  ██ ██ ██      ██  ██ ██    ██         ██ 
 ██████  ██████  ██      ██ ██       ██████  ██   ████ ███████ ██   ████    ██    ███████ 
*/

/*
  _   _
 | \ | | __ ___   __
 |  \| |/ _` \ \ / /
 | |\  | (_| |\ V /
 |_| \_|\__,_| \_/

*/

    .nav_wrapper {
        width: 100%;
        display: flex;
        justify-content: center;
        background-color: #F1F1F1;
        padding: 25px 15px;

        position: fixed;
        bottom: 0;
        left: 0;

        z-index: 1900;
    }

    .nav {
        transition: .3s;
    }

    .nav * {
        transition: .3s;
    }

    .nav_item {
        margin: 0px 10px;
    }

    .nav_item:hover {
        text-decoration: none;
    }

    .nav_item span {
        line-height: 100%;
        padding: 15px;
    }

    .material-icons-outlined{
        color: black;
    }

    .material-icons{
        color: black;
    }

    .nav .router-link-exact-active span {

    }

    .nav .router-link-exact-active .nav_item {
        background: linear-gradient(to bottom right, #F1F1F1, white);
        box-shadow:
            /* inset -5px -5px 13px #0e0e0e40, */
            inset -2px -2px 8px #fff,
            /* inset 5px 5px 13px #fff, */
            inset 2px 2px 8px #0e0e0e40,
            2px 2px 8px #0e0e0e11;
    }

    .nav_drop-up_wrapper {
        position: absolute;
        bottom: -400px;
        left: 0;
        width: 100%;
        display: flex;
        justify-content: center;

        z-index: 1890;
    }

    .nav_drop-up {
        width: 80%;
        padding: 20px 0px;
        border-radius: 20px;

        z-index: 1890;
    }

    .nav_drop-up--active {
        bottom: 100px;
    }



  /* _   _                _
 | | | | ___  __ _  __| | ___ _ __
 | |_| |/ _ \/ _` |/ _` |/ _ \ '__|
 |  _  |  __/ (_| | (_| |  __/ |
 |_| |_|\___|\__,_|\__,_|\___|_|
                                   */

    /* noch in component auslagern */

    .header_wrapper {
        width: 100%;
        display: flex;
        justify-content: center;
        background-color: #F1F1F1;
        padding: 15px 15px;

        position: fixed;
        top: 0;
        left: 0;

        z-index: 1900;
    }

    .header {

    }

    .header_title {
        font-size: 20px;
        font-family: 'Syncopate', sans-serif;
        font-weight: 700;
    }



/*
  ____
 | __ )  __ _ _ __  _ __   ___ _ __
 |  _ \ / _` | '_ \| '_ \ / _ \ '__|
 | |_) | (_| | | | | | | |  __/ |
 |____/ \__,_|_| |_|_| |_|\___|_|    */

/* Bannerelement, z.B. für die Erstellen-Dialoge */

    .banner {
        padding: 35px 20px 20px 20px;
    }

    .banner_body {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: row;
    }

    .banner_body .material-icons {
        font-size: 42px;
        margin-right: 15px;
    }

    .banner_body-img {

    }

    .banner_body-title {
        font-weight: 600;
    }







/*
   ____ _           _     ____
  / ___| |__   __ _| |_  | __ )  __ _ _ __  _ __   ___ _ __
 | |   | '_ \ / _` | __| |  _ \ / _` | '_ \| '_ \ / _ \ '__|
 | |___| | | | (_| | |_  | |_) | (_| | | | | | | |  __/ |
  \____|_| |_|\__,_|\__| |____/ \__,_|_| |_|_| |_|\___|_|    */

/* Bannerelement der Gruppen Chats */
/* Noch nicht fertig */


    .banner-grp-chat {
        background-image: "/abc.jpg";
        width: 100%;
        height: 200px;
        background-color: red;

        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        margin-bottom: 25px;
        padding: 0;
    }

    .banner-grp-chat_body {
        position: absolute;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        z-index: 1;
    }

    .banner-grp-chat_body-title {
        display: inline-block;
        margin: 0;
    }


/*
   ____              _
  / ___|__ _ _ __ __| |
 | |   / _` | '__/ _` |
 | |__| (_| | | | (_| |
  \____\__,_|_|  \__,_|
                        */



    .card {
        display: flex;
        width: 100%;
        padding: 15px;
        border: none;
        min-height: 100px;
        height: 100%;
        text-align: center;
        flex-direction: column;
        justify-content: flex-end;
    }

    .card_img {
        width: 100%;
        margin-bottom: 10px;
    }

    .card_title {
        color: #000;
    }

</style>

<script>
    export default {
        methods: {
            showNavDropUp: function() {
                var e = document.getElementById("js__nav_drop-up");
                e.classList.toggle("nav_drop-up--active");
            }
        }
    }
</script>
