<template>


<div v-for="(post, key) in posts" :key="key">
    <div  class="max-w-2xl m-5 px-8 py-4 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800">
        <div class="flex items-center justify-between">
            <span class="text-sm font-light text-gray-600 dark:text-gray-400">{{post.created_at}}</span>
<!--            <a class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-200 transform bg-gray-600 rounded cursor-pointer hover:bg-gray-500">Design</a>-->
        </div>

        <div class="mt-2">
            <a href="#" class="text-2xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200 hover:underline">{{ post.title }}</a>
            <p class="mt-2 text-gray-600 dark:text-gray-300">{{ post.body }}</p>
        </div>

        <div class="flex items-center justify-between mt-4">
<!--            <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Read more</a>-->

<!--            <div class="flex items-center">-->
<!--                <img class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block" src="https://images.unsplash.com/photo-1502980426475-b83966705988?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=40&q=80" alt="avatar">-->
<!--                <a class="font-bold text-gray-700 cursor-pointer dark:text-gray-200">Khatab wedaa</a>-->
<!--            </div>-->
        </div>
    </div>
</div>
<div v-if="posts" class="w-50 flex space-x-4 align-content-around">
        <button class="ml-16 mb-2 px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md dark:bg-gray-800 hover:bg-blue-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700" @click="previousPage(page)">Go back</button>
        <button class="mr-16 mb-2 px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md dark:bg-gray-800 hover:bg-blue-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700" @click="nextPage(page)">Load More</button>
</div>

</template>

<script>


export default {
    name:"Home",
    components:{

    },
    data(){
        return {
            posts: {

            },
            page: 1,
        }
    },
    mounted(){
        axios.get(`/api/posts?page=${this.page}`).then(({data})=>{
            this.posts = data.data
        }).catch(({ response })=>{
            console.error(response)
        })
    },
    methods:{
        nextPage(currentPage){
            this.page = currentPage + 1
            this.posts = null
            axios.get(`/api/posts?page=${this.page}`).then(({data})=>{
                this.posts = data.data
            }).catch(({ response })=>{
                console.error(response)
            })
        },
        previousPage(currentPage){
            this.page = currentPage - 1
            this.posts = null
            axios.get(`/api/posts?page=${this.page}`).then(({data})=>{

                this.posts = data.data
            }).catch(({ response })=>{
                console.error(response)
            })
        }
    }
}
</script>
