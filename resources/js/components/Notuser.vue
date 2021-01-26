<template>
   <div class="like">
     <div v-if="result"   class="like_button"><i class="far fa-thumbs-up fa-2x"></i></div>
     <div  v-else  class="like_button"><i class="fas fa-thumbs-up fa-2x"></i></div>
     <div class="like_count">{{ count }}</div>
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
          this.result = res.data.result;
          this.count = res.data.count;
        }) .catch(function(error) {
             console.log(error);
        });
      },
      unlike() {
        axios.get('/review/' + this.review + '/unlike')
        .then(res => {
          this.result = res.data.result;
          this.count = res.data.count;
        })
        .catch(function(error) {
          console.log(error);
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


