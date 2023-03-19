<template>

    <HeaderComponent></HeaderComponent>

    <div class="container cursor-pointer justify-items-center mx-auto p-10 grid grid-cols-2 gap-8 ">
        <CategoriesComponent></CategoriesComponent>
        <AddCategoryComponent></AddCategoryComponent>
    </div>

</template>

<script>
import HeaderComponent from "./HeaderComponent.vue";
import CategoriesComponent from "./CategoriesComponent.vue";
import AddCategoryComponent from "./AddCategoryComponent.vue";


export default {
    name: "TaskManager",

    components: {
        CategoriesComponent,
        HeaderComponent,
        AddCategoryComponent
    },


}
</script>

<style scoped>

</style>
