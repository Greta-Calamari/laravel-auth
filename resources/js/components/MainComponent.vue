<template>
<main class="color-main">
    <router-view>
    </router-view>
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
    // methods:{
    //     getoDetail(slug,index){
    //         axios.get('/api/posts/'+slug).then((response)=>{
    //         console.log(response.data);
    //         this.posts[index].detail = response.data;
    //         console.log(this.posts[index]);
    //     })

    //     }

    // },
    // created(){
    //     axios.get('/api/posts').then((response)=>{
    //         console.log(response.data);
    //         this.posts = response.data;
    //     })
    // }
    
}
</script>


<style lang="scss">


.color-main{
    background-color:#3490dc;
}

</style>