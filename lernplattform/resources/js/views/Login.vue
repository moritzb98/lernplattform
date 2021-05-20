<template>
    <div>
        <!-- Header [Back] -->
        <div class="header_wrapper">
            <div class="header header--back">
                <span class="material-icons neumorph header_back" @click="$router.go(-1)">arrow_back</span>
                <div class="header_title">
                    {{title}}
                </div>
            </div>
        </div>

        <!-- Content  -->
            <form action="#" @submit.prevent="handleLogin">
                <div class="headline-text-field">E-Mail</div>
                <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                    <input v-model="formData.email" class="mdc-text-field__input text-field__input--modified" type="text" placeholder="" aria-label="Label">
                </label>
                <div class="headline-text-field">Passwort</div>
                <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                    <input v-model="formData.password" class="mdc-text-field__input text-field__input--modified" type="password" placeholder="" aria-label="Label">
                </label>
                <button type="submit" class="mdc-button mdc-button--raised button--big">
                    <span class="button-text">Einloggen</span> <span class="material-icons">chevron_right</span>
                </button>
            </form>
            <div class="text-no-account">Kein Account? <a href="/spa/Registrierung" class="text-bold">Jetzt registrieren</a></div>

    </div>

</template>

<script>
    export default {
        data() {
            return {
                secrets:[],
                formData:{
                    email: '',
                    password: '',
                },
                title: "Login",
            }
        },
        methods: {
            handleLogin() {
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/login', this.formData).then(response => {
                        console.log(response);
                        this.$router.push({ path: '/spa/Dashboard' })
                    });
                });
            },

        }
    }
</script>

<style scoped>
    .text-no-account{
        padding-top: 2em;
        font-family: 'Open Sans', sans-serif;
        color: #212121;

    }

    .text-bold{
        font-weight: bold;
        color: #212121;
    }


</style>
