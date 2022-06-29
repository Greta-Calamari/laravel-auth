<template>
    <section v-if="post" class="container">
        <div class="row">
            <div class="card mt-4" style="width: 18rem;">
                
                <img :src="`/storage/${post.image}`" alt="" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{post.title}}</h5>
                    <p class="card-text">{{post.content}}</p>
                    <ul v-if="post.tags">
                        <li v-for="tag in post.tags" :key="tag.id">{{tag.name}}</li>
                    </ul>
                    
                </div>
            </div>
            
        </div>

        <div class="row">
                <form form @submit.prevent='addComment()'>
                        <div class="form-group">
                            <label for="username">Inserisci il nome</label>
                        <input  class="form-control" type="text" v-model="formData.username">
                        </div>
                        <div class="form-group">
                            <label for="content">Inserisci il contenuto</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="formData.content"></textarea>
                        </div>
                        
                        <button  type="submit" class="btn btn-danger">Submit</button>
                </form>

        </div>

                        
        <div v-if='post.comments.length > 0' class="row">
            <div class="mt-4">
                <h4>Commenti:</h4>
                <div v-for='comment in post.comments' :key='comment.id'>
                    {{ comment.username }} : {{comment.content}}
                </div>

            </div>
        </div>
        <!-- <div>
            <form @submit.prevent='addComment()'>
                <label for="username">Inserisci il nome</label>
                <input type="text" v-model="formData.username">

                <label for="content">Inserisci il contenuto</label>
                <textarea type="text" v-model="formData.content"></textarea>
                
                <button type="submit">posta commento</button>
            </form>
        </div> -->



    </section>
</template>

<script>
export default {
    name:'SinglePostComponent',
    data(){
        return{
            post:null,
            formData:{
                username : '',
                content:'',
                post_id : '',

            },
        };
    },
    methods:{
        addComment(){

         
            axios.post('/api/comments',this.formData)
            .then((response)=>{
                console.log(response);
                this.post.comments.push(response.data);

            })
            .catch((error)=>{
                console.log(error);

                
            })

        }

    },
    mounted(){
        const slug = this.$route.params.slug;
        axios.get(`/api/posts/${slug}`).then((response)=>{
            this.post = response.data;
            this.formData.post_id = this.post.id;
        }).catch((error)=> {
            // console.log(error);
            this.$router.push({name:'page-404'});
        })
    }
}
</script>

<style lang="scss">

</style>