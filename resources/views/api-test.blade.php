<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
<script>
    axios.defaults.headers.common = {'Authorization': 'Bearer {{ config('auth.api.token') }}', 'Accept': 'application/json'};

    const devices = [{
        ip: '192.168.1.1',
        mac: 'f1:18:98:39:08:b7',
        hostname: ''
    }, {
        ip: '192.168.1.2',
        mac: 'f2:18:98:39:08:b7',
        hostname: 'iphone'
    }];

    axios.post('/api/update-devices', devices).then(response => {
        console.log(response);
    })
</script>