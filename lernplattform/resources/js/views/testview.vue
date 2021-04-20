<template>
    <div>
        <p>{{ testMsg }}</p>
        <p @click="test()">Teste mich</p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                testMsg: 'Wenn es funktioniert ändert es sich gleich.',
            }
        },
        methods: {
            test() {
                this.axios.get('http://localhost:8000/api/test')
                    .then(response => (
                        console.log(response),
                        this.testMsg = response.data
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>
