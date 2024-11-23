<template>
    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                My Inertia CRUD
            </h2>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg p-8">
                    <Link class="inline-block px-4 py-2 mb-4 text-white bg-blue-500 rounded hover:bg-blue-600 transition" href="posts/create">Create new Post</Link>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th v-for="header in headers" :key="header" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ header }}
                                </th>
                                <th class="py-3 mx-auto" colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="post in posts" :key="post.id" class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-900">{{ post.title }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ post.body }}</td>
                                <td class="px-6 py-4 text-sm"><Link class="text-indigo-600 hover:text-indigo-900" :href="`posts/${post.id}/edit`">Edit</Link></td>
                                <td class="px-6 py-4 text-sm"><button class="text-red-600 hover:text-red-900" @click="deletePost(post.id)">Delete</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
  </template>
  
  <script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Link, useForm } from "@inertiajs/vue3";
  defineProps({
    posts: {
      type: Array,
      default: () => [],
    },
  });
  
  const headers = ["posts", "body"];

  const form = useForm({});

  const deletePost = (id) => {
    form.delete(`posts/${id}`)
  };
  </script>