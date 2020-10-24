<template>
    <div id="overlay" v-show="showContent" v-on:click="closeModal">
        <div id="content">
            <p>レビューを削除しますか?</p>
            <p><slot></slot></p>
            <div class="delete_button">
                <button class="delete_yes">Yes</button>
                <button class="delete_no" v-on:click="closeModal">No</button>
            </div>
        </div>
    </div>

</template>

<script>
  export default {
    data() {
      showContent: false
    },
    methods:{
      clickEvent: function(){
        this.$emit('from-child')
      },
      openModal: function(){
        this.showContent = true
      },
      closeModal: function(){
        this.showContent = false
      }
    }
  }
</script>

