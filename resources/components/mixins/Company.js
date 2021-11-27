export default {
    data () {
        return {
            rut_company        : "",
            name_company       : "",
            email_company      : "",
            cash_company       : "",
            phone_company      : "",
            address_company    : "",
            commune_id_company : "",
            region_id_company  : "",
            legal_name_company : "",
            since_company      : "",
            contact_company    : ""  
        }
    },       
    created() {
    },
    methods: {
        getCommunes ()  {
            this.commune_id = ''
            var self = this  
                this.$http.get('/commune-list', {params: {region: self.region_id}}).then(function(response){
                    self.commune_list = response.body
                    }, function(){
                        this.$toasted.global.APP_GENERAR_ERROR()
                    })
        },
        getCompany (id) {
            var self = this
            this.$http.get('/get-company', {params: {id}})
            .then(response => {
                self.rut_company        = response.body.rut
                self.name_company       = response.body.name
                self.address_company    = response.body.address
                self.phone_company      = response.body.phone
                self.email_company      = response.body.email
                self.country_company    = response.body.country
                self.region_id_company  = response.body.commune.region.id
                self.legal_name_company = response.body.legal_name
                self.contact_company    = response.body.contact
                self.since_company      = response.body.since
                self.name_company       = response.body.name
                self.name_company       = response.body.name
                this.getCommunes()
                self.commune_id         = response.body.commune_id
            }, response => {                 
                self.$toasted.global.APP_GENERAL_ERROR()
            })
        }    
    }
}