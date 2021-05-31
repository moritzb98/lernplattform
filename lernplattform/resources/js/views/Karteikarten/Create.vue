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
