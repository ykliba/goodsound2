<template>
  <div>
    <button type="button"><i class = "fas fa-thumbs-up fa-2x" @click = "submit(reviewId)"></i></button>
  </div>
</template>

<script>
    export default {
        props: ['reviewId'],
        methods: {
            submit(reviewId) {
              let url = `/review/show/${reviewId}/like`
              axios.post(url)
              .then(response =>{

              })
              .catch(error => {
                alert(error)
              })
            }
        }
    }
</script>