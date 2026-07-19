<script setup lang="ts">
import { nextTick, ref, watch, onMounted } from 'vue'

const inputRef = ref<HTMLInputElement | null>(null)

const emit = defineEmits<{
  send: [message: string]
}>()

const message = ref('')

const props = defineProps<{
    loading: boolean
}>()

function handleSend() {
    if (props.loading) return

    const text = message.value.trim()

    if (!text) return

    emit('send', text)

    message.value = ''
}

onMounted(() => {
    inputRef.value?.focus()
})

watch(
    () => props.loading,
    async (loading) => {
        if (!loading) {
            await nextTick()
            inputRef.value?.focus()
        }
    },
)
</script>

<template>
  <form
    class="chat-input"
    @submit.prevent="handleSend"
  >
    <input
      ref="inputRef"
      v-model="message"
      :disabled="loading"
      type="text"
      placeholder="Digite sua mensagem..."
    />

    <button
      type="submit"
      :disabled="loading"
      :class="{ loading }"
    >
      <span v-if="loading">Enviando...</span>
      <span v-else>Enviar</span>
    </button>
  </form>
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

button.loading {
  cursor: not-allowed;
  opacity: 0.7;
}
</style>