<template>
  <div>
    <div class="breadcomb-area">
      <div v-if="loader" class="loader"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="breadcomb-list">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="breadcomb-wp">
                    <div class="breadcomb-icon">
                      <img src="images/fondos/LOGO1.png" alt="Smiley face" height="130" width="130">
                    </div>
                    <div class="breadcomb-ctn">
                      <h2> {{ welcome(user_session.genere) }} {{ user_session.name }}</h2>
                   
                    </div>
                  </div>
                </div>                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <dash-admin v-if="allowed.d_admin.status" ></dash-admin>  
    <dash-teacher v-if="allowed.d_teacher.status" :next_lesson="next_lesson"></dash-teacher>  
    <dash-alumn v-if="allowed.d_alumn.status" :next_lesson="next_lesson"></dash-alumn>  

  </div>
</template>
<script>
  import axios from "axios"
  import Util from '../mixins/Util.js'
  export default {
      mixins: [Util],
      data () {
          return { 
            next_lesson: {}               
          }
      },       
      created() {
        this.getUserSession()
        this.getNextClass()
      },
      methods: {
        welcome (genere) {
          if (genere == 'male') {
            return 'Bienvenido '
          } else {
            return 'Bienvenida '
          }
        },        
        async getNextClass() {         
            var self = this           
            await axios.get("/getNextClass")
            .then(response => {
              var select_response = response.data
              if (this.allowed.d_teacher) {
                if(!response.data) {
                  var select_response = {}
                }
              } 
              self.next_lesson = select_response
              self.loader      = false
            })
            .catch(error => {
                self.toastError('A surgido un problema. Comuníquese con Soporte.')
            }) 
        },
      }
  }
</script>