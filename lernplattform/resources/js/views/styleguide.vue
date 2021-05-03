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
            <br>
            <br>
            <br>
            <br>
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



    /*
        Navigation and Neumorph Basic Styles added to App.vue
    */





</style>
