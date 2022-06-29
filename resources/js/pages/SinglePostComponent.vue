<template>
    <section v-if="post">
        <div>
           <h1>{{post.title}}</h1>
           <p>{{post.content}}</p>
           <ul v-if="post.tags">
              <li v-for="tag in post.tags" :key="tag.id">{{tag.name}}</li>
           </ul>
           <img :src="`/storage/${post.image}`" alt="">
            
        </div>
        
        <div>
            <form @submit.prevent='addComment()'>
                <label for="username">Inserisci il nome</label>
                <input type="text" v-model="formData.username">

                <label for="content">Inserisci il contenuto</label>
                <textarea type="text" v-model="formData.content"></textarea>
                
                <button type="submit">posta commento</button>
            </form>
        </div>
        <div v-if='post.comments.lenght > 0'>
            <h4>Commenti:</h4>
            <div v-for='comment in post.comments' :key='comment.id'>
                {{ comment.username }} : {{comment.content}}
            </div>
        </div>



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
            this.formData.post_id=this.post_id;
        }).catch((error)=> {
            // console.log(error);
            this.$router.push({name:'page-404'});
        })
    }
}
</script>

<style lang="scss">

</style>