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
        <!-- Active Klasse Navigationspunkt filled <-> outline  -->
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
                <router-link to="/spa/Lerngruppen/Eigene">
                    <div class="nav_item neumorph">
                        <span class="material-icons">people</span>
                    </div>
                </router-link>
                <!-- <router-link to="/spa/Newsfeed">
                    <div class="nav_item neumorph">
                        <span class="material-icons">description</span>
                    </div>
                </router-link> -->

                <!-- Navigation Drop Up-->
                <div id="js__nav_drop-up" class="nav_drop-up_wrapper">
                    <div class="nav_drop-up neumorph">
                        <div class="container">
                            <div class="row">
                                <!-- <div class="col col-6 col-sm-4 mt-3">
                                    <router-link to="/spa/Sammlung-erstellen">
                                        <div class="card neumorph" v-on:click="showNavDropUp">
                                            <img class="card_img" src="" alt="" />
                                            <div class="card_title">Sammlung</div>
                                        </div>
                                    </router-link>
                                </div> -->
                                <!-- <div class="col col-6 col-sm-4 mt-3">
                                    <router-link to="/spa/Karteikarten-erstellen">
                                        <div class="card neumorph" v-on:click="showNavDropUp">
                                            <img class="card_img" src="" alt="" />
                                            <div class="card_title">Karteikarten</div>
                                        </div>
                                    </router-link>
                                </div> -->
                                <div class="col col-6 col-sm-4 mt-3">
                                    <router-link to="/spa/Skript-erstellen">
                                        <div class="card neumorph" v-on:click="showNavDropUp">
                                            <img class="card_img" src="" alt="" />
                                            <div class="card_title">Medien hochladen</div>
                                        </div>
                                    </router-link>
                                </div>
                                <!-- <div class="col col-6 col-sm-4 mt-3">
                                    <router-link to="/spa/Kurs-erstellen">
                                        <div class="card neumorph" v-on:click="showNavDropUp">
                                            <img class="card_img" src="" alt="" />
                                            <div class="card_title">Kurs</div>
                                        </div>
                                    </router-link>
                                </div> -->
                                <!-- <div class="col col-6 col-sm-4 mt-3">
                                    <router-link to="/spa/Quiz-erstellen">
                                        <div class="card neumorph" v-on:click="showNavDropUp">
                                            <img class="card_img" src="" alt="" />
                                            <div class="card_title">Quiz</div>
                                        </div>
                                    </router-link>
                                </div> -->
                                <div class="col col-6 col-sm-4 mt-3">
                                    <router-link to="/spa/Lerngruppen/Erstellen">
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

    body a {
        color: #000;
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

    .btn--dashed {
        border: dashed 1px #666;
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
        width: 100%;
        max-width: 500px;
        display: flex;
        justify-content: space-evenly;

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


    @media only screen and (max-width: 400px) {
        .nav_item {
            margin: 0px 7px;
        }

        .nav .material-icons {
            padding: 12px;
        }
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

    .banner-grp-chat {
        background-image: url("https://picsum.photos/200/300");
        background-color: #cccccc;
        width: 100%;
        height: 100px;

        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;

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
        margin-bottom: 20px;
        font-weight: 700;
        color: #fff;
        text-shadow: 0px 3px 5px #000;
    }

    .banner-grp-chat_overlay {
        width: 100%;
        height: 40px;
        border-radius: 40px 40px 0 0;
        background-color: #f1f1f1;

        position: absolute;
        bottom: 0;
        left: 0;
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



/*

   _____              _    _____                 _ _
  / ____|            | |  / ____|               | | |
 | |     __ _ _ __ __| | | (___  _ __ ___   __ _| | |
 | |    / _` | '__/ _` |  \___ \| '_ ` _ \ / _` | | |
 | |___| (_| | | | (_| |  ____) | | | | | | (_| | | |
  \_____\__,_|_|  \__,_| |_____/|_| |_| |_|\__,_|_|_|
                                                      */

    .card-small {
        display: flex;
        flex-direction: row;
        padding: 15px;
        padding-left: 25px;
        border-radius: 30px;
    }

    .card-small_controls {
        display: flex;
        height: 100%;
        justify-content: flex-end;
        align-items: center;
        margin: 0 0 0 auto;
    }

    .card-small_controls_item {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        margin: 0 5px;
    }

    .card-small_controls_item .material-icons {
        font-size: 22px;
        margin: 0;
    }






/* Styleguide Klassen (Theresas CSS)*/
.mdc-button--raised{
        background: linear-gradient(to bottom right,white, #F1F1F1);
        height: 36px;
        width: 36px;
        padding:0px;
        box-shadow:
        -5px -5px 13px #fff,
        5px 5px 13px #0e0e0e40;
    }

    .material-icons-outlined{
        color: black;
    }

    .material-icons{
        color: black;
    }

    .mdc-card{
        width: 45%;
        height: 178px;
        border: double 2px transparent;
        border-radius: 28px;
        background-image: radial-gradient(white, white), radial-gradient(circle at top left,white,#ED553B);
        background-origin: border-box;
        background-clip: content-box, border-box;
        box-shadow:
    -5px -5px 13px #fff,
    5px 5px 13px #0e0e0e40;
    }

    .mdc-button--round{
        border-radius: 40px;
    }

    .button-text{
        color: #000000;
        margin-right: 15px;
        font-weight: bold;
    }

    .mdc-card--middle{
        text-align: center;
        display: flex;
        justify-content: center;
    }

    .container--flex{
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        margin-top: 15px;
    }

    .card-icons--big{
        font-size: 6em;
        color: #ED553B;
    }

    .card-text--small{
        font-size: 1.2em;
    }

    .mdc-card-newsfeed{
        width: 100%;
        height: 250px;
    }

    .card-newsfeed-top-container{
        width: 100%;
        display: flex;
        height: 90px;
    }

    .card-newsfeed-top-icon-container{
        width: 28%;
        height: 90px;
        background-color: #ED553B;
        border-top-left-radius: 28px;
        box-shadow: 0 0 1em #ED553B;
    }

    .material-icons--orange{
        margin: auto;
        color: #FFD7D1;
        font-size: 4em;
    }

    .card-newsfeed-top-content-container{
        width: 72%;
        display: flex;
        padding: 0.5em;
        padding-left: 1.5em;
        padding-right: 1.5em;
        padding-bottom: 0px;
        flex-direction: column;
        height: 100%;
        overflow: hidden;
        justify-content: space-between;
    }

    .profil-picture-circle{
        height: 20px;
        width: 20px;
        background-color: #bbb;
        border-radius: 50%;
        margin-right: 10px;
    }

    .card-user{
        display: flex;
        flex-wrap: nowrap;
        align-items: center;
        font-family: 'Open Sans', sans-serif;
        font-weight:100;
        text-transform: uppercase;
    }

    .card-newsfeed-type{

        width: fit-content;
        padding: 5px;
        background-color: #ED553B;
        border-radius: 30%;
        margin-right: 10px;
    }

    .mdc-chip--red{
        height: 18px;
        background: #ED553B;
        color: white;
        font-size: 0.8em;
    }

    .card-newsfeed-headline{
        font-family: 'Open Sans', sans-serif;
        font-weight: bold;
        font-size: 1.2em;
    }
    .card-newsfeed-voting{
        height: 120px;
        width: 50px;
        background: linear-gradient(to bottom right,white, #F1F1F1);
        box-shadow:
        -5px -5px 13px #fff,
        5px 5px 13px #0e0e0e40;
        border-radius: 22px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card-newsfeed-bottom-container{
        width: 100%;
        display: flex;
        height: 100%;
    }

    .card-newsfeed-bottom-voting-container{
        width: 28%;
        align-items: center;
    }

    .card-newsfeed-voting-option{
        margin: auto;
    }

    .card-newsfeed-voting-option--border{
        border-top: 1px solid white;
        border-bottom: 1px solid white;
        box-shadow: 0px 10px 5px #c2c2c240, 0px -10px 5px #c2c2c240;
    }

    .card-newsfeed-bottom-content-container{
        width: 72%;
        display: flex;
        padding: 0.5em;
        padding-left: 1.5em;
        padding-right: 1.5em;
        padding-bottom: 0px;
        flex-direction: column;
        height: 100%;
        justify-content: space-between;
        padding-bottom: 1.2em;
    }

    .card-newsfeed-text{

    }

    .card-newsfeed-data-container{
        display: flex;
        flex-wrap: nowrap;
        justify-content: space-between;
        color: #2D2D2D !important;
    }

    .card-newsfeed-data-saved{
        font-family: 'Open Sans', sans-serif;
        font-weight: 100;
        font-size: 0.9em;
    }

    .card-newsfeed-data-separator{
        font-size: 0.9em;
    }

    .card-newsfeed-data-date{
        font-size: 0.9em;
        color: #2D2D2D;
    }

    .card-newsfeed-icon-container{
        display: flex;
        flex-wrap: nowrap;
        justify-content: flex-end;
    }

    .mdc-button--pressed{
          box-shadow: inset 6px 6px 10px 0 rgba(0, 0, 0, 0.2),
            inset -6px -6px 10px 0 white,
            12px 12px 24px 0 rgba(0, 0, 0, 0.2),
            -12px -12px 24px 0 rgba(255, 255, 255, 0.5);
            overflow: hidden;
    }

    .mdc-button-back{
        border-radius: 35px;
    }

    .mdc-card-lernmaterial{
        width: 100%;
        height: 100%;
    }

    .card-lernmaterial-spacing{
        padding: 1em;
        display: flex;
        flex-wrap: nowrap;
        justify-content: space-between;
    }

    .card-lernmaterial-icon-container{
        width: 45px;
        height: 45px;
        display: flex;
        border-radius: 15px;
        background-color: #ED553B;
    }

    .material-icons-lernmaterial{
        margin: auto;
        color: #ffffff;
        font-size: 2.3em;
    }

    .card-lernmaterial-middle-column-container{
        justify-content: space-between;
    }

    .mdc-chip-container{
        height: 33%;
    }

    .mdc-chip-lernmaterial{
        height: 18px;
    }

    .card-lernmaterial-date{
        color: #717171;
        font-size: 12px;
        height:50%;
    }

    .card-lernmaterial-headline{
        height: 33%;
    }

    .card-lernmateral-thumb{
        height: 33%;
        display: flex;
        flex-wrap: nowrap;
    }

    .material-icons-outlined-space-right{
        padding-right: 6px;
    }

    .card-lernmateral-thumbs-number{
        font-size: 12px;
    }

    .card-lernmaterial-date-icon-container{
        height: 50%;
    }

    .mdc-chip-filter{
        box-shadow:
        -5px -5px 13px #fff,
        5px 5px 13px #0e0e0e40;
        background: linear-gradient(to bottom right,white, #F1F1F1);
        margin: 0.15em;
        margin-bottom: 0.7em;
    }

    .text-field__input--modified{
        background-color: transparent;
         caret-color: black !important;
         border-radius: 28px;
         padding-left: 2px;

    }

    .text-field--modified{
        border-radius: 28px;
        box-shadow: inset 6px 6px 10px 0 rgba(0, 0, 0, 0.2),
        inset -6px -6px 10px 0 white,
        12px 12px 24px 0 rgba(0, 0, 0, 0.2),
        -12px -12px 24px 0 rgba(255, 255, 255, 0.5);
        overflow: hidden;
        height: 45px;
        width: 100%;
    }

    .headline-text-field{
        margin-top: 0.8em;
    }

    .button--big{
        border-radius: 28px;
        height: 50px;
        width: 100%;
        margin-top: 30px;
        background: linear-gradient(to right,white, #F1F1F1);
    }

    .button-text{
        text-transform: uppercase;
        color: #212121;
        font-size: 14px;
    }

    .list-items{
        width: 100%;
        height: 40px;
        border-radius: 28px;
        background: linear-gradient(to bottom right,white, #F1F1F1);
        box-shadow:
        -5px -5px 13px #fff,
        5px 5px 13px #0e0e0e40;
        display: flex;
    }

    .list-items{
        font-size: 15px;
        font-family: 'Open Sans', sans-serif;
        justify-content: space-around;
        align-items: center;
    }

    .mdc-radio__outer-circle-modified{
        background: linear-gradient(to bottom right,white, #F1F1F1);
        box-shadow:
        -5px -5px 13px #fff,
        5px 5px 13px #0e0e0e40;
        border-color: transparent;
        border: none;
    }

    .radio-button-label{
        margin: auto 0;
    }

    .mdc-radio .mdc-radio__native-control:enabled:checked+.mdc-radio__background .mdc-radio__outer-circle{
        box-shadow: inset 6px 6px 10px 0 rgba(0, 0, 0, 0.2),
            inset -6px -6px 10px 0 white,
            12px 12px 24px 0 rgba(0, 0, 0, 0.2),
            -12px -12px 24px 0 rgba(255, 255, 255, 0.5);
            overflow: hidden;
    }

    .mdc-radio .mdc-radio__native-control:enabled:checked+.mdc-radio__background .mdc-radio__inner-circle{
        border-color: #707070;
        width: 1px;
    }


    .card-room-circle{
        border-radius: 50%;
        background: linear-gradient(to bottom right,white, #F1F1F1);
        height: 50px;
        width: 50px;
        box-shadow:
        -5px -5px 13px #fff,
        5px 5px 13px #0e0e0e40;
        display: flex;
    }

    .material-icons-outlined-room-icon{
        font-size: 3em;
        color: #ED553B;
        margin: auto;
    }

    .card-room-container-name-number{
        width: 100%;
        height: 40px;
        border-radius: 28px;
        border: double 2px transparent;
        background-image: radial-gradient(white, white), radial-gradient(circle at top left,white,#ED553B);
        background-origin: border-box;
        background-clip: content-box, border-box;
        box-shadow:
        -5px -5px 13px #fff,
        5px 5px 13px #0e0e0e40;
    }

    .chippressed {
          box-shadow: inset 6px 6px 10px 0 rgba(0, 0, 0, 0.2),
            inset -6px -6px 10px 0 white,
            12px 12px 24px 0 rgba(0, 0, 0, 0.2),
            -12px -12px 24px 0 rgba(255, 255, 255, 0.5);
            overflow: hidden;

    }

    .mdc-card--new{
        border-style: dashed;
        border-color: #212121;
        width: 100%;
        height: 178px;
        border: double 2px transparent;
        border-radius: 28px;
        background-image: radial-gradient(white, white), radial-gradient(circle at top left,white,#212121);
        background-origin: border-box;
        background-clip: content-box, border-box;
        box-shadow:
        -5px -5px 13px #fff,
        5px 5px 13px #0e0e0e40;
        text-align: center;
        display: flex;
        justify-content: center;
        border: 2px dashed #fff;
        background:
            linear-gradient(#fff,#fff) padding-box /* Don't extend this to border */,
            linear-gradient(to bottom right, white, #212121, #212121) border-box, /*Border-box is not need as it's the default value*/
            radial-gradient(white, white), radial-gradient(circle at top left,white,#212121);

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
