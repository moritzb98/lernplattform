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


        <div class="background-container">
            <div :style="{ backgroundColor: colorBackground }"  class="background">
                <span :style="{ color: colorIcon }" class="material-icons-outlined icon-für-oberen-Bereich">{{icon}}</span>
                <div :style="{ color: color }" class="überschrift-oberer-Bereich">Bearbeiten</div>
            </div>

            <div :style="{ backgroundColor: colorBackground }"  class="fabriges-rechteck">
                <div class="weißes-rechteck"></div>
            </div>
        </div>

        <!-- Content -->
        <div class="content_wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="headline-text-field">Neuer Name der Lerngruppe</div>
                    <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                        <input maxlength="30" v-model="room.roomName" type="text" class="mdc-text-field__input text-field__input--modified " placeholder="" aria-label="Label">
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="headline-text-field">Neue maximale Personenzahl</div>
                    <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                        <input v-model="room.roomMaxPersons" type="number" class="mdc-text-field__input text-field__input--modified " placeholder="" aria-label="Label">
                    </label>
                </div>
            </div>

            <!-- <div class="row mb-3">
                <div class="col-12 mb-4">
                    <label>Name</label>
                    <input class="neumorph--pressed neumorph--pressed--border input w-100" type="text" v-model="room.roomName">
                </div>
                <div class="col-12 mb-2">
                    <label>Maximale Personenzahl</label>
                    <input class="neumorph--pressed neumorph--pressed--border input w-100" type="number" v-model="room.roomMaxPersons">
                </div>
            </div> -->

            <div class="row my-4">
                <div class="col-12">
                    <button class="btn neumorph w-100" @click="updateRoom()">
                        <span class="btn_text mdc-button__label ">Einstellungen speichern</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Nav -->
        <Nav />
    </div>
</template>

<style>
</style>

<script>
    export default {
        data() {
            return {
                room: {
                    id: '',
                    roomName: '',
                    roomMaxPersons: null,
                },
                color: '',
                colorBackground: '',
                colorIcon: '',
                icon: '',
                title: "Lerngruppe"
            }
        },
        mounted() {
            this.room.id = this.$route.params.id;

            this.axios.get('/api/room/get/' + this.room.id)
            .then(response => (
                this.room.roomName = response.data.data[0].data.name,
                this.room.roomMaxPersons = response.data.data[0].data.maxPersons,
                this.color = response.data.data[0].data.category_id.color,
                this.colorBackground = this.hexToRgbA(response.data.data[0].data.category_id.color, 0.4),
                this.colorIcon = this.hexToRgbA(response.data.data[0].data.category_id.color, 0.5),
                this.icon = response.data.data[0].data.category_id.icon,
                console.log(response.data.data[0].data)
            ))

        },
        methods: {
            updateRoom(){
                this.axios.post('/api/room/update/', this.room)
                    .then(response => {
                        console.log(response);
                        Vue.$toast.success('Lerngruppe erfolgreich bearbeitet.', {});
                        this.$router.push({ path: '/spa/Lerngruppen/Eigene' });
                    });
            },
            hexToRgbA(hex, opacity){
                var c;
                if(/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)){
                    c= hex.substring(1).split('');
                    if(c.length== 3){
                        c= [c[0], c[0], c[1], c[1], c[2], c[2]];
                    }
                    c= '0x'+c.join('');
                    return 'rgba('+[(c>>16)&255, (c>>8)&255, c&255].join(',')+','+opacity+')';
                }
                throw new Error('Bad Hex');
            },
        }
    }
</script>
