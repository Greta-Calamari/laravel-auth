<template>
    <section class="container">
        <div class="row">
            <div class="col-3 p-3">
                <nav>
                    <ul>
                        <li v-for="(category,index) in categories" :key='index'>

                           <router-link :to="{ name:'category', params:{slug:category.slug} }">{{category.name}}</router-link>
                           
                        </li>

                    </ul>
                </nav>

            </div>
            <div class="col-9">

                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" v-for="post in posts" :key="post.id">
                            <img :src="`/storage/${post.image}`" class="d-block w-100" alt="...">
                            </div>
                            
                        </div>
                        <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </button>
                </div>

            </div>
        </div>
        
    </section>
</template>

<script>
export default {
    name:'HomeComponent',
    data(){
        return{
            categories:[],
            posts:[],
        }
    },
    mounted(){
        axios.get('/api/categories').then((res)=>{
            this.categories = res.data;
        }).catch((error)=>{
            console.log(error);

        });
        axios.get('/api/posts/').then((res)=>{
            this.posts = res.data.slice(0,3);
        }).catch((error)=>{
            console.log(error);

        });

    }
}
</script>

<style lang="scss">
li{
    list-style: none;
    line-height: 40px;
}

</style>