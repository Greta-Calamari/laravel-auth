<template>
    <section class="container">
        <button @click="addtoCart(posts[0].title)">aggiungi al carrello</button>
        <div class="card" v-if="carrello">
            {{carrello.nomeprodotto}} : euro {{carrello.prezzo}}
        </div>
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

                <div id="app">
                    <agile>
                        <div class="slide" v-for="(post,index) in posts" :key="index" :class="`slide--${index}`">
                        <img :src="`/storage/${post.image}`" class="img-fluid" :alt="post.title">
                        <h3>{{ post.title }}</h3>
                        </div>
                        <template slot="prevButton"><i class="fas fa-chevron-left"></i></template>
                        <template slot="nextButton"><i class="fas fa-chevron-right"></i></template>
                    </agile>
                </div>
            </div>

        </div>
        
    </section>
</template>

<script>
import {VueAgile} from 'vue-agile';
export default {
    name:'HomeComponent',
    components:{
        agile:VueAgile
    },
    data(){
        return{
            categories:[],
            posts:[],
            carrello:null,
        }
    },
    methods:{
        addtoCart(prodotto,price = 300){
            window.localStorage.setItem('nomeprodotto', prodotto);
            window.localStorage.setItem('prezzo', price);
            this.carrello = {nomeprodotto: prodotto,prezzo:price}

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
        this.carrello = {nomeprodotto: window.localStorage.getItem('nomeprodotto'), prezzo :window.localStorage.getItem('prezzo') }
        

    }
}
</script>

<style lang="scss">
li{
    list-style: none;
    line-height: 40px;
}

#app {
  display: flex;
  font-family: "Lato", sans-serif;
  font-weight: 300;
  margin: 0 auto;
  max-width: 900px;
  padding: 30px;
}

.agile {
  width: 100%;
}
.agile__actions {
  margin-top: 20px;
}
.agile__nav-button {
  background: transparent;
  border: none;
  color: #ccc;
  cursor: pointer;
  font-size: 24px;
  transition-duration: 0.3s;
}
.agile__nav-button:hover {
  color: #888;
}
.agile__dot {
  margin: 0 10px;
}
.agile__dot button {
  background-color: #eee;
  border: none;
  border-radius: 50%;
  cursor: pointer;
  display: block;
  height: 10px;
  font-size: 0;
  line-height: 0;
  margin: 0;
  padding: 0;
  transition-duration: 0.3s;
  width: 10px;
}
.agile__dot--current button, .agile__dot:hover button {
  background-color: #888;
}

.slide {
  align-items: center;
  color: #fff;
  display: flex;
  height: 300px;
  justify-content: center;
}
.slide h3 {
  font-size: 32px;
  font-weight: 300;
}

// .slide--1 {
//   background-color: #f1c40f;
// }

// .slide--2 {
//   background-color: #e67e22;
// }

// .slide--3 {
//   background-color: #e74c3c;
// }

// .slide--4 {
//   background-color: #9b59b6;
// }

// .slide--5 {
//   background-color: #3498db;
// }

// .slide--6 {
//   background-color: #2ecc71;
// }
</style>