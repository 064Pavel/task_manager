<template>
    <div class="w-[10rem] h-[12rem] justify-items-end text-center">
        <router-link :to="{name: 'tasks.create'}">
            <div class="bg-red-500 justify-items-start h-[12rem] w-1/3">
                <div class="text-center relative top-16 cursor-pointer text-white text-6xl">+</div>
            </div>
        </router-link>
    </div>
</template>

<script>
export default {
    name: "AddCategoryComponent"
}
</script>

<style scoped>

</style>
