<template>
    <div class="modal fade" id="create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <h4>Nuevo Expediente</h4>
                    <div class="modal-body">
                        <label for="expediente">Crear Expedinete</label>
                        <input type="text" name="comitente" class="form-control" v-on:input="UpdateValue" >
                        <span v-for="error in errors" class="text-danger">{{error}}</span>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Guardar">

                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        export default {
            methods:{
                UpdateValue: function (event) {
                    this.$emit('inputValue', event.target.value);

                }
            }
        }
    </script>


</template>
