<template>
    <div>
        <!-- Header -->
        <div class="header_wrapper">
            <div class="header">
                <div class="header_title">
                    {{title}}
                </div>
                <router-link to="/spa/Suche">
                    <span class="material-icons header_search">search</span>
                </router-link>
            </div>
        </div>

        <!-- Content -->

    </div>
</template>

<script>
    export default {
        data() {
            return {
                title: "Dashboard",
            }
        }
    }
</script>
