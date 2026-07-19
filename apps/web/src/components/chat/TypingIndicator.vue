<script setup lang="ts">
defineProps<{
  author: string
}>()
</script>

<template>
  <div class="typing-message">
    <div class="typing-author">
      {{ author }}
    </div>

    <div class="typing-bubble">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
</template>

<style scoped>
.typing-message {
  max-width: 75%;
}

.typing-author {
  font-size: .8rem;
  color: #6b7280;
  margin-bottom: .35rem;
}

.typing-bubble {
  display: flex;
  gap: .35rem;
  align-items: center;

  padding: .9rem 1rem;

  background: #ececec;
  border-radius: 16px;
}

.typing-bubble span {
  width: 8px;
  height: 8px;

  border-radius: 50%;
  background: #999;

  animation: blink 1.4s infinite;
}

.typing-bubble span:nth-child(2) {
  animation-delay: .2s;
}

.typing-bubble span:nth-child(3) {
  animation-delay: .4s;
}

@keyframes blink {
  0%, 80%, 100% {
    opacity: .3;
    transform: scale(.8);
  }

  40% {
    opacity: 1;
    transform: scale(1);
  }
}
</style>