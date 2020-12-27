<template>
    <div>
            <section class="content pt-5">
      <div class="row">
        <div class="col-10 offset-1">
          <div class="card">
                <div class="card-header">
                  <p class="text-right">
                <router-link to="/admin/About-create" class="btn btn-primary">
                <span>Add About</span>
                </router-link>
                  </p>
   
            </div>
              
              
 
        
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
  
                  <th>Sl No</th>
                  <th>About us</th>
                
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <tr v-for="(About,index) in  getAbout" :key="About.id">
                    <td>{{ index+1 }}</td>
                    <td>{{ About.about_us |sortlength(25,"...") }}</td>
    
                    <td>
                       <button class="btn btn-danger" @click.prevent="deleteAbout(About.id)">Delete</button>
                    </td>
                  </tr>
                  </tbody>
              </table>
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
  mounted(){
     this.$store.dispatch("AboutList");
  },
  computed:{

    getAbout(){
     return this.$store.getters.getAbout;
    }
  },
  methods:{

deleteAbout(id){
  axios.get('/about-delete/'+id)
      .then((response)=>{
   this.$store.dispatch("AboutList")
            toast.fire({
            icon: 'success',
            title: 'About deleted successfully'
      })
      });
}
  }
}
</script>