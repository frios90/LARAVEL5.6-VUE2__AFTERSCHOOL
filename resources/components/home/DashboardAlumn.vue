
 <template>
  <div>
      <div class="breadcomb-area">
        <div class="container">
          <div class="row">
            <div v-for="(alumn, key) of next_lesson" :key="key"  class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <div class="breadcomb-list">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-wp">
                      <div class="breadcomb-icon">
                        <img src="images/zoom.png" class="avatar img-circle" height="30" width="30">
                      </div>
                      <div class="breadcomb-ctn">
                        <span>{{alumn.name}}</span><br>
                        <span v-if ="alumn.teacher_lessons[0]">
                          <span>Siguiente clase comienza a las:</span> 
                          <span>  {{alumn.teacher_lessons[0].since_time }} </span>
                        </span>
                        <span v-else>
                          <span></span>                           
                          <span> Aún no hay clase Activa </span>
                        </span>
                        
                        <br>
                        <span v-if ="alumn.teacher_lessons[0]">
                          <span >Para entrar presiona </span>
                          <span>
                              <a target="_blank" :href="alumn.teacher_lessons[0].link_zoom">AQUI</a>
                          </span>
                        </span>
                        <div>
                        
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
        next_lesson: Array
      },
      mounted () {
       
      }
  }
</script>