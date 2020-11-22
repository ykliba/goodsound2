<template>
   <div>
     <button v-if="result" type="button" @click="unlike()" class="btn btn-warning">Liked</button>
     <button  v-else type="button" @click="like()" class="btn btn-outline-warning">Like</button>
     <p>いいね数：{{ count }}</p>
  </div>
 </template>

<script>
  export default {
    props: ['review'],
    data() {
      return {
        count: "",
        result: "false"
      }
    },
    mounted () {
      this.haslike();
      this.countlike();
    },
    methods: {
      like() {
        axios.get('/review/' + this.review + '/like')
        .then(res => {
          this.count = res.data.count;
        }) .catch(function(error) {
             console.log('error');
        });
      },
      unlike() {
        axios.get('/review/' + this.review + '/unlike')
        .catch(function(error) {
          console.log('error');
        });
      },
      countlike() {
        axios.get('/review/' + this.review + '/countlike')
        .then(res => {
          this.count = res.data;
        }).catch(function(error) {
            console.log(error);
        });
      },
      haslike() {
        axios.get('/review/' + this.review + '/haslike')
        .then(res => {
          this.result = res.data;
        }).catch(function(error) {
            console.log(error);
        });
      },

    }
  }
</script>


