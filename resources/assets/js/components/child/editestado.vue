<template>
    <div class="row">

        <div class="modal fade" id="editest">
            <form >estado
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <h4>Edit Estado</h4>
                            <label for="estado">Estado</label>
                            <input id="input" type="text" name="estado" class="form-control"  :value="est.estado" v-bind:esto="est">
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
        props:['est','errors'],


        data(){
            return {
                "esto":{
                    'id':null,
                    'estado':null
                },
            }
        },

        methods:{
            estado: function(esto, est){

                this.est.estado=$('#input').val();
                this.est.id=this.est.id;

                this.$emit('estadosave', this.est);

            }
        }
    }
</script>