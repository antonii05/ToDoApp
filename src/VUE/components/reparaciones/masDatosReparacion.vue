<template>
    <h1>Otros datos</h1>
</template>

<script setup lang="ts">
import { onMounted } from "vue";
import type { Reparacion } from "../../models/Reparacion";

defineProps({
    reparacion: {
        type: Object as () => Reparacion,
        required: true,
    }
})

onMounted(async ()=>{
    
})

</script>
