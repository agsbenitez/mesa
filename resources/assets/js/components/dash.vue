<template>
    <div>
        <div class="row">
            <div class="col-md-10">
                <h3 class="page-header text-center">Expedientes</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
                    Nuevo Expediente
                </a>
                <table class="table table-striped table-condesed table-hover table-fixed ">
                    <thead>
                    <tr>
                        <th>
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
                            <td >{{exp.id}}</td>
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
                <div class="row">
                    <div id="pager" class="col-lg-12" margin="auto">
                        <ul id="pagerul" class="pagination">
                            <li><a href="#">&laquo;</a></li>

                            <li v-for="page in pager.last_page"><a href="#">{{page}}</a></li>

                            <li><a href="#">&laquo;</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div id="files" class="details">2</div>
                    <div class="col-lg-4" border="solid">1</div>
                    <div class="col-lg-4" border="solid">3</div>
                </div>
            </div>

        </div>
            <ventana label="form" v-on:expediente="UpdateValue" v-bind:newExpediente="newExpediente" v-bind:areas='areas'> </ventana>
    </div>
</template>
<style>

    body{
        background-color: whitesmoke;
    }

    #pagerul{
        position: absolute;
        left: 50%;
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
   import ventana from './child/expnew';
    export default {
        components:{
            ventana

        },
        
        data(){
             return {
                 "pager":null,
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
            this.init();
            this.getArea();

        },


        mounted()
             {
                 console.log('Componente montado')
             },
         computed:{
         },

        methods: {
            init: function(){
                var page = 1;
                if (typeof(this.page) !== 'undefinied'){
                    page = this.page
                }
                this.getExp(page);

                },

            getExp: function (page) {
                     var url = '/expediente?page=' + page;
                     axios.get(url).then(response=>{
                         this.expediente = response.data.data;
                         this.pager = response.data;

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