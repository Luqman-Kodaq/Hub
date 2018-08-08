import Home from './Home';
// import Admin from './Admin';
import Blogs from './components/Blogs';
import SingleBlog from './components/SingleBlog';
import Login from './components/Login';
import Register from './components/Register';
import About from './components/About';
import Contact from './components/Contact';
import Services from './components/Services';
import Dashboard from './components/Admin/Dashboard';
import Post from './components/Admin/Post';
import ViewPost from './components/Admin/ViewPost';
import EditPost from './components/Admin/EditPost';
import AddPost from './components/Admin/AddPost';
import User from './components/Admin/User';
import AddUser from './components/Admin/AddUser';
import EditUser from './components/Admin/EditUser';
import ViewUser from './components/Admin/ViewUser';
import Category from './components/Admin/Category';
import AddCategory from './components/Admin/AddCategory';
import EditCategory from './components/Admin/EditCategory';
import ViewCategory from './components/Admin/ViewCategory';
import Tag from './components/Admin/Tag';
import AddTag from './components/Admin/AddTag';
import EditTag from './components/Admin/EditTag';
import ViewTag from './components/Admin/ViewTag';
import Profile from './components/Admin/Profile';
import Settings from './components/Admin/Settings';



export const routes = [
  {path: '*', redirect: '/'},
  { 
    path: '/', 
    component: Home, 
    name: 'Home', 
    meta: {
    requiresAuth: false,
    user: true
  } },
  { 
    path: '/blogs', 
    component: Blogs, 
    name: 'Blogs' 
  },
  { 
    path: '/single/:id', 
    component: SingleBlog, 
    name: 'SingleBlog' 
  },
  { 
    path: '/login', 
    component: Login, 
    name: 'Login', 
    meta: {
    requiresGuest: true
} },
  { 
    path: '/register', 
    component: Register, 
    name: 'Register', 
    meta: {
    requiresGuest: true
} },
  { 
    path: '/about', 
    component: About, 
    name: 'About' 
  },
  { 
    path: '/contact', 
    component: Contact, 
    name: 'Contact' 
  },
  { 
    path: '/services', 
    component: Services, 
    name: 'Services' 
  },
  { 
    path: '/admin/post', 
    component: Post, 
    name: 'Post', 
    meta: {
      requiresAuth: true,
      admin: true
  }},
  { 
    path: '/admin/post/show/:id', 
    component: ViewPost, 
    name: 'ViewPost', 
    meta: {
      requiresAuth: true,
      admin: true
  }},
  { 
    path: '/admin/post/edit/:id', 
    component: EditPost, 
    name: 'EditPost', 
    meta: {
      requiresAuth: true,
      admin: true
  }},
  { 
    path: '/admin/post/add', 
    component: AddPost, 
    name: 'AddPost', 
    meta: {
      requiresAuth: true,
      admin: true
  }},
  { 
    path: '/admin', 
    component: Dashboard, 
    name: 'Dashboard', 
    meta: {
      requiresAuth: true,
      admin: true
  }},
  { 
    path: '/admin/user/index', 
    component: User, 
    name: 'User', 
    meta: {
      requiresAuth: true,
      admin: true
  }},
  { 
    path: '/admin/user/add', 
    component: AddUser, 
    name: 'AddUser', 
    meta: {
      requiresAuth: true,
      admin: true
  }},
  { 
    path: '/admin/user/edit/:id', 
    component: EditUser, 
    name: 'EditUser', 
    meta: {
      requiresAuth: true,
      admin: true
  }},
  { 
    path: '/admin/user/show/:id', 
    component: ViewUser, 
    name: 'ViewUser', 
    meta: {
      requiresAuth: true,
      admin: true
  }},
  { 
    path: '/admin/profile', 
    component: Profile, 
    name: 'Profile', 
    meta: {
      requiresAuth: true,
      admin: true
  }},
  { 
    path: '/admin/settings', 
    component: Settings, 
    name: 'Settings', 
    meta: {
      requiresAuth: true,
      admin: true
  }},
  { 
    path: '/admin/category', 
    component: Category, 
    name: 'Category', 
    meta: {
      requiresAuth: true,
      admin: true
  }},
  { 
    path: '/admin/category/show/:id', 
    component: ViewCategory, 
    name: 'ViewCategory', 
    meta: {
      requiresAuth: true,
      admin: true
  }},
  { 
    path: '/admin/category/edit/:id', 
    component: EditCategory, 
    name: 'EditCategory', 
    meta: {
      requiresAuth: true,
      admin: true
  }},
  { 
    path: '/admin/category/add', 
    component: AddCategory, 
    name: 'AddCategory', 
    meta: {
      requiresAuth: true,
      admin: true
  }},
  { 
    path: '/admin/tag', 
    component: Tag, 
    name: 'Tag', 
    meta: {
      requiresAuth: true,
      admin: true
  }},
  { 
    path: '/admin/tag/show/:id', 
    component: ViewTag, 
    name: 'ViewTag', 
    meta: {
      requiresAuth: true,
      admin: true
  }},
  { 
    path: '/admin/tag/edit/:id', 
    component: EditTag, 
    name: 'EditTag', 
    meta: {
      requiresAuth: true,
      admin: true
  }},
  { 
    path: '/admin/tag/add', 
    component: AddTag, 
    name: 'AddTag', 
    meta: {
      requiresAuth: true,
      admin: true
  }},
  ];