<template>
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <h2 class="md:text-6xl text-4xl text-black dark:text-white font-bold mb-4 text-center">Wally's Widgets</h2>
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6">
                    <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs"
                                                                         class="underline text-gray-900 dark:text-white">Calculator</a>
                    </div>
                    <div class="ml-12">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                            <form class="w-full max-w-sm" @submit.prevent="submit">
                                <div class="md:flex md:items-center mb-6">
                                    <div class="md:w-1/3">
                                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                               for="inline-amount">
                                            Widgets to send </label>
                                    </div>
                                    <div class="md:w-2/3">
                                        <input
                                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                            id="inline-amount" type="number"
                                            v-model="form.amount">
                                        <div v-if="errors.amount">{{ errors.amount }}</div>

                                    </div>
                                </div>
                                <div class="md:flex md:items-center">
                                    <div class="md:w-1/3"></div>
                                    <div class="md:w-2/3">
                                        <button
                                            class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                            type="submit">
                                            Send
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg" v-if="packs">
                <div class="p-6">
                    <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs"
                                                                         class="underline text-gray-900 dark:text-white">Results</a>
                    </div>
                    <div class="ml-12">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                            <div class="md:flex md:items-center mb-6">
                                <div class="md:w-1/3">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                           for="inline-amount">
                                        Packs </label>
                                </div>
                                <div class="md:w-2/3">
                                    <ul>
                                        <li v-for="(count, packsize) in packs">
                                            Size: {{packsize}} x {{count}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import {reactive} from 'vue'
import {Inertia} from '@inertiajs/inertia'

export default {
    props: {
        amount: Number,
        packs: Object,
        errors: Object,
    },

    setup() {
        const form = reactive({
            amount: 0,
        })

        function submit(event) {
            event.preventDefault();
            Inertia.post('/', form)
        }

        return {form, submit}
    },
}
</script>
<style scoped>

</style>
