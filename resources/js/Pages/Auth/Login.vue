<script setup>
import Layout from '../../Shared/Layout.vue';
import {useForm} from '@inertiajs/vue3';

 const form = useForm({
        email:'',
        password:''
    })

let submit = ()=>{
   form.post('/login')
}

</script>
<template>
       <Head>
        <title>Home</title>
        <meta type="description" content="This is the home page">
    </Head>
<section class="flex flex-col gap-10 p-16">
  
   <form class="flex flex-col gap-3 max-w-md mx-auto p-8 rounded border justify-center" @submit.prevent="submit">
     <div class="text-lg font-bold">Login</div>
    <div class="flex flex-col">
    <label class="font-semibold" for="email">Email</label>
    <input  v-model="form.email" class="border" name="email" id="email" placeholder="Enter email">
    <span v-if="form.errors.email" v-text="form.errors.email"></span>
    </div>
    <div class="flex flex-col">
    <label class="font-semibold" for="password">Password</label>
    <input  v-model="form.password" class="border" name="password" id="password" placeholder="Enter password">
    </div>
    <div>
    <button type="submit" class="bg-red-500 text-white-500 rounded">Login</button>
    </div>
   </form>
</section>
</template>

<style scoped>

</style>
