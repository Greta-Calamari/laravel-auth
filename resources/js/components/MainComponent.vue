<template>
<main>
    <h1>Sono il Main</h1>
    <ul>
        <li v-for="(post) in posts" :key="post.id">
            {{post.title}}
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