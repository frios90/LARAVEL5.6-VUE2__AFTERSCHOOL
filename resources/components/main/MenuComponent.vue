<template>
      
       <nav class="menu-color sidebar sidebar-offcanvas" id="sidebar">
        <ul  class="nav">
          <li v-for="(menu, key) in menus" :key="key" class="nav-item">
            <a class="nav-link" href="#">
              <router-link :to="{ name: menu.path }">
                <i :class="menu.class"></i>
                <span class="menu-title">{{ menu.name }}</span>
              </router-link>
            </a>
          </li>
        </ul>
      </nav> 
   
</template>
<script>
    export default {
        name: 'create-request',
        data () {
            return {               
                // csrf  : document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                // menus : []
            }
        },       
        created() {
        },
        methods: {
          getMenusUserSession () {
                var self = this
                this.$http.get('/get-menus-user-session')
                .then(response => {
                    self.menus    = response.body 
                }, response => {                 
                    self.$toasted.global.APP_GENERAL_ERROR()
                })
          }
        }
    }
</script>
<style>