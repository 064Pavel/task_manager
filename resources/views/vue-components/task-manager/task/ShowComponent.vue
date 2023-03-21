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



    <div class="w-[400px] h-[500px] bg-gray-300 text-black mx-auto mt-12 grid grid-cols-1">
        {{task.name}}
    </div>


</template>

<script>
import axios from "axios";

export default {
    name: "ShowComponent",

    data() {
        return {
            task: {},

            category: [],
            category_name: '',
            category_path_to_icon: ''
        }
    },

    props: ['task_id', 'category_id'],

    mounted() {
        console.log(this.task_id);
        console.log(this.category_id);
        this.getTask(this.task_id)
        this.getCategory(this.category_id)
    },

    methods: {
        getTask(id) {
            console.log(id);
            axios.get(`/api/tasks/${id}/show`)
                .then(response => {
                    this.task = response.data.data;
                }).catch(err=>{
                console.log(err);
            })
        },

        getCategory(id) {
            axios.get(`/api/category/${id}`)
                .then(response => {
                    this.category = response.data
                    console.log(response);
                    this.category.forEach(data => {
                        this.category_name = data.name
                        this.category_path_to_icon = data.path_to_icon
                    })

                })
        },

        getImgUrl(pic) {
            return new URL(`../../../../../public/img/${pic}`, import.meta.url).href
        },

    }


}
</script>

<style scoped>

</style>
