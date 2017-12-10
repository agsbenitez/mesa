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
                            <a href="#" v-on:click="editEstado(estado.id)" class="btn btn-warning btn-link btn-sm ">Editar</a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-danger btn-link btn-sm" v-on:click.prevent="deleteEstado(estado)">Borrar</a>
                        </td>
                    </tr>

                </tbody>

            </table>


        </div>
        <div class="col-sm-2">
            <estadoNew label="form" v-on:estado="newEstado" :estadoNew="estadoNew" :errors="errors"></estadoNew>


        </div>
    </div>
</template>

<script>
    import estadoNew from './child/estadoNew'
     export default {

        components:{
            estadoNew
        },
         data(){
             return {
                 "estados": [],
                 "errors": [],
                 "estadoNew":{
                     "valor":""
                 }
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

                 }).catch((error) => {
                     console.log(error);
                 });

             },
             deleteEstado: function (estado) {
                 var url = 'estado/' + estado.id;
                 axios.delete(url).then(response => {

                     this.getEstados();
                     toastr.success("Estaddo Eliminado Satisfactoriamente");
                 }).catch((error) => {
                     console.log(error)
                     toastr.warning(error.response.status);
                 });
             },
             newEstado: function () {
                 var url = 'estado';
                 debugger;
                 axios.post(url, {
                     'estado': this.estadoNew.valor
                 }).then(response => {
                     toastr.success("Nuevo estado Grabado: " + this.estadoNew.valor);
                     $("#create").modal("hide");

                 }).catch((error) => {
                     this.errors = error.response.data;
                     toastr.warning(this.error);
                     this.errors = '';
                 });
             }

             editEstado: function(id){
                 var url ='estado/' + id;
                 axios.get(url).then(response=>{
                     this.estados = response.data;
                 }).catch((error) => {
                     this.error = eorror.response.data
                 })
             }
         }


     }
</script>