<template>
    <div id="crud" class="row">
        <div class="col-xs-12">
            <h1 class="page-header">Expedientes</h1>
        </div>
        <div class="col-sm-10">
            <a href="#" class="btn btn-primary pull-right">Nuevo Expedidnte</a>
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>
                        id
                    </th>
                    <th width="50px">
                        comitente
                    </th>
                    <th width="50px">
                        Destinatario
                    </th>
                    <th>
                        Fechad de alta
                    </th>
                    <th>
                        Area
                    </th>
                    <th>&nbsp;</th>

                </tr>
                </thead>

                <tbody>

                    <tr v-for="exp in expediente">
                        <td width="10px">{{exp.id}}</td>
                        <td width="50px">{{exp.comitente}}</td>
                        <td width="50px">{{exp.destinatario}}</td>
                        <td width="10px">{{exp.fecha_alta}}</td>
                        <td width="10px">{{exp.area}}</td>
                        <td width="10px">
                            <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                        <td width="10px">
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>

                </tbody>

            </table>
        </div>
        <div class="col-sm-2">
            <div v-for="exp in expediente">



            </div>


        </div>
    </div>
</template>

<script>
     export default {
         data(){
             return {
                 "expediente": [],
                 }
         },

         created: function(){
             this.getExp(1);
         },

         mounted()
             {
                 console.log('Componente montado')
             },

         methods: {
                 getExp: function () {
                     var url = '/expediente';
                     axios.get(url).then(response=>{
                         this.expediente = response.data;
                     }).catch((error)=>{
                         console.log(error);
                     });

                 }
         }

     }
</script>