<template>
  <div class="container">
    <h1>Search result</h1>
    <div class="list__books" v-if="showResults">
      <table class="table">
        <thead>
          <tr>
            <th>Book #</th>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Library Section</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="book in books">
            <th>{{book.id}}</th>
            <td>{{book.title}}</td>
            <td>{{book.author}}</td>
            <td>{{book.genre}}</td>
            <td>{{book.section}}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="no-results" v-else>
      <h2>Found nothing</h2>
    </div>
    <div class="container">
      <h4>
        <router-link to="/">Go Back</router-link>
      </h4>
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
        showResults: false
      };
    },
    mounted() {
      const url = '/api/search';
      const q = this.$route.query.q;
      const filterBy = this.$route.query.filterBy;
      const query = {
        q: q.trim(),
        filterBy: filterBy
      };
      const params = Object.keys(query)
        .map((key) => encodeURIComponent(key) + "=" + encodeURIComponent(query[key]))
        .join("&")
        .replace(/%20/g, "+");
      fetch(url + '?' + params)
        .then(response => response.json())
        .then(json => {
          this.books = json;
          this.showResults = true;
        });
    }
  };
</script>
