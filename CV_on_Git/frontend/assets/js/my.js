new Vue({
    el: '#app',
    data() {
        return {
            msg: 'Howdy!',
            name: '',
            address: '',
            phone: '',
            status: ''
        }
    },

    mounted() {        
    },
    methods: {
        submitData () {
            console.log("working here")
            // axios
            //     .get('https://api.coindesk.com/v1/bpi/currentprice.json')
            //     .then(response => (this.message = response.data.chartName))
            
            axios
                // .post('http://localhost:5500/api/company', {name: this.name, address: this.address, phone: this.phone})
                .post('http://160.36.100.92:5500/api/company', { name: this.name, address: this.address, phone: this.phone })
                .then(response => (
                    this.msg = response.data.status,
                    (this.msg == 'success') ? this.status = 'Added! Thanks.' : 'Ooops!'                                     
                    )                    
                )             
                // .then(() => ((this.msg == 'success')?this.status = 'Submitted! Thanks.':''))
                // .then(
                //     (this.msg == 'success') ? this.status = 'Submitted! Thanks.' : '',
                //     console.log('then ...')
                // )
                .catch(function (error) {
                    console.log(error);
                })
            
        }
    }
})