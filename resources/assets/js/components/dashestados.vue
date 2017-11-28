<template>
    <div id="a" class="row">
        <div class="col-xs-12">
            <h1 class="page-header">Estados</h1>
        </div>
        <div class="col-sm-10">
            <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
                Nuevo Estado
            </a>
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th width="10px">
                        id
                    </th>
                    <th width="500px">
                        Estado
                    </th>

                    <th width="25px">&nbsp</th>

                </tr>
                </thead>

                <tbody>

                    <tr v-for="estado in estados">
                        <td>{{estado.id}}</td>
                        <td>{{estado.estado}}</td>

                        <td>
                            <a href="#" class="btn btn-warning btn-link btn-sm ">Editar</a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-danger btn-link btn-sm" v-on:click.prevent="deleteEstado(estado)">Borrar</a>
                        </td>
                    </tr>

                </tbody>

            </table>
            <InputWidget label="Titulo" v-on:inputValue="setTitle" />

        </div>
        <div class="col-sm-2">

        </div>
    </div>
</template>

<script>
    import InputWidget from './forms-fields/input';
     export default {
         data(){
             return {
                 "estados": [],
                 "errors": null
                 }
         },

         created: function(){

             this.getEstados();

         },


         mounted()
             {
                 console.log('Componente montado')
             },
         computed:{

         },

         methods: {
                 getEstados: function () {
                     var url = '/estado';
                     axios.get(url).then(response => {
                         this.estados = response.data;

                     }).catch((error)=>{
                         console.log(error);
                     });

                 },
             deleteEstado: function(estado){
                    var url = 'estado/' + estado.id;
                    axios.delete(url).then(response => {
                        this.getEstados();

                    }).catch((error)=>{
                        console.log(error);
                 });
             }


         }

     }
</script>