<template >
  <div class="normal-table-area">
    <div v-if="loader" class="loader"></div>      
    <div>
      <div class="collapse" id="collapseLessons">
        <div class="breadcomb-area">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list breadcomb-list-schedule">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="cmp-tb-hd">
                        <h2>Planificación de Clases para el día {{ selected_day | dateInverted }}</h2>
                        <p
                          class="subtitle"
                        >En este formulario podrás planificar las clases de un docente.</p>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class="breadcomb-report">
                        <a href="#" class>
                          <img src="images/disquete.png" title="Guardar Clase" class="pointer" width="40" hitght="40" @click="postLesson()" />
                        </a>
                        <a href="#" class>
                          <img src="images/boton-x.png" alt="Avatar" class="pointer" width="40" hitght="30" data-toggle="collapse" data-target="#collapseLessons" @click="closeFormSchedule()" />
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class>Tema:</label>
                        <select v-model="subject" class="form-control">
                          <option value>Seleccione</option>
                          <option
                            v-for="(subject, key) of subjects"
                            :key="key"
                            :value="subject"
                          >{{ subject.name }}</option>
                        </select>
                        <span class="errors" v-if="errors && errors.subject">{{errors.subject[0] }}</span>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class>Docente:</label>
                        <select v-model="teacher" class="form-control">
                          <option value>Seleccione</option>
                          <option
                            v-for="(teacher, key) of teachers"
                            :key="key"
                            :value="teacher"
                          >{{ teacher.name }}</option>
                        </select>
                        <span class="errors" v-if="errors && errors.teacher">{{errors.teacher[0] }}</span>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class>Zoom Link:</label>
                        <input v-model="zoom_link" type="text" class="form-control" />
                        <span
                          class="errors"
                          v-if="errors && errors.zoom_link"
                        >{{errors.zoom_link[0] }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class>Inicio:</label>
                        <input v-model="since" type="time" class="form-control" />
                        <span class="errors" v-if="errors && errors.since">{{errors.since[0] }}</span>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class>Fin:</label>
                        <input v-model="until" type="time" class="form-control" />
                        <span class="errors" v-if="errors && errors.until">{{errors.until[0] }}</span>
                      </div>
                    </div>
                  </div>

                  



                  <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class>Aprendices:</label>
                        <select v-model="alumn" class="form-control">
                          <option value>Seleccione</option>
                          <option
                            v-for="(alumn, key) of alumns"
                            :key="key"
                            :value="alumn"
                          >
                           [ edad: {{ getAge( alumn.birthdate ) }} ] {{ alumn.name }} [ {{ alumn.rut }} ] 
                          
                          </option>
                        </select>
                        <span
                          class="errors"
                          v-if="errors && errors.lesson_alumns"
                        >{{errors.lesson_alumns[0] }}</span>
                      </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                      <div class>
                        <span title="Añadir Alumno">                        
                          <img
                            class="btn-add-alumn"
                            src="images/mas.png"
                            width="35"
                            hitght="35"
                            @click="addLessonAlumns()"
                          />
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div v-if="lesson_alumns.length > 0">
                      <div
                        class="div-lesson-selection-alumns"
                        v-for="(alumn, key) of lesson_alumns"
                        :key="key"
                      >
                        <span>
                          <img
                            :src="imgAlumn(alumn)"
                            class="avatar img-circle"
                            width="30"
                            hitght="30"
                          />
                        </span>
                        <span>{{alumn.name}}</span>
                        <span>[ {{alumn.rut}} ]</span>
                        <span style="float: right;">
                          <img
                            src="images/boton-x.png"
                            width="20"
                            hitght="20"
                            @click="removeLessonAlumns(alumn)"
                          />
                        </span>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class>Repetir día:</label>
                        <br>
                        <input v-model="day_to_repeat" type="date" class="form-control" />
                        <span class="errors" v-if="errors && errors.day_to_repeat ">{{errors.day_to_repeat [0] }}</span>
                      </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                      <div class>
                        <span title="Añadir día a R">                        
                          <img class="btn-add-alumn" src="images/repetir-dia.png" width="35" height="35" @click="addDayToRepeat()" />
                        </span>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div v-if="list_days_to_repeat.length > 0">
                      <div v-for="(day, key) of list_days_to_repeat" class="div-lesson-selection-alumns" :key="key">
                        <span>
                          <img src="images/por-dia.png" class="avatar img-circle" width="30" hitght="30" />
                        </span>
                        <span>[ {{day}} ]</span>
                        <span style="float: right;">
                          <img src="images/boton-x.png" width="20" hitght="20" @click="removeDayToRepeat(day)"/>
                        </span>
                      </div>
                    </div>
                  </div>



                  <div class>
                    <div v-for="(teacher, key_teacher) of day_lessons" :key="key_teacher" >
                      <div v-if="teacher.teacher">
                        <div  class="div-lesson col-md-6 col-sm-12 into-lesson">
                          <div class="avatar-teacher">
                            <img :src="imgTeacher(teacher.teacher)" alt="Avatar" class="avatar" width="70" hitght="70"/>
                          </div>
                          <div data-toggle="collapse" :data-target="'#collapse-lessons' + key_teacher" aria-expanded="false" :aria-controls="'#collapse-lessons' + key_teacher" >
                            <div class="div-name-teacher">{{teacher.teacher.name}}</div>
                          </div>
                          <div class="collapse" :id="'collapse-lessons' + key_teacher">
                            <div class="div-block-lesson" v-for="(lesson, key_lesson) of teacher.teacher_lessons" :key="key_lesson" >
                              <div class="div-head-block">
                                <span class="lesson-time">
                                  <b>{{lesson.since_time | timeShort}} - {{lesson.until_time | timeShort }}</b>
                                </span>
                                <span>
                                  <span class="btn-lesson" data-toggle="collapse" :data-target="'#collapse-detail-lesson' + key_teacher + '-' + key_lesson" aria-expanded="false" :aria-control="'#collapse-detail-lesson' + key_teacher + '-' + key_lesson">
                                    <img src="images/binoculares (1).png" width="20" hitght="20" title="Ver Clase"/>
                                  </span>                                  
                                  <span class="btn-lesson" data-toggle="collapse" :data-target="'#collapse-add-other-alumn' + key_teacher + '-' + key_lesson" aria-expanded="false" :aria-control="'#collapse-detail-lesson' + key_teacher + '-' + key_lesson">
                                    <img src="images/add-alumn.png" width="20" hitght="20" title="Agregar Aprendiz"/>
                                  </span>
                                  <span class="btn-lesson" data-toggle="collapse" :data-target="'#collapse-change-hour' + key_teacher + '-' + key_lesson" aria-expanded="false" :aria-control="'#collapse-detail-lesson' + key_teacher + '-' + key_lesson">
                                    <img src="images/hora.png" width="20" hitght="20" title="Cambiar Hora"/>
                                  </span>
                                   <span class="btn-lesson" data-toggle="collapse" :data-target="'#collapse-change-zoom' + key_teacher + '-' + key_lesson" aria-expanded="false" :aria-control="'#collapse-detail-lesson' + key_teacher + '-' + key_lesson">
                                    <img src="images/editar_zoom.png" width="20" hitght="20" title="Cambiar link zoom"/>
                                  </span>
                                  <span class="btn-lesson"  @click="cancelLesson(lesson.id)">
                                    <img src="images/boton-cancel.png" width="20" hitght="20" title="Cancelar Clase"/>
                                  </span>
                                  <span v-if="lesson.status.code == 'OPENED' || lesson.status.code == 'CANCELED'" class="btn-lesson"  @click="deleteLesson(lesson.id)">
                                    <img src="images/boton-x.png" width="20" hitght="20" title="Eliminar Clase"/>
                                  </span>
                                  
                                 
                                </span>
                              </div>

                              <div class="collapse" :id="'collapse-change-zoom' + key_teacher + '-' + key_lesson">
                                <div class="row panel-custom-lesson">
                                  <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                      <label class>Editar link de zoom:</label>
                                      <input v-model="other_zoom" type="text" class="form-control" />
                                      <span class="errors" v-if="errors && errors.other_zoom">{{errors.other_zoom[0] }}</span>
                                    </div>
                                  </div>                                 
                                 
                                  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                    <span class="btn-lesson" >
                                      <img src="images/editar_zoom.png" width="30" hitght="30" title="Cambiar Link Zoom"
                                      @click="changeZoomLink(lesson)"/>
                                    </span>
                                  </div>
                                </div>
                              </div>

                              <div class="collapse" :id="'collapse-change-hour' + key_teacher + '-' + key_lesson">
                                <div class="row panel-custom-lesson">
                                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                      <label class>Día:</label>
                                      <input v-model="other_date" type="date" class="form-control" />
                                      <span class="errors" v-if="errors && errors.other_date">{{errors.other_date[0] }}</span>
                                    </div>
                                  </div>
                                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                      <label class>Inicio:</label>
                                      <input v-model="other_since" type="time" class="form-control" />
                                      <span class="errors" v-if="errors && errors.other_since">{{errors.other_since[0] }}</span>
                                    </div>
                                  </div>
                                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                      <label class>Fin:</label>
                                      <input v-model="other_until" type="time" class="form-control" />
                                      <span class="errors" v-if="errors && errors.other_until">{{errors.other_until[0] }}</span>
                                    </div>
                                  </div>
                                  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                    <span class="btn-lesson" >
                                      <img src="images/hora.png" width="30" hitght="30" title="Cambiar Hora"
                                      @click="changeHourLesson(lesson)"/>
                                    </span>
                                  </div>
                                </div>
                              </div>

                              <div class="collapse" :id="'collapse-add-other-alumn' + key_teacher + '-' + key_lesson">
                                <div class="row panel-custom-lesson">
                                  <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <select v-model="other_alumn" class="form-control">
                                      <option value>Seleccione</option>
                                      <option v-for="(alumn, key) of alumns" :key="key" :value="alumn">
                                        [ edad: {{ getAge( alumn.birthdate ) }} ] {{ alumn.name }} [ {{ alumn.rut }} ] 
                                      </option>
                                    </select>
                                    <span class="errors" v-if="errors && errors.other_alumn">{{errors.other_alumn[0] }}</span>
                                  </div>
                                  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                    <span class="btn-lesson" >
                                      <img src="images/add-alumn.png" width="30" hitght="30" title="Agregar Aprendiz"
                                      @click="addOtherAlumn(lesson)"/>
                                    </span>
                                  </div>
                                  
                                </div>
                              </div>
                              
                              <!--detalle de una clase collapse -->
                              <div class="collapse" :id="'collapse-detail-lesson' + key_teacher + '-' + key_lesson">
                                <div class="div-detail-block">
                                  <div class="div-status-class">
                                    <span class="span-title-status">Estado:</span>
                                    <span class="span-detail-status">{{lesson.status.description}}</span>
                                  </div>
                                  <div class="div-status-class">
                                    <span class="span-title-status">Tema:</span>
                                    <span class="span-detail-status">{{lesson.subject.name}}</span>
                                  </div>
                                  <div class="div-zoom">
                                    <span class="span-zoom" :title="lesson.link_zoom">
                                      <a target="_blank" :href="lesson.link_zoom"> 
                                        <img src="images/zoom.png" class="avatar img-circle" height="30" width="30"/>
                                      </a>
                                    </span>
                                  </div>
                                  <div>
                                    <div class="div-alumn" v-for="(alumn, key_alumn) of lesson.alumn_teacher_lessons" :key="key_alumn">
                                      <img :src="imgAlumn(alumn.alumn)" class="avatar img-circle" width="30" hitght="30"/>
                                      <span class="alumn-in-class">{{alumn.alumn.name}}</span> 
                                      <span class="btn-lesson" @click="deleteAlumnClass(lesson.id, alumn.alumn.id)">
                                        <img src="images/boton-x.png" width="15" hitght="15" />
                                      </span>
                                      <br> 
                                      [ <span class="rut-in-class">{{alumn.alumn.rut}}</span> ]
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
            </div>
          </div>
        </div>
      </div>
      <div class="container" v-show="show_calendar">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="normal-table-list">
              <table class="table-calendar">
                <thead>
                  <tr>
                    <th class="head-selector-date-calendar" colspan="2">
                      <img src="images/flecha.png" width="35" height="35" @click="getCalendar(-1)" />
                    </th>
                    <th class="head-selector-date-calendar" colspan="3" style="text-align: center;">
                      <input
                        type="text"
                        class="selector-year"
                        v-model="current_year"
                        maxlength="4"
                        min="1990"
                        max="2050"
                      />
                      <br />
                      <span style="font-size: 25px">
                        <span class="date-selector">
                          <select
                            class="selector-month"
                            v-model="current_month"
                            @change="getCalendar(0)"
                          >
                            <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                          </select>
                        </span>
                      </span>
                    </th>
                    <th class="head-selector-date-calendar" colspan="2" style="text-align: right">
                      <img
                        src="images/flecha.png"
                        class="arrow-right"
                        width="35"
                        height="35"
                        @click="getCalendar(1)"
                      />
                    </th>
                  </tr>
                  <tr>
                    <th class="head-days-calendar">Lunes</th>
                    <th class="head-days-calendar">Martes</th>
                    <th class="head-days-calendar">Miércoles</th>
                    <th class="head-days-calendar">Jueves</th>
                    <th class="head-days-calendar">Viernes</th>
                    <th class="head-days-calendar">Sábado</th>
                    <th class="head-days-calendar">Domingo</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(week, key) in calendar" :key="key">
                    <td v-for="(d, k) in 7" :key="k" class="td-calendar-day">
                      <div v-if="week[d] !=''" :class="[styleGrid(week[d]), styleGridHas(week[d])]">
                        <div
                          :class="styleGridDiv1(week[d])"
                          @click="showSectionLessons(week[d].day)"
                          data-toggle="collapse"
                          data-target="#collapseLessons"
                          aria-expanded="false"
                          aria-controls="collapseLessons"
                        >{{ week[d].day | getDay }}</div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Util from "../mixins/Util.js";
import axios from "axios";
export default {
  mixins: [Util],
  data() {
    return {
      calendar      : [],
      increment     : 0,
      current_month : "",
      current_year  : "",
      show_calendar : true,
      current_year  : 2020,
      current_month : 5,
      selected_day  : "",
      teachers      : [],
      subjects      : [],
      alumns        : [],
      since         : "",
      until         : "",
      zoom_link     : "",
      teacher       : "",
      subject       : "",
      alumn         : "",
      day_lessons   : [],
      lesson_alumns : [],
      day_to_repeat : '',
      list_days_to_repeat : [],
      other_alumn: '',
      other_since: '',
      other_until: '',
      other_date: '',
      other_zoom: '',

    };
  },
  created() {
    (this.current_month = this.currentMonth()),
      (this.current_year = this.currentYear()),
      this.getCalendar();
  }, 
  methods: {   
    changeZoomLink (lesson) {
      if (this.other_zoom != "" ) {
          this.$toasted.show("Esta apunto de cambiar el link de zoom para este taller, ¿esta seguro?: ", {
          theme: "bubble",
          position: "bottom-right",
          duration: 15000,
          action: [
            {
              text: "Sí",
              onClick: (e, toastObject) => {
                var data = {
                  _token   : this.csrf,
                  lesson   : lesson.id,
                  zoom     : this.other_zoom
                }
                var self = this
                  axios
                    .post("/changeZoomLink", data)
                    .then(response => {
                      toastObject.goAway(0);
                      self.getDayLessons(self.selected_day)
                      self.errors = ''
                      self.toastSuccess("Se ha cambiado el link de zoom correctamente.")
                      self.other_zoom = ''                      
                      self.getCalendar()                     

                    })
                    .catch(error => {
                      toastObject.goAway(0);
                      self.loader = false
                      if (error.response.status == 422) {
                        self.errors = error.response.data.errors
                      } else {
                        self.toastError("Ha surgido un problema. Comuníquese con Soporte.")
                      }
                    })
              }
            },
            {
              text: "Cancel",
              onClick: (e, toastObject) => {
                toastObject.goAway(0);
              }
            }
          ]
        }) 
      } else {
        this.toastError("Debe ingresar el nuevo link zoom para continuar.");
      }
    }, 
    changeHourLesson (lesson) {
      if (this.other_since != '' && this.other_until != '' && this.other_date != '' ) {


        this.$toasted.show("Esta apunto de cambiar el horario del taller, ¿esta seguro?: ", {
          theme: "bubble",
          position: "bottom-right",
          duration: 15000,
          action: [
            {
              text: "Sí",
              onClick: (e, toastObject) => {
                var data = {
                  _token   : this.csrf,
                  lesson   : lesson.id,
                  since    : this.other_since,
                  until    : this.other_until,
                  date     : this.other_date,
                  old_date : this.selected_day,
                  old_since: lesson.since_time,
                  old_until: lesson.until_time,
                }
                var self = this
                  axios
                    .post("/changeHourLesson", data)
                    .then(response => {
                      toastObject.goAway(0);
                      self.getDayLessons(self.selected_day)
                      self.errors = ''
                      self.toastSuccess("Se ha cambiado la hora correctamente.")
                      self.other_since = ''
                      self.other_until = ''
                      self.other_date  = ''
                      self.getCalendar()                     

                    })
                    .catch(error => {
                      toastObject.goAway(0);
                      self.loader = false
                      if (error.response.status == 422) {
                        self.errors = error.response.data.errors
                      } else {
                        self.toastError("Ha surgido un problema. Comuníquese con Soporte.")
                      }
                    })
              }
            },
            {
              text: "Cancel",
              onClick: (e, toastObject) => {
                toastObject.goAway(0);
              }
            }
          ]
        })       

      } else {
        this.toastError("Debe ingresar la Fecha y ambas Horas para realizar el cambio.");
      }
    },    
    async addOtherAlumn (lesson) {     
      if (this.other_alumn) {
            var data = {
              _token : this.csrf,
              lesson : lesson.id,
              alumn  : this.other_alumn.id,
              since  : lesson.since_time,
              until  : lesson.until_time,
              date   : lesson.date,
            }
            var self = this
            await axios
              .post("/addOtherAlumn", data)
              .then(response => {
                this.getDayLessons(this.selected_day)
                self.errors = ''
                self.toastSuccess("Se ha agregado un nuevo aprendiz al taller.")
                self.other_since = ''
                self.other_until = ''
                self.other_date  = ''

              })
              .catch(error => {
                self.loader = false
                if (error.response.status == 422) {
                  self.errors = error.response.data.errors
                } else {
                  self.toastError("Ha surgido un problema. Comuníquese con Soporte.")
                }
              })

      } else {
        this.toastError("Debe seleccionar un Alumno.");
      }     
    },
    async deleteAlumnClass (lesson, alumn) {
      var data = {
        _token        : this.csrf,
        lesson        : lesson,
        alumn         : alumn,
      }
      var request = await axios.post("/deleteAlumnLesson", data)
      self.toastSuccess("Se ha quitado el aprendiz correctamente.")
      this.getDayLessons(this.selected_day)
    },
    async addDayToRepeat() {
      if (this.day_to_repeat) {
        let index_day = this.list_days_to_repeat.indexOf(this.day_to_repeat);
        if (index_day === -1 && this.selected_day != this.day_to_repeat) {
          this.loader = true
          if ( this.since != "" || this.until != "" || this.teacher != "" || this.lesson_alumns.length != 0 ) {
            try {
              var data = {
                _token        : this.csrf,
                day           : this.day_to_repeat,
                since         : this.since,
                until         : this.until,
                teacher       : this.teacher.id,
                lesson_alumns : this.lesson_alumns
              }
              var request = await axios.post("/validateDayToRepeat", data);
              if (request.data.validate) {
                this.list_days_to_repeat.push(this.day_to_repeat)
              } else {
                this.toastError("No puedes repetir la clase en el dia seleccionado. " + request.data.msg_false);
              }
            } catch (error) {
            } finally {
                this.loader = false
            }
          } else {
            this.toastError("Debe completar los datos de la clase.");
          }
        } else {
          this.toastError("El Día ya fue seleccionado.");
        }
      } else {
        this.toastError("Debe seleccionar una fecha.");
      }
    },
    removeDayToRepeat(day) {
      var index_day = this.list_days_to_repeat.indexOf(day);
      if (index_day !== -1) {
        this.list_days_to_repeat.splice(index_day, 1);
      }
    },
    getAge (birth) {
      let hoy = new Date()
      let fechaNacimiento = new Date(birth)
      let edad = hoy.getFullYear() - fechaNacimiento.getFullYear()
      let diferenciaMeses = hoy.getMonth() - fechaNacimiento.getMonth()
      if (
        diferenciaMeses < 0 ||
        (diferenciaMeses === 0 && hoy.getDate() < fechaNacimiento.getDate())
      ) {
        edad--
      }
      return edad
    },
    changeCalendarYear () {
      console.log(this.current_year)
    },
    imgTeacher (teacher) {
      if (teacher) {
        if (teacher.genere == 'male') {
          return 'images/hombre.png'
        } else {
          return 'images/mujer.png'
        }
      } else {
        return 'images/hombre.png'
      }      
    },
    imgAlumn (alumn) {
      if (alumn.genere == 'male') {
        return 'images/nino.png'
      } else {
        return 'images/nina.png'
      }
    },
    addLessonAlumns() {
      if (this.alumn) {
        let index_alumn = this.lesson_alumns.indexOf(this.alumn);
        if (index_alumn === -1) {
            var data = {
              _token : this.csrf,
              alumn  : this.alumn,
              since  : this.since,
              until  : this.until,
              date   : this.selected_day,
            }
            var self = this
            axios
              .post("/validateAlumnInLesson", data)
              .then(response => {
                this.lesson_alumns.push(this.alumn);
                self.errors = ''
              })
              .catch(error => {
                self.loader = false
                if (error.response.status == 422) {
                  self.errors = error.response.data.errors
                } else {
                  self.toastError("Ha surgido un problema. Comuníquese con Soporte.")
                }
              })

        } else {
          this.toastError("El alumno ya fue seleccionado.");
        }
      } else {
        this.toastError("Debe seleccionar un Alumno.");
      }
    },
    removeLessonAlumns(alumn) {
      var index_alumn = this.lesson_alumns.indexOf(alumn);
      if (index_alumn !== -1) {
        this.lesson_alumns.splice(index_alumn, 1);
      }
    },
    closeFormSchedule() {
      this.show_calendar = true
      this.since         = ""
      this.until         = ""
      this.zoom_link     = ""
      this.teacher       = 0
      this.subject       = 0
      this.alumn         = 0
      this.lesson_alumns = []
      this.lesson_alumns = []
      this.day_to_repeat = ''
      this.list_days_to_repeat = []
    },
    showSectionLessons(day) {
      this.show_calendar = false;
      this.getDayLessons(day);
      this.selected_day  = day;
    },
    styleGrid(day) {
      if (day.day) {
        return "grid-day";
      }
    },
    styleGridHas(day) {
      if (day.has) {
        return "grid-day-has";
      }
    },
    styleGridDiv1(day) {
      if (day.day) {
        return "grid-day-div1";
      }
    },
    currentMonth() {
      var today = new Date();
      var month = today.getMonth() + 1;
      return month;
    },
    currentYear() {
      var today = new Date();
      return today.getFullYear();
    },
    async getCalendar(increment = 0) {
      var data = {
        params: {
          current_month : this.current_month,
          current_year  : this.current_year,
          increment     : increment
        }
      }     
      try {
        let request        = await axios.get("/getCalendar", data)
        this.calendar      = request.data.calendar
        this.teachers      = request.data.teachers
        this.subjects      = request.data.subjects
        this.alumns        = request.data.alumns
        this.current_month = request.data.month
        this.current_year  = request.data.year
        this.loader        = false
      } catch (error) {
      } finally {
      }
    },
    async getDayLessons(day) {
      this.loader = true
      try {
        let data = {
          selected_day: day
        };
        let request      = await axios.get("/getDayLessons", { params: data });
        this.day_lessons = request.data;
        } catch (error) {
        } finally {
          this.loader = false
        }
    },
    async postLesson() {
      this.loader = true
      let url  = "/postLesson";
      let data = {
        _token        : this.csrf,
        since         : this.since,
        until         : this.until,
        zoom_link     : this.zoom_link,
        teacher       : this.teacher,
        subject       : this.subject,
        lesson_alumns : this.lesson_alumns,
        date          : this.selected_day,
        list_days_to_repeat : this.list_days_to_repeat
      };
      var self = this;
      await axios
        .post(url, data)
        .then(response => {
          this.since         = ""
          this.until         = ""
          this.zoom_link     = ""
          this.teacher       = 0
          this.subject       = 0
          this.alumn         = 0
          this.lesson_alumns = []
          this.list_days_to_repeat = []
          self.toastSuccess("La clase ha sido creado con éxito.")
          self.getDayLessons(self.selected_day)
          self.getCalendar()
          self.loader = false
          self.errors = []
        })
        .catch(error => {
          self.loader = false
          if (error.response.status == 422) {
            self.errors = error.response.data.errors
            self.toastError("Hay errores en el formulario.")
          } else {
            self.toastError("Ha surgido un problema. Comuníquese con Soporte.")
          }
        })

    },
    deleteLesson(id) {
      this.$toasted.show("Esta apunto de eliminar una clase, ¿esta seguro?: ", {
        theme: "bubble",
        position: "bottom-right",
        duration: 15000,
        action: [
          {
            text: "Sí",
            onClick: (e, toastObject) => {
              let url = "/deleteLesson";
              let data = {
                _token: this.csrf,
                lesson_id: id,
                date: this.selected_day
              };
              var self = this;
              axios
                .post(url, data)
                .then(response => {
                  toastObject.goAway(0);
                  self.toastSuccess("La clase ha sido eliminada con éxito.");
                  self.getDayLessons(self.selected_day);
                  self.getCalendar();
                  self.errors = [];
                })
                .catch(error => {
                  toastObject.goAway(0);
                  self.toastError(
                    "Ha surgido un problema. Comuníquese con Soporte."
                  );
                });
            }
          },
          {
            text: "Cancel",
            onClick: (e, toastObject) => {
              toastObject.goAway(0);
            }
          }
        ]
      });
    },
    cancelLesson(id) {
      this.$toasted.show("Esta apunto de cancelar una clase, ¿esta seguro?: ", {
        theme: "bubble",
        position: "bottom-right",
        duration: 15000,
        action: [
          {
            text: "Sí",
            onClick: (e, toastObject) => {
              let url = "/cancelLesson";
              let data = {
                _token: this.csrf,
                lesson_id: id,
                date: this.selected_day
              };
              var self = this;
              axios
                .post(url, data)
                .then(response => {
                  toastObject.goAway(0);
                  self.toastSuccess("La clase ha sido cancelada con éxito.");
                  self.getDayLessons(self.selected_day);
                  self.getCalendar();
                  self.errors = [];
                })
                .catch(error => {
                  toastObject.goAway(0);
                  self.toastError(
                    "Ha surgido un problema. Comuníquese con Soporte."
                  );
                });
            }
          },
          {
            text: "Cancel",
            onClick: (e, toastObject) => {
              toastObject.goAway(0);
            }
          }
        ]
      });
    }
  },
  filters: {
    getDay(date) {
      if (date) {
        var date_array = date.split("-");
        return date_array[2];
      }
    }
  }
};
</script>
@endsection
<style>
.div-zoom {
  text-align: center;
}
.span-zoom {
  vertical-align: middle;
  width: 45px;
  height: 40px;
  border-radius: 50%;
}
.span-detail-zoom {
  font-weight: bold;
}
.table-calendar {
  width: 100%;
}
.selector-month {
  background-color: #ffc664 !important;
  color: white !important;
  border-radius: 200px 200px 200px 200px;
  -moz-border-radius: 200px 200px 200px 200px;
  -webkit-border-radius: 200px 200px 200px 200px;
  border: 0px solid #000000;
  font-size: 20px;
  text-align-last: center;
}
.selector-year {
  background-color: #ffc664 !important;
  text-align: center !important;
  width: 100px;
  color: white !important;
  border-radius: 200px 200px 200px 200px;
  -moz-border-radius: 200px 200px 200px 200px;
  -webkit-border-radius: 200px 200px 200px 200px;
  border: 0px solid #000000;
  font-size: 16px;
}
.arrow-right {
  -moz-transform: scaleX(-1); /* Firefox */
  -o-transform: scaleX(-1); /* Opera */
  -webkit-transform: scaleX(-1); /* Chrome y Safari */
  transform: scaleX(-1); /* w3org */
  filter: FlipH; /* Internet Explorer */
}
.head-selector-date-calendar {
  background-color: #8ec63f !important;
  padding: 8px !important;
}
.head-days-calendar {
  background-color: #ffc664 !important;
  color: white;
  padding: 5px !important;
  text-align: center;
}
.div-lesson-selection-alumns {

  background-color: #8ec63f !important;
  padding: 2px 5px 2px 15px !important;
  margin: 0px 2px 2px 0px;
  color: white;
  border-radius: 200px 200px 200px 200px;
  -moz-border-radius: 200px 200px 200px 200px;
  -webkit-border-radius: 200px 200px 200px 200px;
  border: 0px solid #000000;
}
.avatar-teacher {
  margin: 15px 0px 15px 0px;
}
.btn-add-alumn {
  padding-top: 20px !important;
  cursor: pointer;
}
.lesson-time {
  color: #8ec63f !important;
  font-size: 20px;
  float: left;
}
.div-status-class {
  margin-top: 3px;
  text-align: center !important;
}
.span-title-status {
  color: #ffae00;
  font-weight: bold;
}
.span-title-zoom {
  font-weight: bold;
  color: #0e71eb;
}
.div-head-block {
  padding: 5px;
  border-radius: 10px 10px 10px 10px;
  -moz-border-radius: 10px 10px 10px 10px;
  -webkit-border-radius: 10px 10px 10px 10px;
  border: 1px solid #8ec63f !important;
}
.div-detail-block {
  text-align: left !important;
  padding-left: 15px;
}
.div-block-lesson {
  margin: 15px;
}
.btn-lesson {
  padding: 3px 4px 3px 5px;
  margin: 0px 2px 0px 0px;
  cursor: pointer;
  border-radius: 200px 200px 200px 200px;
  -moz-border-radius: 200px 200px 200px 200px;
  -webkit-border-radius: 200px 200px 200px 200px;
  border: 0px solid #000000;
}
.div-name-teacher {
  font-size: 18px;
  font-weight: bold;
  color: #ffae00;
  padding: 3px;
  cursor: pointer;
}
.avatar {
  float: center !important;
}
.form-group-time {
  padding: 0px 0px 0px 15px !important;
}
.div-lesson {
  text-align: center;
}
.into-lesson {
  margin-top: 15px !important;
  border-radius: 10px 10px 10px 10px;
  -moz-border-radius: 10px 10px 10px 10px;
  -webkit-border-radius: 10px 10px 10px 10px;
  border: 7px solid #8ec63f !important;
  -webkit-box-shadow: 12px 12px 17px -6px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 12px 12px 17px -6px rgba(0, 0, 0, 0.75);
  box-shadow: 12px 12px 17px -6px rgba(0, 0, 0, 0.75);
}
.breadcomb-list-schedule {
  padding-bottom: 400px !important;
}
.grid-day {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  grid-template-rows: repeat(5, 1fr);
  grid-column-gap: 0px;
  grid-row-gap: 0px;
  background-color: #fdfdf9;
  padding: 0px 50px 50px 0px !important;
  margin: 1px !important;
  cursor: pointer;
}
.grid-day-has {
  background-color: #cdffbf !important;
}
.grid-day-div1 {
  margin: 10px 0px 0px 10px;
  grid-area: 1 / 1 / 4 / 3;
  font-size: 20px !important;
  color: #fdfdf9 !important;
  border: solid 1px;
  padding: 0px 26px 0px 2px !important;
  background-color: #8ec63f;
  border-radius: 200px 200px 200px 200px;
  -moz-border-radius: 200px 200px 200px 200px;
  -webkit-border-radius: 200px 200px 200px 200px;
  border: 1px solid #8ec63f !important;
  -webkit-box-shadow: 12px 12px 17px -6px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 12px 12px 17px -6px rgba(0, 0, 0, 0.75);
  box-shadow: 12px 12px 17px -6px rgba(0, 0, 0, 0.75);
}
</style>
