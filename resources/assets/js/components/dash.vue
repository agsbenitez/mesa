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
                        <td width="10px"v-bind="getArea(exp.area)">{{area}}</td>
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
            {{area}}

        </div>
    </div>
</template>

<script>
     export default {
         data(){
             return {
                 "expediente": [],
                 "area": [],
                 "id":null
                 }
         },

         created: function(){
             this.getExp();

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
                 getArea: function(id){
                     var url = '/area/' + id;
                     console.log(url);
                     axios.get(url).then(response=>{
                         this.area = response.data.area;

                     }).catch((error)=>{
                         console.log(error)
                     });
                 }


         }

     }
</script>