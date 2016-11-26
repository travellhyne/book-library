<template>
  <div class="container">
    <h1>Add New Book</h1>
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
    <button class="btn btn-primary" v-on:click="addBook">Add new book</button>
  </div>
</template>

<script>
  import 'whatwg-fetch';
  import router from '../router';
  export default {
    methods: {
      addBook(event) {
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
          fetch('/api/books', {
            method: 'POST',
            body: JSON.stringify(book),
            headers
          }).then(response => router.push({ name: 'home' }))
          .catch(err => alert('Oops. Something went wrong'));
        }
      }
    }
  };
</script>
