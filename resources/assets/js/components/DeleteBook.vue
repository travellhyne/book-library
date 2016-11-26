<template>
  <div class="container">
    <h1>Confirm delete?</h1>
    <div class="row">
      <button class="btn btn-default" v-on:click="goBack">No</button>
      <button class="btn btn-danger" v-on:click="delete">Yes</button>
    </div>
  </div>
</template>

<script>
  import 'whatwg-fetch';
  import router from ../router;
  export default {
    methods: {
      goBack() {
        router.push({name: 'home'});
      }
    }
  };
</script>
