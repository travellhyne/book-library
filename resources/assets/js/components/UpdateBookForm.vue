<template>
  <div class="container">
    <div class="container" v-if="showForm">
      <h1>Update Book #{{id}}</h1>
      <div class="form-group">
        <label for="bookTitle">Book Title</label>
        <input type="text" id="bookTitle" class="form-control" placeholder="Title" v-model="title">
      </div>
      <div class="form-group">
        <label for="bookAuthor">Book Author</label>
        <input type="text" id="bookAuthor" class="form-control" placeholder="Author" v-model="author">
      </div>
      <div class="form-group">
        <label for="bookGenre">Book Genre</label>
        <input type="text" id="bookGenre" class="form-control" placeholder="Genre" v-model="genre">
      </div>
      <div class="form-group">
        <label for="bookSection">Library Section</label>
        <select name="bookSection" id="bookSection" v-model="section">
          <option value="Fiction">Fiction</option>
          <option value="Circulation">Circulation</option>
          <option value="Periodical Section">Periodical Section</option>
          <option value="General Reference">General Reference</option>
          <option value="Children's Section'">Children's Section</option>
        </select>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="bookBorrowed" id="bookBorrowed" v-model="borrowed"> Book is Borrowed
        </label>
      </div>
      <button class="btn btn-primary" v-on:click="updateBook">Update book</button>
    </div>
    <div class="container" v-else>
      <h1>No such book. <router-link to="/">Go back</router-link></h1>
    </div>
  </div>
</template>

<script>
  import 'whatwg-fetch';
  import router from '../router';
  export default {
    data: function() {
      return {
        id: 0,
        title: '',
        author: '',
        genre: '',
        section: '',
        borrowed: false,
        showForm: false
      };
    },
    methods: {
      updateBook() {
        const title = this.title.trim();
        const author = this.author.trim();
        const genre = this.genre.trim();
        const section = this.section;
        const borrowed = !!this.borrowed;
        if (title.length && author.length && genre.length && section) {
          const book = {title, author, genre, section, borrowed};
          const headers = {
            'Content-Type': 'application/json'
          };
          fetch('/api/books/' + this.id, {
            method: 'PUT',
            body: JSON.stringify(book),
            headers
          }).then(response => router.push({ name: 'home' }))
          .catch(err => alert('Oops. Something went wrong'));
        }
      },
    },
    mounted() {
      const id = this.$route.params.id;
      fetch('/api/books/' + id)
        .then(response => response.json())
        .then(json => {
          console.log(json);
          this.id = json.id;
          this.title = json.title;
          this.author = json.author;
          this.genre = json.genre;
          this.section = json.section;
          this.borrowed = json.borrowed === "0" || !json.borrowed ? false : true;
          this.showForm = true;
        }).catch(err => console.log(err));
    }
  };
</script>
