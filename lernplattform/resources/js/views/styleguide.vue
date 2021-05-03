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
        <br/>

        <h4>Pressed</h4>
        <button class="mdc-button mdc-button--raised mdc-button--pressed">
            <span class="material-icons-outlined">dashboard</span>
        </button>
        <button class="mdc-button mdc-button--raised mdc-button--pressed">
            <span class="material-icons">school</span>
        </button>
        <button class="mdc-button mdc-button--raised mdc-button--pressed">
            <span class="material-icons">add</span>
        </button>
        <button class="mdc-button mdc-button--raised mdc-button--pressed">
            <span class="material-icons-outlined">people</span>
        </button>
        <button class="mdc-button mdc-button--raised mdc-button--pressed">
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

        <h2>Card Newsfeed</h2>
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
                        <div class="mdc-chip mdc-chip--red" role="row">
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
                    <div class="card-newsfeed-text">
                        <div>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod...</div>
                    </div>
                    <div class="card-newsfeed-data-container">
                        <div class="card-newsfeed-data-saved">93 Mal gespeichert</div>
                        <div class="card-newsfeed-data-separator">・</div>
                        <div class="card-newsfeed-data-date">22.04.2021</div>
                    </div>
                    <div class="card-newsfeed-icon-container">
                            <button class="mdc-button mdc-button--raised mdc-button mdc-button--round">
                                <span class="material-icons-outlined">visibility</span>
                            </button>
                            <button class="mdc-button mdc-button--raised mdc-button mdc-button--round">
                                <span class="material-icons-outlined">file_download</span>
                            </button>
                            <button class="mdc-button mdc-button--raised mdc-button mdc-button--round">
                                <span class="material-icons-outlined">send</span>
                            </button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <h2>Card Raum</h2>
        <div class="card-room-container">
            <div class="card-room-circle"> <span class="material-icons-outlined material-icons-outlined-room-icon">biotech</span></div>
            <div class="card-room-container-name-number">
                <div class="card-room-room-name">Lorem</div>
                <div class="card-room-room-number">429.384</div>
            </div>

        </div>
        <br>
        <br>
        <h2>Card Lernmaterial</h2>
            <div class="mdc-card mdc-card-lernmaterial">
                <div class="card-lernmaterial-spacing">
                    <div class="card-lernmaterial-icon-container">
                        <span class="material-icons material-icons-lernmaterial">school</span>
                    </div>
                    <div class="card-lernmaterial-middle-column-container">
                        <div class="mdc-chip-container">
                            <div class="mdc-chip mdc-chip--red mdc-chip-lernmaterial" role="row">
                                <span class="mdc-chip__text">Skript</span>
                            </div>
                        </div>
                        <div class="card-lernmaterial-headline">Java from Scratch</div>
                        <div class="card-lernmateral-thumb">
                            <span class="material-icons-outlined material-icons-outlined-space-right">thumb_up</span>
                            <p class="card-lernmateral-thumbs-number">3174</p>
                        </div>
                    </div>
                    <div>
                        <div class="card-lernmaterial-date">22.04.2021</div>
                        <div class="card-lernmaterial-date-icon-container">
                             <span class="material-icons-outlined">visibility</span>
                             <span class="material-icons-outlined">file_download</span>
                             <span class="material-icons-outlined">send</span>
                        </div>
                    </div>
                </div>
            </div>
        <br>
        <br>
        <h2>Card Dashboard</h2>
            <br>
        <br>

        <h2>Schaltflächen</h2>
        <div class="mdc-chip mdc-chip-filter" role="row">
            <div class="mdc-chip__ripple"></div>
                <span class="material-icons-outlined">filter_alt</span>
                <span role="gridcell">
                <span role="button" tabindex="0" class="mdc-chip__primary-action">
                <span class="mdc-chip__text">Alles</span>
                </span>
                </span>
            </div>
            <div class="mdc-chip mdc-chip-filter" role="row">
                <div class="mdc-chip__ripple"></div>
                    <span class="material-icons-outlined">sort</span>
                    <span role="gridcell">
                    <span role="button" tabindex="0" class="mdc-chip__primary-action">
                    <span class="mdc-chip__text">Sortieren</span>
                    </span>
                    </span>
            </div>

            <h4>Buttons</h4>
            <button class="mdc-button mdc-button--raised mdc-button-back">
                <span class="material-icons-outlined">arrow_back</span>
            </button>
            <button class="mdc-button mdc-button--raised mdc-button-back">
               <span class="material-icons-outlined">search</span>
            </button>
            <button class="mdc-button mdc-button--raised mdc-button-back">
               <span class="material-icons">call</span>
            </button>
            <button class="mdc-button mdc-button--raised mdc-button-back">
               <span class="material-icons">videocam</span>
            </button>
            <button class="mdc-button mdc-button--raised mdc-button-back">
               <span class="material-icons">description</span>
            </button>
            <button class="mdc-button mdc-button--raised mdc-button-back">
               <span class="material-icons">sports_esports</span>
            </button>
            <button class="mdc-button mdc-button--raised mdc-button-back">
               <span class="button-text">Q &amp; A</span>
            </button>
            <button class="mdc-button mdc-button--raised mdc-button-back">
               <span class="material-icons">quiz</span>
            </button>
            <button class="mdc-button mdc-button--raised mdc-button-back">
               <span class="material-icons-outlined">search</span>
            </button>
            <br>
            <br>
            <h4>Input Felder</h4>
            <div class="headline-text-field">E-Mail</div>
            <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                <input class="mdc-text-field__input text-field__input--modified" type="text" placeholder="" aria-label="Label">
            </label>
            <div class="headline-text-field">Passwort</div>
            <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                <input class="mdc-text-field__input text-field__input--modified" type="text" placeholder="" aria-label="Label">
            </label>
            <button class="mdc-button mdc-button--raised button--big">
                <span class="button-text">Einloggen</span> <span class="material-icons">chevron_right</span>
            </button>
            <br>
            <br>
            <h4>List Items</h4>
            <div class="list-items"> <div class="list-items-text">Neuen Chat erstellen</div> <span class="material-icons">add</span></div>
            <br>
            <br>
            <h4>Radiobuttons</h4>
            <div class="mdc-form-field">
                <div class="mdc-radio">
                    <input class="mdc-radio__native-control" type="radio" id="radio-1" name="radios" checked>
                    <div class="mdc-radio__background mdc-radio__background-container">
                        <div class="mdc-radio__outer-circle mdc-radio__outer-circle-modified"></div>
                        <div class="mdc-radio__inner-circle mdc-radio__inner-circle-modified"></div>
                    </div>
                </div>
                <label class="radio-button-label" for="radio-1">Datenschutz bla</label>
            </div>
            <div class="mdc-form-field">
                <div class="mdc-radio">
                    <input class="mdc-radio__native-control" type="radio" id="radio-1" name="radios" checked>
                    <div class="mdc-radio__background mdc-radio__background-container">
                        <div class="mdc-radio__outer-circle mdc-radio__outer-circle-modified"></div>
                        <div class="mdc-radio__inner-circle mdc-radio__inner-circle-modified"></div>
                    </div>
                </div>
                <label class="radio-button-label" for="radio-1">Datenschutz bla</label>
            </div>
            <br>
            <br>
            <h4>Switch</h4>
            <div class="mdc-switch">
                <div class="mdc-switch__track"></div>
                <div class="mdc-switch__thumb-underlay">
                    <div class="mdc-switch__thumb"></div>
                    <input type="checkbox" id="basic-switch" class="mdc-switch__native-control" role="switch" aria-checked="false">
                </div>
            </div>
            <label for="basic-switch">Öffentlich</label>


            <br>
            <br>

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
    }

    .text-field__input--modified{
        background-color: transparent;
         caret-color: black;
         border-radius: 28px;
         padding-left: 2px;

    }

    .text-field--modified{
        background-color:white;
        border-radius: 28px;
        box-shadow: inset 6px 6px 10px 0 rgba(0, 0, 0, 0.2),
        inset -6px -6px 10px 0 white,
        12px 12px 24px 0 rgba(0, 0, 0, 0.2),
        -12px -12px 24px 0 rgba(255, 255, 255, 0.5);
        overflow: hidden;
        height: 40px;
        width: 100%;
    }

    .headline-text-field{

    }

    .button--big{
        border-radius: 28px;
        height: 50px;
        width: 100%;
        margin-top: 20px;
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

    .mdc-radio__background-container{

    }

    .mdc-radio__outer-circle-modified{
        background: linear-gradient(to bottom right,white, #F1F1F1);
        box-shadow:
        -5px -5px 13px #fff,
        5px 5px 13px #0e0e0e40;
        border-color: transparent;
        border: none;
    }

    .mdc-radio__inner-circle-modified{
        border-color: red;
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



    .mdc-radio .mdc-radio__native-control:enabled:focus+.mdc-radio__background .mdc-radio__outer-circle{
    }

    .mdc-radio .mdc-radio__native-control:enabled:active+.mdc-radio__background .mdc-radio__outer-circle{
    }

    .card-room-container{
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


</style>
