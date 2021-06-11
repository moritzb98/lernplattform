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

        <!-- Content -->
        <p style="color: red;">Achtung: Diese Web-Anwendung ist eine Lehrprojekt und das dahinterstehende Unternehmen ist fiktiv.</p>

        <p>
            Skillwire GmbH<br/>
            Lohrtalweg 10<br/>
            74821 Mosbach<br/><br/>
            Kundensupport:<br/><br/>
            Mail: help@skillwire.de<br/><br/>
            Telefon:  06261 9390<br/><br/>
            Registergericht: Amtsgericht Freiburg im Breisgau <br/><br/>
            Registernummer: ABC 123<br/><br/>
            Umsatzsteuer-Identifikationsnummer gem. § 27a UStG: DE123XYZ<br/><br/>
            Geschäftsführer: Moritz Banhardt, Theresa Brenner, Fabienne Burgert, Leon Grünberger, Pascal Koch, Tim Kustermann<br/><br/>
            Verantwortliche/r i.S.d. § 55 Abs. 2 RStV: Moritz Banhardt der Zauberer<br/>
        </p>


        <!-- Nav -->
        <Nav />
    </div>
</template>

<script>
    export default {
        data() {
            return {
                title: "Impressum",
            }
        },
    }
</script>

<style scoped>
</style>
