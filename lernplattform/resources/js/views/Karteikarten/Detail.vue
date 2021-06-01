<template>
    <div>
        <!-- Header [Back] -->
        <div class="header_wrapper">
            <div class="header header--back">
                <span class="material-icons neumorph header_back" @click="$router.go(-1)">arrow_back</span>
                <div class="header_title">
                    {{ karteikartenset.name }}
                </div>
            </div>
        </div>

        <div class="background-container">
            <div class="background">
                <span class="material-icons-outlined icon-für-oberen-Bereich">biotech</span>
                <div class="überschrift-oberer-Bereich" >
                     {{ category.name }}
                    <div class="unterüberschrift-oberer-bereich">Frage 1/{{ karteikartenset.karteikarten.length }}</div>
                </div>
            </div>
            <div class="fabriges-rechteck">
                <div class="weißes-rechteck"></div>
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
                title: "Karteikartenset",
                karteikartenset:{
                    name: "",
                    karteikarten: [],
                    id: this.$route.params.id,

                },
                category: {
                    name: "",
                },
            }
        },
        mounted(){
            axios.get('/api/karteikartenset/' + this.karteikartenset.id)
            .then(response=>{
                this.karteikartenset.name = response.data.data[0].data.name;
                this.category.name = response.data.data[0].data.category_id.name;
                console.log(response.data.data[0].data);
            });

        },
    }
</script>
