import { ref } from 'vue'

import type { ChatMessage } from '@/types/chat'
import { sendMessage as sendMessageToApi } from '@/services/aurora'

const messages = ref<ChatMessage[]>([
  {
    id: crypto.randomUUID(),
    role: 'assistant',
    content: 'Olá! Eu sou a Aurora. Como posso ajudar você hoje?',
    createdAt: new Date(),
  },
])

const isLoading = ref(false)

async function sendMessage(content: string) {
    if (isLoading.value) {
        return
    }
    messages.value.push({
        id: crypto.randomUUID(),
        role: 'user',
        content,
        createdAt: new Date(),
    })

    isLoading.value = true

    // aguarda para testar o loading
    // await new Promise(resolve => setTimeout(resolve, 1000))

    try {
        const response = await sendMessageToApi(content)

        messages.value.push({
            id: crypto.randomUUID(),
            role: 'assistant',
            content: response.message,
            createdAt: new Date(),
        })
    } catch (error) {
        messages.value.push({
            id: crypto.randomUUID(),
            role: 'assistant',
            content: 'Ocorreu um erro ao conversar com a Aurora.',
            createdAt: new Date(),
        })

        console.error(error)
    } finally {
        isLoading.value = false
    }
}

export function useChat() {
  return {
    messages,
    isLoading,
    sendMessage,
  }
}