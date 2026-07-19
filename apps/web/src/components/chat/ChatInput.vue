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
  gap: var(--space-md);
  align-items: center;
}

input {
  flex: 1;

  padding: 0.9rem 1rem;

  border: 1px solid var(--color-border);
  border-radius: 999px;

  outline: none;

  font-size: 1rem;

  transition: border-color .2s ease;
}

input:focus {
  border-color: var(--color-primary);
}

button {
  border: none;

  border-radius: 999px;

  padding: 0.9rem 1.4rem;

  cursor: pointer;

  background: var(--color-primary);
  color: white;

  transition: .2s;
}

button:hover {
  background: var(--color-primary-hover);
}
</style>