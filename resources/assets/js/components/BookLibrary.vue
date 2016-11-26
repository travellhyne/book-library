<template>
    <div class="container">
        <h1>Rio's Library</h1>
        <div class="list__books">
            <table class="table">
                <thead>
                    <tr>
                        <th>Book #</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Genre</th>
                        <th>Library Section</th>
                        <th>Borrowed</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="book in books">
                        <th>{{book.id}}</th>
                        <td>{{book.title}}</td>
                        <td>{{book.author}}</td>
                        <td>{{book.genre}}</td>
                        <td>{{book.section}}</td>
                        <td>{{ book.borrowed === true || book.borrowed !== '0' ? 'Borrowed': 'Available'}}</td>
                        <td>
                            <router-link :to="'/update/'+book.id">
                                <button class="btn btn-info">Update</button>
                            </router-link>
                        </td>
                        <td>
                            <router-link :to="'/delete/'+book.id">
                                <button class="btn btn-danger">Delete</button>
                            </router-link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <router-link to="/add">
            <button class="btn btn-primary">Add new book</button>        
        </router-link>
        <div class="row">
            <div class="col-lg-6">
                <input type="text" class="form-control" v-model="q">
                <select name="bookSection" id="bookSection" v-model="filterBy">
                    <option value="title">Title</option>
                    <option value="author">Author</option>
                    <option value="section">Library Section</option>
                </select>
                <button class="btn btn-secondary" v-on:click="search">Search</button>
            </div>
        </div>
    </div>
</template>

<script>
    import 'whatwg-fetch';
    import router from '../router';

    export default {
        data: function() {
            return {
                books: [],
                filterBy: 'title'
            };
        },
        mounted() {
            fetch('/api/books')
                .then(response => response.json())
                .then(json => this.books = json);    
        },
        methods: {
            search() {
                router.push({ name: 'search', query: {q: this.q, filterBy: this.filterBy} });
            }
        }
    }
</script>
