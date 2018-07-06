import Home from './Home';
import Blogs from './components/Blogs';
import SingleBlog from './components/SingleBlog';
import Login from './components/Login';
import Register from './components/Register';

export const routes = [
  { path: '/', component: Home, name: 'Home' },
  { path: '/blogs', component: Blogs, name: 'Blogs' },
  { path: '/login', component: Login, name: 'Login' },
  { path: '/register', component: Register, name: 'Register' },
  { path: '/:slug', component: SingleBlog, name: 'SingleBlog' }
];