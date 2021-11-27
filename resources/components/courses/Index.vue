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
                        <h2>Talleres</h2>
                        <p class="subtitle">
                          Modulo para la Gestión de
                          <span class="bread-ntd">Talleres</span>
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
                        <h2>Crear Taller</h2>
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
                        @click="postCourse('create')"
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
                  
                  <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class>Nombre:</label>
                      <input v-model="name" type="text" class="form-control" />
                      <span class="errors" v-if="errors && errors.name">{{errors.name[0] }}</span>
                    </div>
                  </div>                 
                </div>
                <div class="row">                  
                  <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class>Descripción:</label>
                      <input v-model="description" type="text" class="form-control" />
                      <span class="errors" v-if="errors && errors.description">{{errors.description[0] }}</span>
                    </div>
                  </div>                 
                </div>
                <div class="row">                  
                  <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class>Código:</label>
                      <input v-model="code" type="text" class="form-control" />
                      <span class="errors" v-if="errors && errors.code">{{errors.code[0] }}</span>
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
      name: "",
      description: "",
      code: "",
      event_post: ""
    };
  },
  created() {
    this.getRegions()
    this.getDataTable("/course-table-list")
    this.columns = ["name", "description", "code", "actions"]
    this.options.headings = {
      name: "Nombre",
      descriptión: "Descripción",
      actions: "Acciones"
    }
    this.options.sortable = ["name", "description", "code"]
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
        this.id          = user.id
        this.name        = user.name
        this.description = user.description
        this.code        = user.code
       
      }
    },
    openTable() {
      this.show        = "table"
      this.id          = ''
      this.name        = user.name
      this.description = user.description
      this.code        = user.code
    },
    async postCourse() {
      event.preventDefault()
      this.loader = true
      if (this.event_post == "post_create") {
        var data = {
          _token     : this.csrf,
          name       : this.name,
          description : this.description,
          code      : this.code,         
          post_event : "store"
        }
      } else {
        var data = {
          _token     : this.csrf,
          id         : this.id,
          name       : this.name,
          description : this.description,
          code      : this.code,         
          post_event: "update"
        }
      }
      var self = this
      await axios
        .post("/course-store", data)
        .then(response => {
          self.getDataTable("/course-table-list")
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
        .post("/course-status", data)
        .then(response => {
          self.getDataTable("/course-table-list")
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
