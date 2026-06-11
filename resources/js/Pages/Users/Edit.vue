<script setup>
const props = defineProps({
    user: Object,
})
import {useForm} from '@inertiajs/vue3'

const form = useForm({
    name:props.user.name,
    email:props.user.email
})

let submit = ()=>{
    form.put(`/users/${props.user.id}/update`)
}
</script>

<template>
    
    <section class="flex flex-col gap-10 p-16">
    <div class="font-bold text-red-500 mb-10">Editing User <span class="font-semibold text-blue-500">{{ props.user.name }}</span></div>
    <form class="flex flex-col gap-3 max-w-md mx-auto p-8 rounded border justify-center" @submit.prevent="submit">
    <div class="text-lg font-bold">Edit</div>
    <div class="flex flex-col">
    <label class="font-semibold" for="email">Name</label>
    <input v-model="form.name" class="border" name="name" id="name" placeholder="Enter new name">
    </div>
    <div class="flex flex-col">
    <label class="font-semibold" for="password">Email</label>
    <input v-model="form.email" class="border" name="email" id="email" placeholder="Enter new email">
    </div>
    <div>
    <button type="submit" class="bg-red-500 text-white-500 p-3 rounded">Save Changes</button>
    </div>
   </form>
</section>
</template>