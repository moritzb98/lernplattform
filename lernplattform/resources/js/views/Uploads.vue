<template>
    <div>
        <!-- Header -->
        <div class="header_wrapper">
            <div class="header">
                <div class="header_title">
                    {{title}}
                </div>
            </div>
        </div>



        <!-- Content -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Erstellen</div>
                    <div class="card-body">
                        <form @submit="formSubmit" enctype="multipart/form-data">
                            <input type="file" class="form-control" v-on:change="onChange">
                            <button class="btn btn-primary btn-block">Upload</button>
                        </form>
                    </div>
                </div>
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
                name: '',
                file: '',
                success: '',
                title: "Upload"
            };
        },
        methods: {
            onChange(e) {
                this.file = e.target.files[0];
            },
            formSubmit(e) {
                e.preventDefault();
                let existingObj = this;

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }

                let data = new FormData();
                data.append('file', this.file);

                axios.post('/api/upload', data, config)
                    .then(function (res) {
                        Vue.$toast.success('Datei erfolgreich', {});
                    })
                    .catch(function (err) {
                        Vue.$toast.error('Beim Hochladen ist etwas schief gegangen :(', {});
                    });
            }
        }
    }

</script>

