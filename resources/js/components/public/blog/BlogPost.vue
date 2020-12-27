<template>
   <div>
  <div class="site-content">
  

  <!-- <div v-if="getBlogPost.data!==undefined && getBlogPost.data.length>0"> -->
<div class="posts">
  <!-- {{ getBlogPost.data }} -->

  <div v-if="getBlogPost.data!==undefined && getBlogPost.data.length>0">
    <div class="post-content"  v-for="(blog, index) in getBlogPost.data" :key="blog.id" v-if="index<4">
        <div class="post-image">
            <div>
                <!-- <img :src="ourImage(blog.photo)" class="img" height="400px" v-bind:alt="blog.photo"> -->
                <img :src="/uploadImage/+blog.photo" class="img"  height="400px">
            </div>
            <div class="post-info flex-row">
                <span v-if="blog.admin"><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;{{blog.admin.name}}</span>
                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;{{blog.created_at | timeFormat }}</span>
                <span><router-link :to="`/blogg/${blog.id}`">{{ blog.comments_count }} Comments</router-link></span>
            </div>
        </div>
        <div class="post-title">
            <a href="#">{{ blog.title }}</a>
            <p>
                  {{blog.description |sortlength(200,"...")}}
            </p>
              <router-link :to="`/blogg/${blog.id}`" class="btn post-btn">Read More &nbsp; <i class="fas fa-arrow-right"></i></i></router-link>
            <!-- <button class="btn post-btn">Read More &nbsp; <i class="fas fa-arrow-right"></i></button> -->
        </div>
            <hr>
    </div>

                <el-pagination       
    background
    @current-change="handleCurrentChange"
    :current-page.sync="currentPage"
    :page-size="getBlogPost.per_page"
    layout="prev, pager, next"
    :total="getBlogPost.total">
</el-pagination>
    </div>
    <div v-else>
      <p style="text-align:center;color:red;">Sorry no post found</p>
    </div>

    
  



</div>
<!-- </div>
       <div v-else>
             <p class="alert alert-info text-center">Sorry no post found</p>
            </div> -->
<div>
    <BlogSidebar/>
</div>
 
  </div>
 
   </div>
</template>

<script>
 import BlogSidebar from "./BlogSidebar"

export default {
        name: "BlogPost",
        data(){
          return{
            currentPage:1,
          }
        },

        components:{
          BlogSidebar,
        },

  mounted(){
     this.$store.dispatch('BlogPost',this.currentPage);
  },


computed:{
getBlogPost(){
return this.$store.getters.BlogPost
},
allComments(){
  return this.$store.getters.PostComments
}
},
methods:{
getAllCategoryPost(){
  if(this.$route.params.id!=null){
     this.$store.dispatch('getCategoryPost',this.$route.params.id,this.currentPage);
  }else{
  this.$store.dispatch('BlogPost');
}

  },
  ourImage(img){
            return "uploadImage/"+img;
        }, 

handleCurrentChange(){
 this.$store.dispatch('BlogPost',this.currentPage);
}

},

watch:{
$route(to,from){
this.getAllCategoryPost();
 }
}

 

}
</script>

<style scoped>
</style>



