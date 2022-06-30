<template>
    <section>
        <h1>{{category.name}}</h1>
        <div class="container" v-if="category && category.postst.length > 0">
            <div class="row ">
                    <div class="d-flex flex-wrap g-3 m-b">
                        <div class="card" style="width: 18rem;" v-for="(post,index) in category.posts" :key="post.id">
                                <!-- <img src="..." class="card-img-top" alt="..."> -->
                                <div class="card-body">
                                    <h5 class="card-title">{{index}} - {{post.title}}</h5>
                                    <router-link :to="{ name:'category', params:{slug:post.slug} }">Visualizza post</router-link>
                                    
                                </div>
                        </div>

                    </div>

                </div>

        </div>
    </section>
</template>

<script>
export default {
    data(){
        return{
            categort:null,
        }
    },
     mounted(){
        const slug = this.$route.params.slug;
        axios.get(`/api/categories/${slug}`).then((response)=>{
            this.category = response.data;
            
        }).catch((error)=> {
            // console.log(error);
            this.$router.push({name:'page-404'});
        })
    }
    
}
</script>

<style lang="scss">

</style>