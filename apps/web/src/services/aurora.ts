import { http } from './http'

interface ChatResponse {
  message: string
}

export async function sendMessage(message: string): Promise<ChatResponse> {
  const { data } = await http.post<ChatResponse>('/chat', {
    message,
  })

  return data
}