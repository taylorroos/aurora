<script setup lang="ts">
import { ref } from 'vue'

import ChatMessage from '@/components/chat/ChatMessage.vue'

import type { ChatMessage as ChatMessageType } from '@/types/chat'

const messages = ref<ChatMessageType[]>([
  {
    id: crypto.randomUUID(),
    role: 'assistant',
    content: 'Olá! Eu sou a Aurora. Como posso ajudar você hoje?',
    createdAt: new Date(),
  },
])
</script>

<template>
  <div class="chat-container">
    <ChatMessage
      v-for="message in messages"
      :key="message.id"
      :message="message"
    />
  </div>
</template>

<style scoped>
.chat-container {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  padding: 2rem;
}
</style>