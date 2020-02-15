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
                                            <div class="table-responsive">
                                            <table class="display table table-striped table-hover dataTable" role="grid" aria-describedby="multi-filter-select_info">
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
                                                    <tr v-show="propsFilter.showFilter">
                                                        <th>#</th>
                                                        <th>
                                                            <input 
                                                            type="text" 
                                                            class="form-control form-control-sm"
                                                            v-model="propsFilter.Filter.name"
                                                            @change="OnFilter()"/>
                                                        </th>
                                                        <th>
                                                            <select 
                                                            class="form-control form-control-sm"
                                                            v-model="propsFilter.Filter.is_active"
                                                            @change="OnFilter()">
                                                                <option value="1">Active</option>
                                                                <option value="0">Non-Active</option>
                                                            </select>
                                                        </th>
                                                        <th>
                                                             <input 
                                                             type="text" 
                                                             class="form-control form-control-sm"
                                                             v-model="propsFilter.Filter.created_by"
                                                             @change="OnFilter()"
                                                             />
                                                        </th>
                                                        <th>
                                                             <input 
                                                             type="date" 
                                                             class="form-control form-control-sm"
                                                             v-model="propsFilter.Filter.created_at"
                                                             @change="OnFilter()"
                                                             />
                                                        </th>
                                                        <th >
                                                            <input 
                                                            type="text" 
                                                            class="form-control form-control-sm"
                                                            v-model="propsFilter.Filter.modified_by"
                                                            @change="OnFilter()"
                                                            />
                                                        </th>
                                                        <th>
                                                             <input 
                                                             type="date" 
                                                             class="form-control form-control-sm"
                                                             v-model="propsFilter.Filter.updated_at"
                                                             @change="OnFilter()"/>
                                                        </th>
                                                        <th>
                                                                 <button class="btn btn-icon btn-danger btn-sm" @click="filterClear()">
                                                                        <i class="fa fa-times"></i>
                                                                </button>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr role="row" v-bind:class="[index%2? 'odd':'even']" v-for="(item, index) in religions" :key="index">
                                                        <td>{{(((propsFilter.show) * propsFilter.page) + (index+1))}}</td>
                                                        <td>{{item.name}} {{index%2}}</td>
                                                        <td>{{item.active}}</td>
                                                        <td>{{item.created}}</td>
                                                        <td>{{item.created_at}}</td>
                                                        <td>{{item.modified}}</td>
                                                        <td>{{item.modified_at}}</td>
                                                        <td>
                                                             <div class="form-button-action">
                                                               
                                                                    <a title="Edit" class="btn btn-link btn-success btn-sm" style="padding:0 !important"
                                                                        @click="edit(item.id)">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    <a title="Hapus" class="btn btn-link btn-danger btn-sm" style="padding:0 !important"
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
    import filterBuilder from '../../halper/filterBuilder'
    import notif from './../../halper/notification'


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
    function filterModel() {
                this.name = null,
                this.is_active = null,
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
                    showFilter:false,
                    Filter:new filterModel
                },

            }
        },
        created() {
            this.loadData();
        },
        methods: {
            loadData(){
                $("#loading").show();
                var param = filterBuilder.generateFilter(this.paramFilter(),this.propsFilter);
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
                  notif.show("Data agama berhasil disimpan",notif.type.SUCCESS,notif.title.SUBMIT);
                  this.loadData();
                })
            },
            update(){
                httpService.Post(config.routeApi.religion.update+this.religion.id,this.religion).then((response)=>
                    {
                        notif.show("Data agama berhasil di update",notif.type.SUCCESS,notif.title.UPDATE);
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
        },
        filterClear(){
            this.propsFilter.Filter = new filterModel;
            this.loadData();
        },
        OnFilter(){
            this.loadData();
        },
        paramFilter()
        {
            const ops = filterBuilder.operation;
            var filter = [];
            if(!prototype.IsNull(this.propsFilter.Filter.name)){
                filter.push({field:"name",operation:ops.like,value:this.propsFilter.Filter.name});
            }
            if(!prototype.IsNull(this.propsFilter.Filter.is_active)){
                filter.push({field:"is_active",operation:ops.like,value:this.propsFilter.Filter.is_active});
            }
            if(!prototype.IsNull(this.propsFilter.Filter.created_by)){
                filter.push({field:"created_by",operation:ops.like,value:this.propsFilter.Filter.created_by});
            }
            
            if(!prototype.IsNull(this.propsFilter.Filter.created_at)){
                filter.push({field:"created_at",operation:ops.like,value:this.propsFilter.Filter.created_at});
            }
            if(!prototype.IsNull(this.propsFilter.Filter.modified_by)){
                filter.push({field:"modified_by",operation:ops.like,value:this.propsFilter.Filter.modified_by});
            }
            if(!prototype.IsNull(this.propsFilter.Filter.updated_at)){
                filter.push({field:"updated_at",operation:ops.like,value:this.propsFilter.Filter.modified_by});
            }
            return filter;
        }
        },
       components: {
            'form-modal': formModal,
            'pagination':pagination,
            'filter-top':filterTop,
        }
    }
</script>