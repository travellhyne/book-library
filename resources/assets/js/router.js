import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import BookLibrary from './components/BookLibrary.vue';
import AddBookForm from './components/AddBookForm.vue';
import UpdateBookForm from './components/UpdateBookForm.vue';
import SearchResults from './components/SearchResults.vue';
import DeleteBook from './components/DeleteBook.vue';

const routes = [
    { path: '/', component: BookLibrary, name: 'home' },
    { path: '/add', component: AddBookForm, name: 'addForm' },
    { path: '/update/:id', component: UpdateBookForm, name: 'updateForm' },
    { path: '/search', component: SearchResults, name: 'search' },
    { path: '/delete/:id', component: DeleteBook, name: 'delete' }
];

const router = new VueRouter({routes});

export default router;
