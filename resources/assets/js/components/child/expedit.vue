<template>
    <div class="row">

        <div class="modal fade" id="editexp">
            <form  >
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <h4>Nuevo Expediente</h4>

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
                            
                            <span v-for="error in errors" class="text-danger">{{error}}</span>
                        </div>
                        <div class="modal-footer">
                            <button  v-on:click.prevent="expediente" class="btn btn-primary" value="Guardar">
                                Guardar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>



</template>
<script>

    export default {

        props: ['newExpediente', 'areas'],

        methods:{
            expediente: function (newExpediente) {
                this.$emit('expediente', this.newExpediente);

            }
        }
    }
</script>