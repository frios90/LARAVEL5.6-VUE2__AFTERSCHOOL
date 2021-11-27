<template >
  <div class="normal-table-area">
    <div v-if="loader" class="loader"></div>

    <div v-if="show == 'table'">
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
                          class="btn-add-alumn pointer"
                          src="images/mod-teachers.png"
                          width="80"
                          hitght="80"
                        />
                      </div>
                      <div class="breadcomb-ctn">
                        <h2>Profesionales</h2>
                        <p class="subtitle">
                          Modulo para la Gestión de
                          <span class="bread-ntd">Profesionales</span>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                    <div class="breadcomb-report">
                      <img
                        class="btn-add pointer"
                        src="images/mas.png"
                        width="35"
                        height="35"
                        @click="openForm('post_create')"
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
                <v-client-table
                  class="index-table"
                  :data="tableData"
                  :columns="columns"
                  :options="options"
                >
                  <span slot="actions" slot-scope="props">
                    <img
                      class="btn-add-alumn pointer"
                      src="images/editar.png"
                      width="20"
                      hitght="20"
                      @click="openForm('post_edit', props.row)"
                    />
                    <img
                      class="btn-add-alumn pointer"
                      :src="imgStatus(props.row.deleted_at)"
                      width="20"
                      hitght="20"
                      @click="changeStatus(props.row.id)"
                    />
                  </span>
                </v-client-table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-if="show == 'form'">
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
                          class="btn-add-alumn pointer"
                          src="images/formulario.png"
                          width="80"
                          hitght="80"
                        />    
                      </div>
                      <div class="breadcomb-ctn">
                        <h2>Crear Profesional</h2>
                        <p>Formulario para el ingreso de un nuevo Profesional</p>
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
                        @click="postTeacher('create')"
                      />
                      <img
                        src="images/boton-x.png"
                        alt="Avatar"
                        class="pointer"
                        width="40"
                        hitght="30"
                        @click="openTable()"
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
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class>Rut:</label>
                      <input
                        v-model="rut"
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
                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class>Nombre:</label>
                      <input v-model="name" type="text" class="form-control" />
                      <span class="errors" v-if="errors && errors.name">{{errors.name[0] }}</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class>Correo:</label>
                      <input v-model="email" type="text" class="form-control" />
                      <span class="errors" v-if="errors && errors.email">{{errors.email[0] }}</span>
                    </div>
                  </div>                  
                </div>

                <div class="row"> 
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class>Genero:</label>
                      <select v-model="genere" class="form-control">
                        <option value selected>Seleccione</option>
                        <option value="female">Femenino</option>
                        <option value="male">Masculino</option>
                      </select>
                      <span class="errors" v-if="errors && errors.genere">{{errors.genere[0] }}</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class>Teléfono:</label>
                      <input v-model="phone" type="text" class="form-control" />
                      <span class="errors" v-if="errors && errors.phone">{{errors.phone[0] }}</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class>Fecha Nacimiento:</label>
                      <input v-model="birthdate" type="date" class="form-control" />
                      <span
                        class="errors"
                        v-if="errors && errors.birthdate"
                      >{{errors.birthdate[0] }}</span>
                    </div>
                  </div>
                </div>


                <div class="row">
                  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class>País:</label>
                      <select v-model="country_id" class="form-control" @change="getRegions()">
                        <option value selected>Seleccione</option>
                        <option
                          v-for="(list, index) in country_list"
                          :key="index"
                          :value="list.id"
                        >{{ list.name }}</option>
                      </select>
                      <span class="errors" v-if="errors && errors.country_id">{{errors.country_id[0] }}</span>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class>Región:</label>
                      <select v-model="region_id" class="form-control" @change="getCommunes()">
                        <option value selected>Seleccione</option>
                        <option
                          v-for="(list, index) in region_list"
                          :key="index"
                          :value="list.id"
                        >{{ list.name }}</option>
                      </select>
                      <span class="errors" v-if="errors && errors.region_id">{{errors.region_id[0] }}</span>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class>Comuna:</label>
                      <select v-model="commune_id" class="form-control">
                        <option value selected>Seleccione</option>
                        <option
                          v-for="(list, index) in commune_list"
                          :key="index"
                          :value="list.id"
                          name="commune_id"
                        >{{ list.name }}</option>
                      </select>
                      <span class="errors" v-if="errors && errors.commune_id">{{errors.commune_id[0] }}</span>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class>Dirección:</label>
                      <input v-model="address" type="text" class="form-control" />
                      <span class="errors" v-if="errors && errors.address">{{errors.address[0] }}</span>
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
import Table from "../mixins/Table.js";
import Util from "../mixins/Util.js";
import axios from "axios";
export default {
  mixins: [Table, Util],
  data() {
    return {
      show: "table",
      id: "",
      rut: "",
      name: "",
      phone: "",
      email: "",
      genere: "",
      address: "",
      birthdate: "",
      event_post: ""
    };
  },
  created() {
    this.getCountries()
    var params = { profile: "teacher" }
    this.getDataTable("/user-table-list", params)
    this.columns = ["rut", "name", "email", "actions"]
    this.options.headings = {
      rut: "Rut",
      name: "Nombre",
      email: "Correo",
      actions: "Acciones"
    }
    this.options.sortable = ["rut", "name", "email"]
  },
  methods: {
    imgStatus(status) {
      if (!status) {
        return "images/on.png"
      } else {
        return "images/off.png"
      }
    },
    openForm(e_p, user = false) {
      this.show         = "form"
      this.event_post   = e_p
      if (user) {
        this.id         = user.id
        this.rut        = user.rut
        this.name       = user.name
        this.phone      = user.phone
        this.email      = user.email
        this.genere     = user.genere
        this.address    = user.address
        this.birthdate  = user.birthdate
        this.country_id  = user.country_id
        this.getRegions()
        this.region_id  = user.region_id
        this.getCommunes()        
        this.region_id  = user.region_id
        this.commune_id = user.commune_id
      }
    },
    openTable() {
      this.show       = "table"
      this.id         = ''
      this.rut        = ''
      this.name       = ''
      this.phone      = ''
      this.email      = ''
      this.genere     = ''
      this.address    = ''
      this.birthdate  = ''
      this.commune_id = ''
      this.region_id  = ''
      this.country_id  = ''
      this.errors     = ''
    },
    async postTeacher() {
      event.preventDefault()
      this.loader = true
      if (this.event_post == "post_create") {
        var data = {
          _token     : this.csrf,
          rut        : this.rut,
          name       : this.name,
          phone      : this.phone,
          email      : this.email,
          genere     : this.genere,
          address    : this.address,
          birthdate  : this.birthdate,
          region_id  : this.region_id,
          country_id : this.country_id,
          commune_id : this.commune_id,
          profile    : "teacher",
          post_event : "store"
        }
      } else {
        var data = {
          _token     : this.csrf,
          id         : this.id,
          rut        : this.rut,
          name       : this.name,
          phone      : this.phone,
          email      : this.email,
          genere     : this.genere,
          address    : this.address,
          country_id : this.country_id,
          birthdate  : this.birthdate,
          region_id  : this.region_id,
          commune_id : this.commune_id,
          profile: "teacher",
          post_event: "update"
        }
      }
      var self = this
      await axios
        .post("/user-store", data)
        .then(response => {
          self.getDataTable("/user-table-list", { profile: "teacher" })
          self.openTable()
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
    async changeStatus(id) {
      this.loader = false
      var data = {
        id: id
      }
      var self = this
      await axios
        .post("/user-status", data)
        .then(response => {
          self.getDataTable("/user-table-list", { profile: "teacher" })
          self.toastSuccess("El estado a sido cambiado con éxito.")
          self.loader = false
        })
        .catch(e => {
          self.toastError("Ha surgido un problema. Comuníquese con Soporte.")
          self.loader = false
        })
    }
  },
  filters: {
    upper: function(value) {
      return value.toUpperCase()
    }
  },
  computed: {
    rows() {
      return this.items.length
    }
  }
}
</script>
@endsection
<style>
</style>
