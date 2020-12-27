<template>
    <div>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
            <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ AllPosts.total }}</h3>

                <p>Post</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
               <router-link to="/admin/post-list" class="small-box-footer">
              More info 
              <i class="fas fa-arrow-circle-right"></i></router-link>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ AllCategories.length }}</h3>

                <p>Category</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
               <router-link to="/admin/category-list" class="small-box-footer">
              More info 
              <i class="fas fa-arrow-circle-right"></i></router-link>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
               <h3>{{ AllUsers.total }}</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>

              <router-link to="/admin/users" class="small-box-footer">
              More info 
              <i class="fas fa-arrow-circle-right"></i></router-link>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{Letter.total}}</h3>

                <p>All Subscriber</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
              </div>
            </section>
        <!-- /.row -->
        <!-- Main row -->
    </div>
</template>

<script>
export default {
  name:"AdminHome",

  mounted(){
         this.$store.dispatch("allPost",this.currentPage);
         this.$store.dispatch("allCategory");
         this.$store.dispatch("AllUsers",this.currentPage);
          this.$store.dispatch("newsLetter",this.currentPage);                                                                                                             
  },
  computed:{
        Letter(){
     return this.$store.getters.newsLetter;
    },

   AllPosts(){
     return this.$store.getters.getPost;
    },

    AllCategories(){
     return this.$store.getters.getCategory;
    },

   AllUsers(){
     return this.$store.getters.getUsers;
    }

  },

  methods:{

  }
}
</script>

<style scoped>

</style>