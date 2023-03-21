<template>
    <div class="bg-red-500 w-[500px] h-[100px] p-1 flex justify-items-start text-white">

        <div class="flex flex-row justify-around w-[500px]">

            <router-link :to="{name: 'profile'}">
                <div class="relative bottom-2/5 right-2"><span class="text-6xl cursor-pointer">&lt;</span></div>
            </router-link>

            <div class="relative top-4">
                <span class="text-5xl">{{ category_name }}</span>
            </div>

            <div class=" bg-white w-14 h-14 ml-8 rounded-full relative top-4">
                <img
                    class="w-12 mx-auto hover:w-10 cursor-pointer"
                    :src="getImgUrl(category_path_to_icon)">
            </div>

        </div>
    </div>

    <div class="mt-12 grid gap-10 overflow-y-auto h-[620px]">
        <div v-for="task in tasks"
             class="bg-gray-200 w-[450px] h-[120px] mx-auto p-3 grid grid-cols-3 justify-items-center shadow-2xl">
            <div class="w-[130px]  truncate"><span>Task: <br> {{ task.name }}</span></div>
            <div><span>Deadline: <br> {{ task.deadline }}</span></div>

            <div class="grid grid-cols-2 justify-between w-[100px]">
                <div>
                    <img
                        class="w-10"
                        src="../../../../../public/img/edit-svgrepo-com.svg">
                </div>
                <div>
                    <img
                        @click.prevent="deleteTask(task.id)"
                        class="w-10"
                        src="../../../../../public/img/delete-svgrepo-com.svg">
                </div>
<!--                <div class="relative top-10 left-6 w-[100px] text-center">-->
<!--                    Priority:-->
<!--                </div>-->
            </div>

            <div class="flex flex-row relative top-10 left-16">
                <button @click.prevent="completed(task.id)" class="bg-green-500 w-[80px] h-[30px] mr-2">Done</button>
                <router-link :to="{ name: 'tasks.show', params: { task_id: task.id, category_id: category_id }}">
                    <button class="bg-indigo-500 w-[80px] h-[30px]">More</button>
                </router-link>
                <button
                    class="w-[120px] h-[30px] bg-red-500 relative left-44 rounded-2xl text-white"
                >{{ task.priority_id.name }}
                </button>
            </div>
        </div>
    </div>


    <div class="relative top-16 left-24">
        <router-link :to="{name: 'tasks.create'}">
            <button class=" w-[300px] bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-8 rounded-2xl">+ ADD
                TASK
            </button>
        </router-link>
    </div>

</template>

<script>
import axios from "axios";

export default {
    name: "IndexComponent",

    data() {
        return {
            tasks: [],

            category: [],

            category_name: '',
            category_path_to_icon: ''
        }
    },

    props: ['category_id'],


    mounted() {
        this.getCategory(this.category_id)
        this.getTasks(this.category_id)
        console.log(this.category_id);
    },


    methods: {

        getCategory(id) {
            axios.get(`/api/category/${id}`)
                .then(response => {
                    this.category = response.data

                    this.category.forEach(data => {
                        this.category_name = data.name
                        this.category_path_to_icon = data.path_to_icon
                    })

                })
        },


        getTasks(id) {
            axios.get(`/api/tasks/category/${id}`)
                .then(response => {
                    this.tasks = response.data.data
                    console.log(response.data.data);
                }).catch(err => {
                console.log(err);
            })
        },

        getImgUrl(pic) {
            return new URL(`../../../../../public/img/${pic}`, import.meta.url).href
        },

        deleteTask(id) {
            axios.delete(`/api/tasks/${id}`)
                .then(response => {
                    this.getTasks(this.category_id)
                }).catch(err => console.log(err))
        },

        completed(id) {
            axios.patch(`/api/tasks/completed/${id}`)
                .then(response => {
                    console.log(response);
                    this.getTasks(this.category_id)
                }).catch(err => {
                console.log(err);
            })
        },

        getClass() {

            return {
                'bg-white': this.task.priority_id === 1,
                'bg-green-500': this.task.priority_id === 2,
                'bg-indigo-500': this.task.priority_id === 3,
                'bg-red-500': this.task.priority_id === 4,

            }


        }
    }
}
</script>

<style scoped>

</style>
