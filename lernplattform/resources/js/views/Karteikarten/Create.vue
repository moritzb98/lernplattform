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

        <div>
            <div>
                <p>Welches Themengebiet?</p>
                <p>Dropdown</p>
            </div>
            <div class="mdc-switch">
                <div class="mdc-switch__track"></div>
                <div class="mdc-switch__thumb-underlay">
                    <div class="mdc-switch__thumb"></div>
                    <input type="checkbox" id="basic-switch" class="mdc-switch__native-control" role="switch" aria-checked="false">
                </div>
            </div>
            <label for="basic-switch">öffentlich</label>

            <div class="headline-text-field">Titel</div>
            <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                <input type="text" class="mdc-text-field__input text-field__input--modified " placeholder="" aria-label="Label">
            </label>
            <div class="headline-text-field">Tags</div>
            <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                <input type="text" class="mdc-text-field__input text-field__input--modified " placeholder="" aria-label="Label">
            </label>
            <hr class="trennungslinie-dick">

            <div class="fragen-container">
                <h5>1.Karteikarte</h5>
                <div class="headline-text-field">Vorderseite</div>
                <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                    <input type="text" class="mdc-text-field__input text-field__input--modified " placeholder="" aria-label="Label">
                </label>
                <div class="headline-text-field">Rückseite</div>
                <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                    <input type="text" class="mdc-text-field__input text-field__input--modified " placeholder="" aria-label="Label">
                </label>
            </div>
            <button class="mdc-button mdc-button--raised button--big button-dashed-border mdc-card--new">
                <span class="button-text">Weitere Karteikarte</span> <span class="material-icons">add</span>
            </button>
            <hr class="trennungslinie-dick">
            <button class="mdc-button mdc-button--raised button--big ohne-abstand">
                <span class="button-text">Karteikartenset erstellen</span> <span class="material-icons">navigate_next</span>
            </button>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>



        </div>

        <!-- Nav -->
        <Nav />
    </div>
</template>


<script>
    export default {
        data() {
            return {
                title: "Erstellen"
            }
        },
    }
</script>

<style scoped>
    .trennungslinie-dick{
        border: 2px solid #DEDEDE;
        margin-right: -15px;
        margin-left: -15px;
    }

    .fragen-container{
        border-radius: 20px;
        padding: 20px;
        background: linear-gradient(to bottom right,white, #F1F1F1);
        box-shadow: -5px -5px 13px #fff, 5px 5px 13px #0e0e0e40;
    }

    .button-dashed-border{
        height: 50px;
        margin-top: 25px;
    }

    .ohne-abstand{
        margin-top: 0px;
    }

</style>
