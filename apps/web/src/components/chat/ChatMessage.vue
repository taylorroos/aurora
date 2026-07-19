<script setup lang="ts">
import { computed } from 'vue'
import type { ChatMessage } from '@/types/chat'

const props = defineProps<{
  message: ChatMessage
}>()

const isAssistant = computed(() => props.message.role === 'assistant')
</script>

<template>
  <div
    class="message"
    :class="{ assistant: isAssistant, user: !isAssistant }"
  >
    <div class="bubble">
      {{ message.content }}
    </div>
  </div>
</template>

<style scoped>
.message {
  display: flex;
  width: 100%;
}

.assistant {
  justify-content: flex-start;
}

.user {
  justify-content: flex-end;
}

.bubble {
  max-width: 70%;
  padding: 12px 16px;
  border-radius: 18px;
  line-height: 1.5;
  word-break: break-word;
}

.assistant .bubble {
  background: #ececec;
}

.user .bubble {
  background: #2563eb;
  color: white;
}
</style>