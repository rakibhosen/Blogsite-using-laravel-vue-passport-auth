<template>
<div id="sidebar">
  <aside class="sidebar">
                    <div class="category">
                        <h2>Category</h2>
                        <ul class="category-list" v-for="(category,index) in  getallCategories" :key="category.id">
                            <li class="list-items">
                                <router-link :to="`/categoryPost/${category.id}`">{{ category.cat_name }}</router-link>
                                <span>({{ category.posts_count}})</span>
                            </li>
                        </ul>
                    </div>
                    <div class="popular-post">
                        <h2>Popular Post</h2>
                        <div class="post-content" v-for="(post,index) in getSidebarBlogPost">
                            <div class="post-image">
                                <div>
                                     <img :src="'/uploadImage/'+post.photo" alt="blog pic"  class="img" height="150px" >
                                   
                                </div>
                                <div class="post-info flex-row">
                                    <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;January 14,
                                        2019</span>
                              
                                     <span><router-link :to="`/blogg/${post.id}`">{{ post.comments_count }} Comments</router-link></span>
                                </div>
                            </div>

                            <div class="post-title">
                                 <router-link :to="`/blogg/${post.id}`">{{ post.title }}</router-link>
                            </div>
                        </div>
        
                    </div>
                    <div class="newsletter">
                        <h2>Newsletter</h2>
                        <div class="form-element">
                          <form role="form" @submit.prevent="addLetter()">
                            <input type="text" class="input-element" placeholder="Email" name="email" v-model="form.email" required>
                            <button class="btn form-btn">Subscribe</button>
                            </form>
                        </div>
                    </div>
               
</aside>
</div>


</template>
<script>
 import _ from 'lodash'

export default {
           name: "BlogSidebar",
           
         data(){
         return{
             form : new Form({
                 error:'',
                 email:'',
                 
             })

         }
     },
  mounted(){
    this.$store.dispatch("SidebarBlogPost");
     this.$store.dispatch("allCategories");
  
    
  },

  computed:{
    getallCategories(){
     return this.$store.getters.getCategories;
    },

    getSidebarBlogPost(){
        return this.$store.getters.SidebarBlogPost;
    }
  },
    methods:{
     ourImage(img){
        return "uploadimage/"+img;
      },

      addLetter(){
                 this.form.post('/addletter')
         .then((response)=>{
           this.form.email=''
            
             
            toast.fire({
            icon: 'success',
            title: 'Suscribed'
            })
         

         })
         .catch(()=>{

         })
      },


    },


}
</script>