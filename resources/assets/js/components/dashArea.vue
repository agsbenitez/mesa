<template>
    <div id="app" class="row">
        <div class="col-xs-12">
            <h1 class="page-header">Expedientes</h1>
        </div>
        <div class="col-sm-10">
            <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">Nueva Area</a>
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
                        <!--<td width="10px"v-bind="getArea(exp.area)">{{area}}</td>-->
                        <td width="50px">El Area</td>
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
            <div class="row">

                <div class="modal fade" id="create">
                    <form method="post" v-on:submit.prevent="UpdateValue">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <h4>Nuevo Area</h4>

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
                                    <div id="area">
                                        <label for="selectarea">Area</label>
                                        <select name='selectarea' id='selectarea'  v-model="newExpediente.area">
                                            <option selected="" disabled="" value="">Choose your make</option>
                                            <option v-for="area in areas" :value="area.id">{{area.area}}</option>
                                        </select>
                                    </div>
                                    <label for="presupuesto">Presupuesto</label>
                                    <input type="text" name="presupuesto" class="form-control" v-model="newExpediente.presupuesto">
                                    <label for="lugar">Lugar</label>
                                    <input type="text" name="lugar" class="form-control" v-model="newExpediente.lugar">
                                    <label for="tags">Tags</label>
                                    <input type="text" name="tags" class="form-control" v-model="newExpediente.tags">
                                    <label for="commnet">Comentarios</label>
                                    <textarea class="form-control" rows="5" id="comment" v-model="newExpediente.comentario"></textarea>
                                    &lt;!&ndash;<input type="textarea" name="tags" class="form-control" />&ndash;&gt;
                                    &lt;!&ndash;<span v-for="error in errors" class="text-danger">{{error}}</span>&ndash;&gt;
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="Guardar">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

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