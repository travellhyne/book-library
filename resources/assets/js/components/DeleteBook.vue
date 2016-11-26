<template>
  <div class="container">
    <h1>Confirm delete?</h1>
    <div class="row">
      <button class="btn btn-default" v-on:click="goBack">No</button>
      <button class="btn btn-danger" v-on:click="deleteBook">Yes</button>
    </div>
  </div>
</template>

<script>
  import 'whatwg-fetch';
  import router from '../router';
  export default {
    methods: {
      goBack() {
        router.push({name: 'home'});
      },
      deleteBook() {
        const id = this.$route.params.id;
        fetch('/api/delete/' + id, { method: 'DELETE' })
          .then(response => router.push({name: 'home'}));
      }
    }
  };
</script>
