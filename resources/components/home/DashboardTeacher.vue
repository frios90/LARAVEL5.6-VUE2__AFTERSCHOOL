<template>
  <div>
    <div class="breadcomb-area" v-if="next_lesson.link_zoom">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="breadcomb-list">
              <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                  <div class="breadcomb-wp">
                   
                    <div class="breadcomb-ctn">
                      <div class="siguiente-clase">
                        <div class="cabeza">
                          Siguiente Clase
                        </div>
                        <div class="zoom">
                          <a target="_blank" :href="next_lesson.link_zoom">
                            <img src="images/zoom.png" class="avatar img-circle" height="30" width="30">
                          </a>                          
                        </div>
                        <div class="hora">
                          {{ next_lesson.since_time }}
                        </div>
                        <div v-for="(alumn, key) of next_lesson.alumn_teacher_lessons" :key="key">
                          <p class="alumno"> <span>{{ alumn.alumn.rut }}</span> | <span>{{ alumn.alumn.name }}</span></p> 
                          <p class="profesional">{{ alumn.alumn.attorney.rut }} | {{ alumn.alumn.attorney.name }}</p> 

                        </div>
                      </div>                       
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>          
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  import axios from "axios"
  import Util from '../mixins/Util.js'
  export default {
      mixins: [Util],
      props: {
        next_lesson: Object
      },
      mounted () {
      }
  }
</script>