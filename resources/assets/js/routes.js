import Home from './Home';
import Blogs from './components/Blogs';
import SingleBlog from './components/SingleBlog';
import Login from './components/Login';
import Register from './components/Register';
import Admin from './components/Admin';
import About from './components/About';
import Contact from './components/Contact';
import Services from './components/Services';

export const routes = [
  { path: '/', component: Home, name: 'Home' },
  { path: '/blogs', component: Blogs, name: 'Blogs' },
  { path: '/login', component: Login, name: 'Login' },
  { path: '/register', component: Register, name: 'Register' },
  { path: '/:id', component: SingleBlog, name: 'SingleBlog' },
  { path: '/admin', component: Admin, name: 'Admin', meta: {
      requiresAuth: true,
      is_admin: true
  } },
  { path: '/admin/:page', component: Admin, name: 'admin-pages', meta: {
    requiresAuth: true,
    is_admin: true
} },
  { path: '/about', component: About, name: 'About' },
  { path: '/contact', component: Contact, name: 'Contact' },
  { path: '/services', component: Services, name: 'Services' }
];