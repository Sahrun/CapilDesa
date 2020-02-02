<template>
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Agama</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Agama</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Grid</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data agama</h4>
                                <button class="btn btn-primary btn-sm btn-round ml-auto" @click="openForm">
                                    <i class="fa fa-plus"></i> Tambah
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <filter-top :filter="propsFilter"/>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="multi-filter-select" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="multi-filter-select_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th>No</th>
                                                        <th class="sorting_asc text-center" tabindex="0" aria-controls="multi-filter-select" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">Agama</th>
                                                        <th class="sorting" tabindex="0" aria-controls="multi-filter-select" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Status</th>
                                                        <th class="sorting" tabindex="0" aria-controls="multi-filter-select" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Dibuat oleh</th>
                                                        <th class="sorting" tabindex="0" aria-controls="multi-filter-select" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" >Tanggal</th>
                                                        <th class="sorting" tabindex="0" aria-controls="multi-filter-select" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" >Dirubah oleh</th>
                                                        <th class="sorting" tabindex="0" aria-controls="multi-filter-select" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Tanggal</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                    <tr>
                                                        <!-- <th rowspan="1" colspan="1">
                                                            <select class="form-control">
                                                                <option value=""></option>
                                                            </select>
                                                        </th>
                                                        <th rowspan="1" colspan="1">
                                                            <select class="form-control">
                                                                <option value=""></option>
                                                            </select>
                                                        </th>
                                                        <th rowspan="1" colspan="1">
                                                            <select class="form-control">
                                                                <option value=""></option>
                                                            </select>
                                                        </th>
                                                        <th rowspan="1" colspan="1">
                                                            <select class="form-control">
                                                                <option value=""></option>
                                                                <option value="19">19</option>
                                                                <option value="20">20</option>
                                                            </select>
                                                        </th>
                                                        <th rowspan="1" colspan="1">
                                                            <select class="form-control">
                                                                <option value=""></option>
                                                                <option value="2008/09/26">2008/09/26</option>
                                                                <option value="2008/10/16">2008/10/16</option>
                                                            </select>
                                                        </th>
                                                        <th rowspan="1" colspan="1">
                                                            <select class="form-control">
                                                                <option value=""></option>
                                                                <option value="$1,200,000">$1,200,000</option>
                                                                <option value="$103,500">$103,500</option>
                                                            </select>
                                                        </th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr role="row" class="{index%2? 'odd':'even'}" v-for="(item, index) in religions" :key="index">
                                                        <td>{{index+1}}</td>
                                                        <td>{{item.name}}</td>
                                                        <td>{{item.active}}</td>
                                                        <td>{{item.created}}</td>
                                                        <td>{{item.created_at}}</td>
                                                        <td>{{item.modified}}</td>
                                                        <td>{{item.modified_at}}</td>
                                                        <td>
                                                             <div class="form-button-action">
                                                               
                                                                    <a title="Edit" class="btn btn-link btn-success"
                                                                        @click="edit(item.id)">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    <a title="Hapus" class="btn btn-link btn-danger"
                                                                        @click="deleteData(item.id)">
                                                                        <i class="fa fa-times"></i>
                                                                    </a>
                                                                </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                   <pagination :filter="propsFilter"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form-modal :religion="religion" :error="error"/>
    </div>
</template>
<script>
    import formModal from './../modals/religion/form.vue'
    import httpService from './../../halper/httpService'
    import config from './../../halper/config'
    import pagination from './../../components/pagination'
    import filterTop from './../../components/filterTop'
    import s_alert from './../../halper/sweetalert'
    import prototype from '../../halper/prototype'


    function religionModel() {
                this.id = null,
                this.name = null,
                this.is_active = null,
                this.description =null,
                this.created_by = null,
                this.modified_by = null,
                this.created_at = null,
                this.updated_at = null
    };

    function error()
    {
        this.name = null,
        this.description =null
    };

    export default {
        data() {
        return {
                religion : {},
                religions:[],
                error:{},
                propsFilter:{
                    show:config.Grid.defaultShow,
                    search:null,
                    page:null,
                    pages:null
                }
            }
        },
        created() {
            this.loadData();
        },
        methods: {
            loadData(){
               $("#loading").show();
                var param ="?show="+this.propsFilter.show;
                httpService.Get(config.routeApi.religion.all,param).then((response)=>
                {
                   this.religions = response.data;
                   this.propsFilter.pages = response.pages;
                   $("#loading").hide();
                })
            },
            openForm() {
                this.religion = new religionModel;
                this.error = new error;
                $("#formModal").modal('show');
            },
            submit()
            {
                prototype.IsNull(this.religion.id) ? this.save(): this.update();
            },
            save(){
                httpService.Post(config.routeApi.religion.save,this.religion).then((data)=>
                {
                  $("#formModal").modal('hide');
                  s_alert.Success("data agama berhasil disimpan");
                  this.loadData();
                })
            },
            update(){
                httpService.Post(config.routeApi.religion.update+this.religion.id,this.religion).then((response)=>
                    {
                        s_alert.Success("Data agama berhasil di update");
                        $("#formModal").modal('hide');
                        this.loadData();
                });
            },
            deleteData(id)
            {
                s_alert.Confirm("Anda akan menghapus data agama").then((response) =>{
                    if(response){
                        httpService.Get(config.routeApi.religion.delete,id).then((data)=>
                        {
                            s_alert.Success("Data agama berhasil dihapus");
                            this.loadData();
                        });
                    }
                });
            },
           edit(id){
              var formData = new FormData();
              formData.append('id',id);
               httpService.Post(config.routeApi.religion.getById,formData).then((data)=>
                {
                    this.religion = data.data;
                    this.error = new error;
                    $("#formModal").modal('show');
                });
           }
        },
       components: {
            'form-modal': formModal,
            'pagination':pagination,
            'filter-top':filterTop,
        }
    }
</script>