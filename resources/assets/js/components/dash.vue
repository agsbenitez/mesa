<template>
    <div  class="row">
        <div class="col-xs-12">
            <h1 class="page-header">Expedientes</h1>
        </div>
        <div class="col-sm-10">
            <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
                Nuevo Expedidnte
            </a>
            <table class="table table-fixed ">
                <thead>
                <tr>
                    <th class="col-xs-1">
                        id
                    </th>
                    <th class="col-xs-3" width="50px">
                        comitente
                    </th>
                    <th class="col-xs-3" width="50px">
                        Destinatario
                    </th>
                    <th class="col-xs-3">
                        Fechad de alta
                    </th>
                    <th class="col-xs-3">
                        Area
                    </th>
                    <th>&nbsp;</th>

                </tr>
                </thead>

                <tbody>

                    <tr v-for="exp in expediente">
                        <td class="col-xs-3" width="10px">{{exp.id}}</td>
                        <td class="col-xs-3" width="50px">{{exp.comitente}}</td>
                        <td class="col-xs-3" width="50px">{{exp.destinatario}}</td>
                        <td class="col-xs-3" width="10px">{{exp.fecha_alta}}</td>
                        <td class="col-xs-3" width="10px">{{exp.fullarea.area}}</td>
                        <!--<td width="50px">El Area</td>-->
                        <td class="col-xs-3" width="10px">
                            <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                        <td class="col-xs-3" width="10px">
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>

                </tbody>

            </table>
            <h4>Expediente Nuevo: {{newExpediente}}</h4>




        </div>
        <!--<ventana id="form" v-model="expediente"> </ventana>-->

        <div class="row">

            <div class="modal fade" id="create">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            <h4>Nuevo Expediente</h4>
                        </div>
                            <div class="modal-body">
                                <form method="post" v-on:submit.prevent="UpdateValue">
                                    <label for="comitente">Asunto</label>
                                    <input type="text" name="asunto" class="form-control" v-model="newExpediente.asunto">
                                    <label for="destinatario">Comitente</label>
                                    <input type="text" name="comitente" class="form-control" v-model="newExpediente.comitente" >
                                    <label for="asunto">Destinatario</label>
                                    <input type="text" name="destinatario" class="form-control" v-model="newExpediente.destinatario">
                                    <label for="fechaAlta">Fecha:</label>
                                    <input type="date" name="fechaAlta" class="form-control" v-model="newExpediente.fechaAlta">
                                    <label for='fechaHasta'>Fecha de Realizarce</label>
                                    <input type="date" name='fechaHasta' class="form-control" v-model="newExpediente.fechaHasta">
                                    <label for="selectarea">Area</label>
                                    <select name='selectarea' id='selectarea'  v-model="newExpediente.area">
                                        <option selected="" disabled="" value="">Choose your make</option>
                                        <option v-for="area in areas" :value="area.id">{{area.area}}</option>
                                    </select>
                                    <label for="presupuesto">Presupuesto</label>
                                    <input type="text" name="presupuesto" class="form-control" v-model="newExpediente.presupuesto">
                                    <label for="lugar">Lugar</label>
                                    <input type="text" name="lugar" class="form-control" v-model="newExpediente.lugar">
                                    <label for="tags">Tags</label>
                                    <input type="text" name="tags" class="form-control" v-model="newExpediente.tags">
                                    <label for="commnet">Comentarios</label>
                                    <textarea class="form-control" rows="5" id="comment" v-model="newExpediente.comentario"></textarea>
                                    <!--<input type="textarea" name="tags" class="form-control" />-->


                                    <span v-for="error in errors" class="text-danger">{{error}}</span>
                                </form>


                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="Guardar">

                            </div>

                    </div>
                </div>

            </div>



        </div>
    </div>
</template>
<style>

    body{
        background-color: #bdc3c7;
    }
    .table-fixed {
        width: 100%;
        background-color: #f3f3f3;

            tbody {
                height: 200px;
                overflow-y: auto;
                width: 100%;
            }

            thead, tbody, tr, td, th {
                display: block;
            }

            tbody {
                td {
                    float: left;
                }
            }

            thead {
                tr {
                    th {
                        float: left;
                        background-color: #f39c12;
                        border-color: #e67e22;
                    }
                }
            }
    }


</style>

<script>
//    import ventana from './forms-fields/expnew';
    export default {
        /*components:{
            ventana

        },*/
         data(){
             return {
                 "expediente": [],
                 "areas": [],
                 "id":null,
                 "newExpediente":{
                     "asunto":"",
                     "comitente":"",
                     "destinatario":"",
                     "fechaAlta":"",
                     "fechaHasta":"",
                     "area":"",
                     "presupuesto":"",
                     "lugar":"",
                     "comentario":"",
                     "tags":"",
                 },
                 "errors": [],
                 }
         },

         created: function(){
             this.getExp();
             this.getArea();

         },


         mounted()
             {
                 console.log('Componente montado')
             },
         computed:{

         },

         methods: {
                 getExp: function () {
                     var url = '/expediente';
                     axios.get(url).then(response=>{
                         this.expediente = response.data;

                     }).catch((error)=>{
                         console.log(error);
                     });

                 },
                 getArea: function(){
                     var url = '/area/';
                     axios.get(url).then(response=>{
                         this.areas = response.data;

                     }).catch((error)=>{
                         console.log(error)
                     });
                 },
                UpdateValue: function(newExpediente){
                  console.log(newExpediente);
                    $('#create').modal('hide');
                },

                createExp: function () {
                     var url = '/expediente';
                     axios.post(url, {
                         expediente: this.newExpediente
                     }).then(response => {
    //                        this.getExp();
                         this.newExpediente = '';
                         this.erros = [];
                         $('#create').modal('hide');
                         toastr.success('Expediente Cargado')
                     }).catch((error) => {
                         this.error = error.response.data
                         console.log(error);
                     });

             },


         }

     }
</script>