export default{
    state:{
        category:[],
        post:[],
        BlogPost:[],
        SinglePost:[],
        categories:[],
        comments:[],
        SidebarBlogPost:[],
        AllUsers:[],
        newsLetter:[],
        AuthUser:'',
        about:[],
        AboutUs:[],
    },
    getters:{
        getCategory(state){
            return state.category
        },
        getCategories(state){
          return state.categories
      },
        getPost(state){
          return state.post
        },
        BlogPost(state){
          return state.BlogPost
        },
        SinglePost(state){
          return state.SinglePost
        },
        PostComments(state){
          return state.comments;
        },
        SidebarBlogPost(state){
          return state.SidebarBlogPost;
        },
        getUsers(state){
          return state.AllUsers;
        },
        AuthUser(state){
          return state.AuthUser;
        },
        newsLetter(state){
          return state.newsLetter;
        },
        getAbout(state){
          return state.about;
        },
        AboutUs(state){
          return state.AboutUs;
        }
        
        
        
    },

    actions:{ 

      AboutUs(contex){
        axios.get('/getabout')
        .then((response)=>{
          console.log('about',response.data.data)
          contex.commit('AboutUs',response.data.data);
        })
    },
      AboutList(contex){
        axios.get('/about-list')
        .then((response)=>{
          console.log('about',response.data.data)
          contex.commit('about',response.data.data);
        })
    },

      newsLetter(contex,payload){
        axios.get('/allsubscribe/?page='+payload)
        .then((response)=>{
          console.log('newsletter',response.data.data)
          contex.commit('newsLetter',response.data.data)
        })
       },
      AuthUser(contex){
        axios.get('/userinfo')
        .then((response)=>{
          console.log('authUser',response.data.data)
          contex.commit('AuthUser',response.data.data);
        })
    },
        allCategory(contex){
            axios.get('/category')
            .then((response)=>{
              contex.commit('category',response.data.data);
            })
        },
        allCategories(contex){
          axios.get('/categories')
          .then((response)=>{
            contex.commit('categories',response.data.data);
          })
      },

        allPost(contex,payload){
         axios.get('/post/?page='+payload)
         .then((response)=>{
           contex.commit('posts',response.data.data)
         })
        },

        SidebarBlogPost(contex){
          axios.get('/sidebarblogpost')
          .then((response)=>{
            console.log('sidebar',response.data.data)
            contex.commit('SidebarBlogPost',response.data.data)
          })
         },

       BlogPost(contex,payload){
          axios.get('/blog/?page='+payload)
          .then((response)=>{
            console.log('blogbycat',response.data.data)
            contex.commit('BlogPost',response.data.data)
          })
         },

         SinglePost(contex,payload){
          axios.get('/blog/'+payload)
          .then((response)=>{
            console.log(response.data.data);
            contex.commit('SinglePost',response.data.data)
          })
         },

         getCategoryPost(contex,payload,page){
          axios.get('/categorypost/'+payload+'/?page='+page)
          .then((response)=>{
            console.log('category',response.data.data);     
            contex.commit('categoryPost',response.data.data)
          })
         },

         RealSearch(contex,payload){
          axios.get('/search?s='+payload)
          .then((response)=>{
            console.log(response.data.data);
            contex.commit('RealSearch',response.data.data)
          })
         },

         PostComment(contex,payload){
          axios.get('/postcomment/'+payload)
          .then((response)=>{
            console.log('allcomment',response.data.data)
            contex.commit('comments',response.data.data)
          })
         },

         AllUsers(contex,payload){
          axios.get('/users/?page='+payload)
          .then((response)=>{
            console.log('all users',response.data.data)
            contex.commit('AllUsers',response.data.data)
          })
         },
    },

    mutations:{
      category(state,data){
        return state.category = data;
      },
      categories(state,data){
        return state.categories = data;
      },

      posts(state,data){
        return state.post = data
      },
      BlogPost(state,data){
        return state.BlogPost = data
      },
      SidebarBlogPost(state,data){
        return state.SidebarBlogPost = data
      },
      SinglePost(state,data){
        return state.SinglePost= data;
      },
      categoryPost(state,data){
        return  state.BlogPost = data;
      },
      RealSearch(state,data){
        return  state.BlogPost = data;
      },
      comments(state,data){
        return state.comments = data
      },

      AllUsers(state,data){
        return state.AllUsers = data
      },
      AuthUser(state,data){
        return state.AuthUser = data
      },
      newsLetter(state,data){
        return state.newsLetter = data
      },
      about(state,data){
        return state.about = data
      },
      AboutUs(state,data){
        return state.AboutUs = data
      },

    }
    
    
}