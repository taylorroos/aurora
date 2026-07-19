import { env } from '@/config/env'

const API_URL = env.apiUrl

interface ChatResponse {
  message: string
}

export async function sendMessage(message: string): Promise<ChatResponse> {
  const response = await fetch(`${API_URL}/chat`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      Accept: 'application/json',
    },
    body: JSON.stringify({ message }),
  })

  if (!response.ok) {
    throw new Error('Erro ao enviar mensagem.')
  }

  return response.json()
}