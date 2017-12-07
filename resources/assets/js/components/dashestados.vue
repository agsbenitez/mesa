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


        </div>
        <div class="col-sm-2">
            <estadoNew label="form" v-on:estado="newEstado" v-bind:estadoNew.sync="estadoNew" v-bind:errors="errors"></estadoNew>
            <!--<div class="row">

                <div class="modal fade" id="create">
                    <form method="post" v-on:submit.prevent="newEstado">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <h4>Nuevo Estado</h4>
                                    <label for="estado">Estado</label>
                                    <input type="text" name="estado" class="form-control" v-model="estadoNew" >
                                    <span v-for="error in errors" class="test-dander">{{error}}</span>

                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="Guardar">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>-->

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
                 "estadoNew": ""
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
             /*newEstado: function () {
                 var url = 'estado';
                 console.log(this.estadoNew);
                 axios.post(url, {
                     'estado': this.estadoNew
                 }).then(response => {
                     this.getEstados();
                     this.errors = '';
                     $('#create').modal('hide');
                     toastr.success('Estado Grabado');
                 }).catch((error) => {
                     this.errors = error.response.data;
                     toastr.warning(this.error);
                     this.errors='';
                 });
             }*/
             newEstado: function () {
                 alert("entro");
                 var url = 'estado';
                 axios.post(url, {
                     'estado': this.estadoNew
                 }).then(response => {
                     $("#create").modal("hide");
                     toastr.success("Nuevo estado Grabado");
                 }).catch((error) => {
                     this.errors = error.response.data;
                     toastr.warning(this.error);
                     this.errors = '';
                 });
             }
         }


     }
</script>