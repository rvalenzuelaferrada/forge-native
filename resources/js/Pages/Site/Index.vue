<script setup>
defineProps({
    servers: {
        type: Array,
        required: true,
    },
})
</script>

<template>
    <div class="px-2">
        <div v-for="server in servers">
            <p>{{ server.name }}</p>
            <p>{{ server.ipAddress }}</p>

            <div v-for="site in server.sites">
                <p>{{ site.name }}</p>
            </div>
        </div>
    </div>
</template>
