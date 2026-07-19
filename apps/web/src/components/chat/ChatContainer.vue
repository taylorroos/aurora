<script setup lang="ts">
import ChatInput from '@/components/chat/ChatInput.vue'
import ChatMessage from '@/components/chat/ChatMessage.vue'
import { nextTick, ref, watch } from 'vue'

import { useChat } from '@/composables/useChat'

const { messages, sendMessage } = useChat()

const messagesContainer = ref<HTMLElement | null>(null)

async function scrollToBottom() {
  await nextTick()

  if (!messagesContainer.value) return

  messagesContainer.value.scrollTop =
    messagesContainer.value.scrollHeight
}

watch(
  () => messages.value.length,
  scrollToBottom,
)
</script>

<template>
  <div class="chat-container">

    <header class="chat-header">
      <h1>Aurora</h1>
    </header>

    <main
        ref="messagesContainer"
        class="chat-messages"
    >
      <ChatMessage
        v-for="message in messages"
        :key="message.id"
        :message="message"
      />
    </main>

    <footer class="chat-footer">
      <ChatInput @send="sendMessage" />
    </footer>

  </div>
</template>

<style scoped>
.chat-container {
  height: 100vh;

  display: flex;
  flex-direction: column;

  background: #f8fafc;
}

.chat-header {
  padding: 1.25rem 2rem;

  border-bottom: 1px solid #e5e7eb;

  background: white;
}

.chat-header h1 {
  margin: 0;
  font-size: 1.25rem;
}

.chat-messages {
  flex: 1;

  overflow-y: auto;

  padding: 2rem;

  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.chat-footer {
  padding: 1rem 2rem;

  border-top: 1px solid #e5e7eb;

  background: white;
}
</style>