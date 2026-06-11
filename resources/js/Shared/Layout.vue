<script setup>
import Nav from './Nav.vue';
</script>

<template>
    <div>
<header class="flex justify-between py-5 px-10 bg-gray-200">
    <div class="flex flex-col gap-2"><h1 class="font-bold text-lg">My App</h1>
    <p class="font-semibold">Welcome Back, {{$page.props.auth.user.name}}</p>
    </div>
    <Nav/>
</header>
<section class="p-15">
    <slot/>
</section>
</div>
</template>

<style scoped>

</style>