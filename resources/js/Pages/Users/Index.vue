<script setup>
import {Link} from '@inertiajs/vue3';
import Layout from '../../Shared/Layout.vue';
import Paginator from '../../Shared/Paginator.vue';
import{ref, watch} from 'vue'
import {router} from '@inertiajs/vue3'
defineProps({
    users: Object,
  });

 let search = ref('')
 watch(search, value=>{
    router.get('/users',{search: value}, {preserveState: true})
 })


</script>

<template>
    <Head>
        <title>Users</title>
        <meta type="description" content="This is the users page">
    </Head>
<Layout>
    <div class="flex justify-between mb-10">
        <div class="flex gap-2 items-center">
   <div class="text-lg font-bold ">Hello Users</div>
   <Link class="font-semibold text-blue-300" href="/create">New User</Link>
   </div>
   <input v-model="search" placeholder="search" class="border px-2">
   </div>
   <div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <tbody class="bg-white divide-y divide-gray-200">
                         <tr  :key="user.id" v-for="user in users.data">
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center">
                <div>
                    <div class="text-sm font-medium text-gray-900">
                       {{ user.name}}
                    </div>
                </div>
            </div>
        </td>

        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <Link :href="`/users/${user.id}/edit`" class="text-indigo-600 hover:text-indigo-900">
                Edit
            </Link>
        </td>
    </tr> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
 <Paginator class="mt-10" :links="users.links"/>
 </Layout>
</template>

<style scoped>

</style>
