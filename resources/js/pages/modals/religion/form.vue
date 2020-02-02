<template>
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
						<span class="fw-mediumbold">Tambah</span> 
						<span class="fw-light">data agama</span>
					</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="small"></p>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Agama</label>
                                <input type="text" v-model="religion.name" class="form-control" placeholder="nama agama">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea v-model="religion.description" class="form-control" placeholder="description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" class="btn btn-primary btn-sm" @click="save">SIMPAN</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">BATAL</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['religion'],
        methods: {
            save() {
                this.$parent.save();
            }
        },
    }
</script>