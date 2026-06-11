<script setup>
import {Link} from '@inertiajs/vue3';

</script>


<template>
<nav class="">
<ul class="list-disc text-blue-500 font-semibold flex gap-10">
<li><Link href="/" :class="{'font-bold underlined text-red-500': $page.url === '/' || $page.url === '/logout'}">Home</Link></li>
<li><Link href="/users" :class="{'font-bold underlined text-red-500': $page.url.startsWith('/users')}">Users</Link></li>
<li><Link href="/settings" :class="{'font-bold underlined text-red-500': $page.url === '/settings'}">Settings</Link></li>
<li><Link href="/logout" method="POST" as="button">Logout</Link></li>
</ul>
</nav>
</template>


<style scoped>

</style>

