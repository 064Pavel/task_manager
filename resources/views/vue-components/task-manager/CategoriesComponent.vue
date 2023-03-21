<template>


    <div v-for="category in categories" class=" bg-white w-[9rem] h-[12rem] shadow shadow-gray-400 text-center hover:border-2 hover:border-red-500">

        <router-link :to="{name: 'tasks.index', params:{category_id: category.id}}">
            <div class="flex flex-col">
                <div
                    class="relative top-10 left-1/4 w-[4rem] h-[4rem] shadow shadow-gray-100 border-2 border-white rounded-full">
                    <img
                        class="w-12 items-center relative left-1.5 hover:bottom-1.5 delay-1000"
                        :src="getImgUrl(category.path_to_icon)">
                </div>

                <div class="relative top-8 mt-5 text-2xl">{{ category.name }}</div>
                <div class="relative top-8 mt-1 text-xl text-red-500">Tasks: {{count[category.id-1]}}</div>

            </div>
        </router-link>

    </div>


</template>

<script>

import axios from "axios";

export default {
    name: "CategoriesComponent",

    data() {
        return {
            categories: [],

            count: []
        }
    },

    mounted() {
        this.getCountTasksCategory()
        this.getCategories()
    },

    methods: {
        getCategories() {
            axios.get('/api/task-manager/categories')
                .then(response => {
                    this.categories = response.data.data
                    console.log(response);
                }).catch(err => {
                console.log(err);
            })
        },

        getImgUrl(pic) {
            return new URL(`../../../../public/img/${pic}`, import.meta.url).href
        },

        getCountTasksCategory() {

            axios.get(`/api/task-info/count_tasks_category`)
                .then(response => {
                    this.count = response.data;
                })

        }


    },



}
</script>

<style scoped>

</style>
