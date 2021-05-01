<template>
    <div>
        <h1>Styleguide</h1>
        <br>
        <h2>Navigation</h2>
        <button class="mdc-button mdc-button--raised">
            <span class="material-icons-outlined">dashboard</span>
        </button>
        <button class="mdc-button mdc-button--raised">
            <span class="material-icons">school</span>
        </button>
        <button class="mdc-button mdc-button--raised">
            <span class="material-icons">add</span>
        </button>
        <button class="mdc-button mdc-button--raised">
            <span class="material-icons-outlined">people</span>
        </button>
        <button class="mdc-button mdc-button--raised">
            <span class="material-icons-outlined">description</span>
        </button>
        <br>
        <br>

        <h2>Card Bereich</h2>
        <div class="container--flex">
            <div class="mdc-card mdc-card--middle">
                <span class="material-icons-outlined card-icons--big">biotech</span>
                <p class="card-text--small">Lorem</p>
            </div>
            <div class="mdc-card mdc-card--middle">
                <span class="material-icons-outlined card-icons--big">biotech</span>
                <p class="card-text--small">Lorem</p>
            </div>
        </div>
        <br>
        <br>

        <h2>Newsfeed Card</h2>
        <div class="mdc-card mdc-card-newsfeed">
            <div class="card-newsfeed-top-container">
                <div class="card-newsfeed-top-icon-container mdc-card--middle">
                    <span class="material-icons material-icons--orange">school</span>
                </div>
                <div class="card-newsfeed-top-content-container">
                    <div class="card-user">
                        <div class="profil-picture-circle"></div>
                        <div>Dr. Max Mustermann</div>
                    </div>
                    <div class="card-newsfeed-type-container">
                        <div class="mdc-chip" role="row">
                            <span class="mdc-chip__text">Skript</span>
                        </div>
                    </div>
                    <div>
                        <div class="card-newsfeed-headline">Scrum from Scratch</div>
                    </div>
                </div>
            </div>

             <div class="card-newsfeed-bottom-container">
                <div class="card-newsfeed-bottom-voting-container mdc-card--middle">
                    <div class="card-newsfeed-voting">
                        <div class="card-newsfeed-voting-option">
                            <span class="material-icons">expand_less</span>
                        </div>
                        <div class="card-newsfeed-voting-option card-newsfeed-voting-option--border">
                            3174
                        </div>
                        <div class="card-newsfeed-voting-option">
                            <span class="material-icons">expand_more</span>
                        </div>
                    </div>
                </div>
                <div class="card-newsfeed-bottom-content-container">
                    <div class="card-user">
                        <div class="profil-picture-circle"></div>
                        <div>Dr. Max Mustermann</div>
                    </div>
                    <div class="card-newsfeed-type-container">
                        <div class="mdc-chip" role="row">
                            <span class="mdc-chip__text">Skript</span>
                        </div>
                    </div>
                    <div>
                        <div class="card-newsfeed-headline">Scrum from Scratch</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
    export default {
        data() {
            return {

            }
        },
        methods: {

        }
    }
</script>

<style scoped>



    /*
        Navigation and Neumorph Basic Styles added to App.vue
    */


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

    .mdc-card--middle{
        text-align: center;
        display: flex;
        justify-content: center;
    }

    .container--flex{
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .card-icons--big{
        font-size: 7em;
        color: #ED553B;
    }

    .card-text--small{
        font-size: 1.3em;
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
        padding-left: 2em;
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

    .mdc-chip{
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

</style>
