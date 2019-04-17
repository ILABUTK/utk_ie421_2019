new Vue({
    el: '#app',
    data() {
        return {
            msg: 'Hello world!',
            name: '',
            email: '',
            subject: '',
            message: '',
            status: 'Status'
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
                .post('http://localhost:5500/api/contact', {name: this.name, email: this.email, subject: this.subject, message: this.message})
                .then(response => (
                    this.msg = response.data.status,
                    (this.msg == 'success') ? this.status = 'Submitted! Thanks.' : ''                                     
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