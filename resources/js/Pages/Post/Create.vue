<template>
    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Create a new post
            </h2>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg p-8">
                    <form class="w-3/4 mx-auto" @submit.prevent="submit">
                        <div class="flex my-4 w-full space-x-5">
                            <label class="w-16 text-sm font-medium text-gray-700 my-auto" for="title">Title</label>
                            <input class="w-1/2 text-sm font-medium text-gray-700 my-auto" type="text" id="title" v-model="form.title" />
                        </div>
                        <div class="flex my-4 w-full space-x-5">
                            <label class="w-16 text-sm font-medium text-gray-700 my-auto" for="body">Body</label>
                            <textarea class="w-1/2 text-sm font-medium text-gray-700 my-auto" id="body" v-model="form.body"></textarea>
                        </div>
                        <button class="inline-block mx-20 my-4 px-4 py-2 mb-4 text-white bg-green-800 rounded hover:bg-green-600 transition" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
  </template>
  
  <script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { onMounted } from "vue";
    import { useForm } from "@inertiajs/vue3";

    const props = defineProps({
        post: {
            type: Object,
            default: null
        },
        isUpdating: {
            type: Boolean,
            default: false
        }
    });
    const form = useForm({
        title: "",
        body: "",
    });
    const submit = () => (props.isUpdating ? updatePost() : addPost());
    const addPost = () => form.post("/posts");
    const updatePost = () => form.patch(`/posts/${props.post.id}`);

    onMounted(() => {
        if (props.post) {
            form.title = props.post.title;
            form.body = props.post.body;
        }
    })
  </script>
  <style lang="scss" scoped></style>