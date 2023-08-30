<script setup>
defineProps({
    servers: {
        type: Array,
        required: true,
    },
})
</script>

<template>
    <div class="px-2 bg-white mx-2 mt-2 rounded-lg shadow-sm pt-2">
        <div v-for="server in servers">
            <p>{{ server.name }}</p>
            <p class="text-gray-500 text-xs">{{ server.ipAddress }}</p>

            <div class="flex flex-row items-center px-3 py-2 border-b border-gray-200" v-for="site in server.sites">
                <span v-if="site.deploymentStatus == 'deploying'" class="h-5 w-5 bg-indigo-400 rounded-full mr-2"></span>
                <div class="flex flex-col">
                    <div class="flex">
                        <p class="text-md">{{ site.name }}</p>
                    </div>
                    <p class="text-gray-500 text-xs">{{ site.phpVersion }}</p>
                </div>
            </div>
        </div>
    </div>
</template>
