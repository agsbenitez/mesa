<template>
    <div id="a" class="row">
        <div class="row">
            <div class="col-md-">
                <h1 class="page-header">Estados</h1>
            </div>
        </div>
        <div id="div1" class="col-sm-6">
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
                            <a href="#" v-on:click.prevent="editEstado(estado)"
                               class="btn btn-warning btn-link btn-sm ">
                                Editar
                            </a>
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
            <editestado label="form" v-on:estadosave="saveEstado" :est="est" :errors="errors"></editestado>


        </div>
    </div>
</template>

<style>

    /*#div1{
        overflow: scroll;
        height: 400px;
        width: 500px;
    }

    #div1 table{
        width: 500px;
        background-color: lightgray;
    }

    thead, tbody{
        display: block;
    }
    tbody {
        height: 40vh;
        min-height: 200px;
        overflow-Y: scroll;
    }
    tr {
        display: block;
        overflow: hidden;
    }*/

    tr {
        width: 100%;
        display: inline-table;
        height:60px;
        table-layout: fixed;

    }

    table{
        height:300px;
        display: -moz-groupbox;
    }
    tbody{
        overflow-y: scroll;
        height: 200px;
        width: 100%;
        position: absolute;
    }
</style>

<script>
    import estadoNew from './child/estadoNew'
    import editestado from './child/editestado'
     export default {

        components:{
            estadoNew,
            editestado
        },
         data(){
             return {
                 "estados": [],
                 "errors": [],
                 "estadoNew":{
                     "valor":""
                 },
                 "est":{
                     "id": "",
                     "estado":""
                 },
                 "msg":"el mensaje"
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
                     toastr.warning(error.response.status);
                 });
             },
             newEstado: function () {
                 var url = 'estado';

                 axios.post(url, {
                     'estado': this.estadoNew.valor
                 }).then(response => {
                     toastr.success("Nuevo estado Grabado: " + this.estadoNew.valor);
                     $("#create").modal("hide");

                 }).catch((error) => {
                     this.errors = error.response.data.message;
                     toastr.warning(error.response.data.message);
                     console.log(this.errors)
                     this.errors = '';
                 });
             },

             editEstado: function(estado){
                 this.est.id = estado.id;
                 this.est.estado = estado.estado;
                 console.log(this.est.estado);
                 $('#editest').modal('show');

             },

             saveEstado: function(est){
                 var url= 'estado/' + this.est.id;
                 axios.put(url, {
                     'estado': this.est.estado
                 }).then(response => {
                     toastr.success("Estdo Editado");
                     $("#editest").modal("hide");
                 }).catch((error) => {
                     this.errors = error.response.data.message;
                     toastr.warning(error.response.data.message);
                     this.errors = '';
                 });

             }
         }


     }
</script>