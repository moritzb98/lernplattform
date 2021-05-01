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
                    <div class="nav_item neumorph">
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
            </div>
        </div>
    </div>
</template>

<style>

    /*
    HEADER
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
    }

    .header {

    }

    .header_title {
        font-size: 20px;
        font-family: 'Syncopate', sans-serif;
        font-weight: 700;
    }



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

    .neumorph--pressed {
        background: linear-gradient(to bottom right, #F1F1F1, white);
        box-shadow:
            /* inset -5px -5px 13px #0e0e0e40, */
            inset -2px -2px 8px #fff,
            /* inset 5px 5px 13px #fff, */
            inset 2px 2px 8px #0e0e0e40,
            2px 2px 8px #0e0e0e11;
    }

    .l_page-content {
        margin-top: 62px;
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
   ██       ██    ██       ██████   */


    h1, h2, h3, h4, h5, h6 {
    }


/*
    ███    ██  █████  ██    ██ 
    ████   ██ ██   ██ ██    ██ 
    ██ ██  ██ ███████ ██    ██ 
    ██  ██ ██ ██   ██  ██  ██  
    ██   ████ ██   ██   ████    */

    .nav_wrapper {
        width: 100%;
        display: flex;
        justify-content: center;
        background-color: #F1F1F1;
        padding: 25px 15px;

        position: fixed;
        bottom: 0;
        left: 0;
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


</style>

<script>
    export default {
    }
</script>
