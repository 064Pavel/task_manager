<template>
    <div class="bg-red-500 w-100 h-[4rem] p-3 mb-[1rem]">
        <div class="flex flex-row justify-around">
            <div><h1 class="text-white text-4xl">Task Manager</h1></div>
            <div>
                <router-link :to="{name: 'login'}"><button class="bg-white hover:bg-gray-200 text-red-500 font-bold py-2 px-8 rounded-2xl">Sign In</button></router-link>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-10 grid gap-y-3 text-base overflow-y-scroll h-[800px]">

        <div class="p-5 flex flex-row justify-between text-white text-start relative right-4">
            <div class="justify-self-center bg-red-100 p-3">
                <img
                    class="h-[200px] w-[200px]"
                    src="../../../public/img/folder-data-storage-svgrepo-com.svg">

            </div>
            <div class="bg-red-500 p-3 w-[200px]">
                <p> Task Manager gives you confidence that everything is organized and taken into account so
                    that you can
                    succeed in important things for yourself.
                </p>
            </div>

        </div>

        <div class="p-5 flex flex-row justify-between text-white text-start relative left-4">
            <div class="bg-red-500 p-3 w-[200px]">
                <p>
                    Get a clear idea of everything that needs to be done, and do not lose sight of important tasks.
                </p>
            </div>
            <div class="justify-self-center bg-red-100 p-3">
                <img
                    class="h-[200px] w-[200px]"
                    src="../../../public/img/loupe-zoom-out-svgrepo-com.svg">
            </div>
        </div>


        <div class="p-5 flex flex-row justify-between text-white text-start relative right-4">
            <div class="justify-self-center bg-red-100 p-3">
                <img
                    class="h-[200px] w-[200px]"
                    src="../../../public/img/hourglass-svgrepo-com.svg">
            </div>
            <div class="bg-red-500 p-3 w-[200px]">
                <p>
                    Task Manager brings to the fore the right tasks at the right time, and you always know what to focus
                    on
                    next.
                </p>
            </div>
        </div>

        <div class="p-5 flex flex-row justify-between text-white text-start mb-5 relative left-4">
            <div class="bg-red-500 p-3 w-[200px]">
                <p>
                    Visualizing productivity
                    helps you move toward your goal, week after week.
                </p>
            </div>
            <div class="justify-self-center bg-red-100 p-3">
                <img
                    class="h-[200px] w-[200px]"
                    src="../../../public/img/chart-bar-chart-svgrepo-com.svg">
            </div>
        </div>

        <div class="m-auto">
            <button class=" w-[300px] bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-8 rounded-2xl">Join us</button>
        </div>

    </div>


</template>


<script>
export default {
    name: "HomepageComponent"
}
</script>

<style scoped>

</style>
