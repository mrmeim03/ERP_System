<template>
    <Teleport to="body">
      <Transition name="fade">
        <div
          v-if="show"
          class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm"
          @click.self="$emit('close')"
        >
          <Transition name="scale">
            <div v-if="show" class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6 relative">
              <div class="mb-4">
                <slot name="header" />
              </div>
              <div>
                <slot name="body" />
              </div>
              <button
                @click="$emit('close')"
                class="absolute top-2 right-2 text-gray-500 hover:text-gray-900 transition"
              >
                ✕
              </button>
            </div>
          </Transition>
        </div>
      </Transition>
    </Teleport>
  </template>
  
  <script setup lang="ts">
  defineProps({
    show: Boolean
  });
  </script>
  
  <style scoped>
  .fade-enter-active,
  .fade-leave-active {
    transition: opacity 0.3s ease;
  }
  .fade-enter-from,
  .fade-leave-to {
    opacity: 0;
  }
  
  .scale-enter-active,
  .scale-leave-active {
    transition: transform 0.3s ease;
  }
  .scale-enter-from,
  .scale-leave-to {
    transform: scale(0.95);
  }
  </style>
  