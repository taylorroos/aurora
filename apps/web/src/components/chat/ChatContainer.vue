<script setup lang="ts">
import ChatInput from '@/components/chat/ChatInput.vue'
import ChatMessage from '@/components/chat/ChatMessage.vue'

import { useChat } from '@/composables/useChat'

const { messages, sendMessage } = useChat()
</script>

<template>
  <div class="chat-container">
    <ChatMessage
      v-for="message in messages"
      :key="message.id"
      :message="message"
    />

    <ChatInput @send="sendMessage" />
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