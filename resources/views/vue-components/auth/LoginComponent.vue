<template>

    <div class="bg-teal-600 w-100 h-[60px] p-3 mb-[1rem] mb-[3rem]">
        <div class="flex flex-row justify-around">
            <div><h1 class="text-white text-4xl">Login to your account</h1></div>
        </div>
    </div>

    <div class="container w-4/5 mx-auto bg-teal-600 p-5 text-center grid columns-1 text-white h-[400px] text-black">
        <div class="bg-gray-800 absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-full p-4 md:p-8">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="#FFF">
                <path
                    d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z"/>
            </svg>
        </div>

        <div class="mt-[100px] w-[300px] mx-auto text-black">
            <div class="mb-5">
                <input v-model="email" type="email" class="h-[2.5rem] p-2" placeholder="email@mail.ru">
            </div>
            <div class="mb-5">
                <input v-model="password" type="password" class="h-[2.5rem] p-2" placeholder="**********">
            </div>

            <div class="justify-self-center mb-5">
                <router-link :to="{name: 'register'}">
                    <button class="w-[250px] bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-8">I don't have
                        an account
                    </button>
                </router-link>
            </div>

            <div class="justify-self-center">
                <button @click.prevent="login"
                        class="w-[250px] bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-8">Sign in
                </button>
            </div>


        </div>
    </div>

</template>

<script>
import router from "../../../js/router";
export default {
    name: "LoginComponent",

    data() {
        return {
            email: '',
            password: ''
        }
    },

    methods: {
        login() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                // console.log(response);
                // console.log(response.config.headers);
                axios.post('/login', {email: this.email, password: this.password})
                    .then(response => {
                        console.log(response);
                        localStorage.setItem('x_xsrf_token', response.config.headers['X-XSRF-TOKEN'])
                        router.push({name: 'profile'})
                        // console.log("You are sign in");
                        // console.log(response);
                    }).catch(err => {
                    console.log(err);
                })
            });
        }
    }
}
</script>

<style scoped>

</style>
