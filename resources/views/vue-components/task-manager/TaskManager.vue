<template>
    <div class="m-auto">
        <button @click.prevent="signOut" class=" w-[300px] bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-8 rounded-2xl">Sign out</button>
    </div>
</template>

<script>
import router from "../../../js/router";
export default {
    name: "TaskManager",

    methods:{
        signOut(){
            axios.post('/logout')
                .then(response => {
                    localStorage.removeItem('x_xsrf_token')
                    router.push({name: 'homepage'})
                })
        },
    }
}
</script>

<style scoped>

</style>
