import { ref } from 'vue'

import type { ChatMessage } from '@/types/chat'

const messages = ref<ChatMessage[]>([
  {
    id: crypto.randomUUID(),
    role: 'assistant',
    content: 'Olá! Eu sou a Aurora. Como posso ajudar você hoje?',
    createdAt: new Date(),
  },
])

function sendMessage(content: string) {
  messages.value.push({
    id: crypto.randomUUID(),
    role: 'user',
    content,
    createdAt: new Date(),
  })

  setTimeout(() => {
    messages.value.push({
      id: crypto.randomUUID(),
      role: 'assistant',
      content: 'Ainda estou aprendendo. Em breve poderei conversar com você de verdade.',
      createdAt: new Date(),
    })
  }, 1000)
}

export function useChat() {
  return {
    messages,
    sendMessage,
  }
}