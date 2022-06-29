<template>
    <section >
        <h1>Posts</h1>
        <div v-if="posts.length > 0" class="container">
            <!-- <li v-for="(post,index) in posts" :key="post.id" > -->
                <!-- {{index}} - {{post.title}} -->
                <!-- <router-link :to="{ name:'single-post', params:{slug:post.slug} }">Visualizza post</router-link> -->
                <div class="row ">
                    <div class="d-flex flex-wrap g-3 m-b">
                        <div class="card" style="width: 18rem;" v-for="(post,index) in posts" :key="post.id">
                                <!-- <img src="..." class="card-img-top" alt="..."> -->
                                <div class="card-body">
                                    <h5 class="card-title">{{index}} - {{post.title}}</h5>
                                    <router-link :to="{ name:'single-post', params:{slug:post.slug} }">Visualizza post</router-link>
                                    
                                </div>
                        </div>

                    </div>

                </div>
               
            <!-- </li> -->
        </div>
    </section>
</template>

<script>
export default {
    name:'PostsComponent',
    data(){
        return{
            posts: [],
        }
    },
    created(){
        axios.get('/api/posts').then((response)=>{
            this.posts=response.data;

        });
    }
}
</script>

<style lang="scss">
.g-3{
    gap:20px;
}
.m-b{
    margin-bottom: 30px;
}
</style>