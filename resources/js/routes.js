import adminHome from './components/admin/adminHome.vue'
import categoryList from './components/admin/category/index'
import AllUsers from './components/admin/user/index'
import Allsubscribers from './components/admin/subscribed/index'
import categoryCreate from './components/admin/category/create'
import categoryEdit from './components/admin/category/edit'
import postList from './components/admin/post/index'
import postCreate from './components/admin/post/create'
import postEdit from './components/admin/post/edit'
import PublicHome from './components/public/PublicHome.vue'
import BlogPost from './components/public/blog/BlogPost.vue'
import SingleBlog from './components/public/blog/SingleBlog'
import Contact from './components/public/contact/Contact'
import About from './components/public/about/About'
import UserLogin from './components/public/auth/Login'
import UserProfile from './components/public/auth/UserProfile'
import UserRegistration from './components/public/auth/Register'
import AboutList from './components/admin/about/index'
import CreateAbout from './components/admin/about/create'


export const routes = [
  // admin route
  { path: '/admin/about-list', component: AboutList },
  { path: '/admin/about-create', component: CreateAbout },
  { path: '/admin/about', component: adminHome },
    { path: '/admin', component: adminHome },
    { path: '/admin/users', component: AllUsers },
    { path: '/admin/subscriber-list', component: Allsubscribers },
    { path: '/admin/category-list', component: categoryList },
    { path: '/admin/category-create', component: categoryCreate },
    { path: '/admin/category-edit/:categoryid', component: categoryEdit },
    // post route
    { path: '/admin/post-list', component: postList },
    { path: '/admin/post-create', component: postCreate },
    { path: '/admin/post-edit/:postid', component: postEdit },

    // frontend route
    {
      path:'/',
      component:BlogPost
  },
  // {
  //     path:'/blog',
  //     component:BlogPost
  // },

  { 
   path: '/blogg/:id',
   component: SingleBlog
   },

   { 
    path: '/categoryPost/:id',
    component:BlogPost
    },

    { 
    path: '/about',
    component:About
    },
    { 
    path: '/contact',
    component:Contact
    },

    { 
      path: '/userLogin',
      component:UserLogin
      },
      { 
        path: '/userprofile',
        component:UserProfile
        },
    
      { 
        path: '/userRegistration',
        component:UserRegistration
        },
      
  


  ]