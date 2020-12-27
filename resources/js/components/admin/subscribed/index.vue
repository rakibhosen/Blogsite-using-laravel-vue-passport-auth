<template>
    <div>
            <section class="content pt-5">
      <div class="row">
        <div class="col-12">
          <div class="card">

              
                              <div class="card-header">
          All Subscriber
   
            </div>
 

            <!-- /.card-header -->
            <div class="card-body">
              <div v-if=" newsLetters.data!==undefined &&  newsLetters.data.length>0">
              <table id="example2" class="table table-bordered table-hover text-center" style="padding-bottom:30px">
                <thead>
                <tr>
                    <th width="10%">Sl No</th>
          
                      <th width="10%">Email</th> 
         
                  <th width="20%">Action</th>
                </tr>
                </thead>
                <tbody>

     

               <tr v-for="(letter, index) in newsLetters.data" :key="letter.id">
                     <td>{{ index+1 }}</td>
 

                         
                    <td>{{ letter.email}}</td>
        
                
                    <td>
                
<button class="btn btn-danger" @click.prevent= "deleteLetter(letter.id)">Delete</button>

                         
                    </td>

                  </tr>
       


                  </tbody>


              </table>
         <el-pagination       
    background
    @current-change="handleCurrentChange"
    :current-page.sync="currentPage"
    :page-size=" newsLetters.per_page"
    layout="prev, pager, next"
    :total=" newsLetters.total">
</el-pagination>
                         </div>
                               <div v-else>
      <p class="alert alert-danger text-center">Sorry no post found</p>
    </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
          </div>

        </section>

    </div>
</template>

<script>
export default {
  name:"List",
          data(){
          return{
            currentPage:1,
          }
        },
  mounted(){
     this.$store.dispatch("newsLetter",this.currentPage);
  },
  computed:{

    newsLetters(){
     return this.$store.getters.newsLetter;
    }
  },
  methods:{
 
            handleCurrentChange(){
 this.$store.dispatch('newsLetter',this.currentPage);
},

deleteLetter(id){
  axios.get('/deleteLetter/'+id)
     .then((response)=>{
       this.$store.dispatch("newsLetter")
       toast.fire({
         icon:'success',
         title:'User deleted successfully'
       })
     })
}
  }
}
</script>

<style scoped>

</style>