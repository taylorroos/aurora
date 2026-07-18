<script setup lang="ts">
import { ref } from 'vue'

const emit = defineEmits<{
  send: [message: string]
}>()

const message = ref('')

function handleSend() {
  const text = message.value.trim()

  if (!text) return

  emit('send', text)

  message.value = ''
}
</script>

<template>
  <div class="chat-input">
    <input
      v-model="message"
      type="text"
      placeholder="Digite sua mensagem..."
      @keyup.enter="handleSend"
    />

    <button @click="handleSend">
      Enviar
    </button>
  </div>
</template>

<style scoped>
.chat-input {
  display: flex;
  gap: 1rem;
}

input {
  flex: 1;
  padding: .75rem;
}

button {
  padding: .75rem 1rem;
}
</style>