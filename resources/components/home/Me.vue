<template>
  <div>
    <div v-if="loader" class="loader"></div>

    <div v-if="show == 'pass'">
      <div class="breadcomb-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="breadcomb-list">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="breadcomb-wp">
                      <div class="breadcomb-icon">
                        <img
                          src="images/contrasena.png"
                          alt="Avatar"
                          width="80"
                          hitght="80"
                         
                        />                      </div>
                      <div class="breadcomb-ctn">
                        <h2>Cambio de contraseña</h2>
                        <p>Formulario el cambio de tu contraseña</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                    <div class="breadcomb-report">
                      <img
                        src="images/disquete.png"
                        title="Guardar Clase"
                        class="pointer"
                        width="40"
                        hitght="40"
                        @click="postPass()"
                      />
                      <img
                        src="images/usuario.png"
                        alt="Avatar"
                        class="pointer"
                        width="40"
                        hitght="30"
                        title="Volver a perfil"
                        @click="openMe()"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="normal-table-list">
              <div class="bsc-tbl">               
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class>Nueva contraseña:</label>
                      <input v-model="new_pass" type="text" class="form-control" />
                      <span class="errors" v-if="errors && errors.new_pass">{{errors.new_pass[0] }}</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class>Repita contraseña:</label>
                      <input v-model="repeat_pass" type="text" class="form-control" />
                      <span class="errors" v-if="errors && errors.repeat_pass">{{errors.repeat_pass[0] }}</span>
                    </div>
                  </div>               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div v-if="show == 'me'">
      <div class="breadcomb-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="breadcomb-list">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="breadcomb-wp">
                      <div class="breadcomb-icon">
                        <img
                          src="images/usuario.png"
                          alt="Avatar"
                          width="80"
                          hitght="80"
                         
                        />                       </div>
                      <div class="breadcomb-ctn">
                        <h2>Mi perfil</h2>
                        <p>Formulario para la edición de mis datos</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                    <div class="breadcomb-report">
                      <img
                        src="images/disquete.png"
                        title="Guardar Clase"
                        class="pointer"
                        width="40"
                        hitght="40"
                        @click="postMe()"
                      />
                      <img
                        src="images/contrasena.png"
                        alt="Avatar"
                        class="pointer"
                        width="40"
                        hitght="30"
                        @click="openPass()"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="normal-table-list">
              <div class="bsc-tbl">
                <div class="row">
                  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class>Rut:</label>
                      <input
                        v-model="me.rut"
                        type="text"
                        class="form-control"
                        name="rut"
                        id="rut"
                        v-rut:live
                        maxlength="12"
                      />
                      <span class="errors" v-if="errors && errors.rut">{{errors.rut[0] }}</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class>Nombre:</label>
                      <input v-model="me.name" type="text" class="form-control" />
                      <span class="errors" v-if="errors && errors.name">{{errors.name[0] }}</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class>Correo:</label>
                      <input v-model="me.email" type="text" class="form-control" />
                      <span class="errors" v-if="errors && errors.email">{{errors.email[0] }}</span>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class>Genero:</label>
                      <select v-model="me.genere" class="form-control">
                        <option value selected>Seleccione</option>
                        <option value="female">Femenino</option>
                        <option value="male">Masculino</option>
                      </select>
                      <span class="errors" v-if="errors && errors.genere">{{errors.genere[0] }}</span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class>Región:</label>
                      <select v-model="me.region_id" class="form-control" @change="getCommunes()">
                        <option value selected>Seleccione</option>
                        <option
                          v-for="(list, index) in region_list"
                          :key="index"
                          :value="list.id"
                        >{{ list.name }}</option>
                      </select>
                      <span class="errors" v-if="errors && errors.genere">{{errors.genere[0] }}</span>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class>Comuna:</label>
                      <select v-model="me.commune_id" class="form-control">
                        <option value selected>Seleccione</option>
                        <option
                          v-for="(list, index) in commune_list"
                          :key="index"
                          :value="list.id"
                          name="commune_id"
                        >{{ list.name }}</option>
                      </select>
                      <span class="errors" v-if="errors && errors.genere">{{errors.genere[0] }}</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class>Dirección:</label>
                      <input v-model="me.address" type="text" class="form-control" />
                      <span class="errors" v-if="errors && errors.address">{{errors.address[0] }}</span>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class>Teléfono:</label>
                      <input v-model="me.phone" type="text" class="form-control" />
                      <span class="errors" v-if="errors && errors.phone">{{errors.phone[0] }}</span>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class>Fecha Nacimiento:</label>
                      <input v-model="me.birthdate" type="date" class="form-control" />
                      <span
                        class="errors"
                        v-if="errors && errors.birthdate"
                      >{{errors.birthdate[0] }}</span>
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
import axios from "axios";
import Util from "../mixins/Util.js";
export default {
  mixins: [Util],
  data() {
    return {
      next_lesson : {},
      region      : '',
      me          : {},
      show        : 'me',
      new_pass    : '',
      repeat_pass : '',
    }
  },
  created() {
    this.getRegions()
    this.getMe()
  },
  methods: {  
    openMe() {
      this.show = "me"      
    }, 
    openPass() {
      this.show = "pass"      
    }, 
    async getMe() {
      var self = this;
      await axios
        .get("/getMe")
        .then(response => {
          this.region_id = response.data.region_id
          this.getCommunes(response.data.region_id);
          self.me = response.data
          self.loader = false
        })
        .catch(error => {
          self.toastError("A surgido un problema. Comuníquese con Soporte.");
        })
    },
    async postMe() {
      this.loader = true
      event.preventDefault()
      var data = {
        _token     : this.me.csrf,
        id         : this.me.id,
        rut        : this.me.rut,
        name       : this.me.name,
        phone      : this.me.phone,
        email      : this.me.email,
        genere     : this.me.genere,
        address    : this.me.address,
        birthdate  : this.me.birthdate,
        region_id  : this.me.region_id,
        commune_id : this.me.commune_id,
        profile    : this.me.profile.name,
        post_event: "update"
      }

      var self = this
      await axios
        .post("/user-store", data)
        .then(response => {
          self.toastSuccess("Los datos han sido ingresado con éxito.")
          self.errors = ''
          self.loader = false
        
        })
        .catch(e => {
          self.loader = false
          if (e.response.status == 422) {
            self.errors = e.response.data.errors
            self.toastError("No ha ingresado los datos correctamente.")
          } else {
            self.toastError("Ha surgido un problema. Comuníquese con Soporte.")
          }
        })
       
    },
    async postPass() {
      event.preventDefault()
      this.loader = true
      var data = {
        _token       : this.me.csrf,
        id           : this.me.id,
        new_pass     : this.new_pass,
        repeat_pass  : this.repeat_pass
      }

      var self = this
      await axios
        .post("/mePassStore", data)
        .then(response => {
          self.toastSuccess("Los datos han sido ingresado con éxito.")
          self.errors = ''
          self.loader = false
        })
        .catch(e => {
          self.loader = false
          if (e.response.status == 422) {
            self.errors = e.response.data.errors
            self.toastError("No ha ingresado los datos correctamente.")
          } else {
            self.toastError("Ha surgido un problema. Comuníquese con Soporte.")
          }
        })
    },
  }
};
</script>