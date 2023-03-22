<template>

    <div class="flex flex-col bg-red-500 w-[500px] h-[900px] p-6 text-white">

        <router-link :to="{name: 'tasks.index', params:{category_id: category_id}}">
            <div><span class="text-6xl cursor-pointer">&lt;</span></div>
        </router-link>

        <div class="mt-8">
            <span class="text-5xl">Update task</span>
        </div>

        <div class="mt-8">
            <input v-model="name" class="task-name w-[452px] bg-red-500 text-2xl" type="text" :placeholder="task.name">
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

        <div class="mt-10">
            <div class="flex justify-center">
                <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init>
    <textarea
        v-model="notes"
        class="bg-white text-black peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
        id="exampleFormControlTextarea1"
        rows="3"
        placeholder="Your message"></textarea>
                    <label
                        for="exampleFormControlTextarea1"
                        class="bg-white p-2 text-black text-2xl pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] transition-all duration-200 ease-out peer-focus:-translate-y-[2.5rem] peer-focus:scale-[0.8] peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                    >Notes...</label
                    >
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 justify-items-center mt-6 w-[400px] h-[250px] mx-auto">
            <div v-for="priority in priorities" class="w-[120px] h-[100px] bg-white ">
                <div
                    @click="setPriority(priority.id)"
                    :class="isChoose(priority.id) ? 'border-2 border-black' : ''"
                    class="mx-auto h-[100px] text-center"><span
                    class="relative top-8 text-3xl text-black">{{ priority.name }}</span></div>
            </div>
        </div>

        <div class="m-auto relative top-34">

            <button @click.prevent="update(task.id)" class="bg-white text-red-500 p-3 w-[300px] rounded-full font-bold"><span
                class="text-2xl">UPDATE</span></button>

        </div>
    </div>

</template>

<script>
import axios from "axios";
import router from "../../../../js/router";

export default {
    name: "ShowComponent",

    data() {
        return {
            task: {},

            priorities: [],

            category: [],
            category_name: '',
            category_path_to_icon: '',

            name: '',
            notes: '',
            deadline: null,
            priority_id: null,
        }
    },

    props: ['task_id', 'category_id'],

    mounted() {
        this.getTask(this.task_id)
        this.getCategory(this.category_id)
        this.getPriorities()
    },

    methods: {

        update(id){

            if (this.name === ''){
                this.name = this.task.name
            }

            if (this.deadline === null){
                this.deadline = this.task.deadline
            }

            if (this.priority_id === null){
                this.priority_id = 1
            }

            axios.patch(`/api/tasks/${id}`, {
                name: this.name,
                notes: this.notes,
                deadline: this.deadline,
                category_id: this.category_id,
                priority_id: this.priority_id,
                user_id: 1
            })
                .then(response => {
                  router.push({name: "tasks.index", params: {category_id : this.category_id}})
                }).catch(err => {
                console.log(err);
            })
        },


        getTask(id) {
            console.log(id);
            axios.get(`/api/tasks/${id}`)
                .then(response => {
                    this.task = response.data.data;
                }).catch(err => {
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

        getPriorities() {
            axios.get(`/api/priorities`)
                .then(response => {
                    this.priorities = response.data.data;
                }).catch(err => {
                console.log(err);
            })
        },

        getImgUrl(pic) {
            return new URL(`../../../../../public/img/${pic}`, import.meta.url).href
        },

        setPriority(id){
            this.priority_id = id
        },

        isChoose(id){
          return this.priority_id === id
        },

    }


}
</script>

<style scoped>
.task-name {
    outline: none;
}
</style>
