<script setup lang="ts">
import type { ChatMessage } from '@/types/chat'

defineProps<{
  message: ChatMessage
}>()
</script>

<template>
  <div class="message">
    <strong>{{ message.role === 'assistant' ? 'Aurora' : 'Você' }}</strong>

    <p>{{ message.content }}</p>
  </div>
</template>

<style scoped>
.message {
  padding: 1rem;
  margin-bottom: 1rem;
  border-radius: 12px;
  background: #f4f4f4;
}

p {
  margin: .5rem 0 0;
}
</style>