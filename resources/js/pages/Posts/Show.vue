<script setup>

import { Link , Head} from '@inertiajs/vue3';

const props = defineProps( { post : { type : Object, required : true } } );


watchEffect(() => {
  // runs only once before 3.5
  // re-runs when the "foo" prop changes in 3.5+
  console.log(props)
  console.log(foo)
})
</script>

<template>
        <Head title="Welcome" />

    <div class="flex w-full max-w-screen-lg min-h-screen mx-auto text-primary-black">

        <div class="m-8 sm:m-16">

            <Link class="flex items-center m-8" v-bind:href="'/blog'">

                <p class="text-sm leading-6 truncate" v-text="`< Retour au blog`" />

            </Link>

            <div class="p-8 mb-16 rounded-xl bg-primary-white">

                <div class="flex items-stretch mb-16">

                    <img class="object-cover w-24 rounded-xl" v-bind:src="props.post.image">

                    <h1 class="w-2/3 py-2 ml-4 text-5xl font-bold" v-text="props.post.title" />

                </div>

                <div class="flex items-center mt-4">

                    <p class="text-xs" v-text="`${props.post.time} min - ${props.post.date}`" />

                    <hr class="ml-4 border-solid grow">

                </div>

                <div class="mt-8 text-2xl tracking-wide font-extralight article" v-html="props.post.body" />

            </div>

        </div>

    </div>

</template>
