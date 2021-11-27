<template>      
  <div class="header-top-area">
    <div class="container">              
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <a class="neo-salir" @click="logOut()">
          salir
        </a>          
      </div>
     
  </div>
</div>
</template>
<script>
    import Util from '../mixins/Util.js'
    export default {
        mixins: [Util],
        data () {
            return {               
            }
        },       
        created() {
        },
        methods: {
          logOut(){
              var data =  {
                _token: this.csrf
              }
              var self = this  
              this.$http.post('/log-out', data)
              .then(function(response){
                location.href = window.location
            })           
            
          }
        }
    }
</script>
<style>