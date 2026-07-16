<script setup lang="ts">
import { onMounted, ref } from 'vue'
import { getHealth, type HealthResponse } from '@/api/health'

const health = ref<HealthResponse | null>(null)

onMounted(async () => {
  health.value = await getHealth()
})
</script>

<template>
  <main>
    <h1>Aurora</h1>

    <div v-if="health">
      <p>Status: {{ health.status }}</p>
      <p>Aplicação: {{ health.application }}</p>
      <p>Versão: {{ health.version }}</p>
    </div>
  </main>
</template>