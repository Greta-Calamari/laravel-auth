<template>
<main>
    <h1>Sono il Main</h1>
    <ul>
        <li v-for="(post) in posts" :key="post.id">
            {{post.title}}
            <a href="#" @click="getoDetail(post.slug)">Vedi Dettaglio</a>
            <span v-if="detail">
                {{detail.slug}}
            </span>
        </li>
    </ul>
</main>
    
</template>

<script>
export default {
    name:'MainComponent',
    data(){
        return{
            posts:[],
            detail:null,
        }
    },
    methods:{
        getoDetail(slug){
            axios.get('/api/posts/'+slug).then((response)=>{
            console.log(response.data);
            this.detail = response.data;
        })

        }

    },
    created(){
        axios.get('/api/posts').then((response)=>{
            console.log(response.data);
            this.posts = response.data;
        })
    }
    
}
</script>


<style lang="scss">

</style>