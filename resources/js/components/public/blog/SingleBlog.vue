<template>
   <div>

  <div class="site-content">
<div class="posts">
 
        <div class="post-content">
        <div class="post-image">
            <div>
              <img :src="'/uploadimage/'+singlepost.photo" class="img" alt="Blog photo" height="400px">
              
            </div>
            <div class="post-info flex-row">
              <span v-if="singlepost.admin"><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;{{singlepost.admin.name}}</span>
                <!-- <span v-if="singlepost.user"><i class="fa fa-circle text-gray"></i>&nbsp;&nbsp;{{singlepost.user.name}}</span> -->
                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;{{singlepost.created_at | timeFormat }}</span>
            
    <span v-if="singlepost.category">{{ singlepost.category.cat_name }}</span>
                  
            </div>
        </div>
        <div class="post-title">
            <a href="#">{{ singlepost.title }}</a>
            <p>
                  {{ singlepost.description }}
            </p>
            
        </div>
    </div>
    <hr>
            <div class="comment_box">
              <h2 style="text-align:center;color:#3f4954">Your Comment Here</h2>
              <form role="form" @submit.prevent="addComment()">
                <div class="card-body" style="display: flex;justify-content: center;align-items: center;">
                  <div class="form-group">
                  
    
                     <textarea 
                      style="height: 120px;
                      outline:0;
                     
                      border-radius: 10px;
                 
                      font-size:16px;
                      "
                        v-model="form.comment_body"
                        id="comment_textarea"
                         cols="30" rows="5" 
                        lass="form-control"
                        :class="{ 'is-invalid': form.errors.has('comment_body') }">
                     </textarea>
                     <has-error :form="form" style="text-align:center;" field="comment_body"></has-error> 
                     <p style="text-align:center;color:red">{{this.form.error}}</p>
                  </div>
                  
                </div>
                

              <div class="card-footer" style="display: flex;justify-content: center;align-items: center; padding-top:20px;padding-bottom:20px">
    <button type="submit" style="   
    color: #fff;
    border-radius: 7px;
    background: #3f4954;
    padding: 10px 24px;
    outline:0;
    "
    >
    Submit
    </button>
              </div>
            </form>

           <div class="comment_body" style="width:100%;">
             <div class="comment_inner" style="width:80%;margin:0 auto;">
              <div v-if="allComments.length>0">
              <div style="border-bottom:1px #ccc solid; padding:10px;" class="card" v-for="(comment,index) in allComments" key="comment.id">
                <div class="card-header"><b><i class="fas fa-user text-gray"></i>&nbsp;&nbsp; {{comment.user.name}}</b></div>
                <div class="card-body">
                  <p style="">{{comment.comment_body}}</p>
                </div>

                      <div class="card-body">
 <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;{{singlepost.created_at | timeFormat }}</span>
                </div>
   
              </div>
              </div>
              <div v-else>
                <p style="text-align:center">No comment yet</p>
              </div>
              </div>
            </div>
            
        </div>
 
   </div>
         <BlogSidebar/>
  </div>

   </div>
</template>
<script>

import BlogSidebar from "./BlogSidebar"
export default {

    name:"SinglePost",
         data(){
         return{
             form : new Form({
                 error:'',
                 comment_body:'',
                 post_id:this.$route.params.id,
             })

         }
     },
            components:{
          BlogSidebar,
        },

mounted(){
  // console.log('/blog/'+this.$route.params.id)
   this.SinglePost();
   this.PostComment();

},

computed:{
    singlepost(){
    return this.$store.getters.SinglePost
    },
    allComments(){
      return this.$store.getters.PostComments
    }

},

methods:{
    ourImage(img){
            return "uploadimage/"+img;
        }, 
        SinglePost(){
         this.$store.dispatch("SinglePost",this.$route.params.id)
      },

      addComment(){
                 this.form.post('/addcomment')
         .then((response)=>{
           this.form.comment_body=''
            
             
            toast.fire({
            icon: 'success',
            title: 'comment added'
            })
              this.PostComment();

         })
         .catch(()=>{
     this.form.error='Please login first'
         })
      },
        PostComment(){
         this.$store.dispatch("PostComment",this.$route.params.id)
      },


},

watch:{
    $route(to,from){
        this.SinglePost();
        this.PostComment();
    }
}

}
</script>