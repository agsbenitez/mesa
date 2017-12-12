<template>
    <div class="row">

        <div class="modal fade" id="create">
            <form >
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <h4>Nuevo Estado</h4>
                            <label for="estado">Estado</label>
                            <input type="text" name="estado" class="form-control"  v-model="estadoNew.valor">
                            <span v-for="error in errors" class="test-dander">{{error}}</span>

                        </div>
                        <div class="modal-footer">
                            <button v-on:click.prevent="estado" class="btn btn-primary" value="Guardar">
                                Guardar
                            </button>
                            <!--<input type="submit" class="btn btn-primary" value="Guardar">-->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        props:['estadoNew','errors'],


        data(){
            return {
                "est": null
            }
            },

        methods:{
            estado: function(estadoNew){
                this.$emit('estado', this.estadoNew);
                return false;
            }
        }
    }
</script>