<template>
    <div>
        <h1>Login</h1>
       <!-- Login Form -->
       <form action="#" @submit.prevent="handleLogin">
            <input type="email" name="email" v-model="formData.email"><br>
            <input type="password" name="password" v-model="formData.password"><br>
            <button type="submit">Login</button>
       </form>

       <!-- Register Form -->
       <h1>Register</h1>
       <form action="#" @submit.prevent="handleRegister">
            <input type="text" name="name" v-model="registerData.name"><br>
            <input type="email" name="email" v-model="registerData.email"><br>
            <input type="password" name="password" v-model="registerData.password"><br>
            <input type="password" name="password" v-model="registerData.passwordConfirm"><br>
            <button type="submit">Register</button>
       </form>

       <h1>Logout</h1>
       <button @click="logout">Logout</button>
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
                registerData:{
                    name,
                    email: '',
                    password: '',
                    passwordConfirm: '',
                },
            }
        },
        methods: {
            handleLogin() {
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/login', this.formData).then(response => {
                        console.log(response);
                    });
                });
            },
            handleRegister() {
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/registernormal', this.registerData).then(response => {
                        console.log(response);
                    });
                });
            },

            logout() {
                axios.post('/logoutnormal').then(response => {
                    console.log(response);
                });
            }
        }
    }
</script>
