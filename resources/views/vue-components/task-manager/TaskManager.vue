<template>

    <HeaderComponent></HeaderComponent>

    <div class="container cursor-pointer justify-items-center mx-auto p-10 grid grid-cols-2 gap-8 ">
        <CategoriesComponent></CategoriesComponent>
        <AddTaskComponent></AddTaskComponent>
    </div>

</template>

<script>
import HeaderComponent from "./HeaderComponent.vue";
import CategoriesComponent from "./CategoriesComponent.vue";
import AddTaskComponent from "./AddTaskComponent.vue";


export default {
    name: "TaskManager",

    components: {
        CategoriesComponent,
        HeaderComponent,
        AddTaskComponent
    },


}
</script>

<style scoped>

</style>
