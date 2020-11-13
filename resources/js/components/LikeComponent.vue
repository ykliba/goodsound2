<template>
    <div class="container">
        <div class="row justify-content-center mt-1">
            <div class="col-md-12">
                <div>
                    <button @click="unlike()" class="btn btn-danger" v-if="result">
                        いいね解除
                    </button>
                    <button @click="like()" class="btn btn-success" v-else>
                        いいね
                    </button>
                    <p>いいね数：{{ count }}</p>
                </div>
            </div>
        </div>
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
                axios.get('/review/' + this.review.id +'/like')
                .then(res => {
                  this.count = res.data.count;
                }).catch(function(error) {
                    console.log(error);
                });
            },
            unlike() {
                axios.get('/review/' + this.review.id +'/unlike')
                .then(res => {
                  this.count = res.data.count;
                }).catch(function(error){
                    console.log(error);
                });
            },
            countlike() {
                axios.get('/review/' + this.review.id +'/countlike')
                .then(res => {
                    this.count = res.data;
                }).catch(function(error){
                    console.log(error);
                });
            },
            haslike() {
                axios.get('/review/' + this.review.id +'/haslike')
                .then(res => {
                  this.result = res.data;
                }).catch(function(error) {
                    console.log(error);
                });
            }
        }

    }
</script>