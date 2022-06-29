<template>
<header>
    
        <!-- <li><a href="/">Home</a></li>
        <li> <a href="/admin">Area riservata</a> </li> -->

        <nav class="navbar navbar-expand-lg ">
                <!-- <a class="navbar-brand" href="">Boolpress</a> -->
                <!-- <router-link :to="{name:menuItem[0].routeName}" class="navbar-brand">{{menuItem[0].label}}</router-link> -->

               <a href="" class="navbar-brand">
                <img src="https://media-exp1.licdn.com/dms/image/C4D0BAQErbNlWeMNGDQ/company-logo_200_200/0/1600963347198?e=2147483647&v=beta&t=iCT0IsyKEFzWfD8UVakBIw2gnvexl22-hSCUT-HTLn4" alt="" class="w-img">
                Boolpress
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <div v-for="(item,index) in menuItem" :key="index">

                            

                            <router-link :to="{name:item.routeName}" class="nav-link a-">{{item.label}} </router-link>


                        </div>
                        
                    </div>
                    <span>
                        <a class="nav-link " href="/admin">Area Riservata</a>
                    </span>
                </div>
        </nav>

        
    
    

    
</header>
    
</template>

<script>
export default {
    name:'HeaderComponent',
    data(){
        return{
            menuItem:[
                {
                    label:'Home',
                    routeName:'home',
        
                },
                {
                    label:'Posts',
                    routeName:'posts',
        
                },
                {
                    label:'Chi Siamo',
                    routeName:'about',
        
                },
                {
                    label:'Contatti',
                    routeName:'contact',
        
                },
                
        
            ],

        }
    }
    
}
</script>


<style lang="scss" >

nav{
    background-color: #00152f !important;
}


.router-link-exact-active{
    color:white !important;
}

span a{
    color: rgba(255, 255, 255, 0.612);
}
.a-{
    color: rgba(255, 255, 255, 0.612);

}

.w-img{
    width: 20%;
}

</style>