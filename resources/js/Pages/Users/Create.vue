<script setup>
import Layout from '../../Shared/Layout.vue';
import {useForm} from '@inertiajs/vue3';

 let form = useForm({
        name:'',
        email:'',
        password:''
    })

let submit = ()=>{
    console.log('All good')
   form.post('/users')
}

</script>
<template>
       <Head>
        <title>Home</title>
        <meta type="description" content="This is the home page">
    </Head>

    <Layout>
   <div class="text-lg">Home</div>
   <form class="flex flex-col gap-3 max-w-md mx-auto" @submit.prevent="submit">
    <div class="flex flex-col">
    <label class="font-semibold" for="name">Name</label>
    <input v-model="form.name" class="border" name="name" id="name" placeholder="Enter name">
    <div v-if="form.errors.name" v-text="form.errors.name"></div>
    </div>
    <div class="flex flex-col">
    <label class="font-semibold" for="email">Email</label>
    <input  v-model="form.email" class="border" name="email" id="email" placeholder="Enter email">
    </div>
    <div class="flex flex-col">
    <label class="font-semibold" for="password">Password</label>
    <input  v-model="form.password" class="border" name="password" id="password" placeholder="Enter password">
     <div v-if="form.errors.password" v-text="form.errors.password"></div>
    </div>
    <div>
    <button type="submit" class="bg-red-500 text-white-500 rounded">Submit</button>
    </div>
   </form>
   </Layout>
</template>

<style scoped>

</style>
