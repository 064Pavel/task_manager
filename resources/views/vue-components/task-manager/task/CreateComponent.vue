<template>
    <div class="flex flex-col bg-red-500 w-[500px] h-[900px] p-6 text-white">

        <router-link :to="{name: 'profile'}">
            <div><span class="text-6xl cursor-pointer">&lt;</span></div>
        </router-link>

        <div class="mt-8">
            <span class="text-5xl">Add new task</span>
        </div>

        <div class="mt-8">
            <input v-model="name" class="w-[452px] bg-red-500 text-2xl" type="text" placeholder="Task...">
            <hr class="mt-2 text-white">
        </div>

        <div class="mt-12">
            <div class="flex items-center justify-center ">
                <div
                    class="relative mb-3 xl:w-96 "
                    data-te-datepicker-init
                    data-te-input-wrapper-init>
                    <label
                        for="floatingInput"
                        class="text-white text-2xl"
                    >Deadline: </label
                    >
                    <input
                        min='2023-01-01'
                        max='2024-01-01'
                        v-model="deadline"
                        type="date"
                        class="bg-white text-red-500 peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                        placeholder="Select a date"
                        data-te-datepicker-toggle-ref
                        data-te-datepicker-toggle-button-ref/>

                </div>
            </div>
        </div>

        <div class="mt-8  m-auto w-100 grid grid-cols-3 gap-4 justify-items-center">

            <template v-for="category in categories">
                <div
                    @click="setCategory(category.id)"
                    class="w-[8rem] h-[10rem] bg-white cursor-pointer "
                    :class="isChoose(category.id) ? 'border-4 border-black' : '' ">
                    <div class="flex flex-col ">

                        <div
                            class="relative top-10 left-1/4 w-[4rem] h-[4rem] shadow shadow-gray-100 border-2 border-white rounded-full">
                            <img
                                class="w-12 items-center relative left-1.5 hover:bottom-1.5 delay-1000"
                                :src="getImgUrl(category.path_to_icon)">
                        </div>

                        <div class="text-center relative top-10 text-2xl text-black ">
                            {{ category.name }}
                        </div>

                    </div>
                </div>
            </template>


        </div>

        <div class="m-auto relative top-34">
            <router-link :to="{name: 'profile'}">
                <button @click.prevent="create" class="bg-white text-red-500 p-3 w-[300px]"><span><span
                    class="text-2xl">+</span> ADD TASK</span></button>
            </router-link>
        </div>
    </div>

</template>

<script>


export default {
    name: "CreateComponent",

    data() {
        return {

            categories: [],

            name: '',
            deadline: null,
            category_id: null,
            user_id: 1
        }
    },

    mounted() {
        this.getCategories()
    },


    methods: {
        create() {
            axios.post('/api/tasks', {name: this.name, deadline: this.deadline, category_id: this.category_id, user_id: this.user_id})
                .then(response => {
                    console.log(response);
                }).catch(err => {
                console.log(err);
            })
        },

        getCategories() {
            axios.get('/api/task-manager/categories')
                .then(response => {
                    this.categories = response.data.data
                }).catch(err => {
                console.log(err);
            })
        },

        getImgUrl(pic) {
            return new URL(`../../../../../public/img/${pic}`, import.meta.url).href
        },

        setCategory(id) {
            this.category_id = id
        },

        isChoose(id) {
            return this.category_id === id
        }

    }
}
</script>

<style scoped>
* {
    outline: none;
}

</style>
