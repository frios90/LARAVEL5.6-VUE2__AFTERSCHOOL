import axios from "axios";
export default { 
    data () {
        return {
            csrf   : document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            loader : true,
            errors : [],
            active_menu : {
                dashboard: 'active',
                class: '',
                modules: ''
            },
            allowed : {
                d_admin   : {status: false},
                d_teacher : {status: false},
                d_alumn   : {status: false},
            },
            user_session: {},
            country_list: {},
            region_list: {},
            commune_list: {},
            country_id: '',
            region_id: '',
            commune_id: '',
            errors: {},
            user_session: {},
        }
    },
    mounted () {     
        this.hasAccessPermissions()
        this.getLocalStorageActiveMenu()
    },
    methods: {       
        activeMenu (menu) {
            switch (menu) {
                case 'dashboard':
                    this.active_menu.dashboard = 'active'
                    this.active_menu.class     = 'inactive'
                    this.active_menu.modules   = 'inactive'
               
                break;
                case 'class':
                    this.active_menu.dashboard = 'inactive'
                    this.active_menu.class     = 'active'
                    this.active_menu.modules   = 'inactive'
                   
                break;
                case 'modules':
                    this.active_menu.dashboard = 'inactive'
                    this.active_menu.class     = 'inactive'
                    this.active_menu.modules   = 'active'
                    
                break; 
            }
           localStorage.setItem('active_menu', JSON.stringify(this.active_menu))
        },
        getLocalStorageActiveMenu () {
            if (JSON.parse(localStorage.getItem('active_menu'))) {
                this.active_menu = JSON.parse(localStorage.getItem('active_menu'))
            }           
           
        },             
        changeStatus (id, url, _return) {
          event.preventDefault()
          var data = {
              _token: this.csrf,
              id: id            
            }
          var self = this  
          this.$http.post(url, data)
          .then(response => {
             this.getDataTable(_return)
              self.$toasted.global.APP_GENERAL_SUCCESS()
            }, response => {                 
               self.$toasted.global.APP_GENERAL_ERROR()
            })
        },
        toastError (text) {
            this.$toasted.error(text, { 
                theme: "bubble", 
                position: "top-right", 
                duration : 2500,
                action : {
                    text : 'cerrar',
                      onClick : (e, toastObject) => {
                      toastObject.goAway(0);
                    }
                }
            })
        },
        toastSuccess (text) {
            this.$toasted.success(text, { 
                theme: "bubble", 
                position: "top-right", 
                duration : 2500,
                action : {
                    text : 'cerrar',
                      onClick : (e, toastObject) => {
                      toastObject.goAway(0);
                    }
                }
            })
        },
        async hasAccessPermissions(menu) {           
            var self = this           
            await axios.get("/hasAccessPermissions", {params: {'menu': menu}})
            .then(response => {
                self.allowed = response.data
                           
            })
            .catch(error => {
                self.toastError('A surgido un problema. Comuníquese con Soporte.')
            }) 
        },
        async getCountries() {
            var self = this
            await axios.get('/country-list').then(function(response) {
                console.log(response)
                self.country_list = response.data
            }, function() {
                this.$toasted.global.APP_GENERAR_ERROR()
            })
        },
        async getRegions() {          
            this.region_id = ''
            var self = this
            await axios.get('/region-list', {
                params: {
                    country: self.country_id
                }
            }).then(function(response) {
                self.region_list = response.data
            }, function() {
                this.$toasted.global.APP_GENERAR_ERROR()
            })
        },
        async getCommunes() {
            this.commune_id = ''
            var self = this
            await axios.get('/commune-list', {
                params: {
                    region: self.region_id
                }
            }).then(function(response) {
                self.commune_list = response.data
            }, function() {
                this.$toasted.global.APP_GENERAR_ERROR()
            })
        },
        async getUserSession() {         
            var self = this           
            await axios.get("/getUserSession")
            .then(response => {
                self.user_session = response.data
            })
            .catch(error => {
                self.toastError('A surgido un problema. Comuníquese con Soporte.')
            }) 
        },
    },
    filters: {
        upper (string) {
            var string =  string.toLowerCase()
            return string.replace(/\b\w/g, l => l.toUpperCase())
        },
        dateInverted: function (date) {
            var date = date.substr(0,10)               
            return date.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3-$2-$1')
        },
        dateTimeInverted: function (date) {
            var dateSplit = date.split(" ")
            date = dateSplit[0].substr(0,10)               
            return date.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3-$2-$1') + " " + dateSplit[1]
        },
        timeShort: function (time) {
            return time.substr(0,5)               
           
        },
        isNumber: function(evt) {
            evt = (evt) ? evt : window.event
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                evt.preventDefault()
            } else {
                return true;
            }
        }
    }
}