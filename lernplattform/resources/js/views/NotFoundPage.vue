<template>
    <div>
        <!-- Header -->
        <div class="header_wrapper">
            <div class="header">
                <div class="header_title">
                    Nichts gefunden
                </div>
                <router-link to="/spa/Suche">
                    <span class="material-icons neumorph header_search">search</span>
                </router-link>
            </div>
        </div>

        <!-- Content  -->
        <p>Die angegebene Seite gibt es leider nicht.</p>
        <router-link to="/spa/Profil">
            <span>Zum Profil</span>
        </router-link>

        <!-- Nav -->
        <Nav />
    </div>
</template>

<script>

    export default {
        data() {
            return {

            }
        }
    }

</script>
