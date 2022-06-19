<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body>
    <div id="app">
        {{-- <example-component></example-component> --}}
        <ol>
            <li v-if="users.length > 0" v-for="user in users">
                @{{ user.title }}
            </li>
        </ol>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
    <script src="https://unpkg.com/vue@3"></script>

    <script>
        const { createApp } = Vue
        createApp({
        data() {
            return {
            users:[]
            }
        },
        mounted(){
                this.loadData();
            },
            methods:{
                loadData:function(){
                axios.get('https://jsonplaceholder.typicode.com/posts').then(res=>{
                if(res.status==200){
                    this.users=res.data;
                }
                }).catch(err=>{
                    console.log(err)
                });
                }
            }
        }).mount('#app')

        $(document).ready(function () {
    $('#example').DataTable();
});
    </script>


</body>

</html>
