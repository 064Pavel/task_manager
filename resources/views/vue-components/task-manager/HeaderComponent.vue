<template>
    <div class="container bg-red-500 w-100 h-[172px] p-3 mb-[0.8rem] flex flex-col">

        <div class="flex flex-row justify-between mb-2">

            <div>
                <img
                    src="../../../../public/img/user-svgrepo-com.svg"
                    class="w-16 border-4 border-white rounded-full">
            </div>

            <div>
                <button @click.prevent="signOut"
                        class="bg-white hover:bg-gray-200 text-red-500 font-bold py-2 px-8 rounded-2xl">Sign Out
                </button>
            </div>
        </div>

        <div class="flex flex-col">
            <div class="mb-2"><h1 class="text-3xl text-white">Hello {{user_name}}!</h1></div>

            <div v-if="tasks_today > 0"><p class="bg-white p-1 w-auto">You have {{tasks_today}} new task today</p></div>
            <div v-else><p class="bg-white p-1 w-auto">You don't have any tasks for today yet</p></div>

        </div>
    </div>
</template>

<script>
import router from "../../../js/router";
import axios from "axios";

export default {
    name: "HeaderComponent",

    data() {
        return {
            user_name: '',
            tasks_today: null
        }
    },

    mounted() {
        this.getUserName()
        this.getTasksToday()
    },

    methods: {
        signOut() {
            axios.post('/logout')
                .then(response => {
                    localStorage.removeItem('x_xsrf_token')
                    router.push({name: 'homepage'})
                })
        },

        getUserName() {
            axios.get('/api/user')
                .then(response => {
                    this.user_name = response.data.name
                }).catch(err => {
                console.log(err);
            })
        },

        getTasksToday(){
            axios.get('/api/task-info/count_tasks_today')
                .then(response => {
                    this.tasks_today = response.data
                })
        }
    }
}
</script>

<style scoped>

</style>
