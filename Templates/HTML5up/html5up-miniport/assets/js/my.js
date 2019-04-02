new Vue({
    el: '#app',
    data() {
        return {
            msg: 'Hello world!',
            name: '',
            email: '',
            subject: '',
            message: ''
        }
    },

    mounted() {        
    },
    methods: {
        getData () {
            console.log("working here")
            axios
                .get('https://api.coindesk.com/v1/bpi/currentprice.json')
                .then(response => (this.message = response.data.chartName))
            
            axios
                .post('http://api.coindesk.com/v1/bpi/currentprice.json')
                .then(response => (this.msg = response.data.chartName))
        }
    }
})