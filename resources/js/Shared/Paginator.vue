<script setup>
defineProps({
    links: Array
})
</script>

<template>
<div>
    <Link
        v-for="link in links"
        :key="link.label"
        :href="link.url ?? '#'"
        v-html="link.label"
        :class="[
          'px-3 py-1 border rounded text-sm',
          link.active ? 'bg-indigo-600 text-white' : 'text-indigo-600 hover:bg-gray-100',
          !link.url ? 'opacity-50 cursor-not-allowed' : ''
        ]"
      />
</div>
</template>