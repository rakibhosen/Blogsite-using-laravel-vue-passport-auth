<template>
    <div>
            <section class="content pt-5">
      <div class="row">
        <div class="col-12">
          <div class="card">

              
                              <div class="card-header">
          Registered user list
   
            </div>
 

            <!-- /.card-header -->
            <div class="card-body">
              <div v-if=" getAllUsers.data!==undefined &&  getAllUsers.data.length>0">
              <table id="example2" class="table table-bordered table-hover text-center" style="padding-bottom:30px">
                <thead>
                <tr>
                    <th width="10%">Sl No</th>
                    <th width="10%">User Name</th>
                      <th width="10%">Email</th> 
                      <th width="10%">Photo</th>
                  <th width="20%">Action</th>
                </tr>
                </thead>
                <tbody>

     

               <tr v-for="(user, index) in getAllUsers.data" :key="user.id">
                     <td>{{ index+1 }}</td>
                   <td>{{user.name}}</td>

                         
                    <td>{{ user.email}}</td>
                    <td>sdfs</td>
                
                    <td>
                
<button class="btn btn-danger" @click.prevent= "deleteuser(user.id)">Delete</button>

                         
                    </td>

                  </tr>
       


                  </tbody>


              </table>
         <el-pagination       
    background
    @current-change="handleCurrentChange"
    :current-page.sync="currentPage"
    :page-size="getAllUsers.per_page"
    layout="prev, pager, next"
    :total="getAllUsers.total">
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
     this.$store.dispatch("AllUsers",this.currentPage);
  },
  computed:{

    getAllUsers(){
     return this.$store.getters.getUsers;
    }
  },
  methods:{
     ourImage(img){
                return "uploadimage/"+img;
            },
            handleCurrentChange(){
 this.$store.dispatch('AllUsers',this.currentPage);
},

deleteuser(id){
  axios.get('/users/'+id)
     .then((response)=>{
       this.$store.dispatch("AllUsers")
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