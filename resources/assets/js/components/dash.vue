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
                            <button v-on:click="editExpt(exp.id)" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#create">Edit</button>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
            <ventana label="form" v-on:expediente="UpdateValue" v-bind:newExpediente="newExpediente" v-bind:areas='areas'> </ventana>

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
   import ventana from './forms-fields/expnew';
    export default {
        components:{
            ventana

        },
        
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
                 "errors": []
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
                UpdateValue: function(){
                  console.log(this.newExpediente);
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

                editExpt: function(id){
                        var url ='expediente/' + id;
                        axios.get(url).then(response=>{
                            this.newExpediente = response.data;
                        }).catch((error) => {
                            this.error = eorror.response.data
                        })
                     }


         }

     }
</script>