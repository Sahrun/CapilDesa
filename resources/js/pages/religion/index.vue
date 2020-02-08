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
                                                        <th v-bind:class="[sorting('name')]"  @click="Onsorting('name')" >Agama</th>
                                                        <th v-bind:class="[sorting('is_active')]" @click="Onsorting('is_active')" >Status</th>
                                                        <th v-bind:class="[sorting('created_by')]" @click="Onsorting('created_by')" >Dibuat oleh</th>
                                                        <th v-bind:class="[sorting('created_at')]" @click="Onsorting('created_at')" >Tanggal</th>
                                                        <th v-bind:class="[sorting('modified_by')]" @click="Onsorting('modified_by')" >Dirubah oleh</th>
                                                        <th v-bind:class="[sorting('updated_at')]" @click="Onsorting('updated_at')" >Tanggal</th>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>
                                                            <input type="text" class="form-control form-control-sm"/>
                                                        </th>
                                                        <th>
                                                            <select class="form-control form-control-sm">
                                                                <option value=""></option>
                                                            </select>
                                                        </th>
                                                        <th>
                                                             <input type="text" class="form-control form-control-sm"/>
                                                        </th>
                                                        <th>
                                                             <input type="date" class="form-control form-control-sm"/>
                                                        </th>
                                                        <th >
                                                            <input type="text" class="form-control form-control-sm"/>
                                                        </th>
                                                        <th>
                                                             <input type="date" class="form-control form-control-sm"/>
                                                        </th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr role="row" class="{index%2? 'odd':'even'}" v-for="(item, index) in religions" :key="index">
                                                        <td>{{(((propsFilter.show) * propsFilter.page) + (index+1))}}</td>
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
                    page:0,
                    pages:null,
                    count:0,
                    count_page:0,
                    sorting_by:'name',
                    sorting:'asc',

                },

            }
        },
        created() {
            this.loadData();
        },
        methods: {
            loadData(){
               $("#loading").show();
                var param ="?show="+this.propsFilter.show+"&page="+this.propsFilter.page+"&order_by="+this.propsFilter.sorting_by+"&order="+this.propsFilter.sorting;
                httpService.Get(config.routeApi.religion.all,param).then((response)=>
                {
                   this.religions = response.data;
                   this.propsFilter.pages = response.pages;
                   this.propsFilter.count = response.count;
                   this.propsFilter.count_page = response.data.length;
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
           },
        Onsorting(column){
             this.propsFilter.sorting = this.propsFilter.sorting == 'desc'?'asc':'desc';
             this.propsFilter.sorting_by = column;
             this.loadData();
        },
        sorting(column){
            var sort ='sorting';
            if(column == this.propsFilter.sorting_by){
                sort = this.propsFilter.sorting == 'asc'? 'sorting_desc':'sorting_asc'
            }
            return sort;
        }
        },
       components: {
            'form-modal': formModal,
            'pagination':pagination,
            'filter-top':filterTop,
        }
    }
</script>