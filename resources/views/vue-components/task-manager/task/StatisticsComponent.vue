<template>
    <div class="bg-red-500 w-[500px] h-[100px] p-3  text-5xl text-white">
        <div class="flex flex-row justify-items-center mt-2">
            <div class="w-36 h-36 cursor-pointer ">
                <router-link :to="{name: 'profile'}"><span>&lt;</span></router-link>
            </div>
            <div><span>Statistics</span></div>
        </div>
    </div>

    <div class="grid grid-cols-2 justify-items-center p-6 mt-4">
        <div
            class="bg-white w-[200px] h-[130px] border-2 border-red-500 shadow shadow-gray-300 grid grid-cols-1 justify-items-center">
            <div class="mt-6">
                <img class="w-16" src="../../../../../public/img/general.svg">
            </div>
            <div class="font-semibold">
                General
            </div>
        </div>
        <div
            class="bg-white w-[200px] h-[130px] border-2 border-red-500  mb-8 shadow shadow-gray-300 grid grid-cols-1 justify-items-center">
            <div class="mt-6">
                <img class="w-16" src="../../../../../public/img/person.svg">
            </div>
            <div class="font-semibold">
                Personal
            </div>
        </div>


        <div class="bg-white w-[200px] h-[80px] mb-6 shadow shadow-gray-300 text-start p-3 rounded-2xl">
            <span>
                Users with us: <span class="text-red-500 font-semibold">{{ users_with_us }}</span>
            </span>
        </div>

        <div class="bg-white w-[200px] h-[80px] mb-6  shadow shadow-gray-300 text-start p-3 rounded-2xl">
            <span>
                You are with us with: <br> <span class="text-red-500 font-semibold">{{ you_are_with_us }}</span>
            </span>
        </div>

        <div class="bg-white w-[200px] h-[80px] mb-6 shadow shadow-gray-300 text-start p-3 rounded-2xl">
            <span>
                Total tasks <br> created: <span class="text-red-500 font-semibold">{{ total_tasks_created }}</span>
            </span>
        </div>

        <div class="bg-white w-[200px] h-[80px] mb-6 shadow shadow-gray-300 text-start p-3 rounded-2xl">
            <span>
                You have created tasks: <br> <span class="text-red-500 font-semibold">{{ you_have_created_tasks }}</span>
            </span>
        </div>

        <div class="bg-white w-[200px] h-[80px] mb-6 shadow shadow-gray-300 text-start p-3 rounded-2xl">
            <span>
                Total tasks <br>completed: <span class="text-red-500 font-semibold">{{ total_tasks_completed }}</span>
            </span>
        </div>

        <div class="bg-white w-[200px] h-[80px] mb-6 shadow shadow-gray-300 text-start p-3 rounded-2xl">
            <span>
                You have completed the tasks: <span class="text-red-500 font-semibold">{{ you_have_completed_tasks }}</span>
            </span>
        </div>

        <div class="bg-white w-[200px] h-[100px] mb-6 shadow shadow-gray-300 text-start p-3 rounded-2xl">
            <span>
                The most popular category among users: <br> <span class="text-red-500 font-semibold">{{ users_popular_category }}</span>
            </span>
        </div>

        <div class="bg-white w-[200px] h-[100px] mb-6 shadow shadow-gray-300 text-start p-3 rounded-2xl">
            <span>
                Your most popular category: <br> <span class="text-red-500 font-semibold">{{ you_popular_category }}</span>
            </span>
        </div>


        <div class="relative left-1/2 top-16">
            <router-link :to="{name: 'profile'}">
                <button class=" w-[300px] bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-8 rounded-2xl">Task
                    Manager
                </button>
            </router-link>
        </div>

    </div>
</template>

<script>
export default {
    name: "StatisticsComponent",

    data() {
        return {
            users_with_us: 0,
            total_tasks_created: 0,
            total_tasks_completed: 0,
            users_popular_category: '-',

            you_are_with_us: '-',
            you_have_created_tasks: 0,
            you_have_completed_tasks: 0,
            you_popular_category: '-'
        }
    },

    mounted() {
        this.getUsersWithUs()
        this.getTotalTasksCreated()
        this.getTotalTasksCompleted()
        this.getUsersPopularCategory()

        this.getYouAreWithUs()
        this.getYouHaveCreatedTasks()
        this.getYouHaveCompletedTasks()
        this.getYouPopularCategory()
    },

    methods: {
        getUsersWithUs() {
            axios.get('/api/statistics/general/users_with_us')
                .then(response => {
                    this.users_with_us = response.data
                }).catch(err => {
                console.log(err);
            })
        },

        getTotalTasksCreated() {
            axios.get('/api/statistics/general/total_tasks_created')
                .then(response => {
                    this.total_tasks_created = response.data
                }).catch(err => {
                console.log(err);
            })
        },

        getTotalTasksCompleted(){
            axios.get('/api/statistics/general/total_tasks_completed')
                .then(response => {
                    this.total_tasks_completed = response.data
                }).catch(err => {
                console.log(err);
            })
        },

        getUsersPopularCategory(){
          axios.get('api/statistics/general/users_popular_category')
              .then(response => {
                  response.data.forEach(el => {
                      this.users_popular_category = el.name
                  })
              }).catch(err => {
              console.log(err);
          })
        },

        getYouAreWithUs(){
            axios.get('/api/statistics/personal/you_are_with_us')
                .then(response => {
                    response.data.forEach(el => {
                        this.you_are_with_us = el.created_at
                    })
                }).catch(err => {
                console.log(err);
            })
        },

        getYouHaveCreatedTasks(){
            axios.get('/api/statistics/personal/you_have_created_tasks')
                .then(response => {
                    this.you_have_created_tasks = response.data
                }).catch(err => {
                console.log(err);
            })
        },

        getYouHaveCompletedTasks(){
            axios.get('/api/statistics/personal/you_have_completed_tasks')
                .then(response => {
                    console.log(response.data);
                    this.you_have_completed_tasks = response.data
                }).catch(err => {
                console.log(err);
            })
        },

        getYouPopularCategory(){
            axios.get('/api/statistics/personal/you_popular_category ')
                .then(response => {
                    response.data.forEach(el => {
                        this.you_popular_category = el.name
                    })
                })
        }
    }
}
</script>

<style scoped>

</style>
